@extends('layout')


@section('title', $post->title)


@section('hero-area')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg" style="background: url({{$post->imgPath()}}) no-repeat;background-size: cover;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="contents">
          <h5 class="head-title wow fadeInUp" data-wow-delay="0.4s">Новость</h5>
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s">{{$post->title}}</p>
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
      <div class="col-md-12 col-sm-12 no-format">
        {!!$post->body!!}
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->

@endsection