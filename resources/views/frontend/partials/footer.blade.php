<footer class="footer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-12"><a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/newwavelogo.png') }}" alt="NewWave"></a></div>
            <div class="col-lg-3 col-md-12">
                <h5>Get in touch</h5>
                <p><a href="mailto:{{ $globalContactSettings->email ?? 'info@newwavemotorsport.com' }}" style="color: inherit; text-decoration: none;">{{ $globalContactSettings->email ?? 'info@newwavemotorsport.com' }}</a>
                    <br><a href="tel:{{ $globalContactSettings->phone ?? '+260XXXXXXXXX' }}" style="color: inherit; text-decoration: none;">{{ $globalContactSettings->phone ?? '+260 XXX XXX XXX' }}</a>
                </p>
            </div>
            <div class="col-lg-3 col-md-12">
                <h5>Location</h5>
                <p>{{ $globalContactSettings->address ?? 'Lusaka — Zambia' }}
                    <br>
                </p>
            </div>
            <div class="col-lg-3 col-md-12">
                <ul class="footer-social-link">
                    <li><a href="https://duruthemes.com/demo/html/gloom/" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://duruthemes.com/demo/html/gloom/" target="_blank"><i
                                class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a href="https://duruthemes.com/demo/html/gloom/" target="_blank"><i
                                class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="https://duruthemes.com/demo/html/gloom/" target="_blank"><i
                                class="fa-brands fa-tiktok"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <p class="mb-0 copyright">© 2026 NewWave Motorsport. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>