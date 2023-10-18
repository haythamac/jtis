<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define your database connection, e.g., $con
    $con = mysqli_connect('localhost', 'root', '', 'jtis');

    $question = $_POST['question'];
    $option1 = $_POST['option_1'];
    $option2 = $_POST['option_2'];
    $option3 = $_POST['option_3'];
    $option4 = $_POST['option_4'];
    $answer = $_POST['answer'];
    $questionId = $_POST['questionId'];

    // Define your SQL query with placeholders
    $query = "UPDATE question SET question=?, option_1=?, option_2=?, option_3=?, option_4=?, answer=? WHERE question_id=?";

    // Create a prepared statement
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssssi", $question, $option1, $option2, $option3, $option4, $answer, $questionId);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo 'Question updated successfully';
        } else {
            echo 'Error updating question: ' . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error creating prepared statement: ' . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo 'Invalid request';
}
?>
