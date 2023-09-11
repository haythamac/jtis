<?php 
include("../../multi_login/functions.php");

if (!isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /jtis/login.php');
}

include("../classes/manage_quiz_class.php");
    $quiz=new manage_quiz_class;      // creating object of  manage_courses_class.php
    $quiz_list=$quiz->display_quiz_courses();   //calling display_courses() method from manage_courses_class.php
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
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <style type="text/css">
        .tab-card {
          border:1px solid #eee;
        }

        .tab-card-header {
          background:none;
        }
      /* Default mode */
      .tab-card-header > .nav-tabs {
        border: none;
        margin: 0px;
      }
      .tab-card-header > .nav-tabs > li {
        margin-right: 2px;
      }
      .tab-card-header > .nav-tabs > li > a {
        border: 0;
        border-bottom:2px solid transparent;
        margin-right: 0;
        color: #737373;
        padding: 2px 15px;
      }

      .tab-card-header > .nav-tabs > li > a.show {
        border-bottom:2px solid #007bff;
        color: #007bff;
      }
      .tab-card-header > .nav-tabs > li > a:hover {
        color: #007bff;
      }

      .tab-card-header > .tab-content {
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
    $(function(){
      $("#nav-placeholder").load("/jtis/admin/nav.html");
    });
  </script>
  <!---Navigation Ends ----->





  <div class="container-fluid">
    <div class="row" style="margin-top:82px;" >
      <!-- sidebar starts -->
      <div class="col-sm-5 col-md-3 col-lg-3 sidebar" id="sidebar" >
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
      <div class="col-md-9 mt-2 pt-2" id="manage-main-content">
        <!-- ========================================================================================================================== -->

        <!-- Nav tabs strats -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Main</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#manage_course">Manage Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Add Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu3">Edit Questions</a>
          </li>
        </ul>
        <!-- Nav tabs ends -->

        <!-- ========================================================================================================================== -->
        <div class="tab-content">
          <!-- ========================================================================================================================== -->
          <!-- home panes starts -->
          <div class="tab-pane container active" id="home">
            <div class="card-header bg-white text-info border-0 shadow card1 text-center" style=" box-shadow: 1px 1px 1px 1px #ccc"><b class="text-center">YOUR ONLINE QUIZE COURSES</b>
            </div><br>
            <div class="row justify-content-center">

              <div class="col-md-4">
                <center><label>SELECT LESSON</label><br>
                  <form method="POST" action="../../online_quize/question_show.php">
                    <select class="form-control" id="exampleFormControlSelect1" name="selected_course">
                              <?php //calling show_courses() method of users class
                              foreach ($quiz_list as $quiz) 
                              {
                                ?>

                                <option value="<?php echo $quiz['id'] ;?>"><?php echo $quiz['cat_name']; ?></option>    <!-- displaying course name in dropdown -->


                                <?php
                              }

                              ?>
                            </select>
                            <select class="form-control" id="exampleFormControlSelect2" name="selected_diff">
                              <?php //calling show_difficulty() method of users class
                              foreach ($diff_list as $diff) 
                              {
                                ?>

                                <option value="<?php echo $diff['id'] ;?>"><?php echo $diff['difficulty']; ?></option>    <!-- displaying course name in dropdown -->


                                <?php
                              }

                              ?>
                            </select>
                            <button type="submit" class="btn btn-success mt-3 ">Start Quiz</button>
                          </form></center>
                        </div>


                      </div>
                      <!-- ============================================================================================================ -->
                      <!-- php code to display modal if status variable is set -->
                      <?php 
                  if ( isset($_GET['status']) and $_GET['status']=="added")      //first if condition for course added
                  {
                    echo '<div class="col-md-4 mt-5">

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    course added successfully
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    </div>
                    </div>
                    </div>';
                  }


                  if ( isset($_GET['status']) and $_GET['status']=="deleted")    //second if condition for course deleted
                  {
                    echo '<div class="col-md-4 mt-5">







                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    course deleted successfully
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    </div>
                    </div>
                    </div>';
                  }



                  if ( isset($_GET['status']) and $_GET['status']=="updated")    //second if condition for course deleted
                  {
                    echo '<div class="col-md-4 mt-5">
                    






                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    course updated successfully
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    </div>
                    </div>
                    </div>';
                  }





                ?>                    <!-- ended display modal php code -->

                <!-- =========================================================================================== -->


              </div>

              <!-- home panes ends -->

              <!-- ========================================================================================================================== -->


              <!-- ========================================================================================================================== -->

              <!-- manage course pane starts -->

              <div class="tab-pane container fade" id="manage_course">




                <center><div class="col-md-12">


                  <div class=" mt-3 tab-card">
                    <div class="card-header tab-card-header">
                      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">ADD</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">DELETE</a>
                        </li>
                      </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">   <!-- tab content starts -->


                      <!-- ======================================================================================================= -->
                      <!-- add new video course tab starts -->
                      <div class="tab-pane abs fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <div class=" col-md-12">
                          <div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
                            <div class="card-header text-light p-2 cardh2"><h3>ADD NEW QUIZ</h3></div>
                            <div class="card-body small" >
                              <form action="quiz_add.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                                <div class="form-group">
                                  <label for="email"> Lesson Title :</label>
                                  <input type="text" class="form-control" id="c_name" placeholder="ex. Earth Sciences" name="course_name">
                                  <select class="form-control" id="exampleFormControlSelect3" name="selected_difficulty2">
                                    <?php foreach($diff_list as $diff) ?>
                                    <option value="<?php echo $diff['id'] ?>"><?php echo $diff['difficulty']?></option>
                                    ?>
                                  </select>
                                  <span id="name_error" class="text-danger font-weight-bold"></span>
                                </div>


                                <div class="">
                                  <button type="submit" class="btn btn-success"  name="btn_add_quiz_sub">CREATE</button>
                                </div>
                              </form>

                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- update video course tab ends -->
                      <!-- ======================================================================================================= -->



                      <!-- ======================================================================================================= -->
                      <!-- delete quiz course tab starts -->    


                      <div class="tab-pane abs fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">

                        <div class=" col-md-12">




                          <div class="card-transac" style="box-shadow: 2px 2px 2px 2px #dfdfdf;">
                            <div class="card-header bg-primary text-light p-2 cardh2"><h3>DELETE QUIZ</h3></div>

                            <div class="card-body small" >

                              <form action="quiz_add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Select LESSON</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="selected_course">
                                    <?php 
                                                   //calling show_courses() method of users class
                                    foreach ($quiz_list as $quiz) 
                                    {

                                      ?>

                                      <option value="<?php echo $quiz['id'] ;?>"><?php echo $quiz['cat_name']; ?></option>    <!-- displaying course name in dropdown -->


                                      <?php
                                    }

                                    ?>
                                  </select>
                                </div>

                                <div >
                                  <button type="submit" class="btn btn-danger" name="btn_delete_quiz_sub">DELETE</button>
                                </div>
                              </form>

                            </div>
                          </div>


                        </div>          
                      </div>



                      <!-- delete quiz course tab ends -->
                      <!-- ======================================================================================================= -->

                    </div>      <!-- tab content  -->









                  </div></center>


                </div>



                <!-- manage courses pane ends -->

                <!-- ========================================================================================================================== -->





                <!-- ========================================================================================================================== -->

                <!-- add questions pane starts -->




                <div class="tab-pane container fade" id="menu2">   




                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Add a new question</h1>

                    <?php 
                    if (isset($_GET['run'])&& !empty($_GET['run']))
                    {
                      echo "<p>Question added successfully</p>";
                    }
                    ?>


                    <form method="POST" action="quiz_add.php">
                      <div class="form-group">
                        <label for="text">Question :</label>
                        <input type="text" class="form-control" name="question" placeholder="Enter Question">
                        <small id="emailHelp" class="form-text text-muted">please enter the question.</small>
                      </div>

                      <div class="form-group">
                        <label for="text">Option 1 :</label>
                        <input type="text" class="form-control"  name="opt1" placeholder="Enter option 1">
                      </div>

                      <div class="form-group">
                        <label for="text">Option 2 :</label>
                        <input type="text" class="form-control"   name="opt2" placeholder="Enter option 2">
                      </div>


                      <div class="form-group">
                        <label for="text">Option 3 :</label>
                        <input type="text" class="form-control"  name="opt3" placeholder="Enter option 3">
                      </div>

                      <div class="form-group">
                        <label for="text">Option 4 :</label>
                        <input type="text" class="form-control"  name="opt4" placeholder="Enter option 4">
                      </div>

                      <div class="form-group">
                        <label for="text">Answer :</label>
                        <input type="text" class="form-control"  name="answer" placeholder="Enter the correct answer">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Lesson</label>
                        <select class="form-control" id="exampleFormControlSelect1"  name="cat">
                          <option  class="active">Choose Lesson</option>
                          <?php 
                          foreach ($quiz_list as $courses) 
                          {
                            echo "<option value=".$courses['id'].">".$courses['cat_name']."</option>";
                          }
                          ?>




                        </select>
                      </div>





                      <button type="submit" class="btn btn-success">CREATE</button>
                    </form>



                  </div>


                </div>
                <!-- add questions pane ends -->
                <!-- ========================================================================================================================== -->
                <!-- edit questions pane starts -->




                <div class="tab-pane container fade" id="menu3">   




                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Edit a question</h1>

                    <?php 
                    if (isset($_GET['run'])&& !empty($_GET['run']))
                    {
                      echo "<p>Question edit successfully</p>";
                    }
                    ?>


                    <form method="POST" action="quiz_add.php">
                      <div class="form-group">
                        <label for="text">Question :</label>
                        <select>
                          <?php ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="text">Option 1 :</label>
                        <input type="text" class="form-control"  name="opt1" placeholder="Enter option 1">
                      </div>

                      <div class="form-group">
                        <label for="text">Option 2 :</label>
                        <input type="text" class="form-control"   name="opt2" placeholder="Enter option 2">
                      </div>


                      <div class="form-group">
                        <label for="text">Option 3 :</label>
                        <input type="text" class="form-control"  name="opt3" placeholder="Enter option 3">
                      </div>

                      <div class="form-group">
                        <label for="text">Option 4 :</label>
                        <input type="text" class="form-control"  name="opt4" placeholder="Enter option 4">
                      </div>

                      <div class="form-group">
                        <label for="text">Answer :</label>
                        <input type="text" class="form-control"  name="answer" placeholder="Enter the correct answer">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Lesson</label>
                        <select class="form-control" id="exampleFormControlSelect1"  name="cat">
                          <option  class="active">Choose Lesson</option>
                          <?php 
                          foreach ($quiz_list as $courses) 
                          {
                            echo "<option value=".$courses['id'].">".$courses['cat_name']."</option>";
                          }
                          ?>




                        </select>
                      </div>





                      <button type="submit" class="btn btn-success">CREATE</button>
                    </form>



                  </div>


                </div>
                <!-- edit questions pane ends -->

                <!-- ========================================================================================================================== -->
              </div>




            </div>



          </div>
        </div>











        <script type="text/javascript">


          $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
          });
// =============================================================================================================
          // javascript validation function

          function validation()
          {
            var name=document.getElementById('c_name').value;
            var desc=document.getElementById('c_desc').value;
            var img=document.getElementById('c_img').value;
            if (name=="")
            { 
              document.getElementById('name_error').innerHTML="** please enter the course name";
              return false;

            }

            if (desc=="")
            { 
              document.getElementById('desc_error').innerHTML="** please enter the course descsription";
              return false;

            }
            if (img=="")
            { 
              document.getElementById('image_error').innerHTML="** please choose an image";
              return false;

            }
          }
          // javascript validation function
// =============================================================================================================


// =============================================================================================================

          // javascript modal function called on page load

          function display_modal()
          {



          }

// =============================================================================================================



// =============================================================================================================

          // javascript modal function called on page load

          $(window).on('load',function(){
            $('#myModal').modal('show');
          });


              // javascript validation function
// =============================================================================================================

        </script>


      </body>
      </html>