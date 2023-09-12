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
    <!--PHOTO GALLERY-->
    @if($category!=null)

    <section class="photo-gallery-section">
        <div class="container-custom">
            <h2><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></h2>
            <div class="owl-carousel photo-gallery-carousel owl-theme">
                @foreach ($posts as $post)
                <div class="item">
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
                    <div class="photo-overlay"></div>
                    <div class="photo-caption">
                        <a href="{{route('single_news',$post->slug)}}">{{$post->title}}</a>
                    </div>
                </div>
                @endforeach

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
