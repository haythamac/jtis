<?php
session_start();
include("multi_login/functions.php");
$grading = $_SESSION['grading'];
$grading_show = "";

if($grading == "first_grading"){
  $grading_show = "1st grading";
}elseif($grading == "second_grading"){
  $grading_show = "2nd grading";
}elseif($grading == "third_grading"){
  $grading_show = "3rd grading";
}elseif($grading == "fourth_grading"){
  $grading_show = "4th grading";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>JTIS</title>
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
  <link rel="stylesheet" href="css/all.css">

  <!----font-awsome ends-->

  <!----favicon setting-->
  <link rel="shortcut icon" type="text/css" href="img/shortcuticon.svg">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!----css file link-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!----magnific popup js file for work section -->
  <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

  <!----owlcarousel js file for our team section -->

  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/owl.carousel.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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


<body>
  <!---Navigation Starts  ----->
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
       <li class="w100 nav-li"> <a href="index.php" class="border-bot nav-a">Home</a></li>

       <li class="w100 nav-li dropdown">
        <a class=" w100 nav-li border-bot nav-a">menu</a>
        <div class="dropdown-content">
          <a  class= "w100 nav-li border-bot nav-a" href="../sciencedemo.php">LESSON</a>
          <a class="w100 nav-li border-bot nav-a" href="../video tutorials\lesson\display_video_lesson.php">TUTORIALS</a>
        </div>
      </li>
      <!-----dropdown end ---->
      <li class="w100 nav-li"> <a href="profile.php" class="border-bot nav-a">Setting</a></li>
      <li> <a href="logout.php?logout='1'" id="our-location" class="btn-success" ><?php echo $_SESSION['user']['username'];   ?></a></li>
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
  <h3>Welcome <strong class="primary"> <?php echo $_SESSION['user']['username']; ?></strong>, Lets start your <strong class="primary"><?php echo $grading_show; ?></strong> assessment!</h3>

  <!-- tab section ends -->

  <!-- tab content start -->

  <div class="tab-content">
   <div class="tab-pane active " id="menu1" >


     <!-- dropdown list starts -->

     <center><div class="col-sm-6 mt-3">
       <div><!--- class="collapse" id="myid"--->
        <div class="form-group">
          <label><strong class="primary">Select assessment type</strong></label>
          <form method="POST" action="assessmentredirect.php">
            <select class="form-control" id="exampleFormControlSelect1" name="options">
             <option value="quiz">Quiz</option>
             <option value="exam">Exam</option>
           </select>
           <button type="submit" name="submit-button" class="btn btn-success mt-3">START</button>
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






