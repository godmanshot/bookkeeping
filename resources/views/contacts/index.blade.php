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
          <div class="head-title wow fadeInUp" data-wow-delay="0.4s">{{$page->title}}</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Hero Area End -->
@endsection

@section('content')
<section id="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 no-format">
        {!! $page->content !!}
      </div>
    </div>
  </div>
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
          <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0b4dabb49e1bd6b2f5a1a1476400563a7e21ad7ea17083a2157fdead1bc490ba&amp;source=constructor" width="100%" height="400" frameborder="0" style="margin-top: 20px;"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection