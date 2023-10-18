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

  <!----owlcarousel css file for our team section -->

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

  <!----owlcarousel js file for our team section -->


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
          <div class="col-lg-12" style="max-width: 1000px;">
            <h3 class="text-center mt-2 editlesson">Edit Quiz</h3><br>
            <?php
              $con = mysqli_connect('localhost', 'root');
              $getId = $_GET['id'];


              mysqli_select_db($con, 'jtis');
              $q = "SELECT a.assessment_id, a.assessment_name, sb.language_name, a.difficulty
                  FROM assessment AS a
                  LEFT JOIN science_branch AS sb ON a.lesson = sb.id 
                  WHERE assessment_id={$getId};";
              $q2 = "SELECT * FROM question WHERE assessment_id={$getId}";

              $result = mysqli_query($con, $q);
              $result2 = mysqli_query($con, $q2);
              $res = mysqli_fetch_array($result);
              
            ?>
            
            <div class="quiz-details">
              <div class="quiz-name"><strong>Quiz name:</strong> <?php echo ucfirst($res['assessment_name']);?></div>
              <div class="quiz-lesson"><strong>Lesson:</strong> <?php echo ucfirst($res['language_name']);?></div>
              <div class="quiz-difficulty"><strong>Difficulty:</strong> <?php echo ucfirst($res['difficulty']);?></div>
            </div>
            <div style="margin: 1rem 0; border: 1px solid black; padding: 3px; max-width: 100px; text-align: center;">
            <?php if ($res['difficulty'] == 'easy' || $res['difficulty'] == 'medium'){?>
              <span class="clickable-modal" style="cursor: pointer; color: blue;" data-bs-toggle="modal" data-bs-target="#addQuestion">
                Add question
              </span>
            <?php } else{?>
              <span class="clickable-modal" style="cursor: pointer; color: blue;" data-bs-toggle="modal" data-bs-target="#addQuestion2">
                Add question
              </span>
            <?php }?>
            </div>
            <?php 
            if($result2 && mysqli_num_rows($result2) > 0){
              while ($row = mysqli_fetch_assoc($result2)) { 
                if($res['difficulty'] == 'easy' || $res['difficulty'] == 'medium'){
                  $count = 1;
                  ?>
                  <div class="quiz-container">
                    <form class="quiz-form" action="#" data-question-id="<?php echo $row['question_id']; ?>" method="POST">
                      <input type="text"  hidden>
                      <div class="quiz-row" style='border: black solid 1px; margin-bottom:1rem; padding:10px;'>
                          <div class="quiz-question" style="margin-bottom: 1rem;"><?php echo $count . '. ';?><input type="text" name="question" value="<?php echo $row['question']; ?>"></div>
                          <div class="quiz-options">
                              <ul style="display: flex; flex-direction: column;">
                                  <input type="text" name="option_1" value="<?php echo $row['option_1']; ?>" style="list-style: none; background-color: gray !important; color: white;"> </input>
                                  <input type="text" name="option_2" value="<?php echo $row['option_2']; ?>" style="list-style: none; background-color: gray !important; color: white;"> </input>
                                  <input type="text" name="option_3" value="<?php echo $row['option_3']; ?>" style="list-style: none; background-color: gray !important; color: white;"> </input>
                                  <input type="text" name="option_4" value="<?php echo $row['option_4']; ?>" style="list-style: none; background-color: gray !important; color: white;"> </input>
                              </ul>
                          </div>
                          <div class="quiz-answer">Answer: <input type="text" name="answer" value="<?php echo $row['answer'];?>"></div>
                          <div style="display: flex; justify-content: space-between; max-width: 200px;">
                            <div><input type="button" class="saveButton" id="saveButton" style="padding: 5px;" value="Save changes"></input></div>
                            <div><input type="button" class="deleteButton" data-question-id="<?php echo $row['question_id'];?>" id="deleteButtonId" style="padding: 5px;" value="Delete"></input></div>
                          </div>
                      </div>
                    </form>
                  </div>
            <?php  
                } else if ($res['difficulty'] == 'hard')
                  { ?>
                    <div class="quiz-container">
                      <form class="quiz-form" action="#" data-question-id="<?php echo $row['question_id']; ?>" method="POST">
                        <input type="text"  hidden>
                        <div class="quiz-row" style='border: black solid 1px; margin-bottom:1rem; padding:10px;'>
                            <div class="quiz-question" style="margin-bottom: 1rem;">Question: <input type="text" name="question" value="<?php echo $row['question']; ?>"></div>
                            <div class="quiz-answer">Answer: <input type="text" name="answer" value="<?php echo $row['answer'];?>"></div>
                            <div style="display: flex; justify-content: space-between; max-width: 200px;">
                              <div><input type="button" class="saveButton" id="saveButton" style="padding: 5px;" value="Save changes"></input></div>
                              <div><input type="button" class="deleteButton" data-question-id="<?php echo $row['question_id'];?>" id="deleteButtonId2" style="padding: 5px;" value="Delete"></input></div>
                            </div>
                        </div>
                      </form>
                    </div>
                  <?php 
                  }
              }
            } else {
              echo "<h1 style='margin: 5rem auto; width: 50%; '>No questions yet.</h1>";
            } ?>
          </div>

        </div>

      </div>

    </div>




  </div>



  </div>
  </div>

  <!-- Add Modal 1 -->
  <div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true"
    style="padding: 2rem;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 602px;height: 652px!important;">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel" style="color: black; font-size:2rem;">Add question</h5>
          <button type="button" style="border: none; background:none; padding: 0 0.5rem;" data-bs-dismiss="modal"
            aria-label="Close">&times;</button>
        </div>
        <form action="#" method="post" id="firstForm">
          <div class="modal-body d-flex flex-column align-content-between">
            <div>
              <p>Instruction: This is a multiple-choice question. The answer must be the same index (number) as the
                option you want to be the answer.</p>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Question Name" name="questionName" id="questionId"
                aria-label="quiz" required>
            </div>

            <div class="form-group" style="display: flex; flex-direction: column;">
                <input type="text" name="add_option_1" placeholder="Option 1">
                <input type="text" name="add_option_2" placeholder="Option 2">
                <input type="text" name="add_option_3" placeholder="Option 3">
                <input type="text" name="add_option_4" placeholder="Option 4">
            </div>


            <div class="form-group">
              <label for="answer">Answer</label>
              <select class="form-control" name="answer" id="answer">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="addBtn">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
  <!-- Add Modal 2 -->
  <div class="modal fade" id="addQuestion2" tabindex="-1" aria-labelledby="ModalLabel3" aria-hidden="true"
    style="padding: 2rem;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="width: 602px;height: 412px!important;">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel2" style="color: black; font-size:2rem;">Add question</h5>
          <button type="button" style="border: none; background:none; padding: 0 0.5rem;" data-bs-dismiss="modal"
            aria-label="Close">&times;</button>
        </div>
        <form action="#" method="post" id="thirdForm">
          <div class="modal-body d-flex flex-column align-content-between">
            <div>
              <p>Instruction: This is an identification. The system will check if the input of the student is the same
                as the answer regardless of the letter case</p>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Question" name="questionHard" aria-label="Question" id="questionId2" required>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Answer" name="answerHard" aria-label="Answer" id="answer2" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="addBtn2">Add</button>
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
    var difficulty = 'easy';
    var questionName = document.getElementById('questionId').value;

    const selectDifficulty = document.getElementById('difficultyId');
    const addBtn = document.getElementById('addBtn');
    const addBtn2 = document.getElementById('addBtn2');
    // Get all elements with the class "deleteButton"
    const deleteButtons = document.querySelectorAll('.deleteButton');

    // Add a click event listener to each "deleteButton"
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Retrieve the question_id from the data attribute
            const questionId = button.getAttribute('data-question-id');
            
            // Log the question_id
            console.log('Delete button clicked for question_id: ' + questionId);

            $.ajax({
              type: 'POST',
              url: 'save_delete_quiz.php',
              data: { questionId: questionId },
              success: function(response){
                console.log(response);
                location.reload();
              }
            });
        });
    });


    $(document).on('click', '.saveButton', function () {
        const form = $(this).closest('.quiz-form');
        const formData = form.serializeArray();  // Serialize as an array
        const questionId = form.data('question-id');

        // Create an object to hold the data
        const postData = {
            questionId: questionId
        };

        // Iterate through the form data and add it to the postData object
        for (let i = 0; i < formData.length; i++) {
            postData[formData[i].name] = formData[i].value;
        }

        // Send the data to the server using AJAX
        $.ajax({
            type: 'POST',
            url: 'save_edited_quiz.php',
            data: postData,
            success: function (response) {
                console.log(response);
            }
        });
    });

    // Add a click event listener to the button
    addBtn.addEventListener("click", function () {
      questionName = document.getElementById('questionId').value;
      const option1 = $("input[name='add_option_1']").val();
      const option2 = $("input[name='add_option_2']").val();
      const option3 = $("input[name='add_option_3']").val();
      const option4 = $("input[name='add_option_4']").val();
      const answer = $("#answer").val();

      if (
        !questionName ||
        questionName.trim() === '' || // Check if questionName is empty or contains only whitespace
        !option1 ||
        option1.trim() === '' ||
        !option2 ||
        option2.trim() === '' ||
        !option3 ||
        option3.trim() === '' ||
        !option4 ||
        option4.trim() === '' ||
        !answer
      ) {
        alert("Please fill in all fields.");
        return;
      }

      // Create an object to hold the data
      const postData = {
        questionName: questionName,
        option1: option1,
        option2: option2,
        option3: option3,
        option4: option4,
        answer: answer,
        assessmentId: <?php echo $getId; ?>
      };

      // Send the data to the server using AJAX
      $.ajax({
        type: "POST",
        url: "save_add_quiz.php", // Replace with the actual URL
        data: JSON.stringify(postData), // Convert the object to JSON
        contentType: 'application/json',
        success: function (response) {
          //$("#addQuestion").modal("hide");
          location.reload();
        },
        error: function () {
          // Handle AJAX errors
          alert("Error: Unable to add question. Please try again.");
        }
      });
    });

    addBtn2.addEventListener("click", function () {
      questionName = document.getElementById('questionId2').value;

      if (questionName === '' || questionName === null || questionName === undefined) {
        alert("Please enter a question.");
        return;
      }

      const answer = $("#answer2").val();

      // Create an object to hold the data
      const postData = {
        questionName: questionName,
        answer: answer,
        assessmentId: <?php echo $getId; ?>
      };

      // Send the data to the server using AJAX
      $.ajax({
        type: "POST",
        url: "save_add_quiz2.php", // Replace with the actual URL
        data: JSON.stringify(postData), // Convert the object to JSON
        contentType: 'application/json',
        success: function (response) {
          console.log(answer)
          //$("#addQuestion").modal("hide");
          location.reload();
        },
        error: function () {
          // Handle AJAX errors
          alert("Error: Unable to add question. Please try again.");
        }
      });
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