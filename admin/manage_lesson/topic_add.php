<?php 

				// in this file --> code for add a new course ,update a course and delete a course by admin from manage_topic.php

 session_start();
   $con=mysqli_connect('localhost','root');

mysqli_select_db($con,'jtis');

// ==========================================================================================

					// code to add a new course by admin from manage_topic.php

if (isset($_POST['btn_add'])) {
	$languagename=$_POST['course_name']; // name
$languageimg=$_FILES['course_image'];
$languagedesc=$_POST['course_desc']; // desc 
$languagegrading=$_POST['grading']; // grading
echo $languagegrading;

$filename=$languageimg['name'];
$fileerror=$languageimg['error'];   
$filetmp=$languageimg['tmp_name'];


$fileext=explode('.', $filename);
$filecheck=strtolower(end($fileext));

$fileextstored= array('png','jpg','jpeg' );


if (in_array($filecheck,$fileextstored)) {
	$destinationfile='uploadimg/'.$filename; // img
	move_uploaded_file($filetmp,'../../uploadimg/'.$filename);

	$q="insert into science_branch(language_name,language_image,language_description,lesson_grading) values('$languagename','$destinationfile','$languagedesc','$languagegrading')";

	$query_category = "INSERT INTO category(cat_name) VALUES ('$languagename')";
	$cat=mysqli_query($con, $query_category);
	$r=mysqli_query($con,$q);

 if ($r==true) {
 header("location:manage_topic.php?status=added");
    }
	
 }
}


// ============================================================================================

				// code to add a new course by admin from manage_topic.php

if (isset($_POST['btn-delete-course'])) {
	
	$course_name=$_POST['selected_course'];
	$q="DELETE FROM science_branch WHERE language_name='$course_name'";
	$query_category="DELETE FROM category WHERE cat_name='$course_name'";
	$r=mysqli_query($con,$q);
	$cat=mysqli_query($con,$query_category);
	if ($r) 
	{
		header("location:manage_topic.php?status=deleted");
	}

}


// ==============================================================================
					// code to update course by admin from manage_topic.php


if (isset($_POST['btn_update'])) {
	$languagename=$_POST['selected-course-to-update'];
$languageimg=$_FILES['course_image'];
$languagedesc=$_POST['course_desc'];
$languagegrading=$_POST['grading'];

$filename=$languageimg['name'];
$fileerror=$languageimg['error'];   
$filetmp=$languageimg['tmp_name'];


$fileext=explode('.', $filename);
$filecheck=strtolower(end($fileext));

$fileextstored= array('png','jpg','jpeg' );

if (in_array($filecheck,$fileextstored)) {
	$destinationfile='uploadimg/'.$filename;
	move_uploaded_file($filetmp,$destinationfile);

	$q=" UPDATE science_branch SET language_image='$destinationfile',language_description='$languagedesc',lesson_grading='$languagegrading' WHERE language_name='$languagename'";
	$r=mysqli_query($con,$q);

 if ($r==true) {
 header("location:manage_topic.php?status=updated");
    }
	
 }
}



// =====================================================================================================================================
// ========================================================================================================================
     // in this section add videos ,update videos and delete videos is going on from manage_videos.php


if (isset($_POST['btn_add'])) {
	$coursename=$_POST['course_name'];
$courseimg=$_FILES['course_image'];
$coursedesc=$_POST['course_desc'];
$coursegrading=$_POST['grading'];

$filename=$courseimg['name'];
print_r($courseimg);		
$fileerror=$courseimg['error'];   
$filetmp=$courseimg['tmp_name'];


$fileext=explode('.', $filename);
$filecheck=strtolower(end($fileext));

$fileextstored= array('png','jpg','jpeg' );

if (in_array($filecheck,$fileextstored)) {
	$destinationfile='uploadimg/'.$filename;
	move_uploaded_file($filetmp,$destinationfile);

	$q="insert into science_branch(image,description,course_name,grading) values('$destinationfile','$coursedesc','$coursename','$coursegrading')";
	$r=mysqli_query($con,$q);

 if ($r==true) {
 header("location:manage_topic.php?status=added");
    }
	
 }
}



