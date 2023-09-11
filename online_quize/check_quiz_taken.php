<?php
include("../multi_login/functions.php");
// Retrieve the topic ID and difficulty ID from the AJAX request
$topic_id = $_POST['topic_id'];
$difficulty = $_POST['difficulty'];
$current_user = $_SESSION['user']['user_id'];

// Prepare and execute the query to check if the quiz is taken
$query = "SELECT is_taken, user_id FROM quiz_taken WHERE course_id = $topic_id AND difficulty = '$difficulty' AND user_id = '$current_user'";
$result = mysqli_query($db, $query);

if ($result) {
    // Fetch the row
    $row = mysqli_fetch_assoc($result);
  
    if ($row !== null && isset($row['is_taken'])) {
      // Return the is_taken value as JSON response
      echo json_encode(array('is_taken' => $row['is_taken'], 'user_id' => $row['user_id']));
    } else {
      // Return an error response
      echo json_encode(array('is_taken' => false, 'user_id' => false));
    }
  } else {
    // Return an error response
    echo json_encode(array('is_taken' => false, 'user_id' => false));
  }

// Close the database connection
$db->close();
?>
