@if(json_decode($partner->before_footer)->img != null)
<div class="money-image mb-3">
    <div class="container-custom">
    @if (!empty($partner->before_footer))
    <a href="{{json_decode($partner->before_footer)->url}}" target="_blank">
        @if(file_exists('uploads/partners/before_footer/'.json_decode($partner->before_footer)->img))
            <img src="{{asset('uploads/partners/before_footer/'.json_decode($partner->before_footer)->img)}}" class="img-fluid">
        @endif
    </a>
    @endif
    </div>
</div>
@endif
<footer class="main-footer">

    <div class="container-fluid">
        <div class="footer-desc">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card ml-5">
                        <div class="card-body">
                            @php
                               $menu =  App\Models\Category::rightJoin('posts','categories.id','=','posts.category')
                                        ->select('categories.name','categories.id','categories.slug')->where('posts.trending','1')->groupBy('categories.id')
                                        ->get();;
                            //    $posts = App\Models\Post::where('trending','1')->get();
                            //     $category = App\Models\Category::whereHas('posts',function($q){
                            //         where('trending','1');
                            //     })->get();

                            @endphp
                          <h5 class="card-title">ट्रेन्डिङ्ग क्यटेगोरी</h5>
                          @foreach ($menu->slice(0,5) as $category)
                            {{-- {{ dd($category->nav->menu) }} --}}
                                <div><a href="{{ route('news_category',$category->slug) }}" class="card-text">{{ $category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            @php
                               $menu =  App\Models\Menu::rightJoin('categories','categories.id','=','menus.menu')
                                        ->select('categories.name','categories.id','categories.slug')
                                        ->where('menus.menu_type', '=', null)
                                        ->get();

                            @endphp
                          <h5 class="card-title">समाचार</h5>
                          @foreach ($menu as $category)

                            {{-- {{ dd($category->nav->menu) }} --}}
                                <div><a href="{{ route('news_category',$category->slug) }}" class="card-text">{{ $category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            @php
                            //    $menu =  App\Models\Category::rightJoin('posts','categories.id','=','posts.category')
                            //             ->select('categories.name','categories.id')->where('posts.featured','1')
                            //             ->get()->unique('categories.name');
                            //    $posts = App\Models\Post::where('trending','1')->get();
                            //     $category = App\Models\Category::whereHas($posts,function($q){
                            //         where('trending','1');
                            //     })->get();
                                $menu =  App\Models\Category::rightJoin('posts','categories.id','=','posts.category')
                                        ->select('categories.name','categories.id','categories.slug')->where('posts.featured','1')->groupBy('categories.id')
                                        ->get();;
                                // $menu = App\Models\Category::where('status','1')->latest()->take(5)->get();
                            @endphp
                          <h5 class="card-title">फिचर क्यटेगोरी</h5>
                          @foreach ($menu->slice(0,6) as $category)
                            {{-- {{ dd($category->nav->menu) }} --}}
                                <div><a href="{{ route('news_category',$category->slug) }}" class="card-text">{{ $category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            @php
                               $menu =  App\Models\Category::where('name','आर्थिक')->first();
                            //    $posts = App\Models\Post::where('trending','1')->get();
                            //     $category = App\Models\Category::whereHas('posts',function($q){
                            //         where('trending','1');
                            //     })->get();

                            @endphp
                          <h5 class="card-title">आर्थिक </h5>
                          @foreach ($menu->subCategory->slice(0,5) as $sub_category)
                            {{-- {{ dd($category->nav->menu) }} --}}
                                <div><a href="{{ route('news_category',$category->slug) }}" class="card-text">{{ $sub_category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            @php
                               $menu =  App\Models\Category::where('name','प्रदेश')->first();
                            //    $posts = App\Models\Post::where('trending','1')->get();
                            //     $category = App\Models\Category::whereHas('posts',function($q){
                            //         where('trending','1');
                            //     })->get();

                            @endphp
                          <h5 class="card-title">प्रदेश  </h5>
                          @foreach ($menu->subCategory->slice(0,5) as $sub_category)
                            {{-- {{ dd($category->nav->menu) }} --}}
                                <div><a href="{{route('sub_category',['category'=>$menu->slug,'id'=>$sub_category->slug])}}" class="card-text">{{ $sub_category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div>

                {{-- <div class="col-lg-2 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @php
                               $menu =  App\Models\Category::where();


                            @endphp
                          <h5 class="card-title">फिचर</h5>
                          @foreach ($menu as $category)
                                <div><a href="#" class="card-text">{{ $category->name }}</a></div>


                          @endforeach

                        </div>
                      </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="footer-img">
                        @if (!empty($setting->logo))
                            @if(file_exists('admin/image/'.$setting->logo))
                                <img src="{{asset('admin/image/'.$setting->logo)}}" class="img-fluid">
                            @else
                                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                        @endif
                    </div>
                    <div class="site-detail">
                        <ul>
                            <li><span>
प्रमुख सम्पादक:</span>{{$setting->editor_name}}</li>
                            <li><span>दर्ता न.:</span>{{$setting->registration_no}} </li>
                            <li><span>कम्पनीको नाम: </span>{{$setting->title}}</li>
                            <li><span>सम्पर्क न.:</span>{{$setting->contact}} </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-links">
                        <h5>जरुरि लिंकहरु</h5>
                    </div>
                    <div class="links-listing">
                        <ul>
                            <li><a href="{{route('home')}}">गृहपृष्ठ
</a> </li>
                            @foreach (App\Models\Page::all() as $key => $link)
                            <li><a href="{{ route('custom_page',['slug' => $link->slug]) }}">{{$link->name}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-links">
                        <h5>न्युज अपडेट </h5>
                    </div>
                    <div class="site-detail">
                        <div class="links-listing">
                            @php
                                $categories=App\Models\Category::where('status',1)->take(6)->get();
                            @endphp
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{route('news_category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-links">
                        <h5>फेसबुक फोलो गर्नुहोस </h5>
                    </div>
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthecorporate1&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div> --}}
            </div>
        </div>
    </div>
    @php
        $social=App\Models\SocialSetting::first();
    @endphp
    <div class="copyright" style="background: rgba(34,96,191,.14);">
        <div class="copyright-part align-items-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <div class="footer-img">
                            @if (!empty($setting->logo))
                                @if(file_exists('admin/image/'.$setting->logo))
                                    <img src="{{asset('admin/image/'.$setting->logo)}}" class="img-fluid">
                                @else
                                    <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                                @endif
                            @else
                                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo" class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <span>अध्यक्ष तथा प्रबन्ध निर्देशक: <br> <span class="fw-bold">{{$setting->chairman}}</span></span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <span>प्रधान सम्पादकः <br><span class="font-weight-bold fs-2">{{$setting->editor_name}}</span></span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <span>सूचना विभाग दर्ता नं.: <br><span class="font-weight-bold fs-2">{{$setting->registration_no}}</span></h1></span>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-4">
                        <span>{{$setting->contact}}</span><br>
                        <span>{{$setting->email}}</span>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="social-buttons">
                    <a href="{{$social->facebook}}" target="_blank" class="social-buttons__button social-button social-button--facebook"
                        aria-label="Facebook">
                        <span class="social-button__inner">
                            <i class="fab fa-facebook-f" style="color:blue;"></i>
                        </span>
                    </a>
                    <a href="{{$social->youtube}}" target="_blank" class="social-buttons__button social-button social-button--youtube"
                        aria-label="Youtube">
                        <span class="social-button__inner">
                            <i class="fab fa-youtube" style="color:red;"></i>
                        </span>
                    </a>
                    <a href="{{$social->instagram}}" target="_blank" class="social-buttons__button social-button social-button--instagram"
                        aria-label="Instagram">
                        <span class="social-button__inner">
                            <i class="fab fa-instagram" style="color: #E4405F;"></i>
                        </span>
                    </a>
                    <a href="{{$social->twitter}}" target="_blank" class="social-buttons__button social-button social-button--tiktok"
                        aria-label="Instagram">
                        <span class="social-button__inner">
                            <i class="fab fa-tiktok" style="color: #000000"></i>
                        </span>
                    </a>
                </div>
                </div>
            </div>

            {{-- </div> --}}
            {{-- <div class="col-lg-4 col-md-12">
            <p>Designed & Developed By <a href="https://itarrow.com" target="_blank">IT Arrow Pvt. Ltd.</a></p>
            </div> --}}
        </div>

    </div>
    <div class="scrollTop float-right">
        <i class=" fas fa-chevron-up" onclick="topFunction()" id="myBtn"></i>
    </div>
</footer>
