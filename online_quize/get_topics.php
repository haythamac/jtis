<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jtis";

// Create an array of topics
$topics = array();
$topics_data = array();
$topic_grading;
$current_grading = 1;

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from grading table based on the current grading
$stmt = $conn->prepare("SELECT * FROM grading WHERE current = ?");
$stmt->bind_param("i", $current_grading);
$stmt->execute();
$result_grading = $stmt->get_result();

// Fetch the lesson_grading values
while ($row = $result_grading->fetch_assoc()) {
    $current_grading_loop = $row['grading'];
    
    // Retrieve topics from the database
    $science_branch_query = "SELECT * FROM science_branch WHERE lesson_grading = ?";
    $science_branch_conn = $conn->prepare($science_branch_query);
    $science_branch_conn->bind_param("s", $current_grading_loop);
    $science_branch_conn->execute();
    $science_branch_result = $science_branch_conn->get_result();

    
    // Retrieve the grading data from the result
    if ($science_branch_result->num_rows > 0) {
        $science_branch = $science_branch_result->fetch_assoc();

        // Compare the grading_id with the topic id
        if ($science_branch['lesson_grading'] == $row['grading']) {
            $topics_data[] = $science_branch;
        }
    }
}
$test = array();
foreach($topics_data as $topics)
{
    $test = $topics;
}


// $variable_lang = $result_grading->fetch_assoc();
// $grading_id_var = strval($variable_lang['grading_id']);

//$variable_lang = $result_grading->fetch_assoc();
//$grading_id_var = $topic_grading;



// while ($row = $science_branch_result->fetch_assoc()) {
//     $topic_id_var = strval($row['grading']);
//     // if($result_grading->num_rows > 0 && $result->num_rows > 0 && $grading_id_var == $topic_id_var){
//     //     array_push($topics, $grading_id_var, $row['id']);
//     // }
    
//     if ($result_grading->num_rows > 0 && $grading_id_var == $topic_id_var){
//         $topics[] = $row;
//     }
// }



// Return the topics as a JSON-encoded response
 echo json_encode($topics);




?>