<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: /jtis/login.php');
}

include("../classes/manage_courses_class.php");
$courses = new manage_courses_class;			// creating object of  manage_courses_class.php
$course = $courses->display_courses();    //calling display_courses() method from manage_courses_class.php

?>


<!DOCTYPE html>
<html>

<head>
	<!-- <link href="../online_quize/admin/bootstrap.min.css" rel="stylesheet"> -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin panel</title>
	<!----font-awsome start-->
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
	<link rel="stylesheet" href="/jtis/css/all.css">

	<!----font-awsome ends-->

	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="/jtis/img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!----css file link-->
	<link rel="stylesheet" type="text/css" href="/jtis/css/style.css">
	<link rel="stylesheet" type="text/css" href="/jtis/css/custom.css">
	<link rel="stylesheet" href="/jtis/css/admin.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!----magnific popup js file for work section -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

	<!----owlcarousel js file for our team section -->

	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/jquery.min.js"></script>

	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<!-- 		css starts -->
	<style type="text/css">
		/***
Bootstrap4 Card with Tabs by @mdeuerlein
***/

		/***
Bootstrap4 Card with Tabs by @mdeuerlein
***/

		body {
			background-color: #f7f8f9;
		}

		.card {
			background-color: #ffffff;
			border: 1px solid rgba(0, 34, 51, 0.1);
			box-shadow: 2px 4px 10px 0 rgba(0, 34, 51, 0.05), 2px 4px 10px 0 rgba(0, 34, 51, 0.05);
			border-radius: 0.15rem;
		}

		/* Tabs Card */
		.tab-card {
			border: 1px solid #eee;
		}

		.tab-card-header {
			background: none;
		}

		/* Default mode */
		.tab-card-header>.nav-tabs {
			border: none;
			margin: 0px;
		}

		.tab-card-header>.nav-tabs>li {
			margin-right: 2px;
		}

		.tab-card-header>.nav-tabs>li>a {
			border: 0;
			border-bottom: 2px solid transparent;
			margin-right: 0;
			color: #737373;
			padding: 2px 15px;
		}

		.tab-card-header>.nav-tabs>li>a.show {
			border-bottom: 2px solid #007bff;
			color: #007bff;
		}

		.tab-card-header>.nav-tabs>li>a:hover {
			color: #007bff;
		}

		.tab-card-header>.tab-content {
			padding-bottom: 0;
		}

		.custom-select select {
			background-color: transparent;
			padding: 5px;
			margin: 0;
			width: 100%;
			font-family: inherit;
			font-size: inherit;
			cursor: inherit;
			line-height: inherit;
		}
	</style>
</head>

<body onload="">

	<!-- ========================================================================================================================== -->

	<!---Navigation Starts ----->
	<div id="nav-placeholder">

	</div>

	<script>
		$(function() {
			$("#nav-placeholder").load("/jtis/admin/nav.html");
		});
	</script>
	<!---Navigation Ends ----->





	<div class="container-fluid">
		<div class="row" style="margin-top:82px;">
			<!-- sidebar starts -->
			<div class="col-sm-5 col-md-3 col-lg-3 sidebar" id="sidebar">
				<ul class="list-group text-white sidebar-list">
					<a href="/jtis/admin/admin_main.php">
						<li class="list active-dash">Overview</li>
					</a>
					<a href="/jtis/admin/manage_lesson/manage_topic.php">
						<li class="list">Manage Lessons</li>
					</a>
					<a href="/jtis/admin/manage_quiz/manage_quiz.php">
						<li class="list ">Manage Quizzes</li>
					</a>
					<a href="/jtis/admin/manage_exam/manage_exam.php">
						<li class="list ">Manage Exam</li>
					</a>
					<a href="/jtis/admin/manage_videos/manage_videos.php">
						<li class="list">Manage Videos</li>
					</a>
					<a href="/jtis/logout.php?logout='1'">
						<li class="list">Logout</li>
					</a>
				</ul>
			</div>
			<!-- sidebar ends -->
			<!-- ========================================================================================================================== -->

			<div class="col-md-9 mt-2 pt-2" id="manage-main-content">
				<!-- ========================================================================================================================== -->
				<!-- Nav tabs strats -->
				<ul class="nav nav-tabs " id="main-managecourse">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Main</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#manage_course">Manage Lesson</a>
					</li>
					<!--  <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
									</li> -->
				</ul>
				<!-- Nav tabs ends -->
				<!-- ========================================================================================================================== -->
				<div class="tab-content">
					<!-- ========================================================================================================================== -->
					<!-- home panes starts -->
					<div class="tab-pane container active" id="home">
						<div class="h3" style=" box-shadow: 1px 1px 1px 1px #ccc"><b>YOUR LESSONS</b>
						</div>
						<div class="row">
							<?php foreach ($course as $course_list) {
							?>

								<div class="card ml-4 custom-card" style="width: 18rem;">
									<img class="card-img-top custom-card-img img-fluid" src="../../<?php echo $course_list['language_image'] ?>" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title"><?php echo $course_list['language_name']; ?> <a href="edit_topics.php?course_name=<?php echo $course_list['language_name']; ?>" class="h6 text-info float-right"> EDIT TOPIC<i class="fa fa-pencil ml-1"></i></a></h5>
										<p class="card-text"><?php echo $course_list['language_description']; ?></p>
									</div>
								</div>

							<?php } ?>
						</div>
						<!-- ============================================================================================================ -->
						<!-- php code to display modal if status variable is set  removed btn <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
																				Open modal
																			</button>-->
						<?php
						if (isset($_GET['status']) and $_GET['status'] == "added")      //first if condition for course added
						{
							echo '<div class="col-md-4 mt-5">
																		
																		<!-- The Modal -->
																		<div class="modal fade" id="myModal">
																		<div class="modal-dialog">
																		<div class="modal-content">

																		<!-- Modal Header -->
																		<div class="modal-header">
																		<h4 class="modal-title">Message</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>

																		<!-- Modal body -->
																		<div class="modal-body">
																		course added successfully
																		</div>

																		<!-- Modal footer -->
																		<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																		</div>

																		</div>
																		</div>
																		</div>
																		</div>';
						}


						if (isset($_GET['status']) and $_GET['status'] == "deleted")    //second if condition for course deleted
						{
							echo '<div class="col-md-4 mt-5">

																		<!-- The Modal -->
																		<div class="modal fade" id="myModal">
																		<div class="modal-dialog">
																		<div class="modal-content">

																		<!-- Modal Header -->
																		<div class="modal-header">
																		<h4 class="modal-title">Message</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>

																		<!-- Modal body -->
																		<div class="modal-body">
																		course deleted successfully
																		</div>

																		<!-- Modal footer -->
																		<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																		</div>

																		</div>
																		</div>
																		</div>
																		</div>';
						}



						if (isset($_GET['status']) and $_GET['status'] == "updated")    //second if condition for course deleted
						{
							echo '<div class="col-md-4 mt-5">


																		<!-- The Modal -->
																		<div class="modal fade" id="myModal">
																		<div class="modal-dialog">
																		<div class="modal-content">

																		<!-- Modal Header -->
																		<div class="modal-header">
																		<h4 class="modal-title">Message</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>

																		<!-- Modal body -->
																		<div class="modal-body">
																		course updated successfully
																		</div>

																		<!-- Modal footer -->
																		<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																		</div>

																		</div>
																		</div>
																		</div>
																		</div>';
						}
						?>
						<!-- ended display modal php code -->
						<!-- =========================================================================================== -->
					</div>

					<!-- home panes ends -->

					<!-- ========================================================================================================================== -->

					<!-- ========================================================================================================================== -->

					<!-- manage course pane starts -->

					<div class="tab-pane container" id="manage_course">
						<center>
							<div class="col-md-7">
								<div class="mt-3 tab-card">
									<div class="card-header tab-card-header">
										<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">ADD</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">UPDATE</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">DELETE</a>
											</li>
										</ul>
									</div>
									<div class="tab-content" id="myTabContent">
										<!-- tab content starts -->
										<!-- ======================================================================================================= -->
										<!-- add new course tab starts -->
										<div class="tab-pane abs fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
											<div class=" col-md-12">
												<div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
													<div class="card-header text-light p-2 cardh2">
														<h3>ADD NEW LESSON</h3>
													</div>
													<div class="card-body small">
														<form action="topic_add.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
															<div class="form-group">
																<label for="email">Lesson Name :</label>
																<input type="text" class="form-control" id="c_name" placeholder="ex. Earth Sciences" name="course_name">
																<span id="name_error" class="text-danger font-weight-bold"></span>
															</div>
															<div class="form-group">
																<label for="pwd">Lesson Description</label>
																<input type="text" class="form-control" id="c_desc" placeholder=" Description Here" name="course_desc">
																<span id="desc_error" class="text-danger font-weight-bold"></span>
															</div>

															<div class="form-group" style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
																<label for="pwd">Grading</label>
																<select name="grading" style="width:200px; margin: auto; padding: 10px;">
																	<option disabled>Select grading:</option>
																	<option value="first">First grading</option>
																	<option value="second">Second grading</option>
																	<option value="third">Third grading</option>
																	<option value="fourth">Fourth grading</option>
																</select>
															</div>

															<div class="form-group">
																<label for="pwd">Lesson Profile Image</label>
																<input type="file" class="form-control" id="c_img" placeholder="Upload Here" name="course_image">
																<span id="image_error" class="text-danger font-weight-bold"></span>
															</div>

															<div class="">
																<button type="submit" class="btn btn-success" name="btn_add">CREATE</button>
															</div>
														</form>

													</div>
												</div>
											</div>
										</div>
										<!-- add new course tab ends -->
										<!-- ======================================================================================================= -->
										<!-- ======================================================================================================= -->
										<!-- update course tab starts -->
										<div class="tab-pane abs fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
											<div class="card-body col-md-12">
												<div class="card-transac">
													<div class="card-header  text-light p-2 cardh2 ">
														<h3>UPDATE LESSON</h3>
													</div>
													<div class="card-body small">
														<form action="topic_add.php" method="post" enctype="multipart/form-data" onsubmit="">
															<div class="form-group">
																<label for="exampleFormControlSelect1">Select Lesson Name :</label>
																<select class="form-control" id="exampleFormControlSelect1" name="selected-course-to-update">
																	<?php foreach ($course as $course_list) {
																	?>
																		<option><?php echo  $course_list['language_name']; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="pwd">Lesson Description</label>
																<input type="text" class="form-control" id="c_desc" placeholder="Lesson Description Here" name="course_desc">
																<span id="desc_error" class="text-danger font-weight-bold"></span>
															</div>

															<div class="form-group" style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
																<label for="pwd">Grading</label>
																<select name="grading" style="width:200px; margin: auto; padding: 10px;">
																	<option disabled>Select grading:</option>
																	<option value="first">First grading</option>
																	<option value="second">Second grading</option>
																	<option value="third">Third grading</option>
																	<option value="fourth">Fourth grading</option>
																</select>
															</div>

															<div class="form-group">
																<label for="pwd">Lesson Image Profile</label>
																<input type="file" class="form-control" id="c_img" placeholder="Upload Image Here" name="course_image">
																<span id="image_error" class="text-danger font-weight-bold"></span>
															</div>

															<div class="">
																<button type="submit" class="btn btn-success" name="btn_update">UPDATE</button>
															</div>
														</form>

													</div>
												</div>
											</div>
										</div>
										<!-- update course tab ends -->
										<!-- ======================================================================================================= -->
										<!-- ======================================================================================================= -->
										<!-- delete course tab starts -->
										<div class="tab-pane abs fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
											<div class="card-body col-md-12">
												<div class="card-transac">
													<div class="card-header  text-light p-2 cardh2">
														<h3>DELETE LESSON</h3>
													</div>
													<div class="card-body small">
														<form action="topic_add.php" method="post" enctype="multipart/form-data">
															<div class="form-group">
																<label for="exampleFormControlSelect1">Select Lesson</label>
																<select class="form-control" id="exampleFormControlSelect1" name="selected_course">
																	<?php foreach ($course as $course_list) {
																	?>
																		<option><?php echo  $course_list['language_name']; ?></option>
																	<?php } ?>
																</select>
															</div>
															<div>
																<button type="submit" class="btn btn-danger" name="btn-delete-course">DELETE</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- delete course tab ends -->
										<!-- ======================================================================================================= -->
									</div> <!-- tab content  -->
								</div>
							</div>
						</center>
					</div>
					<!-- manage courses pane ends -->
					<!-- ========================================================================================================================== -->
					<!-- ========================================================================================================================== -->
					<!-- tab pane 3 starts -->
					<div class="tab-pane container fade" id="menu2">
					</div>
					<!-- tab pane 3 ends -->
					<!-- ========================================================================================================================== -->
				</div>
			</div>



		</div>
	</div>
	<script type="text/javascript">
		$('#myTab a').on('click', function(e) {
			e.preventDefault()
			$(this).tab('show')
		});
		// =============================================================================================================
		// javascript validation function
		function validation() {
			var name = document.getElementById('c_name').value;
			var desc = document.getElementById('c_desc').value;
			var img = document.getElementById('c_img').value;
			if (name == "") {
				document.getElementById('name_error').innerHTML = "** please enter the Lesson name";
				return false;
			}

			if (desc == "") {
				document.getElementById('desc_error').innerHTML = "** please enter the Lesson descsription";
				return false;

			}
			if (img == "") {
				document.getElementById('image_error').innerHTML = "** please choose an image";
				return false;

			}
		}
		// javascript validation function
		// =============================================================================================================


		// =============================================================================================================

		// javascript modal function called on page load

		function display_modal() {



		}

		// =============================================================================================================



		// =============================================================================================================

		// javascript modal function called on page load

		$(window).on('load', function() {
			$('#myModal').modal('show');
		});


		// javascript validation function
		// =============================================================================================================
	</script>


</body>

</html>