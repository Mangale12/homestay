@extends('frontend.layouts.app')
@section('title',$setting->title)

@section('content')

@php
//$analyticsData = Spatie\Analytics\Analytics::fetchVisitorsAndPageViews(Period::days(7));
//echo $analyticsData;
@endphp

<!--AD SECTION-->
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','','','५','६','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
    $minute="मिनेट अगाडि";
    $hour="घण्टा अगाडि";
    $day="दिन अगाडी";
	$all="सबै";
	$additional_news="थप समाचार ";
?>
@if(json_decode($partner->after_header1)->img != null)
<section class="money-image-section">
    ;
    {{-- {{ dd(Hash::make('password')) }} --}}
    <div class="container-custom">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header1)->url}}" target="_blank">
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
    <div class="container-custom">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header2)->url}}" target="_blank">
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
    <div class="container-custom">
        <div class="money-image">
            <a href="{{json_decode($partner->after_header3)->url}}" target="_blank">
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
        $user_detail=App\Models\User::where('id',$news->author)->first();
        $nepaliDate = Krishnahimself\DateConverter\DateConverter::fromEnglishDate((int)$news->created_at->format('Y'), (int)$news->created_at->format('m'), (int)$news->created_at->format('d'),$news->created_at->format('H:i:s'))->toFormattedNepaliDate();
    @endphp
    <section class="main-new-first">
        <div class="container-custom">
            <div class="main-news-first-start">
                <div class="mb-1" style="width: 20%; margin-left:40%;">
                    <p class="btn btn-danger ">{{ $news->kicker }}</p>
                </div>
                <h2><a href="{{route('single_news',$news->slug)}}">{{$news->title}}
                    </a>
                </h2>

                <div class="author-details d-flex align-items-center">
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
                        <p>
                            {{ $nepaliDate }} {{ ent_to_nepali_num_convert($news->created_at->format('h:i a'))}}
                        </p>
                    </div>

                    <div class="comment d-flex align-items-center">
                        <i class="far fa-comment-alt f-20 mr-2"></i>
                        <span class="fb-comments-count" data-href="{{Request::url() .'/news/single-news/' . $news->slug}}"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php

        $last_key = $headline_no-1;
    @endphp
    {{-- @if($key==$last_key)  --}}

    <section class="money-image-section">
        <div class="container-custom">
            <div class="money-image money-image-main border-bottom">
                <a href="{{route('single_news',$news->slug)}}">
                   {{-- @if ($news->video!=null)
                        @if (!empty($news->headline_image))
                            @if(file_exists('uploads/headline_img/'.$news->headline_image))

                                <video class="img-fluid pb-4" controls poster="{{asset('uploads/headline_img/'.$news->headline_image)}}" src="{!! $news->video !!}">
                                </video>
                            @else

                            <video class="img-fluid pb-4" controls poster="{{asset('placeholder.jpg')}}" src="{!! $news->video !!}">
                            </video>

                            @endif
                        @else


                        <video class="img-fluid pb-4" controls poster="{{asset('placeholder.jpg')}}" src="{!! $news->video !!}">
                        </video>
                        @endif

                    @elseif($news->video_url!=null)
                        <iframe width="560" height="315" src="{{$news->video_url}}" title="{{$news->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else--}}
                        @if (!empty($news->headline_image))
                            @if(file_exists('uploads/headline_img/'.$news->headline_image))
                                <img src="{{asset('uploads/headline_img/'.$news->headline_image)}}" class="img-fluid pb-4">
                            {{--@else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pb-4">--}}
                            @endif
                        {{--@else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid pb-4">--}}
                        @endif
                        @if($news->excerpt!=null)
                        <p>
                            {{$news->excerpt}}
                        </p>
                        @endif
                   {{-- @endif--}}

                </a>
            </div>
        </div>
    </section>
    {{-- @endif --}}

@endforeach
@php
    $banner_news = App\Models\Post::where('news_banner','1')->first();
@endphp
<div class="container">
<div class="row">
    <div class="col-6">
        <a href="{{route('single_news',$banner_news->slug)}}">
            @if ($banner_news->video!=null)
                 @if (!empty($banner_news->featured_img))
                     @if(file_exists('uploads/featured_img/'.$banner_news->featured_img))

                         <video class="card-img-top" controls poster="{{asset('uploads/featured_img/'.$banner_news->featured_img)}}" src="{!! $banner_news->video !!}">
                         </video>
                     @else

                     <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $banner_news->video !!}">
                     </video>

                     @endif
                 @else


                 <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $banner_news->video !!}">
                 </video>
                 @endif

             @elseif($banner_news->video_url!=null)
                    <iframe class="card-img-top" src="{{str_replace('watch?v=', 'embed/',$banner_news->video_url) }}" title="{{$banner_news->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

               @else
                 @if (!empty($banner_news->featured_img))
                     @if(file_exists('uploads/featured_img/'.$banner_news->featured_img))
                         <img src="{{asset('uploads/featured_img/'.$banner_news->featured_img)}}" class="card-img-top">
                     @else
                         <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                     @endif
                 @else
                     <img src="{{asset('placeholder.jpg')}}" class="card-img-top">
                 @endif
             @endif
         </a>
    </div>
    <div class="col-6 d-flex">
        <div class="card-body d-flex align-items-center">
            <div>
            <h3 class="card-text line-clamp-2 mb-2"><a href="{{route('single_news',$banner_news->slug)}}">{{$banner_news->title}}</a> </h3> <br/>
            <p style="margin-top: -1rem;">
                {{ $nepaliDate }} {{ ent_to_nepali_num_convert($banner_news->created_at->format('H:i A'))}}
             </p>
             <p>{!! $banner_news->excerpt !!}</p>
            </div>
        </div>
    </div>
</div>
<div class="col-6 d-flex">
    <div class="card-body d-flex align-items-center">
        <div>
        <h3 class="card-text line-clamp-2 mb-2"><a href="{{route('single_news',$banner_news->slug)}}">{{$banner_news->title}}</a> </h3> <br/>
        <p style="margin-top: -1rem;">
            {{ $nepaliDate }} {{ ent_to_nepali_num_convert($banner_news->created_at->format('H:i A'))}}
         </p>
         <p>{!! $banner_news->excerpt !!}</p>
        </div>
    </div>
</div>
</div>
@foreach ($cat_sec as $key => $item)
  @if ($item->layout=='layout1')
  @include('frontend.layouts.layout1')
  @endif
  @if ($item->layout=='layout2')
  @include('frontend.layouts.layout2')
  @endif

  @if ($item->layout=='layout3')
  @include('frontend.layouts.layout3')
  @endif

  @if ($item->layout=='layout4')
  @include('frontend.layouts.layout4')
  @endif

  @if ($item->layout=='layout5')
  @include('frontend.layouts.layout5')
  @endif
@endforeach

@endsection
