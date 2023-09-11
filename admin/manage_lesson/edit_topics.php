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



</head>

<body>
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
      <!-- ========================================================================================================================== -->

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



      <div class="col-md-9 "> <!--  main body content starts -->


        <div class="col-lg-12">
          <h3 class="text-center mt-2 editlessonh">Manage Your Course</h3><br>
          <table class="table table-striped table-hover shadow" id="managetopic">

            <tr class="font-weight-bold">
              <th>id</th>
              <th>topic name</th>
              <th>Delete</th>

            </tr>
            <?php

            $con = mysqli_connect('localhost', 'root');


            mysqli_select_db($con, 'jtis');
            $coursename = $_GET['course_name'];
            $q = "select * from courses where course_name='$coursename'";
            $result = mysqli_query($con, $q);
            while ($res = mysqli_fetch_array($result)) {


            ?>

              <tr class=" ">
                <td><?php echo $res['id'] ?></td>

                <td><?php echo $res['topic_name']; ?></td>



                <td><a class=" no-gutters text-danger" href="verify/verify_delete.php?course_id=<?php echo $res['id'] ?>&amp;course_name=<?php echo $res['course_name']; ?>" style="text-decoration: none;">Delete<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

              </tr>

            <?php }

            echo '<button class="btn btn-success mb-3" id="btn-add"><a href="add_new_topic.php?course_name=' . $coursename . '" class="text-white">Add a new topic</a></button>';

            ?>
          </table>
        </div>




      </div>
    </div>
  </div>


  <body>

</html>