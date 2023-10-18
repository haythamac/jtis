<?php

$conn = mysqli_connect('localhost', 'root');
mysqli_select_db($conn, 'jtis');
if (!$conn) 
{
    die('unable to coonect to database');
}

// You can use the null coalescing operator (??) in PHP 7.0 and later:
$question = $_POST['question'] ?? ($_POST['questionHard'] ?? '');
$option1 = $_POST['option1'] ?? '';
$option2 = $_POST['option2'] ?? '';
$option3 = $_POST['option3'] ?? '';
$option4 = $_POST['option4'] ?? '';
$answer = $_POST['answer'] ?? ($_POST['answerHard'] ?? '');



$assessmentName = $_POST['quizName'];
$lesson = $_POST['lesson'];
$difficulty = $_POST['difficulty'];
$assessmentType = 'quiz';


if (isset($_POST['submitButtonName']) && $_POST['submitButtonName'] == 'addQuiz') 
{

    $assessmentQuery = "INSERT INTO assessment (assessment_name, lesson, difficulty, assessment_type)
                      VALUES (?,?,?,?);";
    $assessmentStatement = mysqli_prepare($conn, $assessmentQuery);
    $assessmentStatement->bind_param("ssss", $assessmentName, $lesson, $difficulty, $assessmentType);
    
    if(!$assessmentStatement->execute()){
        echo "Error inserting data into the assessment table: " . mysqli_error($conn);
    }

    if ($assessmentStatement->execute()) {
        // Insert data into the question table using the last inserted assessment ID
        $assessmentId = mysqli_insert_id($conn); // Get the ID of the last inserted row
    
        $questionQuery = "INSERT INTO question (question, option_1, option_2, option_3, option_4, answer, assessment_id)
                       VALUES (?,?,?,?,?,?,?)";
        $questionStatement = mysqli_prepare($conn, $questionQuery);
        $questionStatement->bind_param("ssssssi", $question, $option1, $option2, $option3, $option4, $answer, $assessmentId);

        $leaderboardQuery = "INSERT INTO leaderboard (assessment_id)
                       VALUES (?)";
        $leaderboardStatement = mysqli_prepare($conn, $leaderboardQuery);
        $leaderboardStatement->bind_param("i", $assessmentId);

        $questionTableQuery = "INSERT INTO assessment_question (assessment_question_id, question_id) VALUES (?,?)";
        $questionTableStatement = mysqli_prepare($conn, $questionTableQuery);
        // $questionTableStatement->bind_param("ii",);

        if ($questionStatement->execute() && $leaderboardStatement->execute()) {
            echo "Data inserted successfully into all tables.";
        } else {
            echo "Error inserting data into the question table: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['submitButtonName']) && $_POST['submitButtonName'] == 'addQuizHard') 
{
    $assessmentQuery = "INSERT INTO assessment (assessment_name, lesson, difficulty, assessment_type)
                      VALUES (?,?,?,?);";
    $assessmentStatement = mysqli_prepare($conn, $assessmentQuery);
    $assessmentStatement->bind_param("ssss", $assessmentName, $lesson, $difficulty, $assessmentType);
    
    if(!$assessmentStatement->execute()){
        echo "Error inserting data into the assessment table: " . mysqli_error($conn);
    }

    if ($assessmentStatement->execute()) {
        // Insert data into the question table using the last inserted assessment ID
        $assessmentId = mysqli_insert_id($conn); // Get the ID of the last inserted row
    
        $questionQuery = "INSERT INTO question (question, answer, assessment_id)
                       VALUES (?,?,?)";
        $questionStatement = mysqli_prepare($conn, $questionQuery);
        $questionStatement->bind_param("ssi", $question, $answer, $assessmentId);

        $leaderboardQuery = "INSERT INTO leaderboard (assessment_id)
                       VALUES (?)";
        $leaderboardStatement = mysqli_prepare($conn, $leaderboardQuery);
        $leaderboardStatement->bind_param("i", $assessmentId);

        if ($questionStatement->execute() && $leaderboardStatement->execute()) {
            echo "Data inserted successfully into all tables.";
        } else {
            echo "Error inserting data into the question table: " . mysqli_error($conn);
        }
    }
}