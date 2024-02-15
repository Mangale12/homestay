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
                <li class="category-all"><a class="{{ request('category') ? '' : 'active' }}" href="{{ route('frontend.food') }}" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>
                @foreach ($categories as $category)
                <li class="category" data-id="{{ $category->slug }}"><a class="{{ request('category')==$category->slug ? 'active' : '' }}" href="{{ url('food') }} ? category={{ $category->slug }}" data-isotope-filter="Type 1" data-isotope-group="gallery">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="row row-50 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group">
            @foreach ($foods as $food)
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
            {{ $foods->links() }}
        </div>

    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $(".category").click(function(){
            location.href = "{{ url('food') }}?category="+$(this).data('id');
        });
        $('.category-all').click(function(){
            location.href = "{{ route('frontend.food') }}";
        })
    });
</script>
@endsection
