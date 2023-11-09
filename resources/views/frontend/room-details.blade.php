@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<style>
    #social-links ul li{
        display: inline-block;

    }
    #social-links ul li a{
        padding: 20px;
        margin: 2px;
        font-size: 30px;
        color: rgb(46, 41, 114);
        background-color: #ccc;
    }
</style>
       <!-- Breadcrumbs -->
       <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">{{ $room->type }}</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="rooms.html">Rooms</a></li>
                    <li class="active">{{ $room->type }}</li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
        </div>
    </section>
    <!-- Single Project-->
    <section class="section section-sm section-first bg-default">
        <div class="container">
            <div class="row row-50 justify-content-center align-items-xl-center">
                <div class="col-md-10 col-lg-6 col-xl-7">
                    <div class="offset-right-xl-15">
                        <!-- Owl Carousel-->
                        <div class="owl-carousel owl-dots-white" data-items="1" data-dots="true" data-autoplay="true" data-animation-in="fadeIn" data-animation-out="fadeOut">
                            @foreach ($room->image as $image)
                            <img src="{{ asset('public/uploads/room/'.$image->image) }}" alt="" width="655" height="496" />
                            @endforeach
                            {{-- <img src="{{ asset('public/uploads/room/'.$room->image) }}" alt="" width="655" height="496" />
                            <img src="{{ asset('public/uploads/room/'.$room->image) }}" alt="" width="655" height="496"/> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5">
                    <div class="single-project">

                        <h4>{{ $room->type  }}</h4>
                        <p class="text-gray-500">{!! $room->description !!}</p>
                        <div class="divider divider-30"></div>
                        {{-- <ul class="list list-description d-inline-block d-md-block">
                            <li><span>Services:</span><span>24h room service and express laundry service</span></li>
                            <li><span>Equipment:</span><span>Air conditioning, high speed Wi-Fi, thermostat</span></li>
                            <li><span>Other:</span><span>Flat-screen TV, large safe, minibar, city view</span></li>
                            <li><span>Room Rate:</span><span>from $380/night</span></li>
                        </ul> --}}
                        <div class="divider divider-30"></div>
                        <div class="group-md group-middle justify-content-sm-start"><a href="{{ route('frontend.book') }}" class="btn btn-primary">Book Now</a> </span>
                            {{-- <div>
                                <ul class="list-inline list-inline-sm social-list">
                                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            {!! $shareButtons !!}
        </div>
    </section>
<div class="text-center">
    <button class="btn btn-primary">Reviews</button>

</div>

<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:300,400);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  transition: all 0.2s ease;
}

body, html {
  height: 100%;
  width: 100%;
}

body {
  font-family: "Lato", sans-serif;
  font-size: 1rem;
  color: #333;
  background-color: #f4f4f4;
}

.user_avatar {
  width: 65px;
  height: 65px;
  display: inline-block;
  vertical-align: middle;
}
.user_avatar img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
}

.comment_block {
  width: 65%;
  height: 100%;
  margin: 0 auto;
  padding: 10px;
}
.comment_block .create_new_comment {
  width: 100%;
  padding: 20px 0;
}
.comment_block .create_new_comment .input_comment {
  display: inline-block;
  vertical-align: middle;
  margin-left: 10px;
  width: calc(100% - 75px);
}
.comment_block .create_new_comment .input_comment input[type=text] {
  width: 100%;
  font-family: "Lato", sans-serif;
  font-weight: 300;
  font-size: 1.3rem;
  padding: 10px;
  border: none;
  border-bottom: 2px solid #f2f2f2;
}
.comment_block .create_new_comment .input_comment input[type=text]:focus {
  outline: none;
  border-bottom: 2px solid #e6e6e6;
}
.comment_block .new_comment {
  width: 100%;
  height: auto;
  padding: 20px 0;
  border-top: 1px solid #e6e6e6;
}
.comment_block .new_comment .user_comment {
  list-style-type: none;
}
.comment_block .new_comment .comment_body {
  display: inline-block;
  vertical-align: middle;
  width: calc(100% - 75px);
  min-height: 65px;
  margin-left: 10px;
  padding: 5px 10px;
  font-size: 0.9rem;
  color: #555;
  background-color: #FFF;
  border-bottom: 2px solid #f2f2f2;
}
.comment_block .new_comment .comment_body .replied_to {
  margin: 5px 0px;
  background-color: #fafafa;
  border-bottom: 2px solid #f2f2f2;
  border-radius: 5px;
}
.comment_block .new_comment .comment_body .replied_to p {
  padding: 5px;
}
.comment_block .new_comment .comment_body .replied_to span {
  color: #6495ED;
  margin-right: 2px;
}
.comment_block .new_comment .comment_toolbar {
  width: 100%;
}
.comment_block .new_comment .comment_toolbar ul {
  list-style-type: none;
  padding-left: 75px;
  font-size: 0;
}
.comment_block .new_comment .comment_toolbar ul li {
  display: inline-block;
  padding: 5px;
  font-size: 0.7rem;
  color: #d9d9d9;
}
.comment_block .new_comment .comment_toolbar ul li:hover {
  cursor: pointer;
}
.comment_block .new_comment .comment_toolbar .comment_details {
  display: inline-block;
  vertical-align: middle;
  width: 70%;
  text-align: left;
}
.comment_block .new_comment .comment_toolbar .comment_tools {
  display: inline-block;
  vertical-align: middle;
  width: 30%;
  text-align: right;
}
.comment_block .new_comment .comment_toolbar .comment_tools li:hover {
  color: #CCC;
}
.comment_block .new_comment .user:hover {
  color: #6495ED;
  text-decoration: underline;
}
.comment_block .new_comment .love:hover {
  color: #FF6347;
}
</style>
<div class="comment_block">
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
     <div class="create_new_comment">
        <div class="input_comment">

         <input class="d-inline" type="text" placeholder="Join the conversation.." name="reviews" required  ><button class="btn btn-secondary d-inline">submit</button>
         </div>

     </div>
    </form>

     <!-- new comment -->
     <div class="new_comment">

        <!-- build comment -->
         <ul class="user_comment">
@foreach($reviews as $review)

             <!-- current #{user} avatar -->

             <div class="comment_body">
                <p><span class="user fw-bold" style="font-weight: bold">{{ $review->user->name }}</span> : {{ $review->message }} </p>
            </div>

             @endforeach

             <!-- comments toolbar -->
             {{-- <div class="comment_toolbar">

                 <!-- inc. date and time -->
                 <div class="comment_details">
                     <ul>
                         <li><i class="fa fa-clock-o"></i> 13:94</li>
                         <li><i class="fa fa-calendar"></i> 04/01/2015</li>
                         <li><i class="fa fa-pencil"></i> <span class="user">John Smith</span></li>
                     </ul>
                 </div><!-- inc. share/reply and love -->
                 <div class="comment_tools">
                     <ul>
                         <li><i class="fa fa-share-alt"></i></li>
                         <li><i class="fa fa-reply"></i></li>
                         <li><i class="fa fa-heart love"></i></li>
                     </ul>
                 </div>

             </div> --}}

             <!-- start user replies -->


             <!-- start user replies -->


         </ul>

     </div>

<!-- partial -->
    <!-- Project Links-->
    <section class="section section-sm section-last bg-default">
        <div class="container">
            <div class="project-navigation">
                <div class="row row-30">
                    <div class="col-sm-6">
                        <div class="project-minimal">
                            <div class="unit unit-spacing-lg align-items-center flex-column flex-lg-row text-lg-left">
                                <div class="unit-left"><a class="project-minimal-figure" href="#"><img src="images/room-minimal-1-168x139.jpg" alt="" width="168" height="139"/></a></div>
                                <div class="unit-body">
                                    <p class="project-minimal-text">from $530/night</p>
                                    <div class="project-minimal-title"><a href="#">Family Room</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="project-minimal">
                            <div class="unit unit-spacing-lg align-items-center flex-column flex-lg-row-reverse text-lg-right">
                                <div class="unit-left"><a class="project-minimal-figure" href="#"><img src="images/room-minimal-2-168x139.jpg" alt="" width="168" height="139"/></a></div>
                                <div class="unit-body">
                                    <p class="project-minimal-text">from $250/night</p>
                                    <div class="project-minimal-title"><a href="#">Twin Room</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a class="project-navigation-arrow-prev" href="#"></a><a class="project-navigation-arrow-next" href="#"></a>
            </div>
        </div>
    </section>
@endsection
