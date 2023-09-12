<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    if($category!=null){
        $posts=App\Models\Post::where('category',$category->id)->where(function($q){
        $q->where('status', 'published')
         ->orWhere('status', 'drafts');
        })->latest()->take(10)->get();
    }

    @endphp
    <!--SHARE BAZAR-->
    @if($category!=null)
    <section class="share-bazar-section">
        <div class="container-custom">
            <div class="share-bazar">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="heading">
                                    <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                                    <span class="view-all">
                                        <a href="{{route('news_category',$category->slug)}}">{{$all}}</a>
                                    </span>
                                </div>

                                <div class="card big-card mb-4">
                                    @foreach ($posts as $key => $post)
                                    @if ($key==0)
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{route('single_news',$post->slug)}}">
                                                @if ($post->video!=null)
                                                     @if (!empty($post->featured_img))
                                                         @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                             <video class="card-img-top" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                             </video>
                                                         @else

                                                         <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                         </video>

                                                         @endif
                                                     @else


                                                     <video class="card-img-top" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                     </video>
                                                     @endif

                                                 @elseif($post->video_url!=null)
                                                        <iframe class="card-img-top" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                   @else
                                                     @if (!empty($post->featured_img))
                                                         @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                             <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top">
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
                                                <h3 class="card-text line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a> </h3> <br/>
                                                <p style="margin-top: -1rem;">
                                                    {{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}}
                                                 </p>
                                                 <p>{!! $post->excerpt !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach ($posts as $key => $post)
                                    @if ($key!=0 && $key<5)
                                    <div class="col-md-9 col-lg-6">
                                        <div class="card">
                                            <a href="{{route('single_news',$post->slug)}}" >
                                            @if ($post->video!=null)
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                        <video class="card-img-top small-card-img" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                        </video>
                                                    @else

                                                    <video class="card-img-top small-card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                    </video>

                                                    @endif
                                                @else


                                                <video class="card-img-top small-card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                </video>
                                                @endif

                                            @elseif($post->video_url!=null)
                                       			<iframe class="card-img-top small-card-img" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                            @else
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top small-card-img">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                @endif
                                            @endif

                                            <div class="card-body align-items-center">
                                                <h5 class="card-text  line-clamp-2 mb-2"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                                                </h5>
                                                <p class="time">{{ $nepaliDate }} {{ ent_to_nepali_num_convert($posts[0]->created_at->format('H:i A'))}}</p>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach


                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-4">
                                <div class="top-all added-top">
                                    <h2><a href="javascript:">{{$additional_news}}</a></h2>
                                    <span><a href="javascript:">{{$all}}</a></span>
                                </div>
                                <div class="news-short-inner-right">
                                    <div class="short-news-div">
                                        @foreach ($posts as $key => $post)
                                        @if ($key>4)
                                        <div class="short-news">
                                            <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                                <div class="short-news-image">
                                                @if ($post->video!=null)
                                                    @if (!empty($post->featured_img))
                                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                            <video class="card-img-top small-card-img" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                            </video>
                                                        @else

                                                        <video class="card-img-top small-card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                        </video>

                                                        @endif
                                                    @else


                                                    <video class="card-img-top small-card-img" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                    </video>
                                                    @endif

                                                @elseif($post->video_url!=null)
                                       				<iframe class="card-img-top small-card-img" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                @else
                                                    @if (!empty($post->featured_img))
                                                        @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                            <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="card-img-top small-card-img">
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                        @endif
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="card-img-top small-card-img">
                                                    @endif
                                                @endif
                                                </div>
                                                <div class="short-news-desc">
                                                    <h6>{{$post->title}}</h6>
                                                    <div class="author-date d-flex align-items-center">
                                                        <i class="far fa-clock f-20 mr-2"></i>
                                                        <p>
                                                            @if($post->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }} {{$minute}}
                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                            @else
                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
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
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="partner-side">

                            {{-- @foreach (json_decode($item->sidebar_partners) as $sponsor) --}}
                            @if(json_decode($item->section1)->img!=null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}" target="_blank">
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
                                <a href="{{json_decode($item->section2)->url}}" target="_blank">
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
                                <a href="{{json_decode($item->section3)->url}}" target="_blank">
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
    @endif
    @if(json_decode($item->category_partner)->img != null)
    <section class="money-image-section">
        <div class="container-custom">
            <div class="money-image">
                @if (!empty($item->category_partner))
                <a href="{{json_decode($item->category_partner)->url}}" target="_blank">
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
