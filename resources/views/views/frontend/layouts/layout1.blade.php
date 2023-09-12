<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    if($category!=null){
        $posts=App\Models\Post::where('category',$category->id)->where(function($q){
        $q->where('status', 'published')
         ->orWhere('status', 'drafts');
        })->latest()->take(6)->get();
    }
    @endphp
    <!--NEWS-->
    @if ($category!=null)


    @if (!blank($posts))


    <section class="news">
        <div class="container-custom">
            <div class="news-short">
                <div class="heading">
                    <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
                    <span class="view-all">
                        <a href="{{route('news_category',$category->slug)}}">{{$all}}</a>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            {{-- @foreach ($posts as $key => $post) --}}

                            {{-- @if ($key==0) --}}
                            <div class="col-lg-12 col-md-12">
                                <div class="news-short-left">
                                            <div class="news-short-inner-left">
                                                <a href="{{route('single_news',$posts[0]->slug)}}">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="news-short-inner-image">
                                                            @if ($posts[0]->video!=null)
                                                                @if (!empty($posts[0]->featured_img))
                                                                    @if(file_exists('uploads/featured_img/'.$posts[0]->featured_img))

                                                                        <video class="img-fluid" controls poster="{{asset('uploads/featured_img/'.$posts[0]->featured_img)}}" src="{!! $posts[0]->video !!}">
                                                                        </video>
                                                                    @else

                                                                    <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $posts[0]->video !!}">
                                                                    </video>

                                                                    @endif
                                                                @else


                                                                <video class="img-fluid" controls poster="{{asset('placeholder.jpg')}}" src="{!! $posts[0]->video !!}">
                                                                </video>
                                                                @endif

                                                            @elseif($posts[0]->video_url!=null)
                                                                <iframe class="img-fluid" src="{{str_replace('watch?v=', 'embed/',$posts[0]->video_url) }}" title="{{$posts[0]->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                            @else
                                                                @if (!empty($posts[0]->featured_img))
                                                                    @if(file_exists('uploads/featured_img/'.$posts[0]->featured_img))
                                                                        <img src="{{asset('uploads/featured_img/'.$posts[0]->featured_img)}}" class="img-fluid">
                                                                    @else
                                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                    @endif
                                                                @else
                                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                                                @endif
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <h4>{{$posts[0]->title}}</h4>
                                                            <p>@if($posts[0]->created_at->diffInMinutes(\Carbon\Carbon::now())<60)
                                                                {{ ent_to_nepali_num_convert($posts[0]->created_at->diffInMinutes(\Carbon\Carbon::now())) }}{{$minute}}
                                                                @elseif($posts[0]->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                                {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                                                @else
                                                                {{ ent_to_nepali_num_convert($posts[0]->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                                                @endif</p>
                                                        <p class="line-clamp-4">
                                                            @if ($posts[0]->excerpt!=null)
                                                                {{$posts[0]->excerpt}}
                                                            @else
                                                                {!! Str::words($posts[0]->description , 53, ' ...') !!}
                                                            @endif
                                                        </p>
                                                        </div>
                                            </div>
                                                </a>
                                            </div>

                                </div>
                            </div>
                            {{-- @endif --}}
                            {{-- @endforeach --}}
                            <div class="col-12">
                                @if(json_decode($item->section1)->img != null)
                            <div class="partner-image-single mb-3">
                                @if (!empty($item->section1))
                                <a href="{{json_decode($item->section1)->url}}" target="_blank">
                                        @if(file_exists('uploads/partners/sidebarAds/'.json_decode($item->section1)->img))
                                            <img src="{{asset('uploads/partners/sidebarAds/'.json_decode($item->section1)->img)}}" style="width:100rem; height:20rem;">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif

                                </a>
                                @endif
                            </div>
                            @endif
                            </div>


                            <div class="col-lg-6 col-md-6">
                                <div class="news-short-inner-right">
                                    <div class="short-news-div">
                                        @foreach ($posts as $key => $post)
                                            @if ($key!=0 )
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
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }}{{$minute}}
                                                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                                            @else
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                                            @endif</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    @endif

                            @endforeach
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="news-short-inner-right">
                                    <div class="short-news-div">
                                        @foreach ($posts->slice(6,9) as $key => $post)
                                            @if ($key != 0 )
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
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInMinutes(\Carbon\Carbon::now())) }}{{$minute}}
                                                            @elseif($post->created_at->diffInHours(\Carbon\Carbon::now())<24)
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInHours(\Carbon\Carbon::now())) }} {{$hour}}
                                                            @else
                                                            {{ ent_to_nepali_num_convert($post->created_at->diffInDays(\Carbon\Carbon::now())) }} {{$day}}
                                                            @endif</p>
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
    @endif
    @endif
<!--AD SECTION-->
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
