<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}

include("../classes/manage_exam_class.php");
$exam = new manage_exam_class;      // creating object of  manage_courses_class.php
$exam_list = $exam->display_exam_courses();   //calling display_courses() method from manage_courses_class.php
$diff_list = $exam->display_exam_difficulty();
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

  <style>
    .table-bordered th,
    .table-bordered td {
        border: 1px solid black;
        padding: 8px;
    }
</style>

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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style type="text/css">
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
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#menu1">Delete Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Add Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu4">Add Identification Questions </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3">Edit Questions</a>
          </li>
        </ul>
        <!-- Nav tabs ends -->

        <!-- ========================================================================================================================== -->
        <div class="tab-content">
          <!-- ========================================================================================================================== -->


          <!-- ========================================================================================================================== -->


          <!-- ========================================================================================================================== -->

          <!-- manage course pane starts -->

          <!-- add questions pane starts -->
          <div class="tab-pane container active" id="menu1">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <!--  main body content starts -->
              <div class="col-lg-12">
                <h3 class="text-center mt-2 editlesson">Delete question</h3><br>
                <table class="table table-striped table-hover shadow table-bordered" id="delete_question">

                  <tr class="font-weight-bold">
                    <th>id</th>
                    <th>Topic</th>
                    <th>Difficulty</th>
                    <th>Question</th>
                    <th>Delete</th>
                  </tr>
                  <?php

                  $con = mysqli_connect('localhost', 'root');


                  mysqli_select_db($con, 'jtis');
                  $q = "SELECT qe.id, sc.language_name, qe.difficulty, qe.question 
                  FROM question_exam qe
                  INNER JOIN science_branch sc ON qe.course_id = sc.id";
                  $result = mysqli_query($con, $q);
                  while ($res = mysqli_fetch_array($result)) {


                  ?>

                    <tr class=" ">
                      <td><?php echo $res['id']; ?></td>
                      <td><?php echo ucfirst($res['language_name']); ?></td>
                      <td><?php echo ucfirst($res['difficulty']); ?></td>
                      <td><?php echo ucfirst($res['question']); ?></td>



                      <td><a class=" no-gutters text-danger" href="verify/verify_delete.php?id=<?php echo $res['id']; ?>" style="text-decoration: none;">Delete<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

                    </tr>

                  <?php }


                  ?>
                </table>
              </div>

              <div class="col-lg-12">
                <h3 class="text-center mt-2 editlesson">Delete identification question</h3><br>
                <table class="table table-striped table-hover shadow table-bordered" id="delete_question_identification">

                  <tr class="font-weight-bold">
                    <th>id</th>
                    <th>Topic</th>
                    <th>Difficulty</th>
                    <th>Question</th>
                    <th>Delete</th>
                  </tr>
                  <?php

                  $con = mysqli_connect('localhost', 'root');


                  mysqli_select_db($con, 'jtis');
                  $q = "SELECT qe.id, sc.language_name, qe.difficulty, qe.question 
                  FROM question_exam_identification qe
                  INNER JOIN science_branch sc ON qe.course_id = sc.id";
                  $result = mysqli_query($con, $q);
                  while ($res = mysqli_fetch_array($result)) {


                  ?>

                    <tr class=" ">
                      <td><?php echo $res['id']; ?></td>
                      <td><?php echo ucfirst($res['language_name']); ?></td>
                      <td><?php echo ucfirst($res['difficulty']); ?></td>
                      <td><?php echo ucfirst($res['question']); ?></td>



                      <td><a class=" no-gutters text-danger" href="verify/verify_delete_identification.php?id=<?php echo $res['id']; ?>" style="text-decoration: none;">Delete<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

                    </tr>

                  <?php }

                  ?>
                </table>
              </div>
            </div>
          </div>
          </form>
        <!-- add questions pane ends -->



        <!-- manage courses pane ends -->

        <!-- ========================================================================================================================== -->





        <!-- ========================================================================================================================== -->

        <!-- add questions pane starts -->




        <div class="tab-pane container fade" id="menu2">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Add a new question</h1>

            <?php
            if (isset($_GET['run']) && !empty($_GET['run'])) {
              echo "<p>Question added successfully</p>";
            }
            ?>


            <form method="POST" action="exam_add.php">
              <div class="form-group">
                <label for="text">Question :</label>
                <input type="text" class="form-control" name="question" placeholder="Enter Question">
                <small id="emailHelp" class="form-text text-muted">please enter the question.</small>
              </div>

              <div class="form-group">
                <label for="text">Option 1 :</label>
                <input type="text" class="form-control" name="opt1" placeholder="Enter option 1">
              </div>

              <div class="form-group">
                <label for="text">Option 2 :</label>
                <input type="text" class="form-control" name="opt2" placeholder="Enter option 2">
              </div>


              <div class="form-group">
                <label for="text">Option 3 :</label>
                <input type="text" class="form-control" name="opt3" placeholder="Enter option 3">
              </div>

              <div class="form-group">
                <label for="text">Option 4 :</label>
                <input type="text" class="form-control" name="opt4" placeholder="Enter option 4">
              </div>

              <div class="form-group">
                <label for="text">Answer :</label>
                <input type="text" class="form-control" name="answer" placeholder="Enter the correct answer">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Lesson</label>
                <select class="form-control" id="exampleFormControlSelect1" name="cat">
                  <option class="active" selected disabled>Choose Lesson</option>
                  <?php
                  foreach ($exam_list as $courses) {
                    echo "<option value=" . $courses['id'] . ">" . $courses['language_name'] . "</option>";
                  }
                  ?>
                </select>
                <label for="exampleFormControlSelect1">Select Difficulty</label>
                <select class="form-control" id="exampleFormControlSelect1" name="diff">
                  <option class="active" selected disabled>Choose difficulty</option>
                  <option value="easy">easy</option>
                  <option value="medium">medium</option>
                </select>
              </div>





              <button type="submit" name="btn_add_question" class="btn btn-success">CREATE</button>
            </form>



          </div>


        </div>
        <!-- add questions pane ends -->
        <!-- ========================================================================================================================== -->
        <!-- add questions identification pane starts -->




        <div class="tab-pane container fade" id="menu4">




          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Add a new identification question</h1>

            <?php
            if (isset($_GET['run']) && !empty($_GET['run'])) {
              echo "<p>Question added successfully</p>";
            }
            ?>


            <form method="POST" action="exam_add.php">
              <div class="form-group">
                <label for="text">Question :</label>
                <input type="text" class="form-control" name="question_identification" placeholder="Enter Question">
                <small id="emailHelp" class="form-text text-muted">please enter the question.</small>
              </div>

              <div class="form-group">
                <label for="text">Answer :</label>
                <input type="text" class="form-control" name="answer_identification" placeholder="Enter the correct answer">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect1">Select Lesson</label>
                <select class="form-control" id="exampleFormControlSelect1" name="cat">
                  <option class="active" selected disabled>Choose Lesson</option>
                  <?php
                  foreach ($exam_list as $courses) {
                    echo "<option value=" . $courses['id'] . ">" . $courses['language_name'] . "</option>";
                  }
                  ?>
                </select>
                <label for="exampleFormControlSelect1">Select Difficulty</label>
                <select class="form-control" id="exampleFormControlSelect1" name="diff_identification">
                  <option class="active" selected disabled>Choose difficulty</option>
                  <option value="hard">hard</option>
                </select>
              </div>





              <button type="submit" name="btn_add_question_identification"class="btn btn-success">CREATE</button>
            </form>



          </div>


        </div>
        <!-- add questions identification pane ends -->
        <!-- ========================================================================================================================== -->
        <!-- edit questions pane starts -->




        <div class="tab-pane container fade" id="menu3">




          <div class="col-sm-offset-3 main">
          <div class="col-lg">
                <h3 class="text-center mt-2 editlesson">Edit question</h3><br>
                <table class="table table-striped table-hover shadow table-bordered" id="delete_question">

                  <tr class="font-weight-bold">
                    <th>id</th>
                    <th>Topic</th>
                    <th>Difficulty</th>
                    <th>Question</th>
                    <th>Choice 1</th>
                    <th>Choice 2</th>
                    <th>Choice 3</th>
                    <th>Choice 4</th>
                    <th>Answer</th>
                    <th>Edit</th>
                  </tr>
                  <?php

                  $con = mysqli_connect('localhost', 'root');


                  mysqli_select_db($con, 'jtis');
                  $q = "SELECT qe.id, sc.language_name, qe.difficulty, qe.question, qe.opt1, qe.opt2, qe.opt3, qe.opt4, qe.answer
                  FROM question_exam qe
                  INNER JOIN science_branch sc ON qe.course_id = sc.id";
                  $result = mysqli_query($con, $q);
                  while ($res = mysqli_fetch_array($result)) {
                    $res['answer'] = $res['answer'] + 1;

                  ?>

                    <tr class=" ">
                      <td><?php echo $res['id']; ?></td>
                      <td><?php echo ucfirst($res['language_name']); ?></td>
                      <td><?php echo ucfirst($res['difficulty']); ?></td>
                      <td><?php echo ucfirst($res['question']); ?></td>
                      <td><?php echo ucfirst($res['opt1']); ?></td>
                      <td><?php echo ucfirst($res['opt2']); ?></td>
                      <td><?php echo ucfirst($res['opt3']); ?></td>
                      <td><?php echo ucfirst($res['opt4']); ?></td>
                      <td><?php echo 'Choice number '.ucfirst($res['answer']); ?></td>



                      <td><a class=" no-gutters text-primary" href="verify/verify_changes.php?id=<?php echo $res['id']; ?>" style="text-decoration: none;">Edit<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

                    </tr>

                  <?php }


                  ?>
                </table>
              </div>



          </div>

          <div class="col-lg">
                <h3 class="text-center mt-2 editlesson">Edit identification question</h3><br>
                <table class="table table-striped table-hover shadow table-bordered" id="delete_question">

                  <tr class="font-weight-bold">
                    <th>id</th>
                    <th>Topic</th>
                    <th>Difficulty</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                  </tr>
                  <?php

                  $con = mysqli_connect('localhost', 'root');


                  mysqli_select_db($con, 'jtis');
                  $q = "SELECT qe.id, sc.language_name, qe.difficulty, qe.question, qe.answer
                  FROM question_exam_identification qe
                  INNER JOIN science_branch sc ON qe.course_id = sc.id";
                  $result = mysqli_query($con, $q);
                  while ($res = mysqli_fetch_array($result)) {

                  ?>

                    <tr class=" ">
                      <td><?php echo $res['id']; ?></td>
                      <td><?php echo ucfirst($res['language_name']); ?></td>
                      <td><?php echo ucfirst($res['difficulty']); ?></td>
                      <td><?php echo ucfirst($res['question']); ?></td>
                      <td><?php echo $res['answer']; ?></td>



                      <td><a class=" no-gutters text-primary" href="verify/verify_changes_identification.php?id=<?php echo $res['id']; ?>" style="text-decoration: none;">Edit<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

                    </tr>

                  <?php }


                  ?>
                </table>
              </div>



          </div>


        </div>
        </div>
        <!-- edit questions pane ends -->

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
        document.getElementById('name_error').innerHTML = "** please enter the course name";
        return false;

      }

      if (desc == "") {
        document.getElementById('desc_error').innerHTML = "** please enter the course descsription";
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