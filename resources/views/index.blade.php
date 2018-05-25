@extends('layout')

@section('title', '"Школа учета" курсы бухгалтера в Алматы')

@section('endhead')
    <link rel="stylesheet" type="text/css" href="dist/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="dist/slick/slick-theme.css"/>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection

@section('endbody')
    <script type="text/javascript" src="dist/slick/slick.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.courses').slick({
            adaptiveHeight: true,
            arrows: false,
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
        });
    });
		
		
        ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [{{$_settings->coords}}],
                zoom: 17
            }); 
            
            myPlacemark = new ymaps.Placemark([{{$_settings->coords}}], {
                hintContent: 'Мы тут!',
                balloonContent: 'Мы тут'
            });
            
            myMap.geoObjects.add(myPlacemark);
        }
    
    </script>

    @if (session('message'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            swal("Спасибо {{ session('message') }}!", "Ваше сообщение отправлено.", "success");
        </script>
    @endif
@endsection



@section('hero-area')
<!-- Hero Area Start -->
<div id="hero-area" class="hero-area-bg">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="contents">
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s"><img src="{{ asset('assets/img/logo-icon_192x192.png') }}" alt=""></div>
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s">Учебный центр «Школа учета»</p>
          <p class="script-font wow fadeInUp" data-wow-delay="0.6s"></p>
          <ul class="social-icon wow fadeInUp" data-wow-delay="0.8s">
            @if(!empty((string)$_settings->instagram))
              <li>
                <a class="instagram" href="https://www.instagram.com/{{$_settings->instagram}}"><i class="icon-social-instagram"></i></a>
              </li>
            @endif
            @if(!empty((string)$_settings->facebook))
              <li>
                <a class="facebook" href="https://www.facebook.com/{{$_settings->facebook}}"><i class="icon-social-facebook"></i></a>
              </li>
            @endif
            @if(!empty((string)$_settings->vkontakte))
              <li>
                <a class="vkontakte" href="https://vk.com/{{$_settings->vkontakte}}"><i class="icon-social-vkontakte"></i></a>
              </li>
            @endif
            @if(!empty((string)$_settings->phonebtn))
              <li>
                <a class="phonebtn" href="tel:{{$_settings->phonebtn}}"><i class="icon-phone"></i></a>
              </li>
            @endif
          </ul>
          <div class="header-button wow fadeInUp" data-wow-delay="1s">
            <a href="{{url('about')}}" class="btn btn-common">О нас</a>
            <a href="{{route('services')}}" class="btn btn-common">Курсы</a>
          </div>
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
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="img-thumb wow fadeInLeft" data-wow-delay="0.3s">
          <img class="img-fluid" src="{{ asset('assets/img/about/about-1.jpg') }}" alt="">
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="profile-wrapper wow fadeInRight" data-wow-delay="0.3s">
          <h3>Добро пожаловать!</h3>
          <p style="margin-bottom: 20px;">Учебный центр «Школа учета» проводит множество курсов для качественной подготовки будущих бухгалтеров.</p>
          <h3>Преимущества:</h3>
          <ul>
            <li><i class="fa fa-check" aria-hidden="true"></i> Качественное и профессиональное обучение</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Организация бесплатного трудоустройства</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Доступные цены</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Обучение исключительно мини-группами</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> По окончанию курсов выдается сертификат</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Экспресс-курсы</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Section End -->


<section id="courses" class="section-padding">
  <div class="container">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">Курсы</h2>
    <div class="row">
      <div class="courses" style="width: 100%;">
        @foreach($services as $service)
          <div class="course">
            <a href="{{route('services.show', $service)}}">
              <img src="{{$service->imgMiniPath()}}" class="course__image">
              <p class="course__name">{{$service->name}}</p>
              <p class="course__price">{{$service->price()}}</p>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


<!-- Portfolio Section -->
<section id="portfolios" class="section-padding">
  <!-- Container Starts -->
  <div class="container">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">Галерея</h2>
    <div class="row">
      <!-- Portfolio Recent Projects -->
      <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development print">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-1.jpg') }}" alt="" />
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-1.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix design print">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-2.jpg') }}" alt=""/>
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-2.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-3.jpg') }}" alt=""/>
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-3.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development design">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-4.jpg') }}" alt="" />
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-4.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-5.jpg') }}" alt="" />
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-5.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix print design">
          <div class="portfolio-item">
            <div class="shot-item">
              <img src="{{ asset('assets/img/gallery/img-6.jpg') }}" alt=""/>
              <div class="overlay">
                <div class="icons">
                  <a class="lightbox preview" href="{{ asset('assets/img/gallery/img-6.jpg') }}">
                    <i class="icon-eye"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container Ends -->
</section>
<!-- Portfolio Section Ends -->
<!-- Resume Section Start -->
<div id="resume" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="education wow fadeInRight" data-wow-delay="0.3s">
          <ul class="timeline">
            <li>
              <i class="icon-book-open"></i>
              <h2 class="timelin-title">Новости</h2>
            </li>
            @foreach($posts as $post)
            <li>
              <div class="content-text">
                <h3 class="line-title"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                <span>{{ $post->createTime() }}</span>
                <p class="line-text">{{ $post->shortText(120) }}</p>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="header-button wow fadeInUp" data-wow-delay="1s">
          <a href="{{ route('posts') }}" class="btn btn-common" style="margin-top: 20px;">Больше новостей</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Resume Section End -->
<section id="contact" class="section-padding">
  <div class="contact-form">
    <div class="container">
      <div class="row contact-form-area wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
        <div class="col-md-6 col-lg-6 col-sm-12">
          <div class="contact-block">
            <h2>Свяжитесь с нами</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('contacts.send') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Сообщение" rows="5" name="body" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="submit-button">
                    <button class="btn btn-common disabled" id="submit" type="submit" style="pointer-events: all; cursor: pointer;">Отправить</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12">
          <div class="footer-right-area wow fadeIn animated" style="visibility: visible;">
            <h2>Контакты</h2>
            <div class="footer-right-contact">
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <p>{{$_settings->adress}}</p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <p><a href="mailto:{{$_settings->email}}">{{$_settings->email}}</a></p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="fa fa-phone"></i>
                </div>
                <p><a href="tel:{{$_settings->phone1}}">{{$_settings->phone1}}</a></p>
                <p><a href="tel:{{$_settings->phone2}}">{{$_settings->phone2}}</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div id="map" style="width:100%;height:400px;margin-top: 20px;"></div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection