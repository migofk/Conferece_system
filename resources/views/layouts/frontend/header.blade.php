@php
  $contact= App\contact::first();
@endphp
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <link href="{{asset('public/assets/frontend/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/frontend/assets/libs/pace/pace.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/frontend/assets/libs/animate-css/animate.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/frontend/assets/libs/iconmoon/style.css')}}" rel="stylesheet" />

        <!-- LESS FILE <link href="assets/css/style.less" rel="stylesheet/less" type="text/css" /> -->
                <!-- Extra CSS Libraries Start -->
                <link href="{{asset('public/assets/frontend/assets/libs/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{asset('public/assets/frontend/assets/libs/owl-carousel/owl.theme.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{asset('public/assets/frontend/assets/libs/owl-carousel/owl.transitions.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{asset('public/assets/frontend/assets/libs/jquery-magnific/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
                <link href="{{asset('public/assets/frontend/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="{{asset('public/images/logo.png')}}">
        <link rel="apple-touch-icon" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon.png')}}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-57x57.png')}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-72x72.png')}}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-76x76.png')}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-114x114.png')}}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-120x120.png')}}" />
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-144x144.png')}}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/assets/frontend/assets/img/apple-touch-icon-152x152.png')}}" />
    @yield('meta')
    </head>
<body class=""><div id="wrapper" dir="rtl">
  <header class="inverted">
       <div id="topbar">
         <div class="container-fluid">
           <div class="row" >
             <div class="col-sm-6 col-xs-6 text-left" >
             <span class="hidden-sm hidden-xs">
                </span>
               <span class="vertical-space"></span> {{$contact->phone1}}<i class="icon-phone4"></i>
             </div>

             <div class="col-sm-6 col-xs-6 text-right">
               	@guest
               <a href="{{ route('login') }}" class="login-button">تسجيل الدخول</a>
               <a href="{{ route('register') }}" class="signup-button">انشاء حساب</a>
               	@else
                  <a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();
    								" class="login-button">خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    										{{ csrf_field() }}
    								</form>

    						@endguest
               <div class="btn-group social-links hidden-sm hidden-xs">
                 <a href="{{$contact->facebook}}" class="btn btn-link"><i class="icon-facebook4"></i></a>
                 <a href="{{$contact->twitter}}" class="btn btn-link"><i class="icon-twitter4"></i></a>
               </div>

             </div>
           </div>
           <div class="top-divider"></div>
         </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
              <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                          <span class="icon-navicon"></span>
                      </button>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          <img  src="{{asset('images/logo.png')}}" data-dark-src="{{asset('images/logo.png')}}" alt="Wib Hub" class="logo">
                      </a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="main-navigation">
                      <ul class="nav navbar-nav navbar-right hidden-xs ">
                        <li><a href="{{url('/contact')}}">اتصل بنا</a></li>
                        <li><a href="{{url('/about')}}">من نحن</a></li>
                        @auth
                         <li><a href="{{url('company/'.auth::user()->id)}}">شركتى</a></li>
                        @endauth
                        <li><a href="{{url('/')}}" class="active">الرئيسية</a></li>
                      </ul>

                      <ul class="nav navbar-nav navbar-right visible-xs">
                        <li><a href="{{url('/')}}" class="active">الرئيسية</a></li>
                        @auth
                         <li><a href="{{url('company/'.auth::user()->id)}}">شركتى</a></li>
                        @endauth
                        <li><a href="{{url('/about')}}">من نحن</a></li>
                        <li><a href="{{url('/contact')}}">اتصل بنا</a></li>
                      </ul>
                  </div>
                  <!-- /.navbar-collapse -->
              </div>
              <!-- /.container-->
          </nav>

    </header>
