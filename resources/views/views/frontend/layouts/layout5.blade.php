<div>
    @php
    $category=App\Models\Category::where('id',$item->category_id)->first();
    if($category!=null){
        $sub_category=App\Models\SubCategory::where('parent_id',$category->id)->get();
    }
    @endphp
<!--PRADESH SAMACHAR-->
@if ($category!=null)


<section class="pradesh">
    <div class="container-custom">

        <div class="heading">
            <h1> <a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h1>
            <span class="view-all">
                <a href="{{route('news_category',$category->slug)}}">{{$all}}</a>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    @foreach ($sub_category as $key => $sub_cat)

                    @if ($sub_cat!=null)
                    <li class="nav-item">
                        <a class="nav-link @if($key == 0) active @endif" data-toggle="pill" href="#{{$sub_cat->name}}" role="tab" aria-controls="pills-one"
                            aria-selected="true">{{$sub_cat->name}}</a>
                    </li>
                    @endif
                    @endforeach

                </ul>
                <div class="tab-content mt-3">
                    @foreach ($sub_category as $key => $sub_cat)
                    @if ($sub_cat!=null)
                    @php
                        $sub_posts=App\Models\Post::where('subcategory',$sub_cat->id)->where(function($q){
                             $q->where('status', 'published')
                               ->orWhere('status', 'drafts');
                        })->latest()->get();
                        $post = App\Models\Post::where('category',$category->id)->first();

                    @endphp
                    <div @if($key == 0) class="tab-pane active show" @else class="tab-pane" @endif id="{{$sub_cat->name}}" role="tabpanel" aria-labelledby="all-tab">
                        <div class="pradesh-wrapper">
                            <div class="row">
                                @if ($sub_posts != null)
                                    <div class="col-12">
                                        <div class="pradesh-samachar-top">
                                            <div class="row">
                                                <div class="col-6">
                                                    @if ($post->video!=null)
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                        <video class="img-fluid pradesh-image" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                        </video>
                                                    @else

                                                    <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                    </video>

                                                    @endif
                                                @else


                                                <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                </video>
                                                @endif

                                            @elseif($post->video_url!=null)
                                            <iframe class="img-fluid pradesh-image" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                            @else
                                                @if (!empty($post->featured_img))
                                                    @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                        <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                    @endif
                                                @else
                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                @endif
                                            @endif
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mt-5"><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    <p class="mt-3">{!! $post->excerpt !!}</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count<5)
                                                    @if ($count==0 )
                                                    <div class="pradesh-samachar-top">
                                                        @if ($post->video!=null)
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                                    <video class="img-fluid pradesh-image" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                                    </video>
                                                                @else

                                                                <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                                </video>

                                                                @endif
                                                            @else


                                                            <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                            </video>
                                                            @endif

                                                        @elseif($post->video_url!=null)
                                                        <iframe class="img-fluid pradesh-image" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                        @else
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                                @else
                                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                                @endif
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
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
                                                                            <p>
                                                                                {{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count>4 && $count <10)
                                                    @if ($count==5 )
                                                    <div class="pradesh-samachar-top">
                                                        @if ($post->video!=null)
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                                    <video class="img-fluid pradesh-image" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                                    </video>
                                                                @else

                                                                <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                                </video>

                                                                @endif
                                                            @else


                                                            <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                            </video>
                                                            @endif

                                                        @elseif($post->video_url!=null)
                                                        <iframe class="img-fluid pradesh-image" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                        @else
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                                @else
                                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                                @endif
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
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
                                                                            <p>
                                                                                {{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="pradesh-samachar">
                                            @foreach ($sub_posts as $count => $post)
                                                @if ($count>9 && $count <15)
                                                    @if ($count==10 )
                                                    <div class="pradesh-samachar-top">
                                                        @if ($post->video!=null)
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))

                                                                    <video class="img-fluid pradesh-image" controls poster="{{asset('uploads/featured_img/'.$post->featured_img)}}" src="{!! $post->video !!}">
                                                                    </video>
                                                                @else

                                                                <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                                </video>

                                                                @endif
                                                            @else


                                                            <video class="img-fluid pradesh-image" controls poster="{{asset('placeholder.jpg')}}" src="{!! $post->video !!}">
                                                            </video>
                                                            @endif

                                                        @elseif($post->video_url!=null)
                                                        <iframe class="img-fluid pradesh-image" src="{{str_replace('watch?v=', 'embed/',$post->video_url) }}" title="{{$post->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                                        @else
                                                            @if (!empty($post->featured_img))
                                                                @if(file_exists('uploads/featured_img/'.$post->featured_img))
                                                                    <img src="{{asset('uploads/featured_img/'.$post->featured_img)}}" class="img-fluid pradesh-image">
                                                                @else
                                                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                                @endif
                                                            @else
                                                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid pradesh-image">
                                                            @endif
                                                        @endif
                                                        <h5><a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a></h5>
                                                    </div>
                                                    @else
                                                    <div class="news-short-inner-right">
                                                        <div class="short-news-div pradesh-small">
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
                                                                            <p>
                                                                                {{ $nepaliDate }} {{ ent_to_nepali_num_convert($post->created_at->format('H:i A'))}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endif
</div>
