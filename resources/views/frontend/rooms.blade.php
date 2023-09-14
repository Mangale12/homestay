@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Rooms</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active">Rooms</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Section Pricing-->
<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-30 row-lg-50">
            @foreach($rooms as $key => $room)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <!-- Services Modern-->
                <article class="services-modern"><a class="services-modern-figure" href="{{ route('frontend.room_details',$room->id) }}">
                    <img src="{{ asset('public/uploads/room/'.$room->image) }}" alt="" width="270" height="415"/></a>
                    <div class="services-modern-content">
                        <h5 class="services-modern-title"><a href="{{ route('frontend.room_details',$room->id) }}">{{ $room->type }}</a></h5>
                        <div class="services-modern-price-wrap"><span class="services-modern-price heading-5">{{ $room->price }}</span><span class="services-modern-price-divider heading-5">/</span><span class="services-modern-date heading-6">night</span></div>
                    </div>
                </article>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection
