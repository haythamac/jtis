<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['cat_id'] = $_POST['cat_id'];
  $_SESSION['difficulty'] = $_POST['difficulty'];
  
  // Return success message
  echo "Topic ID: ".$_SESSION['cat_id'];
  echo "Diffuclty: ".$_SESSION['difficulty'];
  echo "\n";
  // echo 'Variables saved successfully';
}

?>
