<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/logo-light.png') }}" class="logo-img" alt=""></a>
            <!-- <div class="logo"><h2>Gl<span>oo</span>m</h2></div> -->
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> 
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><span class="rolling-text">Home</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}"><span class="rolling-text">About</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}"><span class="rolling-text">Services</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('portfolio') }}"><span class="rolling-text">Portfolio</span></a></li>
                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <span class="rolling-text">Pages</span> <i class="ti-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('pricing') }}" class="dropdown-item"><span>Pricing</span></a></li>
                        <li><a href="{{ route('team') }}" class="dropdown-item"><span>Team</span></a></li>
                        <li><a href="{{ route('testimonials') }}" class="dropdown-item"><span>Testimonials</span></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}"><span class="rolling-text">Blog</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"><span class="rolling-text">Contact</span></a></li>
            </ul>
        </div>
    </div>
</nav>