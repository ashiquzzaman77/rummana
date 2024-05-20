<header class="main-header">
    <!-- header-top -->
    @php
        $site = App\Models\SiteSetting::find(1);
    @endphp
    <div class="header-top d-none d-lg-block">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>{{ $site->address }}</li>
                    <li><i class="far fa-clock"></i>{{ $site->time }}</li>
                    <li><i class="far fa-phone"></i><a href="#">{{ $site->phone }}</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{ $site->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>

                    <li><a href="{{ $site->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>

                    <li><a href="{{ $site->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>

                    <li><a href="{{ $site->instagrm }}" target="_blank"><i class="fab fa-instagram"></i></a></li>

                    <li><a href="{{ $site->linkdin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>

                </ul>

                @auth
                <div class="sign-box">
                    <a href="{{route('user.logout')}}"><i class="fas fa-user"></i>Logout</a>
                </div>
                @else
                <div class="sign-box">
                    <a href="{{route('login')}}"><i class="fas fa-user"></i>Sign In</a>
                </div>
                @endauth

            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                {{-- <div class="logo-box">
                    <figure class="logo"><a href="{{ route('index') }}"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                    </figure>
                </div> --}}

                <div class="logo-box-color">
                    <h1>Rumana</h1>
                </div>

                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">

                                <li class="{{ Route::is('index') ? 'current' : '' }}"><a
                                        href="{{ route('index') }}"><span>Home</span></a>
                                </li>

                                <li class=""><a href="index.html"><span>About</span></a>
                                </li>

                                <li class="{{ Route::is('frontend.all.project') ? 'current' : '' }}"><a
                                        href="{{ route('frontend.all.project') }}"><span>Project</span></a>
                                </li>

                                <li class="{{ Route::is('frontend.all.blog') ? 'current' : '' }}"><a href="{{ route('frontend.all.blog') }}"><span>Blog</span></a>
                                </li>

                                <li class="{{ Route::is('all.team') ? 'current' : '' }}"><a
                                        href="{{ route('all.team') }}"><span>Team</span></a>
                                </li>
                                <li class="{{ Route::is('contact') ? 'current' : '' }}"><a
                                        href="{{ route('contact') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="#" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                {{-- <div class="logo-box">
                    <figure class="logo"><a href="index.html"><img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt=""></a>
                    </figure>
                </div> --}}
                <div class="logo-box-color">
                    <h1>Rumana</h1>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="#" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
