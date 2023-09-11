<?php
// Retrieve the selected topic from the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $topic_id = $_POST['topic'];

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "jtis";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve the difficulty levels from the database for the selected topic
  $stmt = $conn->prepare("SELECT * FROM difficulty WHERE topic_id = ?");
  $stmt->bind_param("i", $topic_id);
  $stmt->execute();
  $result = $stmt->get_result();

  // Create an array of difficulty levels
  $difficulties = array();
  while ($row = $result->fetch_assoc()) {
    $difficulties[] = $row;
  }

  // Close the database connection
  $conn->close();

  // Return the difficulty levels as a JSON-encoded response
  echo json_encode($difficulties);
}

/*
// Retrieve the selected topic from the AJAX request
$topic_id = $_POST['topic'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jtis";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the difficulty levels from the database for the selected topic
$sql = "SELECT * FROM difficulty WHERE topic_id = '$topic_id'";
$result = $conn->query($sql);

// Create an array of difficulty levels
$difficulties = array();
while ($row = $result->fetch_assoc()) {
    $difficulties[] = $row;
}

// Close the database connection
$conn->close();

// Return the difficulty levels as a JSON-encoded response
echo json_encode($difficulties);
*/
?>