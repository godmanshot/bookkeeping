@extends('layout')

@section('title', 'Контакты')

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

@section('endhead')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection

@section('endbody')
    <script type="text/javascript">
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