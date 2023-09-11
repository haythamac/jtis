<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>JTIS</title>
	<!----css file link-->
	<link rel="stylesheet" type="text/css" href="css/science-lesson.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">

	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<script src="main.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>

	<!----Linking google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>

<body>

	<!---Navigation Starts	----->
	<nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
		<div class="container">

			<!------Responsive Button---->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
					<i class="fa-solid fa-bars"></i>
				</button>
				<h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International
					School</h1>
			</div>
			<div class="collapse navbar-collapse" id="navi">
				<!------Navigation menus starts---->

				<ul class="nav navbar-nav navbar-right" id="nav-ul">
					<li class="w100 nav-li"> <a href="index.php" class="border-bot nav-a">Home</a></li>
					<li class="w100 nav-li dropdown">
						<a class=w100 nav-li border-bot nav-a>menu</a>
						<div class="dropdown-content">
							<a class="w100 nav-li border-bot nav-a"
								href="video tutorials\lesson\display_video_lesson.php">TUTORIALS</a>
							<a class="w100 nav-li border-bot nav-a" href="online_quize/quizhome.php">EXERCISES</a>
						</div>
					</li>
					<!-----dropdown end ---->
					<?php
					if ($_SESSION['user']['user_type'] == 'user') {
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="profile.php"
								class="border-bot nav-a">Setting</a></li>
					<?php
					} elseif ($_SESSION['user']['user_type'] == 'admin') {
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="admin/admin_main.php"
								class="border-bot nav-a">Admin setting</a></li>
						<?php
					}
					?>
					<li> <a href="logout.php" id="our-location" class="btn-success">
							<?php echo $_SESSION['user']['username']; ?>
						</a></li>
				</ul>
				<!------Navigation menus ends---->
			</div>
		</div>
	</nav>
	<!---Navigation Ends	----->
	<!---programming languages Section Start	----->
	<section class="latest-news-area" id="latest">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title text-center">
						<h2><b>SCIENCE LESSON</b></h2>
						<div class="text2 sub-heading">
							<h4>Choose and <strong class="primary">START LEARNING</strong></h4>
						</div>
					</div>
				</div>
			</div>

			<?php
			// session_start();
			$con = mysqli_connect('localhost', 'root');
			mysqli_select_db($con, 'jtis');
			$q = "select * from science_branch";
			$query = mysqli_query($con, $q);
			while ($res = mysqli_fetch_array($query)) {
				?>

			<div class="col-md-4 col-sm-6 col-xs-12 content-border" style="margin-bottom: 10px;">
				<div class="latest-news-wrap">
					<div class="news-img">
						<img src=<?php echo $res['language_image']; ?> class="img-responsive">
						<div class="deat">
							<span>
								<?php echo $res['language_name']; ?>
							</span>
						</div>
					</div>
					<div class="news-content">
						<a href="science/lesson/topics_in.php?course_name=<?php echo $res['language_name'] ?>">Start
							Reading...</a>
						<p>
							<?php echo $res['language_description']; ?>
						</p><br>

					</div>
				</div>
			</div>
			<?php } ?>

		</div>
	</section>
</body>

</html>