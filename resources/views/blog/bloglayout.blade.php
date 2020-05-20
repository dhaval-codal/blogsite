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
{{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  
  <!-- Custom styles for this page -->
  <link href="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


<style>
img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 400px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>


		</head>
		<body>	
		  <header id="header">
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="{{ url('/') }}" style="text-decoration: none;"><h2 style="color: #8490ff;">CODAL BLOG SITE</h2></a>
			      </div>

			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          	<li><a href="{{ url('/') }}" style="font-size: 25px;text-decoration: none;">Home</a></li>
			          @if(Auth::user())
			          	<li style="font-size: 25px;text-decoration: none;color: blue;font-weight: bolder;">
			          		&nbsp;&nbsp;Hello {{ Auth::user()->name }}
			          	</li>&nbsp;&nbsp;&nbsp;
			          	<li style="margin-right: -40px;">
			          		<a href="{{ url('logout') }}" style="font-size: 25px;text-decoration: none;color: blue;">
					          Logout
					        </a>
			          	</li>
			          @else
			          	<li style="margin-right: -40px;">
			          		<a href="{{ url('loginpage') }}" style="font-size: 25px;text-decoration: none;color: blue;">
					          login or Sign up
					        </a>
			          	</li>
			          @endif
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
<br><br>			
			<!-- Start top-category-widget Area -->
			<section class="top-category-widget-area pt-50 pb-60" style="background: lightgray;height: 50px;">

				 <!-- Another variation with a button -->
				 <center>
				 	{{-- <form method="post" action="{{ url('bsearch') }}"> --}}
				 		@csrf
					  <div class="input-group" style="width: 85%;">
					    <input type="text" class="form-control" name="sby" id="sby" placeholder="Search Blogs Here By Title , Author OR Blog Text" style="border-radius: 5px;height: 40px;">&nbsp;
					    {{-- <button class="btn btn-primary">
					    	<i class="fa fa-search"></i> Search 
					    </button> --}}
					  </div>
				  	{{-- </form> --}}
				  </center>

			</section>
			<!-- End top-category-widget Area -->
			<br>
			@yield('content')
            

			{{-- <script src="{{ url('blogsite/js/vendor/jquery-2.2.4.min.js') }}"></script> --}}
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

			<script type="text/javascript">
				
				// $('#sby').on('keyup',function(){
				// 	$value=$(this).val();
				// 	$.ajax({
				// 		type : 'get',
				// 		url : '{{URL::to('bsearch')}}',
				// 		data:{'search':$value},
				// 		success:function(data){
				// 			$('tbody').html(data);
				// 		}
				// 	});
				// })
				// 
				$(document).ready(function(){
				   $("#sby").keyup(function(){
				       var str=  $("#sby").val();
				       if(str == " ") {
				               // $( "#maindivd" ).html("<b><h1>Blogs information will be listed here...</h1></b><br>"); 
				       }else {
				               $.get( "{{ url('/?id=') }}"+str, function( data ) {
				                   $( "#maindivd" ).html( data );  
				            });
				       }
				   });  
				}); 
			
			</script>

			<script type="text/javascript">

				$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
			
			</script>




		</body>
	</html>