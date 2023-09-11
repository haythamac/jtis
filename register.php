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
	<h3 id="login-heading">Registration Form</h3>

	<form method="POST" action="register.php" autocomplete="off">
		<?php echo display_error(); ?>
		<div class="form-group">
			<div class="full-name-field">
				<div class="input-field">
					<label>First Name </label>
					<input type="text"  name="firstName" value="<?php echo $firstName; ?>" class="form-control" id="firstName"autofocus onkeypress="clear()">
				</div>

				<div class="input-field">
					<label>Middle Name </label>
					<input type="text"  name="middleName" value="<?php echo $middleName; ?>" class="form-control" id="middleName">
				</div>

				<div class="input-field">
					<label>Last Name </label>
					<input type="text"  name="lastName" value="<?php echo $lastName; ?>" class="form-control" id="lastName">
				</div>
			</div>

			<div class="input-field">
				<label>Username </label>
				<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" id="username">	
			</div>

			<div class="input-field">
				<label>Password </label>
				<input type="password"  name="password1" class="form-control" id="password1">
			</div>

			<div class="input-field">
				<label>Repeat password </label>
				<input type="password"  name="password2" class="form-control" id="password2">
			</div>

			<div class="input-field">
				<label>Email </label>
				<input type="text" name="email" value="<?php echo $email; ?>" class="form-control" id="email">
			</div>	

			<div class="input-field">
				<label>Student ID </label>
				<input type="text" name="studentid" value="<?php echo $studentid; ?>" class="form-control" id="studentid">
			</div>

			<div class="input-field">
				<label>Grade</label>
				<div class="custom-select" style="width:200px;">
				  <select name="grade">
				    <option selected disabled>Select grade:</option>
				    <option value="8">Grade 8</option>
				  </select>
				</div>
			</div>

			<div class="input-field">
				<label>Section </label>
				<div class="custom-select" style="width:200px;">
				  <select name="section">
				    <option selected disabled>Select section:</option>
				    <option value="A">St Mark A</option>
				    <option value="B">St Mark B</option>
				  </select>
				</div>
			</div>

			<!---<div class="gender-field"> 
				<div class="input-field">
					<label>Male</label>
					<input type="radio" name="gender" value="male">
				</div>

				<div class="input-field">
					<label>Female</label>
					<input type="radio" name="gender" value="female">
				</div>
			</div> -->

			<div class="done">
				<button class="submit-button" type="submit" name="register_btn">Register</button>
				<a href="login.php" id="reset-pass" style="max-width: 200px; margin: auto;" ><h6>Already have an account? Log in&nbsp</h6></a> 
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