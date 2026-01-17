<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Include CSS and meta tags --}}
    @include('frontend.layouts.css')
</head>

<body>
    {{-- Preloader --}}
    @include('frontend.partials.preloader')
    
    {{-- Progress scroll to top --}}
    @include('frontend.partials.scrolltotop')
    
    {{-- Other common elements --}}
    @include('frontend.partials.other')
    
    {{-- Navigation --}}
    @include('frontend.partials.navbar')
    
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>
    
    {{-- Footer --}}
    @include('frontend.partials.footer')
    
    {{-- JavaScript files --}}
    @include('frontend.layouts.js')
    
    {{-- Additional scripts section --}}
    @stack('scripts')
</body>

</html>
