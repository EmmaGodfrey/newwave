(() => {
    'use strict';
    const panel = document.getElementById('analytics-consent');
    if (!panel) return;
    const id = panel.dataset.measurementId;
    if (!/^G-[A-Z0-9]+$/.test(id)) return;
    const key = 'nw_analytics_consent_v1';
    const lifetime = 180 * 24 * 60 * 60 * 1000;
    const settings = document.getElementById('analytics-settings');
    const close = document.getElementById('analytics-close');
    let active = false;
    let choice = readChoice();
    function readChoice() {
        try {
            const saved = JSON.parse(localStorage.getItem(key));
            if (saved && ['granted', 'denied'].includes(saved.value) && Number.isFinite(saved.at) && saved.at <= Date.now() && Date.now() - saved.at < lifetime) return saved.value;
        } catch (_) { /* Storage unavailable: require a fresh choice. */ }
        return null;
    }
    function clearAnalyticsCookies() {
        const domains = location.hostname.split('.');
        const scopes = ['', '; domain=' + location.hostname];
        for (let i = 0; i < domains.length - 1; i++) scopes.push('; domain=.' + domains.slice(i).join('.'));
        document.cookie.split(';').forEach(cookie => {
            const name = cookie.split('=')[0].trim();
            if (!name.startsWith('nw_ga')) return;
            scopes.forEach(scope => { document.cookie = name + '=; Max-Age=0; path=/' + scope + '; SameSite=Lax'; });
        });
    }
    function enable() {
        if (active || choice !== 'granted') return;
        active = true;
        window['ga-disable-' + id] = false;
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { window.dataLayer.push(arguments); };
        window.gtag('consent', 'default', { analytics_storage: 'denied', ad_storage: 'denied', ad_user_data: 'denied', ad_personalization: 'denied' });
        window.gtag('consent', 'update', { analytics_storage: 'granted' });
        window.gtag('js', new Date());
        let referrer = '';
        try { referrer = document.referrer ? new URL(document.referrer).origin : ''; } catch (_) {}
        window.gtag('config', id, {
            send_page_view: false,
            allow_google_signals: false,
            allow_ad_personalization_signals: false,
            cookie_prefix: 'nw',
            cookie_expires: lifetime / 1000,
            cookie_update: false,
            page_location: panel.dataset.pageUrl,
            page_title: panel.dataset.pageTitle,
            page_referrer: referrer
        });
        window.gtag('event', 'page_view');
        const script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(id);
        document.head.appendChild(script);
    }
    function stop() {
        window['ga-disable-' + id] = true;
        clearAnalyticsCookies();
    }
    function choose(value) {
        const wasActive = active;
        choice = value;
        try { localStorage.setItem(key, JSON.stringify({ value, at: Date.now() })); } catch (_) {}
        panel.hidden = true;
        if (value === 'granted') enable();
        else {
            stop();
            // Unload Google's runtime as well as disabling events on withdrawal.
            if (wasActive) { location.reload(); return; }
        }
        settings?.focus();
    }
    panel.querySelectorAll('[data-analytics-choice]').forEach(button => {
        button.addEventListener('click', () => choose(button.dataset.analyticsChoice));
    });
    if (settings) {
        settings.hidden = false;
        settings.addEventListener('click', () => {
            close.hidden = !choice;
            panel.hidden = false;
            panel.querySelector('button').focus();
        });
    }
    close.addEventListener('click', () => { panel.hidden = true; settings?.focus(); });
    window.addEventListener('newwave:enquiry-sent', () => {
        if (active && choice === 'granted') window.gtag('event', 'generate_lead', { send_to: id });
    });
    window.addEventListener('storage', event => {
        if (event.key !== key && event.key !== null) return;
        choice = readChoice();
        if (choice !== 'granted') {
            stop();
            if (active) location.reload();
            else panel.hidden = choice === 'denied';
        } else { panel.hidden = true; enable(); }
    });
    // Expired preferences also stop tracking in a tab left open for months.
    window.addEventListener('focus', () => {
        if (active && readChoice() !== 'granted') { stop(); location.reload(); }
    });
    if (choice === 'granted') enable();
    else { stop(); panel.hidden = choice === 'denied'; }
})();
