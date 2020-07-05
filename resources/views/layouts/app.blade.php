<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="194x194" href="/images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,700,900" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="description" content="I'm so called an engineer, a 'cartoonist' once in a while, I learn everything I can about what interests me and I truly believe hard work beats talent.">
    <meta name="keywords" content="alex muchiri, muchiri alex, web development, app development, micro controllers, community service, ruby on rails, RoR, Alex Muchiri, Lugayo, Juzwa kenya, Engage Jamii Initiatives, TUK, ISACA, CloudFactory, ">
    <meta name="author" content="Alex Muchiri">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header id="main_navigation" class="clearfix">
        <a href="/" class="logo">Aléx Muchiri</a>

        <a href="#" class="menu"><i class="fa fa-bars"></i></a>
        <nav id="main_nav">
            <a href="/posts">Articles</a>
            <a href="/projects">Projects</a>
            <a href="/contact">Contact</a>

            <!-- Authentication Links -->
            @guest
                <!--<a href="{{ route('login') }}">{{ __('Login') }}</a> 
                <a href="{{ route('register') }}">{{ __('Register') }}</a> -->
            @else
                
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </header>

    <div id="notice_wrapper">
        @include('inc.message')
    </div>
    @yield('content')
    <!-- Footer -->
    <footer id="main_footer">
        <div class="footer-info">
            <div class="container">
                <div class="col-md-4 info-footer">
                    <h3>Contact Information</h3>
                        <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Nairobi, Kenya </p>
                        <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:hey@muchirialex.me?subject=Say%20Hello" target="_blank">hey@muchirialex.me</a> </p>
                        <p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>+254711342261</p>
                        <p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="/">muchirialex.me</a> </p>
                </div>
                <div class="col-md-4 ws-footer">
                    <h2>About</h2>
                    <p>Get product updates, launch info, and special deals by signing up for my product newsletter. <br> <a class="video-subscribe-link" href="#">Join <span class="video-subscribe-link-bold">51,000+</span>&nbsp;friends who have already subscribed to my YouTube channel &rarr;</a></p>
                </div>
                <div class="col-md-4 footer-ws">
                    <h3>Newsletter</h3>
                    <p>Want to hear when I release new stuff?</p>
                    <form action="#" method="post">
                        <input type="email" name="Email" placeholder="Email" required="">
                        <input type="submit" value="Notify Me!">
                    </form>
                </div>
            </div>
        </div>
    <!-- copyright -->
    <div class="copyright">
        <div class="copyright-list">
            <ul>
                <li><a href="https://www.facebook.com/muchirialex.me" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/alex_muchiri" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://github.com/alex-muchiri" target="_blank"><i class="fa fa-github"></i></a></li>
                <li><a href="https://www.instagram.com/muchiri_alex/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="copyright-info">
            <p>&copy; 2018 Muchiri Alex. All Rights Reserved.</p>
        </div>
    </div>
    <!-- //copyright -->
    </footer>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

    <!-- //JavaScript -->
	<script src="js/jquery/jquery-3.2.1.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
</body>
</html>
