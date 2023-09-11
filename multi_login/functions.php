<?php
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: /jtis/login.php");
}else if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";
require "phpmailer/src/Exception.php";



// Connect to database
$db = mysqli_connect('localhost', 'root', '', 'jtis');

// Set timezone
date_default_timezone_set('Asia/Manila');

// declare variables

// Personal info
$firstName = "";
$middleName = "";
$lastName = "";
$section;
$grade;
//$gender = "null";
$studentid = "";

// Login info
$username = "";
$email = "";

// Error
$errors = array();
$success = "";
$changepassdone = false;

//  Course and difficulty
// Activity log
$action = "";
$today = date('Y/m/d H:i:s');

$topic_name = array();

if(isset($_FILES['image']['name']))
{
	changeProfileAvatar();
	echo 
		"
		<script>
			alert('Test');
		</script?
		";
}

// Change avatar
function changeProfileAvatar()
{
	global $db;

	$id = $_SESSION['user']['user_id'];


	$avatarImage = $_FILES['image'];
	$imageName = $_FILES['image']['name'];
	$imageSize = $_FILES['image']['size'];
	$tmpName = $_FILES['image']['tmp_name'];

	// Image validation
	$validImageExtension = ['jpg', 'jpeg', 'png'];
	$imageExtension = explode('.', $imageName);
	$imageExtension = strtolower(end($imageExtension));

	if(!in_array($imageExtension, $validImageExtension))
	{
		echo 
		"
		<script>
			alert('Invalid Image Extension');
		</script?
		";
	}elseif($imageSize > 1200000)
	{	
		echo 
		"
		<script>
			alert('Image size too big');
		</script?
		";
	}else
	{	
		$newImageName = $imageName; // Generate new image name

		$destinationfile='../uploadimg/profile/'.$newImageName;
		move_uploaded_file($tmpName,'../uploadimg/profile/'.$newImageName);

		$query = "UPDATE user_info SET image_avatar = '$newImageName' WHERE user_id = $id";
		mysqli_query($db, $query);
		echo
		"
		<style>
		.center {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.text-center {
			text-align: center;
		}

		.btn-primary {
			color: #fff;
			background-color: #007bff;
			border-color: #007bff;
			padding: 0.5rem 1rem;
			font-size: 1rem;
			line-height: 1.5;
			border-radius: 0.25rem;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}

		.btn-primary:hover {
			color: #fff;
			background-color: #0069d9;
			border-color: #0062cc;
		}

		h1 {
			margin-bottom: 1rem;
		}

		a{
			text-decoration: none;
		}
	</style>

	<div class='center'>
		<div class='text-center'>
			<h1>Profile changed successfully</h1>
			<a href='../profile.php' class='btn btn-primary'>Go back</a>
		</div>
	</div>
		";

		$_SESSION['user']['image_avatar'] = $newImageName;
		
	}
	
}

// Call setGrading() function if set_grading_btn is clicked
if (isset($_POST['set_grading_btn'])){
	setGrading();
}

function showTopicNames()
{
	global $db;

	$query = "SELECT * FROM courses ORDER BY id ASC";
	$result = mysqli_query($db, $query);
	$stmt = mysqli_fetch_assoc($result);
	while($stmt = mysqli_fetch_assoc($result))      // while loop to fetch all data one by one and store in cat_data array variable
	{	
		$topic_name[]=$stmt;
	}

	return $topic_name;
}

function setGrading(){
	global $db;
	$set_grade = e($_POST['set_grading']);
	$query1 = "UPDATE grading SET current='0'";
    $query2 = "UPDATE grading SET current='1' WHERE grading='$set_grade'";
    mysqli_query($db, $query1);
    mysqli_query($db, $query2);
    $query3 = "SELECT * FROM grading WHERE current='1'";
    $result = mysqli_query($db, $query3);
    $row = mysqli_fetch_array($result);

	$_SESSION['grading'] = $set_grade;
}

if (isset($_POST['changepass_btn'])){
	changepass();
}

function changepass(){
	global $db, $errors, $success;
	$global_user_id = $_SESSION['user']['user_id'];
	$oldpass1 = e($_POST['oldpass1']);
	$oldpass2 = e($_POST['oldpass2']);
	$newpass1 = e($_POST['newpass1']);
	$newpass2 = e($_POST['newpass2']);

	$query = "SELECT * FROM user_info WHERE user_id='$global_user_id'";
	$result = mysqli_query($db, $query);
	$stmt = mysqli_fetch_assoc($result);

	$query_password = $stmt['password'];

	if(empty($oldpass1) or empty($oldpass2) or empty($newpass1) or empty($newpass2))
	{
		array_push($errors, "Please fill up all fields");
	}

	if($oldpass1 != $oldpass2)
	{
		array_push($errors, "Old password does not match");
	}

	if($oldpass1 != $query_password)
	{
		array_push($errors, "Old password is incorrect");
	}

	if($newpass1 != $newpass2)
	{
		array_push($errors, "New password does not match");
	}

	// Proceed if there is no error
	if(count($errors) == 0)
	{
		$update_query = "UPDATE user_info set password='$newpass1' WHERE user_id='$global_user_id'";
		mysqli_query($db, $update_query);
		$success = "Password changed successfully";
		$changepassdone = true;
	}

}



function sendScore($score, $correct, $wrong, $course, $difficulty, $user_id){
	global $today, $db;
	// get data from database
	$query_course = "SELECT * FROM science_branch WHERE id='$course'";
	$query_difficulty = "SELECT * FROM difficulty WHERE id='$difficulty'";

	// result of query
	$result_course = mysqli_query($db, $query_course);
	$result_difficulty = mysqli_query($db, $query_difficulty);
	// associative array of the selected column
	$stmt_c = mysqli_fetch_assoc($result_course);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);

	$course_name = $stmt_c['language_name'];
	$course_difficulty = $stmt_d['difficulty'];

	$query = "INSERT INTO score_quiz (student_id, course, difficulty, score, correct, wrong, date_taken)
	VALUES('$user_id', '$course_name', '$course_difficulty', '$score', '$correct', '$wrong', '$today')";
	mysqli_query($db, $query);
}

function taken($course_id, $difficulty, $user_id){
	global $db;
	// get difficulty name
	$query_difficulty = "SELECT * FROM difficulty WHERE difficulty='$difficulty'";
	$result_difficulty = mysqli_query($db, $query_difficulty);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);
	$course_difficulty = $stmt_d['difficulty'];

	// insert taken to db
	$query = "INSERT INTO exam_taken(course_id, difficulty, user_id, is_taken)
	VALUES('$course_id', '$course_difficulty', '$user_id', 'yes')";
	mysqli_query($db, $query);
}

function taken_quiz($course_id, $difficulty, $user_id){
	global $db;
	// get difficulty name
	$query_difficulty = "SELECT * FROM difficulty WHERE difficulty='$difficulty'";
	$result_difficulty = mysqli_query($db, $query_difficulty);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);
	$course_difficulty = $stmt_d['difficulty'];

	// insert taken to db
	$query = "INSERT INTO quiz_taken(course_id, difficulty, user_id, is_taken)
	VALUES('$course_id', '$course_difficulty', '$user_id', 'yes')";
	mysqli_query($db, $query);
}



function sendScoreExam($score, $correct, $wrong, $course, $difficulty, $user_id){
	global $today, $db;
	// get data from database
	$query_course = "SELECT * FROM science_branch WHERE id='$course'";
	$query_difficulty = "SELECT * FROM difficulty WHERE difficulty='$difficulty'";

	// result of query
	$result_course = mysqli_query($db, $query_course);
	$result_difficulty = mysqli_query($db, $query_difficulty);
	// associative array of the selected column
	$stmt_c = mysqli_fetch_assoc($result_course);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);

	$course_name = $stmt_c['language_name'];
	$course_difficulty = $stmt_d['difficulty'];

	$query = "INSERT INTO score_exam (student_id, course, difficulty, score, correct, wrong, date_taken)
	VALUES('$user_id', '$course_name', '$course_difficulty', '$score', '$correct', '$wrong', '$today')";
	mysqli_query($db, $query);
}

function sendScoreQuiz($score, $correct, $wrong, $course, $difficulty, $user_id){
	global $today, $db;
	// get data from database
	$query_course = "SELECT * FROM science_branch WHERE id='$course'";
	$query_difficulty = "SELECT * FROM difficulty WHERE difficulty='$difficulty'";

	// result of query
	$result_course = mysqli_query($db, $query_course);
	$result_difficulty = mysqli_query($db, $query_difficulty);
	// associative array of the selected column
	$stmt_c = mysqli_fetch_assoc($result_course);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);

	$course_name = $stmt_c['language_name'];
	$course_difficulty = $stmt_d['difficulty'];

	$query = "INSERT INTO score_quiz (student_id, course, difficulty, score, correct, wrong, date_taken)
	VALUES('$user_id', '$course_name', '$course_difficulty', '$score', '$correct', '$wrong', '$today')";
	mysqli_query($db, $query);
}

// Activity log to database
function passToActivityLog($course, $difficulty, $user_id, $test_type){
	global $db, $action, $today;

	// get data from database
	$query_course = "SELECT * FROM science_branch WHERE id='$course'";
	$query_difficulty = "SELECT * FROM difficulty WHERE id='$difficulty'";

	// result of query
	$result_course = mysqli_query($db, $query_course);
	$result_difficulty = mysqli_query($db, $query_difficulty);
	// associative array of the selected column
	$stmt_c = mysqli_fetch_assoc($result_course);
	$stmt_d = mysqli_fetch_assoc($result_difficulty);

	$course_name = ucfirst($stmt_c['language_name']);
	$course_difficulty = ucfirst($test_type);

	$action = "{$course_name} - {$course_difficulty}";

	$query = "INSERT INTO activity_log (action,activity_date,user_id,test_type)
	VALUES('$action', '$today','$user_id', '$test_type')";
	mysqli_query($db, $query);
}


// Call register() function if register_btn is clicked
if (isset($_POST['register_btn'])){
	register();
}

// REGISTER USER
function register(){
	// Global variables to access all inside this function
	global $db, $errors, $username, $email, $firstName, $middleName, $lastName, $grade, $section, $studentid;

	// User inputs from registration form into variables
	// e() function from the code below
	$firstName = e($_POST['firstName']);
	$middleName = e($_POST['middleName']);
	$lastName = e($_POST['lastName']);

	$username = e($_POST['username']);
	$password1 = e($_POST['password1']);
	$password2 = e($_POST['password2']);

	$email = e($_POST['email']);
	$grade = e($_POST['grade']);
	$section = e($_POST['section']);
	//$gender = e($_POST['gender']);
	$studentid = e($_POST['studentid']);

	// Form validation
	if(empty($firstName)){
		array_push($errors, "First Name is required");
	}elseif(!preg_match("/^[a-zA-Z\s]*$/", $firstName)){
		array_push($errors, "Invalid characters in first name");
	}

	if(!preg_match("/^[a-zA-Z\s]*$/", $middleName)){
		array_push($errors, "Invalid characters in middle name");
	}

	if(empty($lastName)){
		array_push($errors, "Last Name is required");
	}elseif(!preg_match("/^[a-zA-Z\s]*$/", $lastName)){
		array_push($errors, "Invalid characters in last name");
	}

	if(empty($username)){
		array_push($errors, "Username is required");
	}

	if(empty($password1)){
		array_push($errors, "Password is required");
	}

	if($password1 != $password2){
		array_push($errors, "Password do not match");
	}

	if(empty($email)){
		array_push($errors, "Email is required");
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		array_push($errors, "Invalid email");
	}

	if(empty($grade)){
		array_push($errors, "Grade is required");
	}

	if(empty($section)){
		array_push($errors, "Section is required");
	}

	if(empty($studentid)){
		array_push($errors, "Student id is required");
	}

	// Register if there is no error
	if(count($errors) == 0){

		//$password = md5($password1); // Encrypt password before saving in to the database
		$password = $password1;

		if(isset($_POST['user_type'])){
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO user_info (firstName, middleName, lastName, username, password, email, grade, section, user_type, studentid, status)
			VALUES('$firstName', '$middleName', '$lastName', '$username', '$password', '$email', '$grade', '$section', '$user_type', '$studentid', 1)";
			mysqli_query($db, $query);
			$_SESSION['success'] = "New user created!!";
			header('location: index.php');
		}else{
			$query = "INSERT INTO user_info (firstName, middleName, lastName, username, password, email, grade, section, user_type, studentid, status)
			VALUES('$firstName', '$middleName', '$lastName', '$username', '$password', '$email', '$grade', '$section', 'user', '$studentid', 0)";
			$wait_otp = mysqli_query($db, $query);

			if($wait_otp)
			{
				$otp = rand(100000,999999);
				$_SESSION['otp'] = $otp;
				$_SESSION['mail'] = $email;
				
				// Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				// phpmailer setup
				$mail->isSMTP(); // enable SMTP Simple Mail Transport Protocol
				$mail->Host='smtp.gmail.com';
				$mail->Port=587;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls'; // security

				$mail->Username='school.jtis@gmail.com'; // our gmail
				$mail->Password='yvzriqioichxbhni'; // gmail app password

				$mail->setFrom('school.jtis@gmail.com', 'OTP Verification | Jhiane Therese International School'); // our gmail

				$mail->addAddress($email);

				$mail->isHTML(true);
				$mail->Subject = 'Your verification code';
				$mail->Body = "Hello, this is JTIS. Your verification code is $otp.";
				"
				<p>Dear Student of Jhiane Therese International School, </p> <h3>Your verify OTP code is $otp <br></h3>
                <br><br>
                <h2>I-TEAM</h2>
                <b>BSIT 3-1B</b>
				";

				$mail->send();

				if(!$mail->send())
				{
					?>
					<script>
						alert("<?php echo "Register Failed, Invalid Email"?>");
					</script>
					<?php

				}else
				{
					?>
					<script>
						alert("<?php echo "We've send a verification link to ".$email ?>");
						window.location.replace('multi_login/verification.php');
					</script>
					<?php

				}
			}

			// Get the id of the created user
			//$logged_in_user_id = mysqli_insert_id($db);

			//$_SESSION['user'] = getUserById($logged_in_user_id); // Put logged in user in session
			//$_SESSION['success'] = "You are now logged in";
			//header("location: index.php");
		}
	}
}

// Return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM user_info WHERE user_id=". $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// Escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error(){
	global $errors;

	if(count($errors) > 0){
		echo '<div class="error">';
		foreach ($errors as $error){
			echo $error.'<br>';
		}
		echo '</div>';
	}
}

function display_success(){
	global $success, $changepassdone;
	if($changepassdone == true)
	{
		echo '<div class="success">';
		echo $success.'<br>';
		echo '</div>';
		$changepassdone == false;
	}
	
	
}

// Call the login() function if login_btn is clicked
if(isset($_POST['login_btn'])){
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors, $password;

	// User inputs from registration form into variables
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// Form validation
	if(empty($username)){
		array_push($errors, "Username is required");
	}

	if(empty($password)){
		array_push($errors, "Password is required");
	}

	// Attempt login if no errors in the form
	if(count($errors) == 0){
		//$password = md5($password);

		$query = "SELECT * FROM user_info WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);


		
		if(mysqli_num_rows($results) == 1){ // User is found
			// Check if user is admin or not
			$logged_in_user = mysqli_fetch_assoc($results);

			if($logged_in_user["status"] == 0)
			{
				?>
				<script>
					alert("<?php echo "Please verify email account before logging in"?>");
				</script>
				<?php
			}else
			{
				if($logged_in_user['user_type'] == 'admin')
				{ // If the logged in user is an admin, redirect to admin_main.php
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in!";
					header('location: admin/admin_main.php');
				}else
				{										 // If the logged in user is not an admin, redirect to index.php
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in!";
					header('location: index.php');
				}
			}	
		}else
		{
			array_push($errors, "Username or password is incorrect");
		}
	}
}

// Insert score to database
function insertQuizScore($id){
	global $db;
	$query = "SELECT * FROM user_info WHERE user_id=". $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// Checks if user is logged in
function isLoggedIn(){
	if(isset($_SESSION['user'])){
		return true;
	}else{
		return false;
	}
}

// Logs user out if logout button is clicked
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['user']);
	header('location: login.php');
}

function isAdmin(){
	if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin'){
		return true;
	}else{
		return false;
	}
}



?>

