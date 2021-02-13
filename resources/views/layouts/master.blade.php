<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Congologe') }}</title>

    <!-- Scripts -->
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('style')
	<!-- Favicon -->
    <link href="{{ asset('img/CLicon.png') }}" rel="shortcut icon"/>
    <!-- FAVICONS ICON ============================================= -->
	{{-- <link rel="icon" href="img/CLicon.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="img/CLicon.png" /> --}}


	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
     <!-- Styles -->
     @livewireStyles
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     {{-- <link rel="stylesheet" href="{{ asset('css/chat.css') }}"> --}}
    @yield('css')


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							+243 813 134 572
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							mupene7@gmail.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
                        </div>
						<div class="user-panel">
                            @guest
                                <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>Connexion</a>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}"><i class="fa fa-user-circle-o"></i>S'enregistrer</a>
                                @endif
                            @else
                            <li class="nav-item dropdown" style="list-style:none;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fa fa-user-circle-o" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    @if (Auth::user()->myUnread())
                                        <span class="badge badge-pill badge-danger">!</span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="background-color: rgb(20, 9, 58)" aria-labelledby="navbarDropdown">

                                    <a class="fa fa-comments pl-2" href="{{route('appChat')}}">&nbsp;
                                            Messages(s)
                                        @if (Auth::user()->myUnread())
                                            <span class="badge badge-pill badge-danger">
                                                {{Auth::user()->myUnread()}}
                                            </span>
                                        @endif
                                    </a>
                                    <a class="fa fa-bell" href="">&nbsp;Notification(s) <span class="badge badge-pill badge-danger">!</span></a>
                                    <a class="dropdown-item fa fa-sign-out" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnection') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="{{route('home')}}" class="site-logo"><img src="{{ asset('img/logo.png') }}" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu mb-2">
							<li><a href="{{route('home')}}">Acceuil</a></li>
							<li><a href="{{route('biens.list')}}">Proprietés</a></li>
							<li><a href="{{route('about')}}">A propos</a></li>
                        <li><a class="heart fa fa-plus text-center" href="{{ route('biens.addForm')}}">&nbsp;&#x1F4E2;</a></li>
                            @livewire('header')
						</ul>
					</div>
				</div>
			</div>
        </div>



        {{-- <!-- Start of Async Callbell Code -->
        <script>
            window.callbellSettings = {
            token: "UotFxEXERjAGZiUhS8gryv72"
            };
        </script>
        <script>
            (function(){var w=window;var ic=w.callbell;if(typeof ic==="function"){ic('reattach_activator');ic('update',callbellSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Callbell=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://dash.callbell.eu/include/'+window.callbellSettings.token+'.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
        </script>
        <!-- End of Async Callbell Code --> --}}




	</header>
	<!-- Header section end -->
    {{-- @include('partials/flash-message') --}}
    @yield('content')
	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="{{ asset('img/partner/1.png') }}" alt="">
				</a>
				<a href="#">
					<img src="{{ asset('img/partner/2.png') }}" alt="">
				</a>
				<a href="#">
					<img src="{{ asset('img/partner/3.png') }}" alt="">
				</a>
				<a href="#">
					<img src="{{ asset('img/partner/4.png') }}" alt="">
				</a>
				<a href="#">
					<img src="{{ asset('img/partner/5.png') }}" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->



	<!-- Footer section -->
	<footer class="footer-section set-bg" style="background-image: url('img/footer-bg.jpg');" data-setbg="{{ asset('img/footer-bg.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-6 col-lg-6 col-md-6 footer-widget">
					<img src="{{ asset('img/logo.png') }}" alt="">
					<p>Trouvez votre place avec notre style de vie local.</p>
					<div class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
				<div class="col-6 col-lg-6 col-md-6 footer-widget">
					<div class="contact-widget">
						<h5 class="fw-title">NOUS CONTACTER</h5>
						<p><i class="fa fa-map-marker"></i>11 tshopo/Lemba/Kinshasa/RDC</p>
						<p><i class="fa fa-phone"></i>(+243) 813 134 572</p>
						<p><i class="fa fa-envelope"></i>congologe@gmail.com</p>
						<p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
					</div>
				</div>
			</div>
			<div class="footer-bottom pt-0 mt-0">
				<div class="footer-nav">
					<ul>
						<li><a href="">Acceuil</a></li>
						<li><a href="">Propriétés</a></li>
						<li><a href="">Apropos</a></li>
					</ul>
				</div>
				<div class="copyright">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This back-end is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a target="_blank">Valeur Ajoutée</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
{{-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This front-end is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a target="_blank">Colorlib</a> --}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    @if (auth()->check())
    <script type="text/javascript">
        var authuser = @JSON(auth()->user())

        window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
            }
        };
    </script>
    @endif
    @livewireScripts
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>
</html>
