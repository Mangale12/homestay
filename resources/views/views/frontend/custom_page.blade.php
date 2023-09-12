@extends('frontend.layouts.app')
@section('title',$page->name)

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-container">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">गृहृषठ</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">{{$page->name}}</li>
        </ol>
    </div>
</nav>
<section class="about">
    <div class="container-custom">
        <h2>{{$page->name}}</h2>
        {!! $page->content !!}
    </div>
</section>
@endsection