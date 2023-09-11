<?php

include("multi_login/functions.php");
include("online_quize/class/quizUsers.php");
include("online_exam/class/examUsers.php");
// If not logged in, redirect to login page
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must be logged in first";
	header('location:login.php');
}

$user = new quizUsers;
$euser = new examUsers;
$quizd = $user->showProfileQuizScore();
$examd = $euser->showProfileExamScore();
$actlog = $user->showActivityLog();

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!----css file link-->
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
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

</head>
<body onload="myfunction()">
	<nav class="navbar navbar-expand-lg nav-bar-inverse">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mb-2 mb-lg-0 mr-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<!---Navigation Starts	----->


	<nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
		<div class="container-fluid">
			
			<!------Responsive Button <button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi"> ---->
				<div class="navbar-header">
					<button class="navbar-toggle bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navi" aria-controls="navi" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa-solid fa-bars"></i>
					</button>
					<h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International School</h1>
				</div>
				<div class="collapse navbar-collapse" id="navi">
					<!------Navigation menus starts---->

					<ul class="nav navbar-nav navbar-right" id="nav-ul">
						<li class="nav-item"> <a href="index.php" class="nav-link">Home</a></li>
						<li class="nav-item"> <a href="#our-members" class="nav-link">About</a></li>
						<li class="nav-item" id="resetpassbutton"> <a href="profile.php" class="nav-link">Setting</a></li>
						<li> <a href="index.php?logout='1'" id="our-location" class="btn-success" ><?php echo $_SESSION['user']['username'];   ?></a></li>
					</ul>

					<!------Navigation menus ends---->
				</div>
			</div>
		</nav>
		<!---Navigation Ends	----->

		<!---Slider Section starts	------->
		<section style="background-color: #eee;">
			<div class="container py-5 mt-5 mb-5">
				<div class="row">
					<div class="col-lg-4 mt-3">
						<div class="card mb-4" style="background-color: #fff;">
							<div class="card-body text-center">
								<img src="<?php echo 'uploadimg/profile/'.$_SESSION['user']['image_avatar'] ?>" alt="avatar" class="rounded-circle img-fluid border border-1 border-success" style="width: 150px; height: 150px;">
								<p class="font-weight-bold"><?php echo $_SESSION['user']['firstName']; ?></p>
								<p class="text-muted mb-1"><?php echo ucfirst($_SESSION['user']['user_type']);?></p>
								<p class="text-muted mb-4"><?php echo $_SESSION['user']['user_id'];?></p>
								<div class="d-flex justify-content-center mb-2">
									<form id="form" action="multi_login/functions.php" enctype="multipart/form-data" method="post">
										<input type="file" name="image" accept=".jpg,.jpeg,.png">
										<button type="submit" name="change_avatar_btn" class="btn btn-primary">Change avatar</button>
									</form>
									
									<a href="changepassword.php"><button type="button" class="btn btn-outline-primary ms-1">Change password</button></a>
								</div>
							</div>
						</div>
						<div class="card mb-4 mb-lg-0">
							<div class="card-body p-0" style="overflow-y: scroll; max-height: 500px;">
								<ul class="list-group list-group-flush rounded-3">
									<li class="list-group-item d-flex justify-content-between align-items-center p-3">
										<p class="mb-0"><strong>Action</strong></p>
										<p class="mb-0"><strong>Date</strong></p>
									</li>
									<?php 
										foreach($actlog as $logs){
									?>
									<li class="list-group-item d-flex justify-content-between align-items-center p-3">
										<p class="mb-0"><?php echo $logs['action']; ?></p>
										<p class="mb-0"><?php echo $logs['activity_date']; ?></p>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-8 mt-3">
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Full Name</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $_SESSION['user']['firstName']; echo " "; echo $_SESSION['user']['lastName'];   ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Email</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $_SESSION['user']['email'];   ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Grade</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $_SESSION['user']['grade'];   ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0">Section</p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?php echo $_SESSION['user']['section'];   ?></p>
									</div>
								</div>
								<hr>
							</div>
						</div>
						<div class="row mb-4">
							<div class="card mb-4 mb-md-0 score-card" style="overflow-y: scroll; max-height: 300px;">
								<div class="card-body" >
									<p class="mb-4"><span class="text-primary font-italic me-1">Quiz</span>score
									</p>
									<table id="quizTable" class="table table-sm table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Course</th>
												<th scope="col">Difficulty</th>
												<th scope="col">Score</th>
												<th scope="col">Correct</th>
												<th scope="col">Wrong</th>
												<th scope="col">Date taken</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$quiz_counter = 1;
												if (!empty($quizd)){
												foreach($quizd as $details){
													
											?>
											<tr>
												<th scope="row"><?php echo $quiz_counter;?></th>
												<td><?php echo ucfirst($details['course']); ?></td>
												<td><?php echo ucfirst($details['difficulty']); ?></td>
												<td><?php echo $details['score']; ?>%</td>
												<td><?php echo $details['correct']; ?></td>
												<td><?php echo $details['wrong']; ?></td>
												<td><?php echo $details['date_taken']; ?></td>
											</tr>
											<?php 
											$quiz_counter++;}
											}else{ ?>
												<th scope="row">Null</th>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
											<?php
											}
											 ?>
										</tbody>
									</table>
									<button onclick="window.printPage('print_quiz.php')" class="btn btn-primary">Print Table</button>
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="card mb-4 mb-md-0 score-card" style="overflow-y: scroll; max-height: 300px;">
								<div class="card-body">
									<p class="mb-4"><span class="text-primary font-italic me-1">Exam</span>score
									</p>
									<table id="examTable" class="table table-sm table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Course</th>
												<th scope="col">Difficulty</th>
												<th scope="col">Score</th>
												<th scope="col">Correct</th>
												<th scope="col">Wrong</th>
												<th scope="col">Date taken</th>
											</tr>
										</thead>
										<tbody>
										<?php 
												$exam_counter = 1;
												if (!empty($examd)){
												foreach($examd as $details){
													
											?>
											<tr>
												<th scope="row"><?php echo $exam_counter;?></th>
												<td><?php echo ucfirst($details['course']); ?></td>
												<td><?php echo ucfirst($details['difficulty']); ?></td>
												<td><?php echo $details['score']; ?>%</td>
												<td><?php echo $details['correct']; ?></td>
												<td><?php echo $details['wrong']; ?></td>
												<td><?php echo $details['date_taken']; ?></td>
											</tr>
											<?php 
											$exam_counter++;}
											}else{ ?>
												<th scope="row">Null</th>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
												<td>Null</td>
											<?php
											}
											 ?>
										</tbody>
									</table>
									<button onclick="printPage('print_exam.php')" class="btn btn-primary">Print Table</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!---This is script section------->

		<script type="text/javascript">
			document.getElementById('image').onchange = function(){
				document.getElementById('form').submit();
			}

			function printPage(url) 
			{
				var printWindow = window.open(url, '_blank');
				printWindow.onload = function() {
					printWindow.print();
				};
			}

			function printTable() {
			  var tableContents = document.getElementById("quizTable").outerHTML;
			  var newWindow = window.open('', '', 'width=800, height=600');
			  newWindow.document.write('<html><head><title>Quiz Results</title>');
			  newWindow.document.write('</head><body>');
			  newWindow.document.write(tableContents);
			  newWindow.document.write('</body></html>');
			  newWindow.document.close();
			  newWindow.focus();
			  newWindow.print();
			}

			function printTableExam() {
			  var tableContents = document.getElementById("examTable").outerHTML;
			  var newWindow = window.open('', '', 'width=800, height=600');
			  newWindow.document.write('<html><head><title>Quiz Results</title>');
			  newWindow.document.write('</head><body>');
			  newWindow.document.write(tableContents);
			  newWindow.document.write('</body></html>');
			  newWindow.document.close();
			  newWindow.focus();
			  newWindow.print();
			}
		</script>

		<script src="js/jquery.ripples-min.js" type="text/javascript"></script>
		<script src="js/typed.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

	<!--   <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script> -->

</body>
</html>