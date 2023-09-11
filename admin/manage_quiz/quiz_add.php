<?php 

include '../classes/manage_quiz_class.php';

	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'jtis');
	if (!$con)
	 {
		die('unable to coonect to database');
	 }
//================================================================================================================

// if (isset($_POST['btn_add_question_identification']))
//  {
// 	extract($_POST);
// 	$query="insert into category values('','$course_name')";
// 	$r=mysqli_query($con, $query);
// 	if ($r==true) 
// 	{
// 		header("Location:manage_quiz.php");
// 	}

// 	$quiz=new manage_quiz_class;;
// 	$ques=htmlentities($question_identification);
// 	$answer=htmlentities($answer_identification);

// 	$query="insert into question_quiz_identification values('','$ques','$answer_identification','$cat', '$diff')"; //$cat value comes from select name attribute

// 	// mysqli_query($con,$query);
// 	if ($quiz->add_quiz($query)) 
// 	{
// 		header("location:manage_quiz.php?run=success");
// 	}
//  }

if (isset($_POST['btn_add_question_identification']))
{	
	extract($_POST);

	$quiz=new manage_quiz_class;;
	$ques_identification=htmlentities($question_identification);
	$answer_identification=htmlentities($answer_identification);
	$zero = 0;
	
	$query="insert into question_quiz_identification values('','$question_identification','$answer_identification','$cat', '$diff_identification')"; //$cat value comes from select name attribute
	$add_to_difficulty = "INSERT INTO difficulty VALUES ('', '$diff_identification', '$cat', '$zero', '$test_type')";
	// mysqli_query($con,$query);
	if ($quiz->add_quiz_identification($query)) 
	{	$quiz->add_quiz_identification($add_to_difficulty);
		header("location:manage_quiz.php?run=success");
	}
}elseif(isset($_POST['btn_add_question']))
{	
	extract($_POST);

	$quiz=new manage_quiz_class;;
	$ques=htmlentities($question);
	$option1=htmlentities($opt1);
	$option2=htmlentities($opt2);
	$option3=htmlentities($opt3);
	$option4=htmlentities($opt4);
	$answer=htmlentities($answer);
	$zero = 0;

	$array=[$option1,$option2,$option3,$option4];
	$matchedanswer=array_search($answer,$array);
	echo "answer is".$matchedanswer;
	$query="insert into question_quiz values('','$ques','$option1','$option2','$option3','$option4','$matchedanswer','$cat', '$diff')"; //$cat value comes from select name attribute
	$add_to_difficulty = "INSERT INTO difficulty VALUES ('', '$diff', '$cat', '$zero', '$test_type')";
	// mysqli_query($con,$query);
	if ($quiz->add_quiz($query)) 
	{	
		$quiz->add_quiz_identification($add_to_difficulty);
		header("location:manage_quiz.php?run=success");
	}
}



//================================================================================================================

 		// add a new question code from manage_quiz.php  from tab 3 (add questions) 

 
// extract($_POST);

// $selected_difficulty=htmlentities($quizpleFormControlSelect1);

// if($diff == 'hard' || $selected_difficulty == 'hard')
// {
// 	$quiz=new manage_quiz_class;;
// 	$ques=htmlentities($question_identification);
// 	$answer=htmlentities($answer_identification);

// 	$query="insert into question_quiz_identification values('','$ques','$answer_identification','$cat', '$diff')"; //$cat value comes from select name attribute

// 	// mysqli_query($con,$query);
// 	if ($quiz->add_quiz_identification($query)) 
// 	{
// 		header("location:manage_quiz.php?run=success");
// 	}
// }elseif($diff != 'hard' || $selected_difficulty != 'hard')
// {
// 	$quiz=new manage_quiz_class;;
// 	$ques=htmlentities($question);
// 	$option1=htmlentities($opt1);
// 	$option2=htmlentities($opt2);
// 	$option3=htmlentities($opt3);
// 	$option4=htmlentities($opt4);
// 	$answer=htmlentities($answer);

// 	$array=[$option1,$option2,$option3,$option4];
// 	$matchedanswer=array_search($answer,$array);
// 	echo "answer is".$matchedanswer;
// 	$query="insert into question_quiz values('','$ques','$option1','$option2','$option3','$option4','$matchedanswer','$cat', '$diff')"; //$cat value comes from select name attribute

// 	// mysqli_query($con,$query);
// 	if ($quiz->add_quiz($query)) 
// 	{
// 		header("location:manage_quiz.php?run=success");
// 	}
// }






 ?>