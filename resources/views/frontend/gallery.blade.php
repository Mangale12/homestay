@extends("frontend.layouts.app")
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Full-width gallery</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{ route('frontend.gallery') }}">All</a></li>
                @foreach ($categories as $category)
                <li><a href="{{ url('gallery') }} ? category={{ $category->slug }}">{{ $category->name }}</a></li>
                @endforeach

                <li class="active">Full-width gallery</li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>
<!-- Grid Gallery-->
<section class="section section-xl section-fluid bg-default text-center isotope-wrap">
    <div class="container-fluid isotope-wrap">
        <div class="isotope-filters isotope-filters-horizontal">
            <button class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha" data-custom-toggle="#isotope-3" data-custom-toggle-hide-on-blur="true" data-custom-toggle-disable-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>
            <ul class="isotope-filters-list" id="isotope-3">
                <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>
                @foreach ($categories as $category)
                <li><a href="{{ url('gallery') }} ? category={{ $category->slug }}" data-isotope-filter="Type 1" data-isotope-group="gallery">{{ $category->name }}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="row row-30 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group">
            @foreach($gallery as $key => $gallery)
            <div class="col-sm-6 col-lg-4 col-xxl-3 isotope-item" data-filter="Type 3">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-classic thumbnail-md">
                    <div class="thumbnail-classic-figure"><img src="{{ asset('public/uploads/featured_img/'.$gallery->image) }}" alt="" width="420" height="350" />
                    </div>
                    {{-- <div class="thumbnail-classic-caption">
                        <div class="thumbnail-classic-title-wrap"><a class="icon fl-bigmug-line-zoom60" href="images/fullwidth-gallery-1-1200x800-original.jpg" data-lightgallery="item"><img src="images/fullwidth-gallery-1-420x350.jpg" alt="" width="420" height="350"/></a>
                            <h5 class="thumbnail-classic-title"><a href="#">Affordable Room Rates</a></h5>
                        </div>
                        <p class="thumbnail-classic-text">We work hard on every project to deliver top-notch interior design concepts that satisfy your wishes.</p>
                    </div> --}}
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
