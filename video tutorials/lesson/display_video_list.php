<?php 

include 'conn.inc.php';
include "../../admin/includes/navbar2.php";
 ?>

<!DOCTYPE html>
<html>
<head>
<title>JTIS</title>
      <!----css file link-->
      <link rel="stylesheet" type="text/css" href="../../css/header.css">
      <link rel="stylesheet" type="text/css" href="../../css/all.css">
    
      	<!-- Latest compiled and minified CSS -->
      	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!----favicon setting-->
      <link rel="shortcut icon" type="text/css" href="../../img/shortcuticon.svg">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<style type="text/css">
center{
	margin: 20px;
		padding:10px;
		background: #909090;

	}
	.text-free{
		color:#285430;
		text-transform: uppercase;
		ling-hieght: 0px !important;
		font-weight: bold;
		font-size: 20px;
		letter-spacing: 2px;
	}
	.mycard
	{
		transition: all 0.9s ease;
	}
	card-body{
		width: 100% !important;
	}
	.card-img-top{
		width: 100%;
	}
	.card-text{
		padding: 5px;
	}
	.mycard:hover
	{
		transform: scale(1.05);
	}
	.row{
		height: 50vh;
		padding: 0 20px;
	}
	.btn{
		margin: 5px;
		background: #285430;
		text-align: center;
	}
	.linked-vid{
	}
	#to
	{
		display:block;
		width: 130px;
		color:white;
		background: #285430 ;
		font-size: 10px !important;
		padding: 5px;
		margin: 5px;
		position: relative;
		left: 20px;
	}
</style>

</head>
<body>

	<div class="container-fluid position-relative">
<center><p class="text-free"  >watch free <?php echo $_GET['course_name']; ?> online videos</p></center>


		<div class="row">
			

<?php 
		$course_name=$_GET['course_name'];
			$q="select * from videos where course_name='$course_name'";
			//echo $course_name;
			$query=mysqli_query($con,$q);
			while ($row=mysqli_fetch_array($query))
		 {

		 	?> 
			  <a href="science_videos.php?video_id=<?php echo $row['video_id'] ?>&course_name=<?php echo $row['course_name'] ?>" class="linked-vid">
		 	<div class="col-md-2 col-sm-1 col-lg-2 col-xl-2" >
				<div class="card shadow mycard">
		 	<div class="inner">                                                  <!--  to zoom in and zoom out effect -->
						<img class="card-img-top"   src=../../uploadimg/thumbnail/<?php echo $row['video_image']; ?> alt="Card image cap">
				</div>
  
				  <div class="card-body shadow" style="background-color: #f1f1f1;">
				   <!--  <h5 class="card-title"><?php echo $row['course_name']; ?></h5> -->
				    <p class="card-text"><?php echo $row['video_name']; ?></p> 
				 
				  </div>
			</div> </a>

				</div>
			
			
			<?php } ?>     <!--  while loop closed -->
			
		</div>
		<center><a href="./display_video_lesson.php" id="to"><h5>OTHER VIDEOS</h5></a></center>
	

	</div>























		<!-- footer section starts -->

					<footer>
					<?php 	
					include "../../admin/includes/footer.php";
					?>
					</footer>
		<!-- footer section ends -->

</body>
</html>