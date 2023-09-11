<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/jquery.min.js"></script>


  <!-- 		css starts -->>
</head>
</head>

<body>
	

 <!---Navigation Starts ----->
 <div id="nav-placeholder">

 </div>

 <script>
  $(function(){
    $("#nav-placeholder").load("/jtis/admin/nav.html");
  });
</script>
<!---Navigation Ends ----->



<div class="container-fluid">
  <div class="row" style="margin-top:60px;" >
   <!-- sidebar starts -->
   <div class="col-sm-5 col-md-3 col-lg-3 sidebar" id="sidebar">
    <ul class="list-group text-white sidebar-list">
      <a href="/jtis/admin/admin_main.php"><li class="list active-dash">Overview</li></a>
      <a href="/jtis/admin/manage_lesson/manage_topic.php"><li class="list">Manage Lessons</li></a>
      <a href="/jtis/admin/manage_quiz/manage_quiz.php"><li class="list ">Manage Quizzes</li></a>
          <a href="/jtis/admin/manage_exam/manage_exam.php"><li class="list ">Manage Exam</li></a>
      <a href="/jtis/admin/manage_videos/manage_videos.php"><li class="list">Manage Videos</li></a>
      <a href="/jtis/logout.php?logout='1'"><li class="list">Logout</li></a>
    </ul>
  </div>
  <!-- sidebar ends -->


  <!-- ========================================================================================================================== -->


  <div class="col-md-9 mt-2 pt-2 ">   <!--  main body content starts -->


    <div class="col-lg-12">
      <h3 class="text-center mt-2 editlessonh">Manage Your <?php  echo $_GET['course_name'];  ?> &nbsp online video tutorial</h3>
      <!-- <button class="btn btn-success float-right" data-toggle="modal" data-target="#myModal">Add new video</button><br> -->
    </div>
    <div class="row col-md-12 ml-2 shadow">
      <div class="row" style="margin-right:50px;">

        <?php 
        $con=mysqli_connect('localhost','root');

        mysqli_select_db($con,'jtis');

        $course_name=$_GET['course_name'];
        $q="select * from videos where course_name='$course_name'";
                  //echo $course_name;
        $query=mysqli_query($con,$q);
        while ($row=mysqli_fetch_array($query))
        {

          ?> 
          <div class="card p-3" style="max-width:357px; max-height:320px;">
            <div class="card shadow mycard" style="max-width:357px;" >
              <div class="inner">                                                  <!--  to zoom in and zoom out effect -->
                <img class="card-img-top" style="height: 11rem; max-width:357px;"   src=<?php echo $row['video_image']; ?> alt="Card image cap">
              </div>

              <div class="card-body shadow" style="background-color: #f1f1f1;">
                <!--  <h5 class="card-title"><?php echo $row['course_name']; ?></h5> -->
                <p class="card-text"><?php echo $row['video_name']; ?></p> 


                <span class="text-danger" style="font-size: 14px; ">
                  <a href="watch_video.php?video_id=<?php echo $row['video_id'] ?>&course_name=<?php echo $row['course_name'] ?>" class="text-success p-1" style="text-decoration: none;">WATCH <i class="fa fa-eye"></i></a>

                  <a href="video_add.php?id=<?php echo $row['video_id']?>&course_name=<?php echo $row['course_name'] ?>&run=delete" class="p-1 text-danger" name="delete_vid" style="text-decoration: none;">DELETE<i class="fa fa-trash-o ml-1"></i></a>
                </span>
              </div>
            </div>

          </div>

        </div>


        <?php } ?>     <!--  while loop closed -->



      </div>
      





      <!-- ==================================================================================================================== -->

      <!--    modal to add a new video -->

      <div class="col-md-4 mt-5">

       <!-- The Modal -->
       <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Message</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="video_add.php" method='POST' enctype="multipart/form-data">
              <!-- Modal body -->
              <div class="modal-body">
                <input type="hidden" name="course_name" value="<?php  echo $_GET['course_name'];  ?>">

                <div class="form-group">
                  Enter Video Title :<input type="text" name="vid_title" class="form-control">

                </div>

                <div class="form-group">
                  Enter video image :<input type="file" name="vid_img" class="form-control">
                </div>

                <div class="form-group">
                  Enter video path :<input type="text" name="vid_path" class="form-control">
                </div>




                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" name="btn_add_new_vid">ADD</button>         <!-- data-dismiss="modal" -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>












    </div>
  </div>
</div>


<body>	
  </html>