	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
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
			<link rel="stylesheet" href="{{ url('blogsite/css/main.css') }}">

			<section class="post-content-area">
				<div class="container">
					<div class="row" style="font-size: 16px;">
						<div class="col-lg-12 posts-list">
						@foreach($datas as $d)
							<div class="single-post row" style=" margin-bottom: 20px;">
								<div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6">
											{{ $d->author }} &nbsp;&nbsp; <span class="lnr lnr-user"></span>
										</p>
										<p class="date col-lg-12 col-md-12 col-6">
											{{ $d->createdate }} &nbsp;&nbsp; <span class="lnr lnr-calendar-full"></span>
										</p>
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $d->comments }} Comments &nbsp;&nbsp; <span class="lnr lnr-bubble"></span>
										</p>						
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $d->reply }} Replys &nbsp;&nbsp; <span class="lnr lnr-bubble"></span>
										</p>						
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="img-fluid">
										<br>
										@if($d->imgurl == null)
											<a href="#">
											  <img alt="Sorry ,Image Is Not Available">
											</a>
										@else							
											<a target="_blank" href="{{ url('/blogimages/'.$d->thmbpath) }}">
											  <img src="{{ url('/blogimages/'.$d->thmbpath) }}" alt="Sorry ,Image Is Not Available">
											</a>
										@endif
										
									</div><br>
									<h3>{{ $d->ptitle }}</h3><br>
									<p class="excert">
										{{ $d->psummary }}
									</p>
									<a href='{{url("/bdetail/$d->id")}}' class="btn btn-primary">Read More &rarr;</a>
								</div>
							</div>
							<hr>
						@endforeach
						</div>
						<p style="margin-left: 15px; margin-bottom: 50px;">{{ $datas->links() }}</p>
					</div>
				</div>
			</section>
			<!-- End post-content Area -->




			<script src="{{ url('blogsite/js/vendor/jquery-2.2.4.min.js') }}"></script>
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