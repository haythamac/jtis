<?php
function assessmentType(){
  if (isset($_POST['submit-button'])) {
    $selectedOption = $_POST['options'];
    if($selectedOption == 'quiz'){
      $_SESSION['test_type'] = $selectedOption;
      header("location: online_quize/quizhome.php");
    }
    else if($selectedOption == 'exam'){
      $_SESSION['test_type'] = $selectedOption;
      header("location: online_exam/examhome.php");
    }
  }
}
assessmentType();
?>