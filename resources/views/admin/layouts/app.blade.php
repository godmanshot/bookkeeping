<!DOCTYPE html>
<html>
  <head>

        @yield('beginhead')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$_settings->companyName}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{asset('admin-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{asset('admin-dist/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('admin-dist/css/custom.css')}}">
    <link rel="shortcut icon" href="{{asset('admin-dist/img/favicon.ico')}}">
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        @yield('endhead')

  </head>
  <body>
        
        @yield('beginbody')

    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="{{ route('admin.home') }}" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><strong>{{ $_settings->companyName }}</strong></div>
                  <div class="brand-text brand-small"><strong>{{ mb_substr($_settings->companyName, 0, 1) }}</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><form action="{{ route('logout') }}" method="POST">{{ csrf_field() }} <a href="javascript:;" onclick="parentNode.submit();" class="nav-link logout">Выйти <i class="fa fa-sign-out"></i></a></form></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="title">
              <h1 class="h4">{{Auth::user() ? Auth::user()->name : ''}}</h1>
            </div>
          </div>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.home') }}"><i class="icon-home"></i>Главная</a></li>
            <li><a href="{{ route('home') }}" target="_blank"><i class="fa fa-window-maximize"></i>Перейти на сайт</a></li>
          </ul><span class="heading">Настройки</span>
          <ul class="list-unstyled">
            <li> <a href="{{ route('admin.settings') }}"> <i class="icon-interface-windows"></i>Настройки сайта</a></li>
            {{-- <li> <a href="{{ route('admin.info_blocks') }}"> <i class="fa fa-bookmark-o"></i>Блоки</a></li> --}}
          </ul><span class="heading">Контент</span>
          <ul class="list-unstyled">
            <li><a href="{{ route('admin.services') }}"><i class="fa fa-bars"></i>Курсы</a></li>
            <li><a href="{{ route('admin.posts') }}"><i class="fa fa-bars"></i>Новости</a></li>
            <li><a href="{{ route('admin.pages') }}"><i class="fa fa-bars"></i>Страницы</a></li>
        </nav>
        <div class="content-inner">
          


            @yield('content')



        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{asset('admin-dist/js/tether.min.js')}}"></script>
    <script src="{{asset('admin-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-dist/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('admin-dist/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin-dist/js/front.js')}}"></script>
    
        @yield('endbody')

  </body>
</html>