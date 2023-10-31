@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<style>
    #social-links ul li{
        display: inline-block;

    }
    #social-links ul li a{
        padding: 20px;
        margin: 2px;
        font-size: 30px;
        color: rgb(46, 41, 114);
        background-color: #ccc;
    }
</style>
       <!-- Breadcrumbs -->
       <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">{{ $room->type }}</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="rooms.html">Rooms</a></li>
                    <li class="active">{{ $room->type }}</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
        </div>
    </section>
    <!-- Single Project-->
    <section class="section section-sm section-first bg-default">
        <div class="container">
            <div class="row row-50 justify-content-center align-items-xl-center">
                <div class="col-md-10 col-lg-6 col-xl-7">
                    <div class="offset-right-xl-15">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel owl-dots-white" data-items="1" data-dots="true" data-autoplay="true" data-animation-in="fadeIn" data-animation-out="fadeOut">
                            @foreach ($room->image as $image)
                            <img src="{{ asset('public/uploads/room/'.$image->image) }}" alt="" width="655" height="496" />
                            @endforeach
                            {{-- <img src="{{ asset('public/uploads/room/'.$room->image) }}" alt="" width="655" height="496" />
                            <img src="{{ asset('public/uploads/room/'.$room->image) }}" alt="" width="655" height="496"/> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="single-project">

                        <h4>{{ $room->type  }}</h4>
                        <p class="text-gray-500">{!! $room->description !!}</p>
                        <div class="divider divider-30"></div>
                        {{-- <ul class="list list-description d-inline-block d-md-block">
                            <li><span>Services:</span><span>24h room service and express laundry service</span></li>
                            <li><span>Equipment:</span><span>Air conditioning, high speed Wi-Fi, thermostat</span></li>
                            <li><span>Other:</span><span>Flat-screen TV, large safe, minibar, city view</span></li>
                            <li><span>Room Rate:</span><span>from $380/night</span></li>
                        </ul> --}}
                        <div class="divider divider-30"></div>
                        <div class="group-md group-middle justify-content-sm-start"><a href="{{ route('frontend.book') }}" class="btn btn-primary">Book Now</a> </span>
                            {{-- <div>
                                <ul class="list-inline list-inline-sm social-list">
                                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {!! $shareButtons !!}
        </div>
    </section>

    <!-- Project Links-->
    <section class="section section-sm section-last bg-default">
        <div class="container">
            <div class="project-navigation">
                <div class="row row-30">
                    <div class="col-sm-6">
                        <div class="project-minimal">
                            <div class="unit unit-spacing-lg align-items-center flex-column flex-lg-row text-lg-left">
                                <div class="unit-left"><a class="project-minimal-figure" href="#"><img src="images/room-minimal-1-168x139.jpg" alt="" width="168" height="139"/></a></div>
                                <div class="unit-body">
                                    <p class="project-minimal-text">from $530/night</p>
                                    <div class="project-minimal-title"><a href="#">Family Room</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="project-minimal">
                            <div class="unit unit-spacing-lg align-items-center flex-column flex-lg-row-reverse text-lg-right">
                                <div class="unit-left"><a class="project-minimal-figure" href="#"><img src="images/room-minimal-2-168x139.jpg" alt="" width="168" height="139"/></a></div>
                                <div class="unit-body">
                                    <p class="project-minimal-text">from $250/night</p>
                                    <div class="project-minimal-title"><a href="#">Twin Room</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a class="project-navigation-arrow-prev" href="#"></a><a class="project-navigation-arrow-next" href="#"></a>
            </div>
        </div>
    </section>
@endsection
