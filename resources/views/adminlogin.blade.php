<!DOCTYPE html>
<html lang="en">
<head>
	<title>CODAL BLOG SITE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="{{ url('/adminlogin') }}">
					@csrf
					<span class="login100-form-title p-b-43" style="font-weight: bolder;">
						<a href="{{ url('/') }}" style="text-decoration: none;font-size: 30px;color: black;background: lightgray;padding: 10px;border-radius: 5px;">CODAL BLOG SITE</a>
						&nbsp;Login Here !!!
					</span>
					
					@if (count($errors) > 0)
					   <div class = "alert alert-danger" style="background: #FA8072; border-radius: 8px;font-size: 20px;">
					      <ul>
					         @foreach ($errors->all() as $error)
					            <li>{{ $error }}</li>
					         @endforeach
					      </ul>
					   </div>
					@endif
					


					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="name">
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn" >
						<button class="login100-form-btn" >
							Sign in
						</button>
					</div>

				</form>
				<br>
				<div class="container-login100-form-btn" >

					<a href="{{ url('login/facebook') }}" class="btn btn-primary btn-lg btn-block" style="background:  darkblue; border-color: darkblue; font-weight: bolder;">
					    <i class="fa fa-facebook fa-fw" style="margin-left: -2px; margin-right: 15px;"></i> Sign in with Facebook
					</a>

					<a href="{{ url('login/twitter') }}" class="btn btn-primary btn-lg btn-block" style="font-weight: bolder;">
					    <i class="fa fa-twitter fa-fw" style="margin-left:  -22px; margin-right: 15px;"></i> Sign in with Twitter
					</a>

					<a href="{{ url('login/google') }}" class="btn btn-primary btn-lg btn-block" style="background:  red; border-color: red;font-weight: bolder;">
					    <i class="fa fa-google fa-fw" style="margin-left: -30px; margin-right: 15px;"></i> Sign in with Gmail
					</a>

				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>