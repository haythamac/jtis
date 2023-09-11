<?php

include("multi_login/functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<title>Login</title>
	<!----Linking google fonts-->

	<!----font-awsome start-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!----font-awsome ends-->

	<!----css file link-->
	
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Google Client id to integrate google signin-->
	<meta name="google-signin-client_id" content="808976312783-k901nr0n50did222qa275k0umvn4rpi1.apps.googleusercontent.com">
	

	<!-- Google JavaScript file to integrate google signin-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>

	<!-- Google custom JavaScript file to integrate google signin-->
	<script type="text/javascript" src="js/google_signin.js"></script>


	<!----------email notification-------->

<script type="text/css">
</script>

</head>
<body>
	<!---Navigation Starts	----->
	<nav  class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<!------Responsive Button---->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<h1 style="color: white;margin-top: 10px; margin-left: 50px; font-size: 25px;  " id="myhead">Jhiane Therese International School</h1>
			</div>
			<div class="collapse navbar-collapse" id="navi">
                <!------Navigation menus starts---->
				<ul class="nav navbar-nav navbar-right">
					<li class="w100"> <a href="" class="border-bot">Home</a></li>
					<li class="w100"> <a href="" class="border-bot">About</a></li>
					<li class="w100"> <a href="" class="border-bot">Setting</a></li>
					<!--li> <a href="" id="our-location" class="btn-success" data-target="#mymodal" data-toggle="modal">Login/Signup</a></li-->
				</ul>
				<!------Navigation menus ends---->
			</div>
		</div>
	</nav>
	<!---Navigation Ends	----->

			<!---Slider Section starts	------->
			<section class="slider text-center" id="slider">

			</div>
			</section>
			<div class="modal-dialog ">
					<div class="modal-content">
						<h3 id="login-heading">Login</h3>
						
					<div class="modal-body" >
						<div class="left-box">
						<form method="POST" action="login.php">
							<?php echo display_error(); ?>
							<div class="form-group">
								<label><i class="fa fa-user fa-2x"></i>  Username :</label>
								<input type="text" autocomplete="off" name="username" class="form-control" id="username" autofocus onkeypress="clear()">
							

								<label><i class="fa fa-lock fa-2x"></i>		Password :</label>
								<input type="password" autocomplete="off" name="password" class="form-control" id="password">
								<button id="btn-login" type="submit" name="login_btn">Login</button>
								<a href="forgot.php" id="reset-pass" ><h6>Forgot Password?&nbsp</h6></a> 
							</div>
							<div class="register">
								<a href="register.php" id="reset-pass" ><h6>No account? Sign up!&nbsp</h6></a>
							</div>
						</form>
					</div>
					<div class="right-box">
					</div>
				</div>

			<!---Slider Section ends------->
<script src="js/jquery.ripples-min.js" type="text/javascript"></script>
<script src="js/typed.min.js" type="text/javascript"></script>

</body>
</html>