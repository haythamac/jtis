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
            $option1 = $data['option1'];
            $option2 = $data['option2'];
            $option3 = $data['option3'];
            $option4 = $data['option4'];
            $answer = $data['answer'];
            $assessmentId = $data['assessmentId'];

            $query = "INSERT INTO question (question, option_1, option_2, option_3, option_4, answer, assessment_id)
                      VALUES (?,?,?,?,?,?,?);";
            $queryStatement = mysqli_prepare($conn, $query);
            $queryStatement->bind_param("sssssii", $questionName, $option1, $option2, $option3, $option4, $answer, $assessmentId);
            
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
