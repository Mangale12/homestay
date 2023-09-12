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
    <!--ANTARBARTA-->
    @if($category!=null)

    <section class="antarbarta-section">
        <div class="container-custom">
            <div class="antarbarta">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="heading">
                            <h1> <a href="{{route('news_category',$category->slug)}}">{{ $category->name }}</a></h1>
                            <span class="view-all">
                                <a href="{{route('news_category',$category->slug)}}">{{$all}}</a>
                            </span>
                        </div>
                        <div class="col-lg-12">
                            <div class="antarbarta-card">
                                <div class="antarbarta-image">
                                    <a href="{{route('single_news',$posts[0]->slug)}}">
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
                                                <img src="{{asset('uploads/featured_img/'.$posts[0]->featured_img)}}" class="img-fluid" style="height:100%;">
                                            @else
                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @endif
                                    </a>
                                </div>
                                <div class="antarbarta-heading-cover">
                                <h6 class="antarbartaTitle"><a href="{{route('single_news',$posts[0]->slug)}}"><span><i
                                                class="fas fa-quote-left"></i>&nbsp;</span> {{$posts[0]->title}}</a></h6>
                                                {{-- {{ $nepaliDate }} {{ ent_to_nepali_num_convert($posts[0]->created_at->format('H:i A'))}} --}}
                                <p class="line-clamp-3">
                                    @if ($posts[0]->excerpt!=null)
                                        {{ Str::words($posts[0]->excerpt , 15, ' ...') }}
                                    @else
                                        {!! Str::words($posts[0]->description , 15, ' ...') !!}
                                    @endif
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($posts as $post)


                            <div class="col-lg-4">
                                <div class="antarbarta-card">
                                    <div class="antarbarta-image">
                                        <a href="{{route('single_news',$post->slug)}}">
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
                                        </a>
                                    </div>
                                    <div class="antarbarta-heading-cover">
                                    <h6 class="antarbartaTitle"><a href="{{route('single_news',$post->slug)}}"><span><i
                                                    class="fas fa-quote-left"></i>&nbsp;</span> {{$post->title}}</a></h6>
                                                    {{-- {{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}} --}}
                                    <p class="line-clamp-3">
                                        @if ($post->excerpt!=null)
                                            {{ Str::words($post->excerpt , 15, ' ...') }}
                                        @else
                                            {!! Str::words($post->description , 15, ' ...') !!}
                                        @endif
                                    </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="row">
                                @foreach ($posts->slice(4,6) as $post)
                                <div class="short-news col-6">
                                    <a href="{{route('single_news',$post->slug)}}" class="d-flex">
                                        <div class="short-news-image">
                                        <img src="{{ asset('uploads/featured_img/'.$post->featured_img) }}" class="img-fluid">
                                    </div>
                                        <div class="short-news-desc">
                                            <h6>{{ $post->title }}</h6>
                                            <div class="author-date d-flex align-items-center">
                                                <i class="far fa-clock f-20 mr-2"></i>
                                                {{-- <p>{{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}}</p> --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach


                            </div>

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
