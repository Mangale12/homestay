@extends("frontend.layouts.app")
@section('content')
@include('frontend.includes.nav')
<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title">Our Gallery</h2>
            <ul class="breadcrumbs-custom-path">
                <li><a>Home</a></li>

                <li><a href="">Gallery</a></li>


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
                <li class="category-all"><a class="{{ request('category') ? '' : 'active' }}" href="{{ route('frontend.gallery') }}" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>
                @foreach ($categories as $category)
                <li class="category" data-id="{{ $category->slug }}"><a class="{{ request('category') == $category->slug ? 'active' : '' }}" href="{{ url('gallery') }} ? category={{ $category->slug }}" data-isotope-filter="Type 1" data-isotope-group="gallery">{{ $category->name }}</a></li>
                @endforeach

            </ul>
        </div>
        <div class="row row-30 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group">
            @foreach($galleries as $key => $gallery)
            <div class="col-sm-6 col-lg-4 col-xxl-3 isotope-item" data-filter="Type 3">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-classic thumbnail-md">
                    <div class="thumbnail-classic-figure"><img src="{{ asset('public/uploads/featured_img/'.$gallery->image) }}" alt="" width="420" height="350" />
                    </div>
                    <div class="thumbnail-classic-caption">
                        <div class="thumbnail-classic-title-wrap">
                            <a class=" " href="{{ asset('public/uploads/featured_img/'.$gallery->image) }}" data-lightgallery="item">
                                <img src="{{ asset('public/uploads/featured_img/'.$gallery->image) }}" alt="" width="420" height="350"/>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach

        </div>
        <div class="button-wrap">
            {{ $galleries->links() }}
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $(".category").click(function(){
            location.href = "{{ url('gallery') }}?category="+$(this).data('id');
        });
        $('.category-all').click(function(){
            location.href = "{{ route('frontend.gallery') }}";
        })
    });
</script>
@endsection
