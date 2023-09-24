<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
            data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px"
            data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer">
                <div class="rd-navbar-aside">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-246x74.png" alt="" width="123" height="37"/><img class="brand-logo-light" src="images/logo-inverse-246x74.png" alt="" width="123" height="37"/></a>
                        </div>
                    </div>
                    <div class="rd-navbar-aside-right rd-navbar-collapse">
                        <ul class="rd-navbar-corporate-contacts">
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                                    {{-- <div class="unit-body">
                                        <p>09:00<span>am</span> — 05:00<span>pm</span></p>
                                    </div> --}}
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                    @php
                                        $contact = explode(',',$setting->contact) ;

                                    @endphp
                                    <div class="unit-body"><a class="link-phone" href="tel:{{ $contact[0] }}">{{ $contact[0] }}</a></div>
                                </div>
                            </li>
                        {{-- </ul><a class="button button-md button-ujarak button-default-outline" href="#">Get in touch</a> --}}
                    </div>
                </div>
            </div>
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <div class="rd-navbar-nav-wrap">
                        <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                            <li><a class="icon fa fa-facebook" href="#"></a></li>
                            <li><a class="icon fa fa-twitter" href="#"></a></li>
                            <li><a class="icon fa fa-google-plus" href="#"></a></li>
                            <li><a class="icon fa fa-instagram" href="#"></a></li>
                        </ul>
                        <!-- RD Navbar Nav-->
                        <ul class="rd-navbar-nav">
                            <li class="rd-nav-item {{ Route::is('home') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="rd-nav-item {{ Route::is('frontend.about_us') ? 'active' : '' }}"><a class="rd-nav-link " href="{{ route('frontend.about_us') }}">About Us</a>
                            </li>
                            <li class="rd-nav-item {{ Route::is('frontend.room') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('frontend.room') }}">Rooms</a>
                                <!-- RD Navbar Dropdown-->
                                {{-- <ul class="rd-menu rd-navbar-dropdown">
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="single-room.html">Single Room</a></li>
                                </ul> --}}
                            </li>
                            <li class="rd-nav-item {{ Route::is('frontend.gallery','frontend.video') ? 'active' : '' }}"><a class="rd-nav-link" >Gallery</a>
                                <!-- RD Navbar Dropdown-->
                                <ul class="rd-menu rd-navbar-dropdown">
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('frontend.gallery') }}">Image Gallery</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="{{ route('frontend.video') }}">Video Gallery</a></li>
                                    {{-- <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="masonry-gallery.html">Masonry Gallery</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="full-width-masonry-gallery.html">Full Width Masonry Gallery</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li class="rd-nav-item"><a class="rd-nav-link" href="classic-blog.html">Blog</a>
                                <!-- RD Navbar Dropdown-->
                                <ul class="rd-menu rd-navbar-dropdown">
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="classic-blog.html">Classic Blog</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-blog.html">Grid Blog</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-blog-2.html">Grid Blog 2</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-blog-3.html">Grid Blog 3</a></li>
                                    <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li> --}}
                            <li class="rd-nav-item {{ Route::is('frontend.contact_us') ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('frontend.contact_us') }}">Contact Us</a>
                                <li class="rd-nav-item"><a class="rd-nav-link {{ Route::is('frontend.terkks') ? 'active' : '' }}" href="{{ route('frontend.terkks') }}">Treks & Tours</a>
                                    <li class="rd-nav-item"><a class="rd-nav-link {{ Route::is('frontend.food') ? 'active' : '' }}" href="{{ route('frontend.food') }}">Food Gallery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
