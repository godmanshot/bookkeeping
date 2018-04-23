@extends('layout')


@section('title', 'Курсы')


@section('hero-area')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="contents">
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s"></p>
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s">Курсы</div>
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
          @foreach($services as $service)
            <div class="col-md-3">
              <div class="course" style="margin: 15px 0;">
                <a href="{{route('services.show', $service)}}">
                  <img src="{{$service->imgMiniPath()}}" class="course__image">
                  <p class="course__name">{{$service->name}}</p>
                  <p class="course__price">{{$service->price()}}</p>
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