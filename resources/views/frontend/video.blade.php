@extends('frontend.layouts.app')
@section('content')
@include('frontend.includes.nav')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');


.container{
   max-width: 1200px;
   margin:100px auto;
   display: flex;
   flex-wrap: wrap;
   align-items: flex-start;
   gap:20px;
}

.container .main-video-container{
   flex:1 1 700px;
   border-radius: 5px;
   box-shadow: 0 5px 15px rgba(0,0,0,.1);
   background-color: #fff;
   padding:15px;
}

.container .main-video-container .main-video{
   margin-bottom: 7px;
   border-radius: 5px;
   width: 100%;
}

.container .main-video-container .main-vid-title{
   font-size: 20px;
   color:#444;
}

.container .video-list-container{
   flex:1 1 350px;
   height: 485px;
   overflow-y: scroll;
   border-radius: 5px;
   box-shadow: 0 5px 15px rgba(0,0,0,.1);
   background-color: #fff;
   padding:15px;
}

.container .video-list-container::-webkit-scrollbar{
   width: 10px;
}

.container .video-list-container::-webkit-scrollbar-track{
   background-color: #fff;
   border-radius: 5px;
}

.container .video-list-container::-webkit-scrollbar-thumb{
   background-color: #444;
   border-radius: 5px;
}

.container .video-list-container .list{
   display: flex;
   align-items: center;
   gap:15px;
   padding:10px;
   background-color: #eee;
   cursor: pointer;
   border-radius: 5px;
   margin-bottom: 10px;
}

.container .video-list-container .list:last-child{
   margin-bottom: 0;
}

.container .video-list-container .list.active{
   background-color: #444;
}

.container .video-list-container .list.active .list-title{
   color:#fff;
}

.container .video-list-container .list .list-video{
   width: 100px;
   border-radius: 5px;
}

.container .video-list-container .list .list-title{
   font-size: 17px;
   color:#444;
}















@media (max-width:1200px){

   .container{
      margin:0;
   }

}

@media (max-width:450px){

   .container .main-video-container .main-vid-title{
      font-size: 15px;
      text-align: center;
   }

   .container .video-list-container .list{
      flex-flow: column;
      gap:10px;
   }

   .container .video-list-container .list .list-video{
      width: 100%;
   }

   .container .video-list-container .list .list-title{
      font-size: 15px;
      text-align: center;
   }

}
</style>
<div class="container">

    <div class="main-video-container">
       <video src="{{ asset('public/video/'.$videos[0]->video) }}" loop controls class="main-video" height="400"></video>
       <h3 class="main-vid-title title"><b>{{ $videos[0]->name }}</b></h3>
       <p id="description">{!! $videos[0]->description !!}</p>
    </div>

    <div class="video-list-container">
        @foreach ($videos as $video)
        <div class="list active" data-description="{{ $video->description }}" data-title="{{ $video->name }}">
            <video src="{{ asset('public/video/'.$video->video) }}" class="list-video" height="100" width="100"></video>
            <h3 class="list-title">house flood animation</h3>
         </div>
        @endforeach



    </div>

 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    let videoList = document.querySelectorAll('.video-list-container .list');

videoList.forEach(vid =>{
   vid.onclick = () =>{
      videoList.forEach(remove =>{remove.classList.remove('active')});
      vid.classList.add('active');
      let src = vid.querySelector('.list-video').src;
      let title = vid.querySelector('.list-title').innerHTML;
      document.querySelector('.main-video-container .main-video').src = src;
      document.querySelector('.main-video-container .main-video').play();
      document.querySelector('.main-video-container .main-vid-title').innerHTML = title;
   };
});
$(document).ready(function(){
    $('.list').on('click', function(){
        var description = $(this).data('description');
        var title = $(this).data('title');
        $('#description').html(description);
        $('.title').html(title);
    });

});

</script>
@endsection
