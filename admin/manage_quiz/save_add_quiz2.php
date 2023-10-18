<?php

$conn = mysqli_connect('localhost', 'root');
mysqli_select_db($conn, 'jtis');
if (!$conn) 
{
    die('unable to coonect to database');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data as a string
    $postData = file_get_contents('php://input');
    echo $postData;

    // Check if data was received
    if (!empty($postData)) {
        // Decode the JSON data into a PHP array
        $data = json_decode($postData, true);

        // Check if decoding was successful
        if ($data !== null) {
            // Access the properties in the PHP array
            $questionName = $data['questionName'];
            $answer = $data['answer'];
            echo $answer;
            $assessmentId = $data['assessmentId'];

            $query = "INSERT INTO question (question, answer, assessment_id)
                      VALUES (?,?,?);";
            $queryStatement = mysqli_prepare($conn, $query);
            $queryStatement->bind_param("ssi", $questionName, $answer, $assessmentId);
            
            if(!$queryStatement->execute()){
                echo "Error inserting data into the assessment table: " . mysqli_error($conn);
            }else{
                echo "Successfully saved to database";
            }
        } else {
            echo 'Error decoding JSON data.';
        }
    } else {
        echo 'No data received.';
    }
} else {
    echo 'Invalid request.';
}
?>
