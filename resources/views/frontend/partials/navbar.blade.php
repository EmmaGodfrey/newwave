<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/newwavelogo.png') }}" class="logo-img" alt="NewWave Motorsport home"></a>
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" aria-label="Home" @if(request()->routeIs('home')) aria-current="page" @endif><span class="rolling-text">Home</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" aria-label="About" @if(request()->routeIs('about')) aria-current="page" @endif><span class="rolling-text">About</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}" aria-label="Services" @if(request()->routeIs('services')) aria-current="page" @endif><span class="rolling-text">Services</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolio') }}" aria-label="Portfolio" @if(request()->routeIs('portfolio*')) aria-current="page" @endif><span class="rolling-text">Portfolio</span></a></li>
                @if(\App\Models\Blog::published()->exists())
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}" aria-label="Blog" @if(request()->routeIs('blog*')) aria-current="page" @endif><span class="rolling-text">Blog</span></a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" aria-label="Contact" @if(request()->routeIs('contact')) aria-current="page" @endif><span class="rolling-text">Contact</span></a></li>
            </ul>
        </div>
    </div>
</nav>
