<?php

include("multi_login/functions.php");
// If not logged in, redirect to login page
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must be logged in first";
	header('location:login.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>JTIS</title>
	<link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!----magnific popup css file for work section -->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

	<!----owlcarousel css file for our team section -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">

	<!----Linking google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<!----font-awsome start-->
	<link rel="stylesheet" href="css/all.css">

	<!----font-awsome ends-->

	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!----css file link-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!----magnific popup js file for work section -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

	<!----owlcarousel js file for our team section -->

	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
	    .p-2 a {
	        display: flex;
	        align-items: center;
	    }
	    .p-2 a i {
	        font-size: 32px;
	        margin-right: 10px;
	    }
	    .p-2 a h3 {
	        font-size: 18px;
	        margin: 0;
	    }
	</style>

</head>
<body onload="myfunction()">

	<!---Navigation Starts	----->

	<nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
		<div class="container">
			
			<!------Responsive Button---->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
					<i class="fa-solid fa-bars"></i>
				</button>
				<h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International School</h1>
			</div>
			<div class="collapse navbar-collapse" id="navi">
				<!------Navigation menus starts---->
				
				<ul class="nav navbar-nav navbar-right" id="nav-ul">
					<li class="w100 nav-li"> <a href="index.php" class="border-bot nav-a">Home</a></li>
					<li class="w100 nav-li"> <a href="#our-members" class="border-bot nav-a">About</a></li>
					<?php 
					if($_SESSION['user']['user_type'] == 'user'){
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="profile.php" class="border-bot nav-a">Setting</a></li>
						<?php 
					}elseif($_SESSION['user']['user_type'] == 'admin'){
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="admin/admin_main.php" class="border-bot nav-a">Admin setting</a></li>
						<?php
					}
					?>
					<li> <a href="index.php?logout='1'" id="our-location" class="btn-success" ><?php echo $_SESSION['user']['username'];   ?></a></li>
				</ul>
				<!------Navigation menus ends---->
			</div>
		</div>
	</nav>
	<!---Navigation Ends	----->

	<!---Slider Section starts	------->
	<section class="slider2 text-center">
		<div class="slider-overlay2">
			
			<div class="slider-content">


				<br>


			</div>
		</div>
	</section>

	<!---Slider Section ends------->

	<!---Our selection Section Start------->
	<div class="container-fluid servicebody" id="myservice_section">
		<div class="text"></div>
		<div class="service-are" id="service">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<a href="sciencedemo.php"><div class=" text-center green"><!---service-wrap- class for adv hover effects,change color if hover---->
						<div class="service-icon">
							<i class="fa-solid fa-book" id="iconbook"></i>
						</div>
						<h3>SCIENCE LESSON</h3>
					</div></a>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<a href="video tutorials\lesson\display_video_lesson.php">
						<div class=" text-center green"><!---service-wrap- class for adv hover effects---->
							<div class="service-icon">
								<i class="fa-solid fa-play"></i>
							</div>
							<h3>VIDEO TUTORIALS</h3>
						</div></a>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<a href="assessmenthome.php">
							<div class=" text-center green"><!---service-wrap- class for adv hover effects---->
								<div class="service-icon">
									<i class="fa-solid fa-lightbulb"></i>
								</div>
								<h3>EXERCISE</h3>   <!--  exercise/exercise.php -->
							</div></a>
						</div>
					</div>
				</div>
			</div>

			<div class="container" style="margin-top:12rem; display: flex; flex-direction: row;" id="our-members">
			    <div class="p-2">
			        <a href="#">
			            <i class="fa-solid fa-phone" id="iconbook"></i>
			            <h3>0917 119 7558</h3>
			        </a>
			    </div>
			    <div class="p-2">
			        <a href="#">
			            <i class="fa-solid fa-envelope"></i>
			            <h3>jianetherese2000@gmail.com</h3>
			        </a>
			    </div>
			    <div class="p-2">
			        <a href="#">
			            <i class="fa-solid fa-map-marker"></i>
			            <h3>National Road, Linis Sipsipin Jalajala, Philippines</h3>
			        </a>
			    </div>
			    <div class="p-2">
			        <a href="https://www.facebook.com/jtischool">
			            <i class="fab fa-facebook"></i>
			            <h3>https://www.facebook.com/jtishappyfamily</h3>
			        </a>
			    </div>
			</div>
		</div>
		<img scr ="../img/JTISlogo_bg.svg">
		<div id="bg"></div>
		<div class="hori">
			<div>
				<p>A Family and God-Centered Institution <br> Pursue Academic Excellence and Adheres <br> to Values Formation</p>
			</div>
		</div>
	</div>
</div>
<div id="schoolcontact">
	<h1>National Road, Linis Sipsipin, Jalajala Philippines</h1>
	<h5>Address</h5>
	<hr>
	<h1>0917 119 7558</h1>
	<h5>Mobile</h5>
	<hr>
	<a href="mailto:"><h1>jianetherese2000@gmail.com</h1></a>
	<h5>Email</h5>
</div>


<!---This is script section------->



<script src="js/jquery.ripples-min.js" type="text/javascript"></script>
<script src="js/typed.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>






	<!--   <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script> -->

</body>
</html>