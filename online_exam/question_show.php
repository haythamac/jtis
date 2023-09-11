
<!-- ========================================================================================================================== -->



<?php 
//ini_set('display_errors', 0);
include("class/examUsers.php");
include("../multi_login/functions.php");
$ques=new examUsers;
$cat = $_SESSION['cat_id'];
$difficulty = $_SESSION['difficulty'];
// $_SESSION['course_id'] = $cat;
// $_SESSION['diff_type'] = $difficulty;
// test type


$test_type = $_SESSION['difficulty'];
$quest_data=($ques->show_questions($cat, $difficulty));
$quest_data_identification = ($ques->show_questions_identification($cat,$difficulty));


// Add to activity log
passToActivityLog($cat, $difficulty, $_SESSION['user']['user_id'], $difficulty);



?>
<html>
<head>
  <title>Admin panel</title>
  <!----favicon setting-->
  <link rel="shortcut icon" type="text/css" href="../jtis/img/shortcuticon.svg">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>







  <script type="text/javascript">

  function timeout()                            //function to check time out
  {
    var minute=Math.floor(timeleft/60);   
    var second=timeleft%60;
    var min=checkMin(minute);
    var sec=checkSec(second)
    if (timeleft<=0) 
    {
      clearTimeout(tm);                                  //if timeout then stop the timeout function
      document.getElementById("myform").submit();       //if timeout then automatic submit the form
    }
    else
    {
      document.getElementById("timeout").innerHTML=min+":"+sec;   //else diplay the time
    }
    timeleft--;                                                         //decrease time each time
    var tm=setTimeout(function(){timeout()},1000);                      //after each 1 minute the function timeout will called automatically
  }

  function checkSec(second)                   //convert from  0:5 to 0:05
  {
    if (second<10) 
    {
      second="0"+second;
    }
    return second;
  }



  function checkMin(minute)              //convert from  0:20 to 00:20
  {
    if (minute<10) 
    {
      minute="0"+minute;
    }
    return minute;
  }


</script>

</head>


<body onload="timeout()">            <!--   when body load ,timeout functionwill called automatically 
-->


<div class="container position-relative" style="text-align: center; top: 10%;">

	<form action="result_show.php" method="POST" id="myform" >

    <center><div class="row col-sm-7 ">
    <script type="text/javascript">
      var timeleft=1*60;                                   //important--> the scope of javascript variable is global but not in php(we have to use global keyword)

    </script>

    <div  style="margin-left:450px;font-size: 15px" id="timeout">time out</div>

    <?php 
    
	$i = array(1,2,3,4);                     //to  display question number
  $number = 1;
  shuffle($i);

  if($difficulty != 'hard'){ 
	foreach ($quest_data as $quest) {
   ?>
   <table class="table table-hover table-bordered table-active">
    <thead class="thead-dark">
      <tr>
        <th scope="col"><?php echo $number.'. '; ?><?php echo $quest['question']; ?></th>
      </tr>
    </thead>
    
    <tbody>       
        <?php if (isset($quest['opt1'])){ ?>     <!--  to check whether the answer is selected or not -->
          <tr>
            <td scope="row" ><input type="radio" value="0" name="<?php echo $quest['id']; ?>"/>&emsp;<?php echo $quest['opt1']; ?></td>
          </tr>
        <?php } ?>

        <?php if (isset($quest['opt2'])){ ?>
          <tr>
            <td scope="row"><input type="radio" value="1" name="<?php echo $quest['id']; ?>"/>&emsp;<?php echo $quest['opt2']; ?></td>
          </tr>
        <?php } ?>

        <?php if (isset($quest['opt3'])){ ?>
          <tr>
            <td scope="row"><input type="radio" value="2" name="<?php echo $quest['id']; ?>"/>&emsp;<?php echo $quest['opt3']; ?></td>
          </tr>
        <?php } ?>

        <?php if (isset($quest['opt4'])){ ?>
          <tr>
            <td scope="row"><input type="radio" value="3" name="<?php echo $quest['id']; ?>"/>&emsp;<?php echo $quest['opt4']; ?></td>
          </tr>
        <?php } ?>

        <td scope="row"><input type="radio" checked="checked" style="display: none;" value="no_attempt" name="<?php echo $quest['id']; ?>"/></td>   <!-- bydefautlt select this if no other answer are selected -->
      
    </tbody>
</table>
<?php 
	$number++;        // increment question number by 1
	} 		//loop ends
} // if ends
elseif($difficulty == 'hard'){
  foreach ($quest_data_identification as $quest) {
   ?>
   <table class="table table-hover table-bordered table-active">
    <thead class="thead-dark">
      <tr>
        <th scope="col"><?php echo $number.'. '; ?><?php echo $quest['question']; ?></th>
      </tr>
    </thead>
    
    <tbody>       
        <?php if (isset($quest['question'])){ ?>     <!--  to check whether the answer is selected or not -->
          <tr>
            <td scope="row" ><input type="text" placeholder="Enter your answer here" name="<?php echo $quest['id']; ?>"/>&emsp;</td>
          </tr>
        <?php } ?>

        

        <td scope="row"><input type="radio" checked="checked" style="display: none;" value="no_attempt" name="" hidden/></td>   <!-- bydefautlt select this if no other answer are selected -->
      
    </tbody>
</table>
<?php 
  $number++;        // increment question number by 1
  }     //loop ends

	?>
<?php } ?>


</div></center>
<input type="submit" class="btn btn-success">
</form>
</div>

</body>
</html>