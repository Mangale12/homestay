@extends('frontend.layouts.app')
@section('title',$news->title)
@php
$user_detail=App\Models\User::where('id',$news->author)->first();
$category=App\Models\Category::where('id',$news->category)->first();
$subcategory=App\Models\SubCategory::where('id',$news->subcategory)->first();
@endphp
@section('meta')

   <meta property="og:title" content="{{ $news->meta_title != null ? $news->meta_title : $news->title }}" />
  <meta property="og:author" content="{{$user_detail != null ? $user_detail->name : ' '}}" />
  <meta property="og:description" content="{{$news->meta_description != null ? $news->meta_description : $news->excerpt}}" />
  <meta property="og:locale" content="en" />
  <meta property="og:type" content="news"/>
  <meta property="og:image:width" content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:url" content="{{route('single_news',$news->slug)}}" />
    @if($news->fb_image!=null)
    <meta property="og:image" content="{{ asset('uploads/fb_image/'.$news->fb_image) }}"/>
    @else
    <meta property="og:image" content="{{ asset('uploads/featured_img/'.$news->featured_img) }}"/>
    @endif

@endsection
@section('content')
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','३','४','५','६','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
	$minute="मिनेट अगाडी ";
    $hour="घण्टा अगाडी ";
    $day="दिन अगाडी ";
	$all="सबै";
	$additional_news="भर्खरै";
    $trending_news = "ट्रेन्डिङ्ग";
	$related_news="सम्बन्धित समाचार ";
?>
{{-- <nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">गहष्ठ</a></li>
<li class="breadcrumb-item"><a href="category.php">समार</a></li>
<li class="breadcrumb-item active" aria-current="page">ारमा कैदन े लखन्दा.....</li>
</ol>
</div>
</nav> --}}
<div class="news-details-section">

    <div class="container-custom">
        <div class="mb-5">
            <p class="btn btn-danger ">{{ $news->kicker }}</p>
        </div>
        <h2>{{$news->title}}</h2>
        <div class="author-details d-flex align-items-center justify-content-start">
            <div class="author d-flex align-items-center mr-3">

                <div class="author-image">
                  @if ($user_detail!=null)
                  @if($user_detail->profile_image!=null)
                  <img src="{{asset('admin/image/'.$user_detail->profile_image)}}" alt="{{$user_detail->name}}" class="img-fluid">
                  @else
                  <img src="{{asset('frontend/assets/images/person.jpg')}}" alt="author" class="img-fluid">
                  @endif
                  @else
                  <img src="{{asset('frontend/assets/images/person.jpg')}}" alt="author" class="img-fluid">
                  @endif
              </div>
              <p>
                @if ($user_detail!=null)
                {{$user_detail->name}}
                @else
                Anonymous
                @endif
              </p>
            </div>
            <div class="author-date d-flex align-items-center mr-3">
                <i class="far fa-clock f-20 mr-2"></i>
                {{-- @php
                    $minutes = $news->created_at->format('i');
                    $minutes = (int)$minutes;
                    $n = "2";
                    dd(ent_to_nepali_num_convert(2));
                @endphp
                {{ dd() }} --}}
                <p>{{ $nepaliDate }} {{ ent_to_nepali_num_convert($news->created_at->format('H:i A'))}} </p>
                {{-- <p>@if($news->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                    {{ ent_to_nepali_num_convert($news->created_at->diffInMinutes(\Carbon\Carbon::now())) }} {{$minute}}
                    @elseif($news->created_at->diffInHours(\Carbon\Carbon::now())<24)
                    {{ ent_to_nepali_num_convert($news->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                    @else
                    {{ ent_to_nepali_num_convert($news->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                    @endif</p> --}}
            </div>
            <div class="comment d-flex align-items-center">
                <i class="far fa-comment-alt f-20 mr-2"></i>
                <span class="fb-comments-count" data-href="{{Request::url()}}"></span>
            </div>
        </div>
        <!--AD SECTION-->
          @if(json_decode($partner->single_after_header)->img != null)
        <div class="money-image-section">
            <div class="money-image">
                    @if (!empty($partner->single_after_header))
                    <a href="{{json_decode($partner->single_after_header)->url}}" target="_blank">
                        @if(file_exists('uploads/partners/single_after_header/'.json_decode($partner->single_after_header)->img))
                        <img src="{{asset('uploads/partners/single_after_header/'.json_decode($partner->single_after_header)->img)}}"
                            class="img-fluid">
                        @endif
                    </a>
                    @endif
            </div>
        </div>
          @endif
        <div class="share-buttons d-flex">
            <div class="sharethis-inline-share-buttons"></div>
            @php
                $data = "https://count-server.sharethis.com/v2.0/get_counts?url=" . Request::url();
                $json_data = file_get_contents($data);
                $arr=json_decode($json_data,true);

            @endphp
            <div class="share-number">
            {{$arr['shares']['all']}} Shares
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="news-details-left">
                   @if(json_decode($partner->after_single_headline)->img != null)
                    <div class="money-image-section">
                        <div class="money-image">
                            @if (!empty($partner->after_single_headline))
                            <a href="{{json_decode($partner->after_single_headline)->url}}" target="_blank">
                                @if(file_exists('uploads/partners/after_single_headline/'.json_decode($partner->after_single_headline)->img))
                                <img src="{{asset('uploads/partners/after_single_headline/'.json_decode($partner->after_single_headline)->img)}}"
                                    class="img-fluid">
                        @endif
                            </a>
                            @endif
                        </div>
                    </div>
                  @endif
                    <div class="news-details-first-img">
                        <a href="javascript:">
                            @if ($news->video!=null)
                                @if (!empty($news->featured_img))
                                    @if(file_exists('uploads/featured_img/'.$news->featured_img))

                                        <video class="img-fluid" controls poster="{{asset('uploads/featured_img/'.$news->featured_img)}}" src="{!! $news->video !!}">
                                        </video>
                                    @else

                                    <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $news->video !!}">
                                    </video>

                                    @endif
                                @else


                                <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $news->video !!}">
                                </video>
                                @endif

                            @elseif($news->video_url!=null)
                                <iframe class="img-fluid" width="730px" style="height:500px!important" src="{{str_replace('watch?v=', 'embed/',$news->video_url) }}" title="{{$news->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                                @if (!empty($news->featured_img))
                                    @if(file_exists('uploads/featured_img/'.$news->featured_img))
                                        <img src="{{asset('uploads/featured_img/'.$news->featured_img)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                @else
                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                @endif
                            @endif
                        </a>
                    </div>
                   @if(json_decode($partner->single_news)->img != null)
                    <div class="money-image">
                        @if (!empty($partner->single_news))
                            <a href="{{json_decode($partner->single_news)->url}}">
                                @if(file_exists('uploads/partners/single_news/'.json_decode($partner->single_news)->img))
                                <img src="{{asset('uploads/partners/single_news/'.json_decode($partner->single_news)->img)}}"
                                    class="img-fluid">
                            @endif
                            </a>
                            @endif
                    </div>
                  @endif
                    <div class="about-news">
                        {!! $news->description !!}
                    </div>
                    @if(!empty($news->pdf_file))
                    <iframe src="{{ asset('uploads/pdf/'.$news->pdf_file) }}#toolbar=0" frameborder="0" style="width: 100%; height:30rem;;"></iframe>
                    @endif
                    {{-- <div class="money-image mb-2s">
                        <a href="javascript:">
                            <img src="assets/images/bajaj.gif" alt="Money Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="money-image">
                        <a href="javascript:">
                            <img src="assets/images/jagadamba.gif" alt="Money Image" class="img-fluid">
                        </a>
                    </div> --}}

                    <div class="comment-section">
                        <!-- <h2>प्करिय</h2> -->
                        <div class="heading">
                            <h1> <a href="javascript:">प्रतिक्रिया </a></h1>

                        </div>
                        <div class="row">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="5"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="news-details-ads detail-page-ad double-money">
                    <div class="news-short-ads">
                        {{-- @foreach (json_decode($partner->single_sidebar) as $sponsor) --}}
                      		@if(json_decode($partner->single_sidebar1)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar1)->url}}" target="_blank">
                                    @if (!empty($partner->single_sidebar1))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar1)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar1)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      	@endif
                      		@if(json_decode($partner->single_sidebar2)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar2)->url}}" target="_blank">
                                    @if (!empty($partner->single_sidebar2))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar2)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar2)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      		@endif
                      		@if(json_decode($partner->single_sidebar3)->img != null)
                            <div class="money-image">
                                <a href="{{json_decode($partner->single_sidebar3)->url}}" target="_blank">
                                    @if (!empty($partner->single_sidebar3))
                                        @if(file_exists('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar3)->img))
                                            <img src="{{asset('uploads/partners/single_sidebar/'.json_decode($partner->single_sidebar3)->img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </a>
                            </div>
                      	@endif
                        {{-- @endforeach --}}
                    </div>

                </div>
                <div class="top-all added-top">
                    <h2><a href="javascript:">{{$additional_news}}</a></h2>
                    <span><a href="javascript:">{{$all}}</a></span>
                </div>
                @php
                    $posts=App\Models\Post::where(function($q){
                             $q->where('status', 'published')
                               ->orWhere('status', 'drafts');
                        })->latest()->take(5)->get();
                    // dd($posts);
                @endphp
                <div class="news-short-inner-right">
                    <div class="short-news-div">
                        @foreach ($posts as $post)
                        {{-- @if($post->slug != ) --}}
                        <div class="short-news">
                            <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                <div class="short-news-image">
                                @if ($post->video!=null)
                                    @if (!empty($post->featured_img))
                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                            <video class="img-fluid" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                            </video>
                                        @else

                                        <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                        </video>

                                        @endif
                                    @else


                                    <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                    </video>
                                    @endif

                                @elseif($post->video_url!=null)
                                    <iframe class="img-fluid" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @else
                                    @if (!empty($post->featured_img))
                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                            <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                @endif
                                </div>
                                <div class="short-news-desc">
                                    <h6>{{$post->title}}</h6>
                                    <div class="author-date d-flex align-items-center">
                                        <i class="far fa-clock f-20 mr-2"></i>
                                        <p>@if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} {{$minute}}
                                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                            @else
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                            @endif</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="top-all added-top">
                    <h2><a href="javascript:">{{$trending_news}}</a></h2>
                    <span><a href="javascript:">{{$all}}</a></span>
                </div>
                @php
                    $trending=App\Models\Post::where(function($q){
                             $q->where('status', 'published')
                               ->orWhere('status', 'drafts');
                        })->where('trending',"1")->latest()->take(5)->get();
                    // dd($trending);
                @endphp
                <div class="news-short-inner-right">
                    <div class="short-news-div">
                        @foreach ($trending as $post)
                        {{-- @if($post->slug != ) --}}
                        <div class="short-news">
                            <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                <div class="short-news-image">
                                @if ($post->video!=null)
                                    @if (!empty($post->featured_img))
                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                            <video class="img-fluid" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                            </video>
                                        @else

                                        <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                        </video>

                                        @endif
                                    @else


                                    <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                    </video>
                                    @endif

                                @elseif($post->video_url!=null)
                                    <iframe class="img-fluid" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @else
                                    @if (!empty($post->featured_img))
                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                            <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                @endif
                                </div>
                                <div class="short-news-desc">
                                    <h6>{{$post->title}}</h6>
                                    <div class="author-date d-flex align-items-center">
                                        <i class="far fa-clock f-20 mr-2"></i>
                                        <p>@if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} {{$minute}}
                                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                            @else
                                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                            @endif</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--DOUBLE SECTION-->
<section class="double">
    <div class="container-custom">
        <div class="heading">
            <h1> <a href="javascript:">{{$related_news}}</a></h1>

        </div>
        @php
            $related_posts=App\Models\Post::where('category',$news->category)->where(function($q){
                             $q->where('status', 'published')
                               ->orWhere('status', 'drafts');
                        })->latest()->paginate(12);
            // dd($related);
        @endphp
        <div class="sambandhit-samachar">
            <div class="row">
                @foreach ($related_posts as $related_post)


                <div class="col-lg-4 col-md-4">
                    <div class="news related-img">
                        <a href="{{route('single_news',$related_post->slug)}}">
                        @if ($related_post->video!=null)
                            @if (!empty($related_post->featured_img))
                                @if(file_exists('uploads/featured_img/'.$related_post->featured_img))

                                    <video class="img-fluid" controls poster="{{asset('uploads/featured_img/'.$related_post->featured_img)}}" src="{!! $related_post->video !!}">
                                    </video>
                                @else

                                <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $related_post->video !!}">
                                </video>

                                @endif
                            @else


                            <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $related_post->video !!}">
                            </video>
                            @endif

                        @elseif($related_post->video_url!=null)
                            <iframe class="img-fluid" src="{{str_replace('watch?v=', 'embed/',$related_post->video_url) }}" title="{{$related_post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            @if (!empty($related_post->featured_img))
                                @if(file_exists('uploads/featured_img/'.$related_post->featured_img))
                                    <img src="{{asset('uploads/featured_img/'.$related_post->featured_img)}}" class="img-fluid">
                                @else
                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                @endif
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        @endif
                        </a>
                    </div>
                    <div class="news-related-desc">
                        <a href="{{route('single_news',$related_post->slug)}}">
                            <h6 class="line-clamp-2">{{$related_post->title}}</h6>
                        </a>
                        <div class="author-date d-flex align-items-center mt-2">
                            <i class="far fa-clock f-20 mr-2"></i>
                            <p>@if($related_post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} {{$minute}}
                                @elseif($related_post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                @else
                                {{ ent_to_nepali_num_convert($related_post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                @endif</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{$related_posts->links()}}
        </div>
    </div>
</section>

@endsection
