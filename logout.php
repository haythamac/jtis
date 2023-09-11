<?php
// log user out if logout button clicked
    session_destroy();
    unset($_SESSION['user']);
    header("location: /jtis/login.php");

?>