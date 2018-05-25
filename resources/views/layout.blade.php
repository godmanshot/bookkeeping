<!DOCTYPE html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    @yield('meta-tags')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111546355-5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111546355-5');
    </script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" >
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/simple-line-icons.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="icon" href="{{ asset('assets/img/logo-icon_32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('assets/img/logo-icon_192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/logo-icon_180x180.png') }}">
    <meta property="og:title" content="Учебный центр &quot;Школа Учета&quot; курсы бухгалтера Алматы">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Школа учета, курсы бухгалтера Алматы">
    <meta name="twitter:title" content="Учебный центр &quot;Школа Учета&quot; курсы бухгалтера Алматы">
    <meta name="twitter:description" content="Школа учета, курсы бухгалтера Алматы">

        @yield('endhead')

  </head>
  <body>

        @yield('beginbody')

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="{{route('home')}}" class="navbar-brand"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="onepage-nev navbar-nav mr-auto w-100 justify-content-end clearfix">
              @foreach($menu as $point)
                <li class="nav-item">
                  <a class="nav-link" href="{{$point->ref}}">
                    {{$point->title}}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="onepage-nev mobile-menu">
          <li>
            <a href="{{route('home')}}">Главная</a>
          </li>
          <li>
            <a href="{{url('about')}}">О нас</a>
          </li>
          <li>
            <a href="{{url('shares')}}">Акции</a>
          </li>
          <li>
            <a href="{{url('services')}}">Курсы</a>
          </li>
          <li>
            <a href="{{url('posts')}}">Новости</a>
          </li>
          <li>
            <a href="{{url('offer')}}">Оферта</a>
          </li>
          <li>
            <a href="{{url('contacts')}}">Контакты</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
      <!-- Navbar End -->

      @yield('hero-area')

    </header>
    <!-- Header Area wrapper End -->

    
    @yield('content')


    <!-- Footer Section Start -->
    <footer class="footer-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-text text-center wow fadeInDown" data-wow-delay="0.3s">
              <ul class="social-icon">
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
              <p>{{$_settings->footer}}</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
        <i class="icon-arrow-up"></i>
    </a>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>  
    <script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
      
        @yield('endbody')
        
  </body>
</html>
