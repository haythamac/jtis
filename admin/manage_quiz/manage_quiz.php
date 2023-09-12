<?php
include("../../multi_login/functions.php");

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}

include("../classes/manage_quiz_class.php");
$quiz = new manage_quiz_class; // creating object of  manage_courses_class.php
$quiz_list = $quiz->display_quiz_courses(); //calling display_courses() method from manage_courses_class.php
$diff_list = $quiz->display_quiz_difficulty();
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

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
      <div class="col-md-9 mt-2 pt-2" id="manage-main-content">
        <!-- ========================================================================================================================== -->

        <!-- ========================================================================================================================== -->


        <!-- MANAGE QUIZ -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!--  main body content starts -->
          <div class="col-lg-12">
            <h3 class="text-center mt-2 editlesson">Manage Quiz</h3><br>
            <div><span class="clickable-modal" style="cursor: pointer; color: blue;" data-bs-toggle="modal"
                data-bs-target="#addQuiz">Add quiz</span></div>
            <table class="table table-striped table-hover shadow table-bordered" id="delete_question">

              <tr class="font-weight-bold">
                <th>id</th>
                <th>Quiz name</th>
                <th>Lesson</th>
                <th>Difficulty</th>
                <th>Top student</th>
                <th colspan="2">Action</th>
              </tr>
              <?php

              $con = mysqli_connect('localhost', 'root');


              mysqli_select_db($con, 'jtis');
              $q = "SELECT a.assessment_id, a.name, a.lesson, a.difficulty, u.firstName, u.lastName
                  FROM assessment AS a
                  INNER JOIN leaderboard AS l ON a.leaderboard_id = l.leaderboard_id
                  INNER JOIN user_info AS u ON l.user_id = u.user_id;";
              $result = mysqli_query($con, $q);
              while ($res = mysqli_fetch_array($result)) {


                ?>

                <tr class=" ">
                  <td>
                    <?php echo $res['assessment_id']; ?>
                  </td>
                  <td>
                    <?php echo ucfirst($res['name']); ?>
                  </td>
                  <td>
                    <?php echo ucfirst($res['lesson']); ?>
                  </td>
                  <td>
                    <?php echo ucfirst($res['difficulty']); ?>
                  </td>
                  <td>
                    <?php echo ucfirst($res['firstName']) . ' ' . ucfirst($res['lastName']); ?>
                  </td>
                  <td><a href="edit_quiz.php">Update</a></td>
                  <td><a class=" no-gutters text-danger"
                      href="verify/verify_delete.php?id=<?php echo $res['assessment_id']; ?>"
                      style="text-decoration: none;">Delete<i class="fa fa-trash-o ml-2" aria-hidden="true"></a></td>

                </tr>

              <?php }


              ?>
            </table>
          </div>

        </div>

      </div>

    </div>




  </div>



  </div>
  </div>

  <!-- Add Modal 1 -->
  <div class="modal fade" id="addQuiz" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true"
    style="padding: 2rem;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 602px;height: 452px!important;">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel" style="color: black; font-size:2rem;">Add quiz</h5>
          <button type="button" style="border: none; background:none; padding: 0 0.5rem;" data-bs-dismiss="modal"
            aria-label="Close">&times;</button>
        </div>
        <form action="#" method="post" id="firstForm">
          <div class="modal-body d-flex flex-column align-content-between">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Quiz name" name="quizName" id="quizId"
                aria-label="quiz" required>
            </div>

            <div class="form-group">
              <label for="lessonId">Lesson</label>
              <select class="form-control" id="lessonId">
                <?php foreach ($quiz_list as $row) { ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['language_name']; ?></option>
                  <?php
                } ?>
              </select>
            </div>


            <div class="form-group">
              <label for="difficultyId">Difficulty</label>
              <select class="form-control" id="difficultyId">
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Modal 2 -->
  <div class="modal fade" id="addQuiz2" tabindex="-1" aria-labelledby="ModalLabel2" aria-hidden="true"
    style="padding: 2rem;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 602px;height: 712px!important;">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel2" style="color: black; font-size:2rem;">Question</h5>
          <button type="button" style="border: none; background:none; padding: 0 0.5rem;" data-bs-dismiss="modal"
            aria-label="Close">&times;</button>
        </div>
        <form action="test.php" method="post" id="secondForm">
          <div class="modal-body d-flex flex-column align-content-between">
            <div>
              <p>Instruction: This is a multiple-choice question. The answer must be the same index (number) as the
                option you want to be the answer.</p>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Question" name="question" aria-label="Question"
                required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Option 1" name="option1" aria-label="Option 1"
                required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Option 2" name="option2" aria-label="Option 2"
                required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Option 3" name="option3" aria-label="Option 3"
                required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Option 4" name="option4" aria-label="Option 4"
                required>
            </div>
            <div class="form-group">
              <label for="answer">Answer</label>
              <select class="form-control" id="answer">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-target="#addQuiz" data-bs-toggle="modal"
              data-bs-dismiss="modal">
              Go back
            </button>
            <button type="submit" name="addQuiz" class="btn btn-primary">Add Quiz</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Modal 3 -->
  <div class="modal fade" id="addQuiz3" tabindex="-1" aria-labelledby="ModalLabel3" aria-hidden="true"
    style="padding: 2rem;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 602px;height: 412px!important;">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel2" style="color: black; font-size:2rem;">Identification</h5>
          <button type="button" style="border: none; background:none; padding: 0 0.5rem;" data-bs-dismiss="modal"
            aria-label="Close">&times;</button>
        </div>
        <form action="quiz_add.php" method="post" id="secondForm">
          <div class="modal-body d-flex flex-column align-content-between">
            <div>
              <p>Instruction: This is an identification. The system will check if the input of the student is the same
                as the answer regardless of the letter case</p>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Question" name="question" aria-label="Question">
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Answer" name="answer" aria-label="Answer">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-target="#addQuiz" data-bs-toggle="modal"
              data-bs-dismiss="modal">
              Go back
            </button>
            <button type="submit" name="addQuiz" class="btn btn-primary">Add Quiz</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script type="text/javascript">
    var lesson = document.getElementById('lessonId').value;
    var difficulty = 'easy';
    var quizName = document.getElementById('quizId').value;

    const selectDifficulty = document.getElementById('difficultyId');
    const selectLesson = document.getElementById('lessonId');
    const NEXTBUTTON = document.getElementById('nextBtn');

    // Add an event listener for the 'change' event
    selectDifficulty.addEventListener('change', function () {
      // Get the selected value
      var selectedValue = selectDifficulty.value;

      // Do something with the selected value, e.g., set it to a variable
      difficulty = selectedValue;

      // You can now use the 'difficulty' variable as needed
      console.log("Selected difficulty: " + difficulty);
    });

    selectLesson.addEventListener('change', function () {
      // Get the selected value
      var selectedValue = selectLesson.value;

      // Do something with the selected value, e.g., set it to a variable
      lesson = selectedValue;

      // You can now use the 'difficulty' variable as needed
      console.log("Selected lesson: " + lesson);
    });


    // Add a click event listener to the button
    NEXTBUTTON.addEventListener("click", function () {
      quizName = document.getElementById('quizId').value;

      if (quizName === '' || quizName === null || quizName === undefined) {
        alert("Please enter a quiz name.");
        return;
      }

      if (difficulty == 'easy') {
        $('#addQuiz').modal('hide');
        $('#addQuiz2').modal('show');
      } else if (difficulty == 'medium') {
        $('#addQuiz').modal('hide');
        $('#addQuiz2').modal('show');
      } else if (difficulty == 'hard') {
        $('#addQuiz').modal('hide');
        $('#addQuiz3').modal('show');
      }

    });

    document.getElementById("secondForm").addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent the default form submission

      // Get form data
      var formData = new FormData(this);
      var addButton = this.querySelector('[name="addQuiz"]');

      formData.append("submitButtonName", addButton.name);

      // Add additional data to the FormData object
      formData.append("lesson", lesson);
      formData.append("difficulty", difficulty);

      // Process the form data here using JavaScript
      var question = formData.get("question");
      var option1 = formData.get("option1");
      var option2 = formData.get("option2");
      var option3 = formData.get("option3");
      var option4 = formData.get("option4");
      var answer = formData.get("answer");

      // You can perform additional validation or processing here

      // Send the processed data to a PHP script using an AJAX request
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "test.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      var formDataString = Array.from(formData.entries()).map(entry => {
        console.log(entry[1]);
        return encodeURIComponent(entry[0]) + "=" + encodeURIComponent(entry[1]);
      }).join("&");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle the response from the PHP script here
          console.log(xhr.responseText);
        }
      };

      xhr.send(formDataString); 
    });



    $('#myTab a').on('click', function (e) {
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
    // Modal show
    jQuery(document).ready(function ($) {
      $(".clickable-row").click(function () {
        $("#modalAction").modal("show");
      });
    });

    $(window).on('load', function () {
      $('#myModal').modal('show');
    });

  </script>


</body>

</html>