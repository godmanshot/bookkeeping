@extends('layout')


@section('title', 'Галерея')


@section('hero-area')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="contents">
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s"></p>
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s">Галерея</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Hero Area End -->
@endsection

@section('content')

<!-- Portfolio Section -->
<section id="portfolios" class="section-padding">
  <!-- Container Starts -->
  <div class="container">
    <div class="row">
      <!-- Portfolio Recent Projects -->
      <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
        @foreach($photos as $photo)
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="{{ $photo->imgMiniPath() }}" alt="" />
                <div class="overlay">
                  <div class="icons">
                    <a class="lightbox preview" href="{{ $photo->imgPath() }}">
                      <i class="icon-eye"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Container Ends -->
</section>
@endsection