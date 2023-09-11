<?php
// verify_delete.php

// Check if the id parameter is present in the URL
if (isset($_GET['id'])) {
    // Retrieve the id parameter from the URL
    $id = $_GET['id'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'jtis');

    // Check the database connection
    if (!$con) {
        die("Database connection failed");
    }

    // Construct the delete query
    $query = "DELETE FROM question_quiz_identification WHERE id = '$id'";

    // Execute the delete query
    if (mysqli_query($con, $query)) {
        // Deletion successful
        echo "Row deleted successfully.";
    } else {
        // Error in deletion
        echo "Error deleting the row: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);

	// Redirect back to the delete page after a brief delay
    header("refresh:1; url=../manage_quiz.php");
    exit;
} else {
    // id parameter is not present in the URL
    echo "Invalid request";
}
?>