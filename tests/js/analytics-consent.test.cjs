const { test } = require('node:test');
const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');
const source = fs.readFileSync('public/assets/js/analytics-consent.js', 'utf8');

function setup(saved, storageBlocked = false) {
    const listeners = {};
    const scripts = [];
    const expired = [];
    const storage = new Map(saved ? [['nw_analytics_consent_v1', JSON.stringify(saved)]] : []);
    let reloads = 0;
    function element(dataset = {}) {
        return { dataset, hidden: true, handlers: {}, addEventListener(name, fn) { this.handlers[name] = fn; }, focus() {} };
    }
    const reject = element({ analyticsChoice: 'denied' });
    const accept = element({ analyticsChoice: 'granted' });
    const settings = element();
    const close = element();
    const panel = element({ measurementId: 'G-TEST12345', pageUrl: 'https://newwavemotorsport.com/contact', pageTitle: 'contact' });
    panel.querySelectorAll = () => [reject, accept];
    panel.querySelector = () => reject;
    const document = {
        referrer: 'https://example.test/search?email=private@example.test',
        getElementById: id => ({ 'analytics-consent': panel, 'analytics-settings': settings, 'analytics-close': close })[id],
        createElement: () => ({}), head: { appendChild: value => scripts.push(value) },
        get cookie() { return 'nw_ga=123; nw_ga_TEST12345=456; session=keep'; },
        set cookie(value) { expired.push(value); }
    };
    const window = { addEventListener(name, fn) { listeners[name] = fn; } };
    const context = { window, document, URL, Date, localStorage: {
        getItem: key => { if (storageBlocked) throw Error(); return storage.get(key) || null; },
        setItem: (key, value) => { if (storageBlocked) throw Error(); storage.set(key, value); }
    }, location: { hostname: 'newwavemotorsport.com', reload() { reloads++; } } };
    vm.runInNewContext(source, context);
    return { panel, scripts, expired, window, listeners, storage, accept: () => accept.handlers.click(), reject: () => reject.handlers.click(), settings: () => settings.handlers.click(), reloads: () => reloads, commands: () => (window.dataLayer || []).map(args => Array.from(args)) };
}

test('no Google requests or events before consent and after rejection', () => {
    const env = setup();
    assert.equal(env.panel.hidden, false);
    env.listeners['newwave:enquiry-sent']();
    env.reject();
    assert.equal(env.scripts.length, 0);
    assert.equal(env.commands().length, 0);
    assert.equal(env.panel.hidden, true);
    assert.ok(env.expired.every(value => !value.startsWith('session=')));
});

test('acceptance loads once, strips referrer query, disables ads and sends no contact data', () => {
    const env = setup(); env.accept(); env.accept();
    assert.equal(env.scripts.length, 1);
    const config = env.commands().find(args => args[0] === 'config')[2];
    assert.equal(config.page_referrer, 'https://example.test');
    assert.equal(config.allow_google_signals, false);
    assert.equal(config.send_page_view, false);
    env.listeners['newwave:enquiry-sent']();
    const lead = env.commands().find(args => args[1] === 'generate_lead');
    assert.deepEqual(Object.keys(lead[2]), ['send_to']);
    assert.equal(env.commands().filter(args => args[1] === 'page_view').length, 1);
});

test('withdrawal disables events, clears analytics cookies and reloads', () => {
    const env = setup(); env.accept(); env.settings(); env.reject();
    assert.equal(env.window['ga-disable-G-TEST12345'], true);
    assert.equal(env.reloads(), 1);
    const count = env.commands().length;
    env.listeners['newwave:enquiry-sent']();
    assert.equal(env.commands().length, count);
});

test('saved rejection and expired consent never load Google', () => {
    const denied = setup({ value: 'denied', at: Date.now() });
    assert.equal(denied.scripts.length, 0); assert.equal(denied.panel.hidden, true);
    const expired = setup({ value: 'granted', at: 1 });
    assert.equal(expired.scripts.length, 0); assert.equal(expired.panel.hidden, false);
    const granted = setup({ value: 'granted', at: Date.now() });
    assert.equal(granted.scripts.length, 1);
});

test('cross-tab withdrawal stops tracking', () => {
    const env = setup(); env.accept();
    env.storage.set('nw_analytics_consent_v1', JSON.stringify({ value: 'denied', at: Date.now() }));
    env.listeners.storage({ key: 'nw_analytics_consent_v1' });
    assert.equal(env.reloads(), 1);
    assert.equal(env.window['ga-disable-G-TEST12345'], true);
});

test('unavailable storage defaults to no tracking', () => {
    const env = setup(null, true);
    assert.equal(env.scripts.length, 0); assert.equal(env.panel.hidden, false);
    env.reject(); assert.equal(env.scripts.length, 0);
});
