<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{url('index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/frontend/images/newwavelogo.png') }}" alt="NewWave"
                            height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/frontend/images/newwavelogo.png') }}" alt="NewWave"
                            height="40">
                    </span>
                </a>

                <a href="{{url('index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/frontend/images/newwavelogo.png') }}" alt="NewWave"
                            height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/frontend/images/newwavelogo.png') }}" alt="NewWave"
                            height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-search"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="@lang('translation.Search')..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="Header Avatar">
                    <span
                        class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{Str::ucfirst(Auth::user()->name)}}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                            class="align-middle">@lang('translation.View_Profile')</span></a>
                    <a class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span
                            class="align-middle">@lang('translation.Sign_out')</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="topnav">

            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="uil-home-alt me-2"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-content" role="button">
                                <i class="uil-edit-alt me-2"></i> Content <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-content">
                                <a href="{{ route('admin.team-members.index') }}" class="dropdown-item"><i
                                        class="uil-users-alt me-2"></i>Team Members</a>
                                <a href="{{ route('admin.testimonials.index') }}" class="dropdown-item"><i
                                        class="uil-chat-bubble-user me-2"></i>Testimonials</a>
                                <a href="{{ route('admin.service-pricing.index') }}" class="dropdown-item"><i
                                        class="uil-dollar-alt me-2"></i>Service Pricing</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-blog" role="button">
                                <i class="uil-postcard me-2"></i> Blog <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-blog">
                                <a href="{{ route('admin.blog-categories.index') }}" class="dropdown-item">
                                    <i class="uil-folder me-2"></i>Categories
                                </a>
                                <a href="{{ route('admin.blogs.index') }}" class="dropdown-item">
                                    <i class="uil-document-layout-left me-2"></i>Blog Posts
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('blog') }}" target="_blank" class="dropdown-item">
                                    <i class="uil-external-link-alt me-2"></i>View Blog Site
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-portfolio" role="button">
                                <i class="uil-image me-2"></i> Portfolio <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-portfolio">
                                <a href="{{ route('admin.portfolio.categories.index') }}" class="dropdown-item">
                                    <i class="uil-folder me-2"></i>Categories
                                </a>
                                <a href="{{ route('admin.portfolio.events.index') }}" class="dropdown-item">
                                    <i class="uil-calendar-alt me-2"></i>Events
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('portfolio') }}" target="_blank" class="dropdown-item">
                                    <i class="uil-external-link-alt me-2"></i>View Portfolio Site
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-contact" role="button">
                                <i class="uil-envelope me-2"></i> Contact <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                <a href="{{ route('admin.contact.settings.edit') }}" class="dropdown-item">
                                    <i class="uil-setting me-2"></i>Contact Settings
                                </a>
                                <a href="{{ route('admin.contact.messages.index') }}" class="dropdown-item">
                                    <i class="uil-envelope-open me-2"></i>Messages
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.faqs.index') }}">
                                <i class="uil-question-circle me-2"></i> FAQs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <i class="uil-users-alt me-2"></i> Users
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-settings" role="button">
                                <i class="uil-setting me-2"></i> Settings <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-settings">
                                <a href="#" class="dropdown-item"><i class="uil-info-circle me-2"></i>Site
                                    Information</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>