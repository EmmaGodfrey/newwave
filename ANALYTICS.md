# Google Analytics setup

Standard GA4 is free. Reports are available in Google Analytics, not embedded in
the Laravel admin dashboard. Self-hosted Matomo is free software but needs server
capacity, updates and backups. GA4 was selected to minimise ongoing maintenance.

1. Visit https://analytics.google.com and choose Start measuring (or Admin > Create).
2. Create a NewWave account/property, using Zambia's timezone and ZMW currency.
3. Add a Web data stream for https://newwavemotorsport.com.
4. Turn Enhanced measurement OFF. The site explicitly sends page views and
   successful enquiry events; automatic form/search/outbound-link tracking is not
   needed and can collect more data than intended. Keep Google signals, user-data
   collection, advertising personalisation and linked advertising tags disabled.
5. Copy the Measurement ID starting `G-` from Admin > Data streams > the web stream.
6. Set `GA4_MEASUREMENT_ID=G-...` in the deployment environment and refresh Laravel
   configuration (`php artisan config:clear`, then `php artisan config:cache`).
   Do not install a separate Google tag or Tag Manager snippet alongside this one.
7. Review event-data retention in GA4 Admin and choose a period appropriate to the
   business. The site limits analytics cookies to 180 days; GA report retention
   is a separate Google account setting and is not controlled by that cookie limit.
8. After deployment, visit while signed out, accept analytics and check Realtime.
   Configure `generate_lead` as a key event to count successful enquiry submissions.
   Confirm rejecting consent produces no Google requests. Verify Google account
   settings and report delivery with the actual ID before declaring analytics live.

The banner appears only with a valid configured ID, on public pages for signed-out
visitors. The owner supplied `G-TYP9NMHHTC`; it is configured in the local environment and `.env.example`. Set the same value in the production environment during deployment. Auth/admin screens and visits
while signed in are excluded. The public measurement ID is not an account password.

## Consent and data

The Google script is not loaded before acceptance. Rejection sends no consent or
analytics ping to Google. Accept and Reject have equal visual prominence, and
Cookie settings in the footer lets visitors change their choice. Preferences are
stored locally for 180 days. Withdrawal disables events, clears this integration's
`nw_ga*` cookies, and reloads to unload Google's script. Cross-tab withdrawal is
handled too. Already transmitted reports are not erased by withdrawal.

The code explicitly sends page views and `generate_lead` after a successful form
response. It sends a route name as page title, a page URL without query/fragment,
and only the referrer's origin. Contact fields are never passed to analytics and
there is no User-ID linkage. Ads consent stays denied. GA still receives browser,
device and network information after consent, with processing on Google's systems.
Reports describe browsers/visits, not a named list of people who visited. Rejected
consent, browser blockers and deleted cookies affect counts; historical visits
before installation cannot be recovered through this integration.

The owner reports having a data certificate. Its scope was not independently
verified. Privacy/cookie pages now describe optional Google analytics when enabled;
the earlier hosting/retention/business-identity confirmations remain operational
items, not reasons to add a second consent flow.

## Validation

28 PHP tests / 296 assertions pass. Six JavaScript tests cover default rejection,
acceptance, duplicate-load prevention, withdrawal, expiration, cross-tab changes,
blocked storage and limited event payloads. Mobile browser checks confirm the
banner fits at 390px, zero Google requests before consent, persistent rejection
after reload, and an available Cookie settings control. Acceptance tests use a
mocked Google runtime: no test visits were transmitted to a real GA property.

Sources: [GA4 pricing](https://marketingplatform.google.com/about/analytics/),
[Matomo self-hosting](https://matomo.org/download/),
[Google setup guide](https://support.google.com/analytics/answer/14183469?hl=en),
[Google basic consent mode](https://developers.google.com/tag-platform/security/concepts/consent-mode).
