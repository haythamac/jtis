<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}

$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'jtis');
    require 'comments.inc.php';      //including comment code
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



        <div class="col-md-9 col-md-9 mt-2 pt-2">   <!--  main body content starts -->

          <h3 class="text-center mt-2">Manage Your <?php  echo $_GET['course_name'];  ?> &nbsp Online Video Tutorial</h3><br>
          <div class="row  ml-2">

            <section class="col-md-7 mt-4">


              <iframe style="border:1px #999 solid;" width="760" height="415" 
              <?php  
              $_SESSION['vid']=$_GET['video_id'];
              $video_id=$_GET['video_id'];
              $sql="select * from videos where video_id='$video_id'";
              $result=mysqli_query($con,$sql);
              while ($row=mysqli_fetch_array($result))
              {
                ?>
      src=<?php echo $row['video_path'];   //fetching youtube video path from database & storing into src attribute
    }

    

    ?>
    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


    <!---Video iframe Ends  ----->


    <!---Comments Section Start ----->
    <br><br>
    
    <div class='commentdiv shadow bg-light' style="border:1px #d2c8c8 solid; background-color: #dfe1e4;">
      <?php  
                      $video_id=$_GET['video_id'];    //getting the value of video is from the previous page using GET
                      echo "      
                      <form method='POST' action='".setComments($con)."'>
                      <input type='hidden' name='uid' value='Anonymous'>
                      <input type='hidden' name='vid' value='".$video_id."'>
                      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                      <textarea name='message'></textarea><br>
                      <button type='submit' name='commentSubmit' class='commentbtn'>Comment</button>
                      </form><br><br>
                      ";      
                    ?>  </div>

                    <?php 

                    getComments($con);


                    ?>

                  </section> 





                </div>




              </div>
            </div>
          </div>


          <body>  
            </html>