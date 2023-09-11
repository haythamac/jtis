<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/jquery.min.js"></script>











<!---Navigation Starts ----->
<div id="nav-placeholder">

</div>

<script>
  $(function(){
    $("#nav-placeholder").load("/jtis/admin/nav.html");
  });
</script>
<!---Navigation Ends ----->









<!-- sidebar starts -->
<div class="col-sm-5 col-md-3 col-lg-3 sidebar" id="sidebar">
  <ul class="list-group text-white sidebar-list">
    <a href="/jtis/admin/admin_main.php"><li class="list active-dash">Overview</li></a>
    <a href="/jtis/admin/manage_lesson/manage_topic.php"><li class="list">Manage Lessons</li></a>
    <a href="/jtis/admin/manage_quiz/manage_quiz.php"><li class="list ">Manage Quizzes</li></a>
    <a href="/jtis/admin/manage_videos/manage_videos.php"><li class="list">Manage Videos</li></a>
    <a href="#"><li class="list">Manage Comments</li></a>
    <a href="#"><li class="list">Manage Users</li></a>
    <a href="/jtis/logout.php"><li class="list">Logout</li></a>
  </ul>
</div>
<!-- sidebar ends -->

style="margin-top:82px;" 

col-md-9 mt-2 pt-2


<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<!----css file link-->
<link rel="stylesheet" type="text/css" href="css/profile.css">
<link rel="stylesheet" type="text/css" href="css/all.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">



foreach ($profile->diff_data as $key => $difficulty) 
{
  foreach ($profile->exam_taken as $lock => $col) 
  {
    if($col['user_id'] == $_SESSION['user']['user_id'] and strtolower($col['is_taken']) == 'yes')
    {
    ?>
    <option value="<?php echo $difficulty['id'] ;?>" disabled><?php echo $difficulty['difficulty']; ?> (disabled)</option>    <!-- displaying course name in dropdown -->
    <?php
    break;
  }elseif(strtolower($difficulty['difficulty']) and ($col['is_taken'] == 'no' or $col['is_taken'] == null))
  {
   ?>
   <option value="<?php echo $difficulty['id'] ;?>"><?php echo $difficulty['difficulty']; ?></option>    <!-- displaying course name in dropdown -->
   <?php
   break;
 }
}
}





$dropdown_values = array();

foreach ($profile->diff_data as $key => $difficulty) 
{ 
  array_push($dropdown_values, $difficulty['difficulty']);
}

foreach ($profile->exam_taken as $key => $col)
{
  if($difficulty['difficulty'] == $taken_diff and  $taken_uid == $_SESSION['user']['user_id'] and $taken_yes == 'yes')
  {
    ?>
    <option value="<?php echo $difficulty['id'] ;?>" disabled><?php echo $difficulty['difficulty']; ?> (Taken)</option>    <!-- displaying course name in dropdown -->
    <?php
  }elseif($difficulty['difficulty'] and $taken_uid == $_SESSION['user']['user_id'])
  {
    ?>
    <option value="<?php echo $difficulty['id'] ;?>"><?php echo $difficulty['difficulty']; ?></option>    <!-- displaying course name in dropdown -->
    <?php
  }

}


NO ERROR

<form method="POST" action="question_show.php">
                <select class="form-control lesson-class" id="lessons" name="selected_course">
                  <option selected disabled>Select lesson</option>
                  <?php 
                  foreach ($profile->cat_data as $key => $course) 
                  {  
                    foreach ($profile->session_grading as $lock => $col)
                    {
                      if($course['cat_name'] == strtolower($col['language_name']) and $col['lesson_grading'] == $_SESSION['grading']){
                        ?>
                        <option value="<?php echo $course['id'] ;?>" id="<?php echo $course['id'] ;?>"><?php echo $course['cat_name']; ?></option>    <!-- displaying course name in dropdown -->
                        <?php
                      }elseif($course['cat_name'] == strtolower($col['language_name'])){
                        ?>
                        <option value="<?php echo $course['id'] ;?>" id="<?php echo $course['id'] ;?>" disabled><?php echo $course['cat_name']; ?> (disabled)</option>    <!-- displaying course name in dropdown -->
                        <?php
                      }
                    }
                  }

                  ?>
                </select>
                <select class="form-control difficulty-class" id="difficulties" name="selected_diff"> <!-- exampleFormControlSelect2 -->
                  <option selected disabled>Select difficulty</option>
                  <?php 
                  foreach($profile->diff_data as $difficulty)
                  {
                    if(in_array($difficulty['difficulty'],$taken_difficulty ))
                    {
                      ?>
                      <option value="<?php echo $difficulty['id'] ?>" disabled>
                        <?php echo $difficulty['difficulty'] ?> (Taken)
                      </option>
                      <?php 
                    }else
                    {
                      ?>
                      <option value="<?php echo $difficulty['id'] ?>"><?php echo $difficulty['difficulty'] ?></option>
                      <?php
                    }
                  }
                  ?>
              </select>


              <button type="submit" class="btn btn-success mt-3">START</button>

            </form>

















            <select class="form-control lesson-class" id="lessons" name="selected_course">
                  <option selected disabled>Select lesson</option>
                  <?php 
                  foreach ($profile->cat_data as $key => $course) 
                  {  
                    foreach ($profile->session_grading as $lock => $col)
                    {
                      if($course['cat_name'] == strtolower($col['language_name']) and $col['lesson_grading'] == $_SESSION['grading']){
                        ?>
                        <option value="<?php echo $course['id'] ;?>" id="<?php echo $course['id'] ;?>"><?php echo $course['cat_name']; ?></option>    <!-- displaying course name in dropdown -->
                        <?php
                      }elseif($course['cat_name'] == strtolower($col['language_name'])){
                        ?>
                        <option value="<?php echo $course['id'] ;?>" id="<?php echo $course['id'] ;?>" disabled><?php echo $course['cat_name']; ?> (disabled)</option>    <!-- displaying course name in dropdown -->
                        <?php
                      }
                    }
                  }

                  ?>
                </select>
                <select class="form-control difficulty-class" id="difficulties" name="selected_diff"> <!-- exampleFormControlSelect2 -->
                  <option selected disabled>Select difficulty</option>
                  <?php 
                  foreach($profile->diff_data as $difficulty)
                  {
                    if(in_array($difficulty['difficulty'],$taken_difficulty ))
                    {
                      ?>
                      <option value="<?php echo $difficulty['id'] ?>">
                        <?php echo $difficulty['difficulty'] ?>
                      </option>
                      <?php 
                    }else
                    {
                      ?>
                      <option value="<?php echo $difficulty['id'] ?>"><?php echo $difficulty['difficulty'] ?></option>
                      <?php
                    }
                  }
                  ?>
              </select>

                  // PARA SA MANAGE_VIDEOS.PHP OLD VIDEO LIST DISPLAY

              <?php foreach ($video as $video_list) {
								?>

								<div class="card ml-4 custom-card" style="width: 18rem;">
									<img class="card-img-top custom-card-img img-fluid" src="<?php echo $video_list['image'] ?>"alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title">
											<?php echo $video_list['course_name']; ?> <a
												href="edit_videos.php?course_name=<?php echo $video_list['course_name']; ?>"
												class="h6 text-info float-right">view video <i
													class="fa fa-pencil ml-1"></i></a>
										</h5>
										<!--   <p class="card-text"><?php echo $video_list['description']; ?></p> -->
									</div>
								</div>

							<?php } ?>