# Privacy, accessibility and SEO review

Update: Optional consent-gated GA4 integration has since been added; see
`ANALYTICS.md`. The no-analytics findings below describe the initial review.
Tracking remains disabled until a valid measurement ID is configured. Current
policy wording changes with that configuration, and a consent banner is included.

Prepared 17 September 2026. Changes are local and have not been deployed.
The business owner confirmed Zambia as the business location and that this site
collects enquiries only; bookings and payments happen outside the system.

## Implemented

- Privacy, terms, cookie and refund pages, linked from the footer. These are
  working drafts reflecting the enquiry-only workflow, not a legal certification.
- Required, unticked enquiry consent; server-side rejection without acceptance;
  timestamp and policy version recorded. Existing messages have null consent
  fields: do not treat them as newly consented. Phone is optional. No marketing
  permission is inferred, and no consent IP/user-agent fingerprint is collected.
- No automatic map embed. No analytics/ad tracker was found in frontend templates
  or the inspected browser requests. Syne and Urbanist are now served locally
  with their OFL licence files. Rich-text posts allow basic formatting and links;
  embedded scripts, images, frames, forms and tracking markup are not rendered.
  Existing stored article content is preserved.
- Essential session and CSRF cookies remain. Optional tracking is absent, so no
  misleading accept/reject tracking banner is shown. Adding optional trackers or
  embeds later requires a fresh consent assessment and prior opt-in controls.
- Unverified testimonials hidden globally by default; records are preserved.
  Enable `SITE_TESTIMONIALS_VERIFIED` only after reviewing every active testimonial
  and documenting authenticity and publication permission. Removed the unverified
  founding-year story and absolute delivery/quality claims from static copy.
- Explicit form labels, autocomplete, optional phone input, focus indicators,
  focusable success/error announcements, keyboard-operated FAQ disclosures,
  back-to-top button, skip link, named search/pagination buttons, one homepage H1,
  descriptive/decorative alt text, reduced motion and disabled carousel autoplay.
- Unique public titles/descriptions, canonical URLs without tracking parameters,
  self-canonicals on paginated blog pages, social previews, Organization/WebSite
  and published article JSON-LD. No invented reviews, ratings or street address
  are included in structured data.
- Sitemap contains main pages and published posts/active galleries/categories;
  drafts and scheduled posts are excluded. Search/archive filters and auth pages
  are noindex. robots.txt advertises the production sitemap.

## Owner confirmations needed before publishing policies

1. Legal operator name, public business address and monitored privacy email.
   Current default is the NewWave trading name; existing contact settings supply
   the email/address. Set `SITE_BUSINESS_NAME` and `SITE_PRIVACY_EMAIL` accurately.
2. Hosting, mail and backup provider names and physical storage countries. Do not
   infer a hosting country from the IP alone. Assess Zambia storage/transfer rules
   with the Data Protection Commission or Zambian counsel before deployment.
3. An actual enquiry retention schedule, including email, logs and backups; a
   person responsible for access/deletion requests; and an incident-response
   process. No automatic deletion or invented retention deadline was introduced.
4. Data-controller registration status and any applicable exemptions/conditions.
5. Image ownership/licences and appropriate subject/event permissions, especially
   for identifiable people and children. `IMAGE_RIGHTS_REVIEW.csv` lists 25 static
   template image references; it is not proof of rights. Dynamic gallery, blog and
   team uploads need a separate owner review. The repository does not establish
   that those images are licensed. Verify the original commercial template licence
   and bundled assets as well. Font licences are included for the new local fonts.
6. Offline booking contracts: confirm cancellation/refund terms before taking
   payment elsewhere. The website does not invent a no-refund clause or waive
   statutory rights.

## Zambia sources and assessment

- [Data Protection Act, 2021 — National Assembly](https://www.parliament.gov.zm/node/8853):
  governs personal-data collection, processing and controller responsibilities.
- [DPC quick guide](https://www.dataprotection.gov.zm/wp-content/uploads/2025/03/DATA-PROTECTION-QUICK-GUIDE_2.pdf):
  covers transparency, data-subject rights and storage/transfer conditions. Hosting
  and registration are operational checks; adding policy pages does not satisfy
  those requirements by itself.
- [DPC resources and registration guidance](https://www.dataprotection.gov.zm/resources/).
- [Electronic Communications and Transactions Act, 2021](https://www.parliament.gov.zm/sites/default/files/documents/acts/Act%20No.%204%20of%202021%2C%20The%20Electronic%20Communications%20and%20Transactions_0.pdf):
  Part VIII addresses consumer protection and supplier information for electronic
  transactions. Have counsel assess the enquiry site together with offline sales.
- [Copyright and Performance Rights Act](https://www.parliament.gov.zm/sites/default/files/documents/acts/Copyright%20and%20Performance%20Rights%20Act.pdf)
  and [2010 amendment](https://www.parliament.gov.zm/node/3370): image permission
  requires evidence from owners, not an assumption based on a file being present.
- [WCAG 2.2 reference](https://www.w3.org/WAI/WCAG22/quickref/) informed accessibility
  changes. This is not a complete conformance audit or legal accessibility opinion.
- [Google SEO starter guide](https://developers.google.com/search/docs/fundamentals/seo-starter-guide)
  informed metadata and crawlability work. Ranking and indexing are not guaranteed.

## Validation and release follow-up

26 tests / 283 assertions passed at review, including consent rejection, recorded
consent, optional phone, policy routes, metadata, sitemap XML and publication
filtering, and sanitised article rendering. Blade compilation, route caching and
JavaScript syntax checks pass. Browser checks confirmed mobile contact submission
using Space/Tab/Enter, focused success feedback, no horizontal overflow, no missing
image alt attributes on contact and no external contact-page requests.

Palette contrast calculations: body 10.65:1, muted text 8.36:1, primary button
16.76:1, input border 3.52:1. Background photographs and future uploaded content
still need individual contrast/alt-text review; this is not a site-wide WCAG claim.

Before release: apply the consent migration, use HTTPS/secure session cookies,
disable production debug output, verify the real mail transport and delivery,
complete the owner confirmations above, and review policy wording. Keep runtime
credentials out of the repository. Point `SITE_URL` and `APP_URL` to the canonical
HTTPS domain and update robots.txt if that domain changes. Redirect alternate
hosts/protocols at Nginx. Verify Search Console ownership and submit `/sitemap.xml`
after deployment; no verification token or external account access was supplied.
Check live Core Web Vitals and optimise large original photos into responsive
derivatives once image rights and delivery requirements are confirmed.
