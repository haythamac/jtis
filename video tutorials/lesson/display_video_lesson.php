<?php 
	include 'conn.inc.php';
	include "../../admin/includes/navbar2.php";
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>JTIS</title>
			<style type="text/css">
				.div1                           /* for title image*/
				{
				position: relative;
					height: 400px;
					background:url(../../img/Video1.jpg);
					background-size: 1000px 500px;
					background-position: center;
					background-repeat: no-repeat;
				}
				.vid-container{
					border-top: 19px groove #aaaaaa;
					padding: 20px 30px;
					margin: 0 20px;
				}
				.card-body
				{
					border-style: solid !important;
					border-width:1px !important;
					border-color: #ccc;
					margin-bottom: 20px;
				}
				.card-shadow{
					box-shadow: 2px 7px 14px -1px rgba(0,0,0,0.98);
					
				}
				.inner img
				{
					width: 100%;
					margin-bottom: 5px;
				}
				.btn{
					text-transform: uppercase;
					background: #285430;
					border: 1px solid #285430 !important;
				}
				.video-title{
					font-size: 40px;
					font-weight: bold;
					color: #285430;
					letter-spacing: 2px;
					text-align: center;
					margin-bottom: 20px;
				}
				.card{
					margin-bottom: 20px;
				}
				.card-title{
					position: absolute;
					bottom: 40px;
					left: 20px;
					display block;
					padding: 10px;
					background: #285430;
					text-transform: uppercase;
					color: white;
					width: 90%;
					text-align: center;
				}
				.btn:hover{
					background:#96bd9ed9;
					border: 1px solid #96bd9ed9 ;
				}
			</style>
	</head>
	<body>

		<!-- title image start -->
		<div class="container-fluid  div1">
			
		</div>
		<!-- title image ends -->
			
		<!-- video course card starts -->
		<div class="vid-container">
		<div> <h4 class="video-title">VIDEO MATERIALS</h4></div>
			<div class="row">
				
					<?php 
							$sql="select * from video_info";
							$result=mysqli_query($con,$sql);
							while ($row=mysqli_fetch_array($result))
							{
								?> 
								<div class="col-md-4 col-lg-4 col-sm-6 card" >
									<div class="card-shadow" style="width: 100%; height: 200px;">
								<div class="inner">                                                  <!--  to zoom in and zoom out effect -->
											<img class="card-img-top " style="height: 15rem;"   src=<?php echo $row['image']; ?> alt="Card image cap">
											<h5 class="card-title"><?php echo $row['course_name']; ?></h5>
									</div>
									<div class="card-button text-center">
								
										<a href="display_video_list.php?course_name=<?php echo $row['course_name']; ?>" class="btn btn-primary">watch videos</a>
									</div>
										</div>
									</div>
								
						<?php } ?>     <!--  while loop closed -->
								
			</div>
			

		</div>

		<!-- video course card ends -->
	<!-- 
	<?php 
			$sql="select * from video_info";
			$result=mysqli_query($con,$sql);
			while ($row=mysqli_fetch_array($result))
			{
				?> <button > <a ><?php  echo $row['course_name']; ?></a></button><?php 
			}
			
	?> -->

	</body>
</html>
