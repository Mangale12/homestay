@extends("frontend.layouts.app")
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Food gallery</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                {{-- <li><a href="#">Gallery</a></li> --}}
                <li class="active">Food gallery</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Grid Gallery-->
<section class="section section-xl bg-default text-center isotope-wrap">
    <div class="container isotope-wrap">
        <div class="isotope-filters isotope-filters-horizontal">
            <button class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha" data-custom-toggle="#isotope-1" data-custom-toggle-hide-on-blur="true" data-custom-toggle-disable-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>
            <ul class="isotope-filters-list" id="isotope-1">
                <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>
                <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">Hotel</a></li>
                <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">Amenities</a></li>
                <li><a href="#" data-isotope-filter="Type 3" data-isotope-group="gallery">Rooms</a></li>
            </ul>
        </div>
        <div class="row row-50 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group">
            @foreach ($food as $food)
            <div class="col-md-6 col-lg-4 isotope-item" data-filter="Type 2">
                <!-- Thumbnail Modern-->
                <article class="thumbnail thumbnail-modern thumbnail-sm">
                    <a class="thumbnail-modern-figure" href="{{ asset('public/uploads/food/'.$food->image) }}" data-lightgallery="item">
                        <img src="{{ asset('public/uploads/food/'.$food->image) }}" alt="" width="370" height="303"/></a>
                    <div class="thumbnail-modern-caption">
                        <h5 class="thumbnail-modern-title"><a href="#">{{ $food->name }}</a></h5>
                        {{-- <p class="thumbnail-modern-subtitle">Amenities</p> --}}
                    </div>
                </article>
            </div>
            @endforeach


        </div>
        <div class="button-wrap">
            <button class="button button-md button-default-outline button-wapasha">Load More</button>
        </div>
    </div>
</section>

@endsection
