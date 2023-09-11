<?php
include("multi_login/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<title>Register</title>
	<!----Linking google fonts-->

	<!----font-awsome start-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!----font-awsome ends-->

	<!----css file link-->
	
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<style type="text/css">
		
	</style>

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
<div class="modal-content">
	<h3 id="login-heading">Change password</h3>

	<form method="POST" action="changepassword.php" autocomplete="off">
		<?php echo display_error(); ?>
		<?php echo display_success(); ?>
		<div class="form-group">
			

			<div class="input-field">
				<label>Password </label>
				<input type="password"  name="oldpass1" class="form-control" id="oldpass1">
			</div>

			<div class="input-field">
				<label>Repeat password </label>
				<input type="password"  name="oldpass2" class="form-control" id="oldpass2">
			</div>

			<div class="input-field">
				<label>New Password </label>
				<input type="password"  name="newpass1" class="form-control" id="newpass1">
			</div>

			<div class="input-field">
				<label>Repeat new password </label>
				<input type="password"  name="newpass2" class="form-control" id="newpass2">
			</div>

			<div class="done">
				<button class="submit-button" type="submit" name="changepass_btn">Change</button>
				<a href="profile.php" id="reset-pass" style="max-width: 200px; margin: auto;" ><h6>Cancel and go back</h6></a> 
			</div>

		</div>
	</form>
</div>

<!---Slider Section ends------->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="js/jquery.ripples-min.js" type="text/javascript"></script>
<script src="js/typed.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>



</body>
</html>