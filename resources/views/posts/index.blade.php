@extends('layout')


@section('title', 'Главная')


@section('hero-area')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="contents">
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s"></p>
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s">Новости</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Hero Area End -->
@endsection

@section('content')
<!-- About Section Start -->
<section id="about" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="row">
          @foreach($posts as $post)
            <div class="col-md-3">
              <div class="course">
                <a href="{{route('posts.show', $post)}}">
                  <img src="{{$post->imgMiniPath()}}" class="course__image">
                  <p class="course__name">{{$post->title}}</p>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->

@endsection