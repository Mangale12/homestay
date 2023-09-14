@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">About Us</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Why choose us-->
{{-- <section class="section section-sm section-first bg-default text-left">
    <div class="container">
        <div class="row row-50 justify-content-center align-items-xl-center">
            <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{ asset('public/images/about-1-519x564.jpg') }}" alt="" width="519" height="564" />
            </div>
            <div class="col-md-10 col-lg-7 col-xl-6">
                <h1 class="text-spacing-25 font-weight-normal title-opacity-9">Who We Are</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                <ul class="row-16 list-0 list-marked list-marked-md list-marked-primary list-custom-3">
                    <li>Accommodation</li>
                    <li>Conference Center</li>
                    <li>Restaurant</li>
                    <li>Room Service</li>
                    <li>Spa Salon</li>
                    <li>Fitness Center</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget lacus aliquet, tempor justo sit amet, egestas dolor. Fusce viverra, nisl tristique interdum rutrum, risus massa aliquet sapien, a facilisis neque lorem et lectus.
                    Vestibulum at orci rhoncus, vehicula purus nec.</p>
                <div class="image-wrap text-right"><img src="images/sign-1-183x93.png" alt="" width="183" height="93" />
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Why choose us?-->
<section class="section section-xl bg-gray-4">
    <div class="container">
        <div class="heading-panel">
            <div class="heading-panel-left">
                <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft">Nepal Bed & BreakFast</span></h1>
                <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown" data-wow-delay=".2s">What We offer</span></h4>
            </div>
            <div class="heading-panel-decor wow fadeIn"></div>
        </div>
        <div class="row row-30">
            @foreach ($services as $service)
            <div class="col-sm-6 col-lg-4">
                <article class="box-icon-classic box-icon-classic-3 wow fadeInDown" data-wow-delay=".2s">
                    <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                        <div class="unit-left">
                            <div class="box-icon-classic-icon linearicons-apartment"></div>
                        </div>
                        <div class="unit-body">
                            <h5 class="box-icon-classic-title"><a href="#">{{ $service->title }}</a></h5>
                            <p class="box-icon-classic-text">{{ $service->title }}</p>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach


        </div>
    </div>
</section>

<!-- What people Say-->
<section class="section section-lg section-last bg-default">
    <div class="container">
        <h3>What people Say</h3>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
            <!-- Quote Lisa-->
            @foreach($testimonials as $key => $testimonial)
            <article class="quote-lisa">
                <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="{{ asset('public/uploads/testimonial/'.$testimonial->profile) }}" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                        <p class="q">{!! $testimonial->message !!}</p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">{{ $testimonial->name }}</a></h5>
                    <p class="quote-lisa-status">{{ $testimonial->position }}</p>
                </div>
            </article>
            @endforeach

            <!-- Quote Lisa-->
        </div>
    </div>
</section>

<!-- Counter Classic-->
{{-- <section class="section bg-default">
    <div class="parallax-container" data-parallax-img="images/bg-counter-2.jpg">
        <div class="parallax-content section-xl context-dark bg-overlay-26">
            <div class="container">
                <div class="row row-50 justify-content-center border-classic">
                    <div class="col-sm-6 col-md-5 col-lg-3">
                        <div class="counter-classic">
                            <div class="counter-classic-number"><span class="counter">25</span>
                            </div>
                            <h5 class="counter-classic-title">Hospitality awards</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3">
                        <div class="counter-classic">
                            <div class="counter-classic-number"><span class="counter">100</span>
                            </div>
                            <h5 class="counter-classic-title">Team Members</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3">
                        <div class="counter-classic">
                            <div class="counter-classic-number"><span class="counter">20</span><span class="symbol">k</span>
                            </div>
                            <h5 class="counter-classic-title">Satisfied Clients</h5>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3">
                        <div class="counter-classic">
                            <div class="counter-classic-number"><span class="counter">12</span>
                            </div>
                            <h5 class="counter-classic-title">National partners</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Our clients-->
{{-- <section class="section section-lg bg-default">
    <div class="container">
        <h3>Our clients</h3>
        <div class="row row-30 row-sm">
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInDown" data-wow-delay=".3s"><a class="clients-classic" href="#"><img src="images/clients-1-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInDown" data-wow-delay=".2s"><a class="clients-classic" href="#"><img src="images/clients-2-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInDown" data-wow-delay=".1s"><a class="clients-classic" href="#"><img src="images/clients-3-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInDown"><a class="clients-classic" href="#"><img src="images/clients-4-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp"><a class="clients-classic" href="#"><img src="images/clients-5-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp" data-wow-delay=".1s"><a class="clients-classic" href="#"><img src="images/clients-6-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp" data-wow-delay=".2s"><a class="clients-classic" href="#"><img src="images/clients-7-270x145.png" alt="" width="270" height="145"/></a></div>
            <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp" data-wow-delay=".3s"><a class="clients-classic" href="#"><img src="images/clients-8-270x145.png" alt="" width="270" height="145"/></a></div>
        </div>
    </div>
</section> --}}
@endsection
