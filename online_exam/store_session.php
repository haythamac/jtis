<?php
session_start();

if (isset($_POST['cat_id']) && isset($_POST['difficulty_id'])) {
  $_SESSION['cat_id'] = $_POST['cat_id'];
  $_SESSION['difficulty_id'] = $_POST['difficulty_id'];
  echo "Data saved to session.";
} else {
  echo "Error: Data not received.";
}
?>
