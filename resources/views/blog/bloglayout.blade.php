	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ url('blogsite/img/fav.png') }}">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>CBS</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ url('blogsite/css/linearicons.css') }}">
			<link rel="stylesheet" href="{{ url('blogsite/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ url('blogsite/css/bootstrap.css') }}">
			<link rel="stylesheet" href="{{ url('blogsite/css/magnific-popup.css') }}">				
			<link rel="stylesheet" href="{{ url('blogsite/css/nice-select.css') }}">							
			<link rel="stylesheet" href="{{ url('blogsite/css/animate.min.css') }}">
			<link rel="stylesheet" href="{{ url('blogsite/css/owl.carousel.css') }}">			
			<link rel="stylesheet" href="{{ url('blogsite/css/jquery-ui.css') }}">			
			<link rel="stylesheet" href="{{ url('blogsite/css/main.css') }}">
		</head>
		<body>	
		  <header id="header">
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="{{ url('/') }}"><h2 style="color: #8490ff">CODAL BLOG SITE</h2></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="{{ url('/') }}" style="font-size: 25px;">Home</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->

			<!-- Start top-category-widget Area -->
			<section class="top-category-widget-area pt-50 pb-60">
					
			</section>
			<!-- End top-category-widget Area -->
			
			@yield('content')
            

			<script src="{{ url('blogsite/js/vendor/jquery-2.2.4.min.js') }}"></script>
			<script src="{{ url('blogsite/js/popper.min.js') }}"></script>
			<script src="{{ url('blogsite/js/vendor/bootstrap.min.js') }}"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>			
  			<script src="{{ url('blogsite/js/easing.min.js') }}"></script>			
			<script src="{{ url('blogsite/js/hoverIntent.js') }}"></script>
			<script src="{{ url('blogsite/js/superfish.min.js') }}"></script>	
			<script src="{{ url('blogsite/js/jquery.ajaxchimp.min.js') }}"></script>
			<script src="{{ url('blogsite/js/jquery.magnific-popup.min.js') }}"></script>	
    		<script src="{{ url('blogsite/js/jquery.tabs.min.js') }}"></script>						
			<script src="{{ url('blogsite/js/jquery.nice-select.min.js') }}"></script>	
            <script src="{{ url('blogsite/js/isotope.pkgd.min.js') }}"></script>			
			<script src="{{ url('blogsite/js/waypoints.min.js') }}"></script>
			<script src="{{ url('blogsite/js/jquery.counterup.min.js') }}"></script>
			<script src="{{ url('blogsite/js/simple-skillbar.js') }}"></script>							
			<script src="{{ url('blogsite/js/owl.carousel.min.js') }}"></script>							
			<script src="{{ url('blogsite/js/mail-script.js') }}"></script>	
			<script src="{{ url('blogsite/js/main.js') }}"></script>	


		</body>
	</html>