<?php 
	session_start();
	 include 'conn.inc.php';
 require 'comments.inc.php';



 date_default_timezone_set('Asia/Kolkata');
 // echo date_default_timezone_get();




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>JTIS</title>
 	<link rel="stylesheet" type="text/css" href="science_video.css">
 	<link rel="stylesheet" type="text/css" href="../../css/science-lesson.css">
	 <link rel="stylesheet" type="text/css" href="../../css/header.css">
	 <link rel="stylesheet" type="text/css" href="../../css/all.css">

 	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="../../img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


	<!----Linking google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<!----font-awsome start-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 	<style type="text/css">
 		#mybody
{
	background-color: #e9ecef;
	height: 100vh	;
}

#video-list-section
{
	position: relative;
	top:80px;
	right: 150px;
	background-color: deepskyblue;
	padding: 20px;
	left:900px;
	width: 20%;

}
.fixed-top
{
	position: relative;
}
iframe{
	width: 100%;
	height: 700px;
}


.item #sidebar-wrapper, #sidebar-wrapper {
    float: right;
    width: 30%;
    max-width: 330px;
}

#sidebar-wrapper {
    padding-top: 20px;
}
.comment-div{
	position: relative;
}


 	</style>
 </head>
 <body id="mybody" class="bg-white">
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
							<li class="w100 nav-li"> <a href="../../index.php" class="border-bot nav-a">Home</a></li>
							<li class="w100 nav-li dropdown">
								<a href="./display_video_lesson.php" class= "w100 nav-li border-bot nav-a">menu</a>
									<div class="dropdown-content">
									<a class="w100 nav-li border-bot nav-a" href="../../sciencedemo.php">LESSON</a>
									<a  class= "w100 nav-li border-bot nav-a" href="../../online_quize/quizhome.php">EXERCISES</a>
									</div>
							</li>
							<!-----dropdown end ---->
							<?php 
					if($_SESSION['user']['user_type'] == 'user'){
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="../../profile.php" class="border-bot nav-a">Setting</a></li>
						<?php 
					}elseif($_SESSION['user']['user_type'] == 'admin'){
						?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="../../admin/admin_main.php" class="border-bot nav-a">Admin setting</a></li>
						<?php
					}
					?>
							<li> <a href="../../logout.php" id="our-location" class="btn-success" ><?php echo $_SESSION['user']['username'];   ?></a></li>
						</ul>
	        	<!------Navigation menus ends---->
					</div>
		</div>
	</nav>

<br>
<div class="container-fluid">
	<div class="row">
 	<section class="">

			<div class="col-md-9 col-lg-9 col-sm-12">
						<div class="row">
							<?php
							$_SESSION['vid'] = $_GET['video_id'];
							$video_id = $_GET['video_id'];
							$sql = "SELECT * FROM videos WHERE video_id='$video_id'";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($result)) {
								$video_path = $row['video_path'];
								?>

								<iframe style="border: 1px #999 solid;" 
										src="<?php echo $video_path; ?>"
										frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							<?php } ?>
							<!-- Video iframe Ends -->
						</div>
 						<div class="row">
							<div class='commentdiv shadow bg-light' style=" display: none; border:1px #d2c8c8 solid; background-color: #dfe1e4;">
										<div class="kanan col-md-6">
										<?php  
										$video_id=$_GET['video_id'];    //getting the value of video is from the previous page using GET
								echo "      
											<form method='POST' action='".setComments($con)."'>
												<input type='hidden' name='uid' value='Anonymous'>
												<input type='hidden' name='vid' value='".$video_id."'>
												<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
												<textarea name='message'placeholder= 'Share your Thoughts...'></textarea><br>
												<button type='submit' name='commentSubmit' class='commentbtn'>Comment</button>
											</form><br><br>
										";			
							?> 
										</div>
										<div class="kaliwa">
										<?php 
										
										getComments($con);
											
										
										?>
										</div>
						
							</div>
						</div>
		</div>
		<div class="col-md-3 col-lg-3 col-sm-1">
				<table class="table table-hover table-borderless bg-light">
					<tbody>
						<div class="card-header text-center bg-light"><h5>Other videos</h5></div>


							<?php 

						$course_name=$_GET['course_name'];

						$sql="select * from videos where course_name='$course_name'";
						$result=mysqli_query($con,$sql);

						while ($row=mysqli_fetch_array($result))
						{
							
					?>

						<tr>
							<td><a href=""><img src=../../uploadimg/thumbnail/<?php echo $row['video_image']; ?>  height="100" width="150"></a></td>
							<td><?php echo $row['video_name']; ?></td>
						
						</tr>

					<?php } ?>
						
					
					</tbody>
				</table>
		</div>
	</section>
	</div>
</div>

	





	

























	



		
							<!-- <div style="clear: both;"></div> -->

 	<!---Video list Ends	----->



 	<!---footer Section Start	----->

<?php 
	include "../../admin/includes/footer.php";
 ?>



 			<!---footer Section Ends	----->

 </body>
 </html>