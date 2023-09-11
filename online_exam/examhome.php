<?php
ini_set('display_errors', 0);
include("class/examUsers.php"); //including the users class

$profile = new examUsers; // craeting the object of user class so that we can call show_user_profile() method 
extract($_POST);
$profile->show_users_profile($_SESSION['user']['username']); //calling the show_users profile() method of users class using users class object reference
//print_r($profile->data);
$profile->show_courses(); //calling show_courses() method of users class
$profile->getLessonGrading();

$profile->show_difficulty(); //calling show_difficulty() method of users class
$profile->show_taken_exam();

// test type
$test_type = $_SESSION['test_type'];
?>


<!DOCTYPE html>
<html>

<head>
  <title>JTIS</title>
  <!----css file link-->
  <link rel="stylesheet" type="text/css" href="../css/science-lesson.css">
  <link rel="stylesheet" type="text/css" href="../css/custom.css">
  <link rel="stylesheet" type="text/css" href="../css/all.css">

  <!----favicon setting-->
  <link rel="shortcut icon" type="text/css" href="../img/shortcuticon.svg">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".lesson-class").change(function () {
        var lesson_id = $(this).val();
        $.ajax({
          url: "difficulty.php",
          method: "POST",
          data: { lesson_id: lesson_id },
          success: function (data) {
            $(".difficulty").html(data);
          }
        });
      });
    });

    $(document).ready(function () {
      $(".difficulty-class").change(function () {
        var d_lesson_id = $(".lesson").val();
        var difficulty_id = $(this).val();
        $.ajax({
          url: "difficulty.php",
          method: "POST",
          data: { d_lesson_id: d_lesson_id, difficulty_id: difficulty_id },
          success: function (data) {
            $(".difficulty").html(data);
          }
        });
      });
    });
  </script>

  <!----Linking google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>

<style type="text/css">
  /*.li1{
     float: right !important;
  }
 */
  body {
    font-family: 'Roboto Condensed', sans-seri !important;

  }

  #quiz-greet {
    height: 90vh !important;
    display: flex !important;
    flex-flow: column nowrap;
    justify-content: center !important;
    align-items: center !important;
    text-align: center;
  }

  .container h3 {
    margin: 20px;
    font-size: 40px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .btn,
  .btn:active {
    background: #285430 !important;
    padding: 10px 20px !important;
    outline: none !important;
  }

  label {
    font-size: 20px;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 10px;
    justify-content: center !important;
  }

  .form-group {
    width: 300px;
    text-transform: uppercase;
    margin-bottom: 10px;
    justify-content: center !important;
  }

  .form-control {
    margin-bottom: 10px;
  }

  option,
  select {
    text-transform: capitalize;
    font-weight: bolder;
    letter-spacing: 2px;
  }
</style>


<body>
  <!---Navigation Starts	----->
  <nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
    <div class="container">

      <!------Responsive Button---->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
          <i class="fa-solid fa-bars"></i>
        </button>
        <h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International School
        </h1>
      </div>
      <div class="collapse navbar-collapse" id="navi">
        <!------Navigation menus starts---->
        <ul class="nav navbar-nav navbar-right" id="nav-ul">
          <li class="w100 nav-li"> <a href="../index.php" class="border-bot nav-a">Home</a></li>

          <li class="w100 nav-li dropdown">
            <a class=" w100 nav-li border-bot nav-a">menu</a>
            <div class="dropdown-content">
              <a class="w100 nav-li border-bot nav-a" href="../sciencedemo.php">LESSON</a>
              <a class="w100 nav-li border-bot nav-a"
                href="../video tutorials\lesson\display_video_lesson.php">TUTORIALS</a>
            </div>
          </li>
          <!-----dropdown end ---->
          <li class="w100 nav-li"> <a href="" class="border-bot nav-a">Setting</a></li>
          <li> <a href="../logout.php" id="our-location" class="btn-success">
              <?php echo $_SESSION['user']['username']; ?>
            </a></li>
        </ul>
        <!------Navigation menus ends---->
      </div>
    </div>
  </nav>

  <!-- ========================================================================================================================== -->

  </div>
  </nav>

  <!-- navigation bar ends -->
  <!-- ========================================================================================================================== -->

  <!-- tab section start -->

  <div class="container mt-4 col-md-10 position-relative" id="quiz-greet">
    <h3>Welcome <strong class="primary">
        <?php echo $_SESSION['user']['username']; ?>
      </strong>, Lets start exam</h3>

    <!--ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active " data-toggle="tab" href="#menu1">Home</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#menu2" data-toggle="tab">Profile</a>
    </li>
    <li class="nav-item li1">
      <a class="nav-link justify-content-end" href="#menu3" data-toggle="tab">Logout</a>
    </li
   
  </ul-->

    <!-- tab section ends -->

    <!-- tab content start -->

    <div class="tab-content">
      <div class="tab-pane active " id="menu1">

        <!--center><button type="button" class="btn btn-success mt-5" href="#myid" data-toggle="collapse">QUIZ HERE</button></center-->

        <!-- dropdown list starts -->
        <center>
          <div class="col-sm-6 mt-3">
            <div><!--- class="collapse" id="myid"--->
              <div class="form-group">
                <label><strong class="primary">select Lesson</strong></label>
                <?php
                /* print_r($taken_id);
                  foreach ($profile->diff_data as $key => $difficulty)
                  { 
                    foreach ($profile->exam_taken as $lock => $col)
                    {
                      print_r($col);
                    }
                    
                  }*/

                $exam_taken_assoc = $profile->exam_taken;
                $taken_difficulty = array();
                foreach ($exam_taken_assoc as $index) {
                  if (!in_array($index['difficulty'], $taken_difficulty)) {
                    array_push($taken_difficulty, $index['difficulty']);
                  }
                }

                ?>

                <form method="POST" action="question_show.php">

                  <select id="topic" name="topic">
                    <option value="">Select a topic</option>
                    <!-- Populate options with topics from database -->
                  </select>

                  <select id="difficulty" name="difficulty" disabled>
                    <option value="">Select a difficulty level</option>
                  </select>

                  <button type="submit" id="start_exam" name="start_exam" class="btn btn-success mt-3" disabled>START</button>
                  <br>
                  <label style="color: red; font-size:16px; margin-top:1rem;" id="exam_status"></label>

                </form>

              </div>
            </div>
          </div>
        </center>

        <!-- dropdown list ends -->


      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        var test_type = "<?php echo $_SESSION['test_type']?>"
        var current_user = "<?php echo $_SESSION['user']['user_id']?>"
        $(document).ready(function () {
          // Populate topics dropdown on page load
          $.ajax({
            type: 'POST',
            url: 'get_topics.php',
            dataType: 'json',
            success: function (data) {
              // Populate options with topics from database
              console.log("Data: ", data);
              console.log(data.id);
              console.log(data.language_name);
              $('#topic').html('');
              $('#topic').append($('<option></option>').attr('value', "").prop('selected', true).prop('disabled', true).text('Select a topic')); 
              $('#topic').append($('<option></option>').attr('value', data.id).text(data.language_name));   
            },
            error: function (data) {
              console.log('Data:', data.responseText);
            }
          });

          // Function to check if the exam is taken
          var difficulty = $('#difficulty option:selected').val();
          function isExamTaken(topic_id, difficulty, callback) {
            $.ajax({
              type: 'POST',
              url: 'check_exam_taken.php',
              data: {
                topic_id: topic_id,
                difficulty: difficulty
              },
              dataType: 'json',
              success: function (response) {
                console.log('Response:', response); // Log the response for debugging purposes
                callback(response.is_taken, response.user_id);
              },
              error: function (xhr, status, error) {
                console.log('Error:', error); // Log the error for debugging purposes
                console.log('Response:', xhr.responseText); // Log the response text for debugging purposes
                callback(false); // Assume the exam is not taken in case of an error
              }
            });
          }

          // Populate difficulties dropdown when topic is selected
          $('#topic').change(function () {
            var topic_id = $(this).val();
            if (topic_id !== '') {
              $.ajax({
                type: 'POST',
                url: 'get_difficulty.php',
                data: { topic: topic_id },
                dataType: 'json',
                success: function (data) {
                  var difficulty_array = [];
                  
                  // Populate options with difficulty levels from database
                  $('#difficulty').html('');
                  $('#difficulty').append($('<option></option>').attr('value', '').prop('selected', true).prop('disabled', true).text('Select a difficulty level'));
                  
                  var uniqueDifficulties = [];
                  $.each(data, function (key, value) {
                    if (uniqueDifficulties.indexOf(value.difficulty) === -1 && value.test_type == test_type) {
                      uniqueDifficulties.push(value.difficulty); // Add the difficulty level to the uniqueDifficulties array

                      // Create and append the option element
                      var option = $('<option></option>').attr('value', value.difficulty).text(value.difficulty);
                      $('#difficulty').append(option);
                    }
                    
                  });
                  $('#difficulty').prop('disabled', false);

                  // Save variables in session
                  $.ajax({
                    type: "POST",
                    url: "save_variables.php",
                    data: {
                      cat_id: $('#topic option:selected').val(),
                      difficulty: $('#difficulty option:selected').val()
                    }
                  });
                }
              });
            } else {
              $('#difficulty').html('<option value="">Select a difficulty level</option>');
              $('#difficulty').prop('disabled', true);
            }
          });

          $('#difficulty').change(function () {
            var difficulty = $(this).val();
            $.ajax({
              type: "POST",
              url: "save_variables.php",
              data: {
                cat_id: $('#topic option:selected').val(),
                difficulty: $('#difficulty option:selected').val()
              },
              success: function () {
                console.log('Selected difficulty: ', difficulty);
                // Call the function to check if the exam is taken
                isExamTaken($('#topic option:selected').val(), difficulty, function (isTaken, userID) {
                  if (isTaken === 'yes' && userID === current_user) {
                    // Exam is taken, perform the desired action (e.g., show a message)
                    console.log('Exam is already taken');
                    $('#start_exam').prop('disabled', true);
                    $('#exam_status').text('This exam has already been taken.');
                  } else {
                    // Exam is not taken, continue with your logic
                    console.log('Exam is not taken');
                    $('#start_exam').prop('disabled', false);
                    $('#exam_status').text(''); // Clear the exam status message
                  }
                });
              }
            });
          });
        });
      </script>

</body>

</html>