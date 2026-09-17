<?php

namespace App\Http\Controllers;

class PolicyController extends Controller
{
    public function show(string $policy)
    {
        $analyticsEnabled = is_string(config('analytics.measurement_id')) && preg_match('/^G-[A-Z0-9]+$/', config('analytics.measurement_id'));
        $analyticsNotice = $analyticsEnabled
            ? 'If you accept analytics, Google Analytics receives usage and device information to report visits, popular pages, approximate locations and successful enquiries. We send page paths without query strings, referrer origins and an enquiry-success event, not your name, email, phone or message. Advertising features are disabled. Google processes this information on its infrastructure, which may be outside Zambia. Use Cookie settings in the footer to accept, reject or withdraw consent. Withdrawal stops future tracking; it does not automatically erase reports already received by Google.'
            : 'Optional analytics is not currently enabled. No analytics requests are sent.';
        $policies = [
            'privacy' => ['Privacy policy', [
                'Who we are' => 'NewWave Motorsport is a photography and videography business based in Zambia. This notice covers enquiries sent through this website. Bookings and payments are arranged separately, outside this website.',
                'What we collect and why' => 'When you choose to contact us, we collect your name, email, subject and message, plus your phone number only if you provide it. We record when you consent and the notice version shown. We use these details to respond to your enquiry and discuss the services you request. The form does not subscribe you to marketing. Please do not send sensitive information or payment details.',
                'Your choice' => 'The enquiry form asks for your consent before it saves or emails your message. You can choose not to submit it. You may withdraw consent by contacting us; withdrawal does not undo processing that was lawful before withdrawal. We may retain information where a separate legal obligation requires it.',
                'Service providers and security' => 'Enquiries are stored in our website database and may be sent to our business email. Website hosting and email providers therefore process information needed to deliver these services. Access to the enquiry dashboard is restricted to authorised staff. Servers may keep technical logs, including IP addresses, to operate and protect the service. Do not assume that email is a confidential channel for sensitive information.',
                'Retention' => 'Enquiry information should be kept only for as long as needed to respond and handle related follow-up, or to meet applicable legal obligations. You can contact us to request deletion. Copies in email and backups must also be considered when a deletion request is handled.',
                'Your rights' => 'You can contact us to request access, correction or deletion of your information, or to raise an objection or withdraw consent, subject to applicable law. We may need proportionate information to verify a request. You may also contact the Zambia Data Protection Commission at dataprotection.gov.zm with a privacy concern.',
                'Optional analytics' => $analyticsNotice,
                'Cookies and third parties' => 'See our cookie policy for essential session and security cookies. Maps and videos are not automatically embedded. Following an external link takes you to a service governed by its own privacy notice.',
            ]],
            'terms' => ['Terms and conditions', [
                'Using this website' => 'This website presents NewWave Motorsport’s photography and videography work and allows you to send an enquiry. Use it lawfully and do not attempt to interfere with the service, access other people’s information or submit harmful material.',
                'Enquiries and bookings' => 'Submitting an enquiry does not reserve a date, confirm a booking or create a paid order. Availability, scope, prices, payment schedules, image usage and cancellation terms are agreed separately before a booking is confirmed. This website does not accept payments.',
                'Photographs and other content' => 'Photographs, video, text and branding may be protected by copyright or other rights belonging to their respective owners. Viewing work here does not grant permission to download, republish, sell or otherwise reuse it. Contact us for permission or to raise an ownership or publication concern.',
                'Accuracy and availability' => 'Portfolio examples illustrate previous work; the scope of any future assignment must be agreed with you. We aim to keep the website accurate but may correct or update its content. Please confirm important service details directly before relying on them.',
                'Your legal rights' => 'These website terms do not remove rights or remedies that cannot lawfully be excluded under applicable Zambian law. Separate service agreements govern bookings made outside this website.',
            ]],
            'cookies' => ['Cookie policy', [
                'Essential cookies' => 'The site uses a session cookie to maintain a session and an XSRF-TOKEN cookie to protect forms against forged requests. Blocking these may prevent sign-in and form submission. Their normal lifetime follows the configured session timeout, currently '.config('session.lifetime').' minutes.',
                'Staff sign-in' => 'If a staff member selects Remember me, a persistent authentication cookie is also used to recognise that sign-in on later visits. This is optional and is not an advertising cookie. Staff can sign out and clear browser cookies to remove it.',
                'Analytics and advertising' => $analyticsNotice,
                'Your saved preference' => 'When analytics is enabled, your accept or reject choice is stored in this browser for up to 180 days using local storage. This preference does not track you across websites. You can change it in Cookie settings in the footer or clear your browser storage. Without a saved choice, analytics stays off.',
                'Analytics cookies' => $analyticsEnabled ? 'Only after acceptance, Google Analytics uses first-party cookies with names beginning nw_ga to distinguish browsers and sessions. Their configured maximum lifetime is 180 days without renewal on each visit. Rejecting analytics removes these cookies from this site. These identifiers do not tell us your name. Google also receives network information when its service is contacted. See policies.google.com/privacy for Google?s privacy information.' : 'No analytics cookies are set while analytics is disabled.',
                'External services' => 'Maps and videos are not automatically embedded and fonts are served locally. External websites reached through links control their own cookies. You can manage or delete stored cookies using your browser settings.',
            ]],
            'refunds' => ['Refund and cancellation policy', [
                'No payments on this website' => 'This website only accepts enquiries. It does not take payment, charge a booking deposit or confirm a paid booking. There is no website checkout transaction to refund.',
                'Bookings arranged separately' => 'For services booked outside this website, ask for the applicable payment, cancellation, rescheduling and refund terms in writing before paying. This page does not impose a no-refund rule or replace terms agreed for an existing booking.',
                'Questions about a payment' => 'Contact NewWave using the details below about an existing booking or payment. Include a booking reference if you have one, but do not send card numbers or banking passwords. Applicable consumer rights remain unaffected.',
            ]],
        ];
        abort_unless(isset($policies[$policy]), 404);
        [$policyTitle, $sections] = $policies[$policy];
        return view('frontend.pages.policy', compact('policyTitle', 'sections'));
    }
}
