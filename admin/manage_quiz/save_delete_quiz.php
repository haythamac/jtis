<?php
$conn = mysqli_connect('localhost', 'root', '', 'jtis'); // Include the database name
if (!$conn) {
    die('Unable to connect to the database');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use mysqli_real_escape_string to prevent SQL injection
    $questionId = mysqli_real_escape_string($conn, $_POST['questionId']);

    // Perform the SQL DELETE operation
    $query = "DELETE FROM question WHERE question_id = $questionId";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted data from the database";
    } else {
        echo "Error deleting data from the database: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>