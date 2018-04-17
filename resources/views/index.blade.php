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
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s"><img src="{{ asset('assets/img/logo-icon_192x192.png') }}" alt=""></div>
          <p class="script-font wow fadeInUp" data-wow-delay="0.2s">Учебный центр «Школа учета»</p>
          <p class="script-font wow fadeInUp" data-wow-delay="0.6s"></p>
          <ul class="social-icon wow fadeInUp" data-wow-delay="0.8s">
            <li>
              <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
            </li>
          </ul>
          <div class="header-button wow fadeInUp" data-wow-delay="1s">
            <a href="#" class="btn btn-common">О нас</a>
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
<!-- Portfolio Section -->
<section id="portfolios" class="section-padding">
  <!-- Container Starts -->
  <div class="container">
    <h2 class="section-title wow flipInX" data-wow-delay="0.4s">Гарелея</h2>
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
                <h3 class="line-title">{{ $post->title }}</h3>
                <span>{{ $post->createTime() }}</span>
                <p class="line-text">{{ $post->shortText(300) }}</p>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
        <div class="header-button wow fadeInUp" data-wow-delay="1s">
          <a href="#" class="btn btn-common" style="margin-top: 20px;">Больше новостей</a>
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
            <form id="contactForm" novalidate="true">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="Почта" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Сообщение" rows="5" required></textarea>
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
                <p>г. Алматы, Богенбай батыра 132/ул.Панфилова 110, Блок 2, офис 208</p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <p><a href="mailto:info@accsсhool.kz">info@accsсhool.kz</a></p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="fa fa-phone"></i>
                </div>
                <p><a href="#">+7 (727) 327 16 20</a></p>
                <p><a href="#">+7 (777) 212 16 20</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0b4dabb49e1bd6b2f5a1a1476400563a7e21ad7ea17083a2157fdead1bc490ba&amp;source=constructor" width="100%" height="400" frameborder="0" style="margin-top: 20px;"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection