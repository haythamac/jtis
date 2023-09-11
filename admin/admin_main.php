<?php 
include("../multi_login/functions.php");
if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}

include("classes/admin.php");
$admin=new admin;
$userd=$admin->show_users();
?>

<!doctype html>
<html lang="en">
<head>
  <!-- <link href="../online_quize/admin/bootstrap.min.css" rel="stylesheet"> -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <style type="text/css">
  .custom-select select{
    background-color: transparent;
    padding: 5px;
    margin: 0;
    width: 100%;
    font-family: inherit;
    font-size: inherit;
    cursor: inherit;
    line-height: inherit;
  }

  .input-field{
    position: relative;
    width: auto;
  }
  .input-field.success{
    border-color: #09c372;
  }
  .input-field.error{
    border-color: #ff3860;
    color: #ff3860;
  }

  .gender-field .input-field{
    display: flex;
    flex-direction: row !important;
  }
  .gender-field .input-field label{
    margin: auto 5px;
  }
  </style>

  <title>Admin panel</title>
  <!----font-awsome start-->
  <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">


          <!----magnific popup css file for work section 
          <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        -->

          <!----owlcarousel css file for our team section 
          <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
          <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
        -->

          <!----Linking google fonts
          <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        -->

        <!----font-awsome start-->
        <link rel="stylesheet" href="/jtis/css/all.css">

        <!----font-awsome ends-->

        <!----favicon setting-->
        <link rel="shortcut icon" type="text/css" href="../../jtis/img/shortcuticon.svg">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!----css file link-->
        <link rel="stylesheet" type="text/css" href="/jtis/css/style.css">
        <link rel="stylesheet" type="text/css" href="/jtis/css/custom.css">
        <link rel="stylesheet" href="../css/admin.css">

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

      <body style="background-color:#f1efef">


       <!---Navigation Starts	----->
       <div id="nav-placeholder">

       </div>

       <script>
        $(function(){
          $("#nav-placeholder").load("nav.html");
        });
      </script>
      <!---Navigation Ends ----->
      <!-- sidebar starts -->
      <div class="container-fluid" >
        <div class="row" style="margin-top:82px;">
          <!-- sidebar starts -->
          <div class="col-sm-5 col-md-3 col-lg-3 sidebar" id="sidebar" >
            <ul class="list-group text-white sidebar-list">
              <a href="admin_main.php"><li class="list active-dash">Overview</li></a>
              <a href="manage_lesson/manage_topic.php"><li class="list">Manage Lessons</li></a>
              <a href="manage_quiz/manage_quiz.php"><li class="list ">Manage Quizzes</li></a>
              <a href="/jtis/admin/manage_exam/manage_exam.php"><li class="list ">Manage Exam</li></a>
              <a href="manage_videos/manage_videos.php"><li class="list">Manage Videos</li></a>
              <a href="../logout.php?logout='1'"><li class="list">Logout</li></a>
            </ul>
          </div>
          <!-- sidebar ends -->
          
          <!-- main content starts -->
          <div class=" col-md-9">
            <div class="row"  id="manageyoursection" >
              <div class="col-md-4 manage">
                <a href="manage_lesson/manage_topic.php"><div class="card shadow " id="manageyourlesson">

                  <div class="card-label">
                    <i class="fa fa-book ml-3" style="color: blue"></i><br>
                    <p class="card-text">MANAGE YOUR COURSE </p>
                  </div>
                </div></a>

              </div>
              <div class="col-md-4  manage">
                <a href="manage_videos/manage_videos.php" > <div class="card shadow " id="manageyourvid">

                  <div class="card-label">
                    <i class="fa fa-video-camera ml-3" style="color: orangered"></i><br>
                    <p class="card-text ">MANAGE YOUR VIDEOS</p>
                  </div>
                </div></a>

              </div>
              <!--  no of courses and videos starts -->
              <div class="col-md-4 manage">
               <a href="manage_quiz/manage_quiz.php"><div class="card shadow" id="manageyourquiz">


                <div class="card-label">
                  <i class="fa-solid fa-circle-question"style="color: yellow"></i><br>
                  <p class="card-text ">MANAGE YOUR QUIZ</p>
                </div>
              </div></a>

            </div>

          </div>

          <div class="row ">     <!--  second row closed -->

            <div class="col-md-8">    <!-- list of users starts -->

              <table class="table bg-white shadow pl-5 user-list-table table-responsive" style="overflow-y: scroll; max-height: 600px;"> 
              
               <!-- table stsrts  -->  <!--  use table-responsive class -->
               <p class="headerdash">List of users </p>
               <div class="col-sm-4">
                <input type="text" id="searchInput" placeholder="Search...">
              </div>
               
               <thead >
                <tr>

                  <th scope="col">id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Middle name</th>
                  <th scope="col">Last name</th>
                  <th scope="col">Grade</th>
                  <th scope="col">Section</th>
                  <th scope="col">Email</th>
                  <th scope="col">Check user</th>
                </tr>
              </thead>
              <tbody>

               <?php 
               foreach ($userd as $userdata) {


                 ?> 
                 <tr data-search="<?php echo strtolower($userdata['firstName'] . ' ' . $userdata['lastName'] . ' ' . $userdata['email']); ?>">
                  <td ><strong><?php echo $userdata['user_id']; ?></strong></td>
                  <td ><?php echo $userdata['firstName']; ?></td>
                  <td ><?php echo $userdata['middleName']; ?></td>
                  <td ><?php echo $userdata['lastName']; ?></td>
                  <td ><?php echo $userdata['grade']; ?></td>
                  <td ><?php echo $userdata['section']; ?></td>
                  <td><?php echo $userdata['email']; ?></td>
                  <td><a href="check_user_details.php?user_id=<?php echo $userdata['user_id']?>" class="no-gutters text-primary">Check user</a></button></td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
          <!-- table ends  -->
        </div>   <!-- list of users ends -->
        <div class="col-sm-4 ">


          <table class="table table-borderless">

            <tbody >
              <tr>
                <td class="mytable1">
                  <div class="card " style="height: 110px; ">

                    <div class="">
                      <p class="card-text text-white"><b class="h4">No. Of Courses </b><br><span style="font-size: 20px;"><?php $admin->display_course_count(); ?></span></p>
                    </div>
                  </div>

                </td>

              </tr>
              <tr>
                <td class="mytable2">
                  <div class="card shadow" style="height: 110px;">

                   <div class="">
                    <p class="card-text text-white"><b class="h4">No. Of Videos</b><br><span style="font-size: 20px;"><?php $admin->display_video_count(); ?></span></p>
                  </div>

                </td>

              </tr>

            </tbody>
          </table>
          <div class="card" style="width: 14rem; height: 10rem;">
            <div class="card-body">
              <form method="POST" action="admin_main.php">
                <div class="input-field">
                    <select name="set_grading" style="padding:1rem; margin-bottom: 20px;">
                      <option disabled>Select grading:</option>
                      <option value="first">First grading</option>
                      <option value="second">Second grading</option>
                      <option value="third">Third grading</option>
                      <option value="fourth">Fourth grading</option>
                    </select>
                </div>
                <button class="submit-button" type="submit" name="set_grading_btn" style="padding: 10px;">Make changes</button>
              </form>
            </div>
          </div>


        </div>       <!--  no of courses and videos starts -->
      </div>  <!--  second row closed -->
    </tbody>
  </table>
</div-->    
<!--/div-->              
</div>


<!-- main content starts -->

</div>       <!--  main row closed -->
</div>          <!-- container closed -->
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <!-- javascript search -->
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var tableRows = document.querySelectorAll('.user-list-table tbody tr');

            searchInput.addEventListener('input', function() {
              var searchText = searchInput.value.trim().toLowerCase();

              tableRows.forEach(function(row) {
                var searchData = row.getAttribute('data-search').toLowerCase();

                if (searchData.includes(searchText)) {
                  row.style.display = 'table-row';
                } else {
                  row.style.display = 'none';
                }
              });
            });
          });
        </script>

      </body>
      </html>
