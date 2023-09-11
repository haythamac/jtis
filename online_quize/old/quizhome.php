<?php 
  include("class/users.php");        //including the users class
  $profile=new users;               // craeting the object of user class so that we can call show_user_profile() method 
  extract($_POST);
  $profile->show_users_profile($_SESSION['user']['username']);  //calling the show_users profile() method of users class using users class object reference
  //print_r($profile->data);
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

    <!----Linking google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

  </head>

  <style type="text/css">
  /*.li1{
     float: right !important;
  }
 */
   body{
    font-family: 'Roboto Condensed', sans-seri !important;

  }
  #quiz-greet{
    height: 90vh !important;
    display : flex !important;
    flex-flow: column nowrap;
    justify-content: center !important;
    align-items: center !important;
    text-align: center;
  }
  .container h3{
    margin: 20px;
    font-size: 40px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
  }
  .btn , .btn:active{
    background: #285430 !important;
    padding: 10px  20px !important;
    outline: none !important;
  }
  label{
    font-size: 20px;
    text-transform: uppercase; 
    font-weight: bold;
    margin-bottom: 10px;
    justify-content: center !important;
  }
  .form-group{
    width: 300px;
    text-transform: uppercase; 
    margin-bottom: 10px;
    justify-content: center !important;
  } .form-control {
    margin-bottom: 10px;
  }
  option, select{
    text-transform: capitalize;
    font-weight: bolder;
    letter-spacing: 2px;
  }
</style>


<body style="">
  <!---Navigation Starts	----->
  <nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
    <div class="container">

     <!------Responsive Button---->
     <div class="navbar-header">
      <button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
        <i class="fa-solid fa-bars"></i>
      </button>
      <h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International School</h1>
    </div>
    <div class="collapse navbar-collapse" id="navi">
      <!------Navigation menus starts---->
      <ul class="nav navbar-nav navbar-right" id="nav-ul">
       <li class="w100 nav-li"> <a href="../index.php" class="border-bot nav-a">Home</a></li>

       <li class="w100 nav-li dropdown">
        <a class=" w100 nav-li border-bot nav-a">menu</a>
        <div class="dropdown-content">
          <a  class= "w100 nav-li border-bot nav-a" href="../sciencedemo.php">LESSON</a>
          <a class="w100 nav-li border-bot nav-a" href="../video tutorials\lesson\display_video_lesson.php">TUTORIALS</a>
        </div>
      </li>
      <!-----dropdown end ---->
      <li class="w100 nav-li"> <a href="" class="border-bot nav-a">Setting</a></li>
      <li> <a href="../logout.php" id="our-location" class="btn-success" ><?php echo $_SESSION['user']['username'];   ?></a></li>
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
  <h3>Welcome <strong class="primary"> <?php echo $_SESSION['user']['username']; ?></strong>, Lets start quiz</h3>
  
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
   <div class="tab-pane active " id="menu1" >

     <!--center><button type="button" class="btn btn-success mt-5" href="#myid" data-toggle="collapse">QUIZ HERE</button></center-->

     <!-- dropdown list starts -->

     <center><div class="col-sm-6 mt-3">
       <div><!--- class="collapse" id="myid"--->
        <div class="form-group">
          <label><strong class="primary">select Lesson</strong></label>
          <form method="POST" action="question_show.php">
            <select class="form-control" id="exampleFormControlSelect1" name="selected_course">

              <?php 
       $profile->show_courses();                                 //calling show_courses() method of users class
       foreach ($profile->cat_data as $key => $course) 
       {

         ?>

         <option value="<?php echo $course['id'] ;?>"><?php echo $course['cat_name']; ?></option>    <!-- displaying course name in dropdown -->
         

         <?php
       }

       ?>
     </select>
     <select class="form-control" id="exampleFormControlSelect2" name="selected_diff">

      <?php 
       $profile->show_difficulty();                                 //calling show_difficulty() method of users class
       foreach ($profile->diff_data as $key => $difficulty) 
       {

         ?>

         <option value="<?php echo $difficulty['id'] ;?>"><?php echo $difficulty['difficulty']; ?></option>    <!-- displaying course name in dropdown -->
         

         <?php
       }

       ?>
     </select>
     <button type="submit" class="btn btn-success mt-3">START</button>
   </form>
 </div>
</div>
</div>
</center>

<!-- dropdown list ends -->


</div>
<div class="tab-pane fade" id="menu2">  <!-- show profile tab start -->

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">image</th>
      </tr>
    </thead>
    <tbody>

      <?php 

      foreach ($profile->data as $key => $prof) 
      {

       ?>
       <tr >
        <th scope="row"><?php echo $prof['id']; ?></th>
        <td><?php echo $prof['name']; ?></td>
        <td><?php echo $prof['email']; ?></td>
        <td><img src="img/<?php echo $prof['img']; ?>" class="img-fluid" width="35px" height="30px"></td>
      </tr>
      
    </tbody>
  <?php } ?>
</table>


</div>
<div class="tab-pane fade" id="menu3">this is menu 3</div>


</div>
<!-- tab section ends -->
</div>            <!-- container closed -->

</body>
</html>






