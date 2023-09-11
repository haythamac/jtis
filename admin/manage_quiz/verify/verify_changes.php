<!-- CSS Styles -->
<style>
  form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="number"] {
        width: 70px;
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    } 
</style>

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted form data
  $id = $_POST['id'];
  $question = $_POST['question'];
  $option1 = $_POST['option1'];
  $option2 = $_POST['option2'];
  $option3 = $_POST['option3'];
  $option4 = $_POST['option4'];
  $answer = $_POST['answer'];
  $course = $_POST['course'];
  $difficulty = $_POST['difficulty'];

  $answer = $answer - 1;

  // TODO: Implement the necessary logic to update the question in the database
  // You can use the provided form data and the $id to update the corresponding question


  // Retrieve the course name based on the course ID
  $con = mysqli_connect('localhost', 'root', '', 'jtis');

  // $course_db_query = "SELECT cat_name FROM category WHERE id=?";
  // $get_course = mysqli_prepare($con, $course_db_query);
  // mysqli_stmt_bind_param($get_course, 'i', $course);
  // mysqli_stmt_execute($get_course);
  // $result = mysqli_stmt_get_result($get_course);
  // $row = mysqli_fetch_array($result);

  // $course_id = $row['id'];

  $query = "UPDATE question_quiz SET question=?, opt1=?, opt2=?, opt3=?, opt4=?, answer=?, course_id=?, difficulty=? WHERE id=?";
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, 'ssssssisi', $question, $option1, $option2, $option3, $option4, $answer, $course, $difficulty, $id);
  $result = mysqli_stmt_execute($stmt);
  
  if ($result) {
      // Update successful
      echo "Question updated successfully.";
  } else {
      // Error in updating
      echo "Error updating the question: " . mysqli_error($con);
  }
  
  mysqli_close($con);

  // Redirect back to the manage_quiz.php page after the update
  header("Location: ../manage_quiz.php");
  exit;
} else {
  // If the form is not submitted, perform any necessary initialization or error handling
  // Here you can retrieve the question details based on the "id" parameter in the URL
  // and populate the form with the existing data for editing
  $id = $_GET['id'];

  // TODO: Retrieve the question details from the database using the $id
  $con = mysqli_connect('localhost', 'root', '', 'jtis');
  $query = "SELECT * FROM question_quiz WHERE id = ?";
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $question = $row['question'];
    $option1 = $row['opt1'];
    $option2 = $row['opt2'];
    $option3 = $row['opt3'];
    $option4 = $row['opt4'];
    $answer = $row['answer'];
    $course = $row['course_id'];
    $difficulty = $row['difficulty'];

    // Rest of your code...
  } else {
    echo "ERROR: NO RETRIEVED DATA FROM DATABASE";
  }

  mysqli_close($con);
?>
  <!-- HTML form for editing the question -->
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="difficulty" value="<?php echo $difficulty; ?>">
    <input type="hidden" name="course" value="<?php echo $course; ?>">

    <a href="../manage_quiz.php">&laquo; Go Back</a>

    <label for="question">Question:</label>
    <textarea name="question" id="question"><?php echo $question; ?></textarea>

    <label for="option1">Choice 1:</label>
    <input type="text" name="option1" id="option1" value="<?php echo $option1; ?>">

    <label for="option2">Choice 2:</label>
    <input type="text" name="option2" id="option2" value="<?php echo $option2; ?>">

    <label for="option3">Choice 3:</label>
    <input type="text" name="option3" id="option3" value="<?php echo $option3; ?>">

    <label for="option4">Choice 4:</label>
    <input type="text" name="option4" id="option4" value="<?php echo $option4; ?>">

    <label for="answer">Answer:</label>
    <input type="number" name="answer" id="answer" value="<?php echo $answer; ?>">

    <button type="submit">Update</button>
  </form>
<?php
}
?>