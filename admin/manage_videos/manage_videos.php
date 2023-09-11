<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: /jtis/login.php');
}

include("../classes/manage_videos_class.php");
$videos = new manage_videos_class; // creating object of  manage_courses_class.php
$video = $videos->display_videos(); //calling display_courses() method from manage_courses_class.php
$course = $videos->display_courses(); //calling display_courses() method from manage_courses_class.php

?>


<!DOCTYPE html>
<html>

<head>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

	<style>
		.custom-card {
			width: 18rem;
			height: 100%;
		}

		.custom-card-img {
			height: 10rem;
			/* Adjust the height as per your requirements */
			object-fit: cover;
			/* Maintain aspect ratio */
		}
	</style>

	<!-- 		css starts -->
</head>

<body onload="">

	<!-- ========================================================================================================================== -->


	<!---Navigation Starts ----->
	<div id="nav-placeholder">

	</div>

	<script>
		$(function () {
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



			<div class="col-md-9 mt-2 pt-2">


				<!-- ========================================================================================================================== -->


				<!-- Nav tabs strats -->


				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#manage_course">Manage Course</a>
					</li>
				</ul>
				<!-- Nav tabs ends -->

				<!-- ========================================================================================================================== -->



				<div class="tab-content">



					<!-- ========================================================================================================================== -->

					<!-- home panes starts -->


					<div class="tab-pane container active" id="home">
						<div class="h3" style=" box-shadow: 1px 1px 1px 1px #ccc"><b>YOUR VIDEOS</b></div><br>
						<div class="row">


							

							<?php foreach ($course as $course_list) {
							?>

								<div class="card ml-4 custom-card" style="width: 18rem;">
									<img class="card-img-top custom-card-img img-fluid" src="../../<?php echo $course_list['language_image'] ?>" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title"><?php echo $course_list['language_name']; ?> <a href="edit_videos.php?course_name=<?php echo $course_list['language_name']; ?>" class="h6 text-info float-right">view video<i class="fa fa-pencil ml-1"></i></a></h5>
										<p class="card-text"><?php echo $course_list['language_description']; ?></p>
									</div>
								</div>

							<?php } ?>


						</div>

						<!-- ============================================================================================================ -->

						<!-- php code to display modal if status variable is set -->
						<?php

						if (isset($_GET['status']) and $_GET['status'] == "added") //first if condition for course added
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


						if (isset($_GET['status']) and $_GET['status'] == "deleted") //second if condition for course deleted
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



						if (isset($_GET['status']) and $_GET['status'] == "updated") //second if condition for course deleted
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

					<div class="tab-pane container fade" id="manage_course">




						<center div class="col-md-12">
							<div class="mt-3 tab-card">
								<div class="card-header tab-card-header">
									<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab"
												aria-controls="One" aria-selected="true">ADD</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
												aria-controls="Two" aria-selected="false">UPDATE</a>
										</li> -->
										<!-- <li class="nav-item">
											<a class="nav-link" id="three-tab" data-toggle="tab" href="#three"
												role="tab" aria-controls="Three" aria-selected="false">DELETE</a>
										</li> -->
									</ul>
								</div>

								<div class="tab-content" id="myTabContent"> <!-- tab content starts -->


									<!-- ======================================================================================================= -->
									<!-- add new video course tab starts -->

									<div class="tab-pane abs fade show active p-3" id="one" role="tabpanel"
										aria-labelledby="one-tab">
										<div class=" col-md-12">
											<div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
												<div class="card-header  text-light p-2 cardh2">
													<h3>ADD NEW VIDEO </h3>
												</div>

												<div class="card-body small">

													<form action="video_add.php" method="post"
														enctype="multipart/form-data" onsubmit="return validation()">
														<div class="form-group">
															<label for="email">Video Title</label>
															<input type="text" class="form-control" id="c_name"
																placeholder="" name="vid_title">
															<span id="name_error"
																class="text-danger font-weight-bold"></span>
														</div>

														<select class="form-control" id="exampleFormControlSelect1"
															name="course_name">

															<?php foreach ($course as $course_list) {
																?>
																<option>
																	<?php echo $course_list['language_name']; ?>
																</option>
															<?php } ?>

														</select>

														<div class="form-group">
															<label for="pwd">Video Image</label>
															<input type="file" class="form-control" id="c_img"
																placeholder="Upload Image Here" name="vid_img">
															<span id="image_error"
																class="text-danger font-weight-bold"></span>
														</div>

														<div class="form-group">
															<label for="pwd">Video Path</label>
															<input type="text" class="form-control" id="c_path"
																placeholder="Video path here" name="vid_path">
															<span id="desc_error"
																class="text-danger font-weight-bold"></span>
														</div>

														<div class="">
															<button type="submit" class="btn btn-success"
																name="btn_add_new_vid">CREATE</button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
									<!-- add new video course tab ends -->
									<!-- ======================================================================================================= -->




									<!-- ======================================================================================================= -->
									<!-- update video course tab starts -->

									<!-- <div class="tab-pane abs fade p-3" id="two" role="tabpanel"
										aria-labelledby="two-tab">
										<div class="card-body col-md-12">
											<div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
												<div class="card-header bg-primary text-light p-2 cardh2 ">
													<h3>UPDATE VIDEO</h3>
												</div>

												<div class="card-body small">



													<form action="video_add.php" method="post"
														enctype="multipart/form-data" onsubmit="">


														<div class="form-group">

															<label for="exampleFormControlSelect1">Select Video Lesson
																:</label>
															<select class="form-control" id="exampleFormControlSelect1"
																name="selected-course-to-update">

																<?php //foreach ($video as $course_list) {
																	?>
																	<option>
																		<?php //echo $course_list['course_name']; ?>
																	</option>
																<?php //} ?>

															</select>
														</div>


														<div class="form-group">
															<label for="pwd">VIdeo Description</label>
															<input type="text" class="form-control" id="c_desc"
																placeholder="Description Here" name="course_desc">
															<span id="desc_error"
																class="text-danger font-weight-bold"></span>
														</div>

														<div class="form-group">
															<label for="pwd">Video Image</label>
															<input type="file" class="form-control" id="c_img"
																placeholder="Upload Image Here" name="course_image">
															<span id="image_error"
																class="text-danger font-weight-bold"></span>
														</div>

														<div class="">
															<button type="submit" class="btn btn-success"
																name="btn_update_vid">UPDATE</button>
														</div>
													</form>

												</div>
											</div>


										</div>
									</div> -->


									<!-- update video course tab ends -->
									<!-- ======================================================================================================= -->



									<!-- ======================================================================================================= -->
									<!-- delete video course tab starts -->


									<div class="tab-pane abs fade p-3" id="three" role="tabpanel"
										aria-labelledby="three-tab">
										<div class="card-body col-md-12">
											<div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
												<div class="card-header bg-primary text-light p-2 cardh2">
													<h3>DELETE VIDEO</h3>
												</div>

												<div class="card-body small">

													<form action="video_add.php" method="post"
														enctype="multipart/form-data">
														<div class="form-group">
															<label for="exampleFormControlSelect1">Select Video</label>
															<select class="form-control" id="exampleFormControlSelect1"
																name="selected_course">
																<?php foreach ($video as $course_list) {
																	?>
																	<option>
																		<?php echo $course_list['course_name']; ?>
																	</option>
																<?php } ?>
															</select>
														</div>

														<div>
															<button type="submit" class="btn btn-danger"
																name="btn-delete-vid">DELETE</button>
														</div>
													</form>

												</div>
											</div>


										</div>
									</div>



									<!-- delete video course tab ends -->
									<!-- ======================================================================================================= -->

								</div> <!-- tab content  -->









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


		$('#myTab a').on('click', function (e) {
			e.preventDefault()
			$(this).tab('show')
		});
		// =============================================================================================================
		// javascript validation function

		function validation() {
			var name = document.getElementById('c_name').value;
			var img = document.getElementById('c_img').value;
			if (name == "") {
				document.getElementById('name_error').innerHTML = "** please enter the course name";
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

		$(window).on('load', function () {
			$('#myModal').modal('show');
		});


				   // javascript validation function
// =============================================================================================================

	</script>


</body>

</html>