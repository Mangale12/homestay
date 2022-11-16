@extends('frontend.layouts.app')

@section('content')
<!--AD SECTION-->
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','','४','५','६','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
?>
@if(json_decode($partner->after_header1)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header1)->url}}">
                @if (!empty($partner->after_header1))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header1)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header1)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@if(json_decode($partner->after_header2)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header2)->url}}">
                @if (!empty($partner->after_header2))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header2)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header2)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@if(json_decode($partner->after_header3)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header3)->url}}">
                @if (!empty($partner->after_header3))
                    @if(file_exists('uploads/partners/after_header/'.json_decode($partner->after_header3)->img))
                        <img src="{{asset('uploads/partners/after_header/'.json_decode($partner->after_header3)->img)}}" class="img-fluid">
                    @endif
                @endif
            </a>
        </div>
    </div>
</section>
@endif
@foreach ($headline_news as $key => $news)
    <!-- MAIN HEADING -->
    @php
        $user_detail=App\Models\User::where('name',$news->author)->first();
    @endphp
    <section class="main-new-first">
        <div class="container-fluid">
            <div class="main-news-first-start">
                <h2><a href="{{route('single_news',$news->slug)}}">{{$news->title}}
                    </a>
                </h2>
                <div class="author-details d-flex align-items-center">
                    <div class="author d-flex align-items-center mr-3">
                        <div class="author-image">
                            @if ($user_detail->profile_image!=null)
                                <img src="{{asset('admin/image/'.$user_detail->profile_image)}}" alt="Author" class="img-fluid">
                            @else
                                <img src="{{asset('frontend/assets/images/person.jpg')}}" alt="Author" class="img-fluid">
                            @endif
                        </div>
                        <p>{{$news->author}}</p>
                    </div>
                    <div class="author-date d-flex align-items-center mr-3">
                        <i class="far fa-clock f-20 mr-2"></i>
                        <p>
                            @if($news->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($news->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मनेट अगाडिि
                            @elseif($news->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($news->created_at->diffInHours(\Carbon\Carbon::now())) }} न्टा अाडि
                            @else
                            {{ ent_to_nepali_num_convert($news->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन गाडि
                            @endif
                        </p>
                    </div>
                    
                    {{-- <div class="comment d-flex align-items-center">
                        <i class="far fa-comment-alt f-20 mr-2"></i>
                        <p>१११</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @php
        
        $last_key = $headline_no-1;
    @endphp
    {{-- @if($key==$last_key)  --}}
    
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                <a href="{{route('single_news',$news->slug)}}">
                    @if (!empty($news->headline_image))
                        @if(file_exists('uploads/headline_img/'.$news->headline_image))
                            <img src="{{asset('uploads/headline_img/'.$news->headline_image)}}" class="img-fluid">
                        @endif
                    @endif
                </a>
            </div>
        </div>
    </section>
    {{-- @endif --}}

@endforeach


@foreach ($cat_sec as $key => $item)
@if ($item->layout=='layout1')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(6)->get();
    @endphp
    <!--NEWS-->
    @if (!blank($posts))
        
    
<section class="news">
    <div class="container-fluid">
        <div class="news-short">
            <div class="heading">
                <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                <span class="view-all">
                    <a href="{{route('news_category',$category->slug)}}">सब</a>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        {{-- @foreach ($posts as $key => $post) --}}
                            
                        {{-- @if ($key==0) --}}
                        <div class="col-lg-8 col-md-12">
                            <div class="news-short-left">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="news-short-inner-left">
                                            <a href="{{route('single_news',$posts[0]->slug)}}">
                                                <div class="news-short-inner-image">
                                                    @if (!empty($posts[0]->featured_img))
                                                        @if(file_exists('uploads/featured_img/'.$posts[0]->featured_img))
                                                            <img src="{{asset('uploads/featured_img/'.$posts[0]->featured_img)}}" class="img-fluid">
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                        @endif
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                    @endif
                                                </div>
                                                <h4>{{$posts[0]->title}}</h4>
                                                <p class="line-clamp-4">
                                                    @if ($posts[0]->excerpt!=null)
                                                        {{$posts[0]->excerpt}}
                                                    @else
                                                        {!! Str::words($posts[0]->description , 53, ' ...') !!}
                                                    @endif
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}
                        {{-- @endforeach --}}

                        <div class="col-lg-4 col-md-12">
                            

                            <div class="news-short-inner-right">
                              
                                <div class="short-news-div">
                                    @foreach ($posts as $key => $post)
                        				@if ($key!=0 )
                                    <div class="short-news">
                                        <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                            <div class="short-news-image">
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                @endif
                                            </div>
                                            <div class="short-news-desc">
                                                <h6>{{$post->title}}</h6>
                                                <div class="author-date d-flex align-items-center">
                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                    <p>
                                                        @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिने गाड
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घ्ा अगाडि
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अाि
                            @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                  @endif

                        @endforeach
                                </div>
                            </div>
                        
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="partner-side">
                        
                        {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                        @if(json_decode($item->section1)->img != null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section1))
                            <a href="{{json_decode($item->section1)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                      	@endif
                        @if(json_decode($item->section2)->img!=null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section2))
                            <a href="{{json_decode($item->section2)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                        @endif
                        @if(json_decode($item->section3)->img!=null)
                        <div class="partner-image-single mb-3">
                            @if (!empty($item->section3))
                            <a href="{{json_decode($item->section3)->url}}">
                                    @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                        <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                
                            </a>
                            @endif
                        </div>
                        @endif
                        {{-- @endforeach --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--AD SECTION-->
@if(json_decode($item->category_partner)->img != null)
<section class="money-image-section">
    <div class="container-fluid">
        <div class="money-image">
            @if (!empty($item->category_partner))
            <a href="{{json_decode($item->category_partner)->url}}">
                @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                    <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                @endif
            </a>
            @endif
        </div>
    </div>
</section>
@endif
</div>
@endif
@if ($item->layout=='layout2')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(10)->get();
    @endphp
    <!--SHARE BAZAR-->
    <section class="share-bazar-section">
        <div class="container-fluid">
            <div class="share-bazar">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="heading">
                                    <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                                    <span class="view-all">
                                        <a href="{{route('news_category',$category->slug)}}">सबै</a>
                                    </span>
                                </div>
                                <div class="card big-card mb-4">
                                    @foreach ($posts as $key => $post)
                                    @if ($key==0)
                                    
                                    <a href="{{route('single_news',$post->slug)}}">
                                        @if (!empty($post->featured_img))
                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top">
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                            @endif
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                                        @endif
                                        
                                    <div class="card-body">
                                        <h3 class="card-text line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a> </h3>
                                        <p class="time">
                                          @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिेट गाडि
                                          @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्टा अगाड
                                          @else
                                          {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दि अगाि
                                          @endif
                                         </p>
    
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach ($posts as $key => $post)
                                    @if ($key!=0 && $key<5)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card">
                                            <a href="{{route('single_news',$post->slug)}}">
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top small-card-img">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                @endif
                                                
                                            <div class="card-body">
                                                <h5 class="card-text  line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                                                </h5>
                                                <p class="time">@if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} िनेट अाडि
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्ा अगाडि
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगड
                            @endif</p>
    
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                   
    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="top-all added-top">
                                    <h2><a href="javascript:">थप समाचार</a></h2>
                                    <span><a href="javascript:">सबै</a></span>
                                </div>
                                <div class="news-short-inner-right">
                                    <div class="short-news-div">
                                        @foreach ($posts as $key => $post)
                                        @if ($key>4)
                                        <div class="short-news">
                                            <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                <div class="short-news-image">
                                                    @if (!empty($post->featured_img))
                                            @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                                </div>
                                                <div class="short-news-desc">
                                                    <h6>{{$post->title}}</h6>
                                                    <div class="author-date d-flex align-items-center">
                                                        <i class="far fa-clock f-20 mr-2"></i>
                                                        <p>
                                                            @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} मिनेट अगाि
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} घन्ा अगाडि
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} दिन अगाड
                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="partner-side">
                            
                            {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                            @if(json_decode($item->section1)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section2)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section2))
                                <a href="{{json_decode($item->section2)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section3)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section3))
                                <a href="{{json_decode($item->section3)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            {{-- @endforeach --}}
                            
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
@endif
</div>
@endif


@if ($item->layout=='layout3')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(10)->get();
    @endphp
    <!--PHOTO GALLERY-->
    <section class="photo-gallery-section">
        <div class="container-fluid">
            <h2><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h2>
            <div class="owl-carousel photo-gallery-carousel owl-theme">
                @foreach ($posts as $post)
                <div class="item">
                    @if (!empty($post->featured_img))
                        @if(file_exists('uploads/featured_img/'.$post->featured_img))
                            <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                        @else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                        @endif
                    @else
                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                    @endif
                    <div class="photo-overlay"></div>
                    <div class="photo-caption">
                        <a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</div>
@endif

@if ($item->layout=='layout4')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $posts=App\Models\Post::where('category',$category->id)->where('status','published')->latest()->take(12)->get();
    @endphp
    <!--ANTARBARTA-->
    <section class="antarbarta-section">
        <div class="container-fluid">
            <div class="antarbarta">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="heading">
                            <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                            <span class="view-all">
                                <a href="{{route('news_category',$category->slug)}}">सै</a>
                            </span>
                        </div>
                        <div class="row">
                            @foreach ($posts as $post)
                                
                            
                            <div class="col-lg-4">
                                <div class="antarbarta-card">
                                    <div class="antarbarta-image">
                                        <a href="{{route('single_news',$post->slug)}}">
                                            @if (!empty($post->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                @endif
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                            @endif
                                        </a>
                                    </div>
                                    <h6 class="antarbartaTitle"><a href="{{route('single_news',$post->slug)}}"><span><i
                                                    class="fas fa-quote-left"></i>&nbsp;</span> {{$post->title}}</a></h6>
                                    <p class="line-clamp-3">
                                        @if ($post->excerpt!=null)
                                            {{ Str::words($post->excerpt , 15, ' ...') }}
                                        @else
                                            {!! Str::words($post->description , 15, ' ...') !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-12">
                        <div class="partner-side">
                            
                            {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                            @if(json_decode($item->section1)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section2)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section2))
                                <a href="{{json_decode($item->section2)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section2)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            @if(json_decode($item->section3)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section3))
                                <a href="{{json_decode($item->section3)->url}}">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section3)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    
                                </a>
                                @endif
                            </div>
                            @endif
                            {{-- @endforeach --}}
                            
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section>
    <!--AD SECTION-->
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-fluid">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}">
                    @if(file_exists('uploads/partners/category_partner/'.json_decode($item->category_partner)->img))
                        <img src="{{asset('uploads/partners/category_partner/'.json_decode($item->category_partner)->img)}}" class="img-fluid">
                    @endif
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</div>
@endif

@if ($item->layout=='layout5')
<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    $sub_category=App\Models\SubCategory::where('parent_id',$category->id)->get();
   
    @endphp
<!--PRADESH SAMACHAR-->
<sesction class="pradesh">
    <div class="container-fluid">
        
        <div class="heading">
            <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
            <span class="view-all">
                <a href="{{route('news_category',$category->slug)}}">बै</a>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    @foreach ($sub_category as $key => $sub_cat)
                        
                    
                    <li class="nav-item">
                        <a class="nav-link @if($key == 0) active @endif" data-toggle="pill" href="#{{$sub_cat->name}}" role="tab" aria-controls="pills-one"
                            aria-selected="true">{{$sub_cat->name}}</a>
                    </li>
                    @endforeach
                    
                </ul>
                <div class="tab-content mt-3">
                    @foreach ($sub_category as $key => $sub_cat)

                    @php
                        $sub_posts=App\Models\Post::where('subcategory',$sub_cat->id)->where('status','published')->where('status','published')->get();
                        
                    @endphp
                    <div @if($key == 0) class="tab-pane active show" @else class="tab-pane" @endif id="{{$sub_cat->name}}" role="tabpanel" aria-labelledby="all-tab">
                        <div class="pradesh-wrapper">
                            <div class="row">
                                @if ($sub_posts != null)
                                    
                                
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                            @if ($count==0 || $count==$count+5)
                                            <div class="pradesh-samachar-top">
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                @endif
                                                <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                            </div>
                                            @else
                                            <div class="news-short-inner-right">
                                                <div class="short-news-div pradesh-small">
                                                    <div class="short-news">
                                                        <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                            <div class="short-news-image">
                                                                @if (!empty($post->featured_img))
                                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                                                    @else
                                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                    @endif
                                                                @else
                                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                @endif
                                                            </div>
                                                            <div class="short-news-desc">
                                                                <h6>{{$post->title}}</h6>
                                                                <div class="author-date d-flex align-items-center">
                                                                    <i class="far fa-clock f-20 mr-2"></i>
                                                                    <p>१ घन्टा अगडि</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            @endif
                                            
                                            
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="land-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">ेकपाले गोल िराँतीलई अ्यक्षबा हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकठाक रहेो’ भन्ने प्तिवेदन तयार पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्ा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिठक रहको’ भने प्तिवेदन या पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘ब िकठाक रहे’ भन्ने प्तवेदन तयार परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकक रहेको’ भने प्रतिवेद तयार पारेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेाले गोपल िरँतीला ध्यक्षबाट टायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठकठाक रहेको भन्ने प्रतवेन तयार परेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्ा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सब ठिकठाक हक’ भन्न प्रवेदन यार पाको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगड</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठकाक हेको भनने परतवेदन तया परेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सबै ठकठाक हेको’ न्न प्रतिवेदन यार पारेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">नेकपले गोपल किाँतीलाई अधयकषबाट हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकाक रहेक’ भ्ने प्रतवदन तयार पाको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै ठिकठक रहको’ भन्े परतिवेदन यर पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घटा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सै ठिकाक रेक’ भ्ने परतिदन तया पारक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै िकठाक हको’ भन्ने रतिवेदन तयर पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="rent-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एेकपाले गोपाल किराँतीला ध्क्षबाट टय</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘ै ठिकठाक रहो भन्ने प्तेदन तयार रेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक रहेको भनन प्रतिेदन ार पारको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक रहेको भनने प्रतवेदन तयार परेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठा रहेको’ भन् प्रतिवेदन र पारेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन् अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपाले गोपाल किराँतीलाई धक्षबाट हयो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सबै िकठाक हेको भन्ने प्रतवदन तयार पाको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकठाक रहेो’ भन्ने प्तिवेदन तयर ारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठाक रहेको’ भन्ने प्रतिदन तयार पारो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक हेको’ भ्ने ्रतिवदन तय पारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपले गपाल किरँतलाई अध्यषबाट हटाय</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठाक रहेको’ भन्ने प्रतिवद तयार पारे छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठा रहेको’ भन्े प्रतिवेदन तयर पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घना अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै ठिकठाक रहको’ भन्न प्तिवेद तार परेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घनटा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै ठिकठाक रहको’ भन्ने परतिवेदन तयार पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ् अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="house-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">नेकाले गोप कराँतीलाई ्यक्षबाट हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिठाक रहेको’ न्ने प्रतिेदन तयर पाेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘ब ठिकाक रेक’ भन्े ्रतवेदन तर पाेको छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिठाक रहेक’ न्ने प्रतेदन तयार पाको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>बै ठिकठाक रको’ भन्ने तिवेदन तार रेको छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपे गपाल किरतीलई अध्कषबाट टायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठक रहेको’ भनने प्रतिवेन तयार पारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकठक रहेो’ भन्े प्तिवेन या पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ ्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>बै ठिकठक रेो’ भनने परतवेन तयार पाेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकाक रहेो’ भनने प्तिवदन या पारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेपाले गोपाल िराँलाई अधयकषाट हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठकठाक रहेको’ भन्न प्रतिवेदन यार पारेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्टा अगा</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठ रहेको भन्े प्रतवेदन या परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सबै ठकठाक हेको’ न्न ्रतिवेन यार पारेक  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ न्ट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सब ठिकठाक रेो भन्ने प्वेदन तयार पको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="house-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपे गोपाल किातीलाई अधयकषबाट हटो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिाक रहको’ भ्े प्तिवेदन यार पारेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै ठिकठाक रहको’ भन्ने परतिवदन तयार पारको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घनटा अगा</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकक रहेको’ भ्े प्रतिवेदन तयर पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घनटा अगडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘स ठिकठाक रहक’ भन्ने परतवेदन तया पाेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घनट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपाल गपाल किरातीाई अध्क्षबाट हटाो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिकठा रहको’ भन्े ्तिवेदन तयार पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्ट अगाड</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठाक रहेक’ भन्ने प्रिवन तयार ारेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घ्ट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिकठा हेो’ भन्े ्रतवेदन तार पाेको छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्टा अगा</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठा रहेक’ भन्न प्रिवेदन तार ारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकाले गपाल किाँतलाई अध्क्षाट हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिठाक रेको’ भ्ने ्रतिवेन तार पारेक  </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ न्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिठाक हेको’ न्ने ्रतिेदन तयार पाेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाड</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिकठा रेको भन्ने ्रतिेदन तार पारको छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिक रहेको’ न् प्रतिेदन यर पाेको छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="house-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपाल गपाल किरातीलाई अ्य्षबा हटाो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिका रहेो’ भने प्रतवेद यार पारक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सबै ठिकठाक हेक’ भन्ने रिवेदन तयार ारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकठा रहेक’ भन्े प्रतवेद तयार पाेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अगडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिठाक रहेक भ्ने प्रिवदन तयार ारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेकपाले गपाल किराँताई अध्यक्ब हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकक रहेको’ भ्े प्रतिवदन ार पारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ न्टा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठाक रहेको’ भन्ने प्रतिेदन तयार पाेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा गडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिकाक रेको’ भनने ्रतिवेद तर पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ नटा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘बै ठिकठाक रेको’ भन्ने ्रतिेदन तयार पाेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ट ाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">नेकपाे गोपाल किरँतीलई अध्यकषबट हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठाक रहेक’ भन्ने प्रिवेन तया परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ नटा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>सबै ठिकठाक हेको’ भन्न प्रतिेन तयर पारो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगड</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठकठक रहेको’ नने प्रतिवेदन तया पारेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घनटा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठा रहेको’ भन् प्रतिवेन तर पारेो छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घनट अगडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="seven" role="tabpanel" aria-labelledby="house-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news4.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एेकपाले गपा किराँीलाई ध्यकषबा हटायो</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक रहेको’ भ्न प्रतिवेन यार पारेक  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ न्टा अगाड</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठक रहेको भन्े प्रतवेदन यार परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्ा अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘ै ठिकठाक रहो’ भन्न प्तवेदन यार ारको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा गाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै िकठाक रहेको भन्ने प्रतवेदन तयार परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news1.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एनेपाले गोपाल िराँतीाई अध्यक्ाट हटाय</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सै ठकठाक रहेो भन्ने प्रवेदन तयर पाको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक रहेको’ भ्ने प्रतिवन तयार पारक छ </h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p> घन्टा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकठा रहेको’ भन्े प्रतिवेदन तयर पारेको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घ्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिकाक रहेको’ भ्ने प्रतिवन तयर पारको  ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ न्ा अाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="pradesh-samachar">
                                    <div class="pradesh-samachar-top">
                                        <img src="assets/images/news3.jpg" alt="Pradesh Samachar"
                                            class="img-fluid pradesh-image">
                                        <h5><a href="news-details.php">एेकपाले गोपाल किराँतीला अ्क्षबा हटा</a>
                                        </h5>
                                    </div>
                                    <div class="news-short-inner-right">
                                        <div class="short-news-div pradesh-small">
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news1.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘स ठिकठाक रहक’ भन्ने परतवेदन तयार परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन् अगाडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news3.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सब ठिकठाक रहेो’ भन्ने प्तिवेद तयार ारेक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा गाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news4.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठकठाक रहेको भन्ने प्रतवेदन तयार परेको छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्ा अडि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="short-news">
                                                <a href="news-details.php" class="d-flex">
                                                    <div class="short-news-image">
                                                        <img src="assets/images/news5.jpg" alt="News Image Small"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="short-news-desc">
                                                        <h6>‘सबै ठिाक रहेको’ नने प्रतिेद यार पारक छ ।</h6>
                                                        <div class="author-date d-flex align-items-center">
                                                            <i class="far fa-clock f-20 mr-2"></i>
                                                            <p>१ घन्टा अगाि</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</sesction>
</div>
@endif
@endforeach

@endsection
