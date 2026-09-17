<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-30">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/newwavelogo.png') }}" alt="NewWave Motorsport"></a>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <h5>Get in touch</h5>
                <p><a href="mailto:{{ $globalContactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $globalContactSettings->email ?? 'info@newwavemotorsport.com' }}</a></p>
                @if(filled($globalContactSettings?->phone) && !str_contains(strtolower($globalContactSettings->phone), 'x'))
                    <p><a href="tel:{{ preg_replace('/[^+0-9]/', '', $globalContactSettings->phone) }}">{{ $globalContactSettings->phone }}</a></p>
                @endif
                @if(filled($globalContactSettings?->address))
                    <p>{{ $globalContactSettings->address }}</p>
                @endif
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <h5>Explore</h5>
                <button type="button" id="analytics-settings" class="analytics-settings" hidden>Cookie settings</button>
                <p><a href="{{ route('privacy') }}">Privacy policy</a> &middot; <a href="{{ route('terms') }}">Terms</a></p>
                <p><a href="{{ route('cookies') }}">Cookie policy</a> &middot; <a href="{{ route('refunds') }}">Refund policy</a></p>
                <p><a href="{{ route('portfolio') }}">Portfolio</a> &middot; <a href="{{ route('contact') }}">Contact</a></p>
                @if(\App\Models\Faq::active()->exists())
                    <p><a href="{{ route('faq') }}">FAQs</a></p>
                @endif
                <p><a href="{{ auth()->user()?->is_admin ? route('admin.dashboard') : route('login') }}">{{ auth()->user()?->is_admin ? 'Admin dashboard' : 'Admin login' }}</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mb-0 copyright">&copy; {{ date('Y') }} NewWave Motorsport. All rights reserved.</p>
            <p class="developer-credit">Developed by <strong>EGlabs</strong></p>
        </div>
    </div>
</footer>
