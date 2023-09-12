@extends('frontend.layouts.app')
{{-- @section('title',$news->title) --}}

@section('content')
<?php
    function ent_to_nepali_num_convert($number){
    $eng_number = array(0,1,2,3,4,5,6,7,8,9);
    $nep_number = array('०','१','२','३','४','५','','७','८','९');
    return str_replace($eng_number, $nep_number, $number);
    }
	$minute="मि अगाड";
    $hour="घण्टा अगाि";
    $day="दन अाड";
	$all="सब";
	$additional_news="थप साचा";
	$related_news="सम्बन्धित सचार";
?>
{{-- <nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">गहपठ</a></li>
<li class="breadcrumb-item"><a href="category.php">समचार</a></li>
<li class="breadcrumb-item active" aria-current="page">ारमा ैदिन े लखन्ा.....</li>
</ol>
</div>
</nav> --}}
<section class="category-page">
    <div class="container-custom">
        <div class="news-container-main">
            
            <div class="additional-news">
                <h6><a href="#">खोज परिणाहरू</a></h6>
                <div class="row">
                    @if (count($news)>0)
                    @foreach ($news as $key => $additional)
                 
                    
                    <div class="col-lg-6 col-md-6">
                        <a href="{{route('single_news',$additional->slug)}}" class="category-link">
                            <div class="category-news">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="news-image">
                                        @if ($additional->video!=null)
                                            @if (!empty($additional->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$additional->featured_img))

                                                    <video class="card-img" controls poster="{{asset('uploads/featured_img/'.$additional->featured_img)}}" src="{!! $additional->video !!}">
                                                    </video>
                                                @else

                                                <video class="card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $additional->video !!}">
                                                </video>

                                                @endif
                                            @else


                                            <video class="card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $additional->video !!}">
                                            </video>
                                            @endif

                                        @elseif($additional->video_url!=null)
                                            <iframe class="card-img" src="{{str_replace('watch?v=', 'embed/',$additional->video_url) }}" title="{{$additional->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @else
                                            @if (!empty($additional->featured_img))
                                                @if(file_exists('uploads/featured_img/'.$additional->featured_img))
                                                    <img src="{{asset('uploads/featured_img/'.$additional->featured_img)}}" class="card-img">
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="card-img">
                                                @endif
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="card-img">
                                            @endif
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="news-extended">
                                            <h4>{{$additional->title}}</h4>
                                            
                                            <p>
                                                @if ($additional->excerpt!=null)
                                                        {{ Str::words($additional->excerpt,22)}}
                                                    @else
                                                        {!! Str::words($additional->description , 22, ' ...') !!}
                                                    @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
                    @else
                        <p>माफ र्नुहोस्, कनै खज परिणा फेा परेन..</p>
                    @endif
                </div>
            </div>
           
        </div>
    </div>
    <div class="pagination-div">
        {{-- <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link page-prev" href="#">&laquo;</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <span class="page-link">
                        2
                        <span class="sr-only">(current)</span>
                    </span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#">&raquo;</a>
                </li>
            </ul>
        </nav> --}}
        {{-- {{$news->links()}} --}}
    </div>
</section>
<!--AD SECTION-->

@endsection
