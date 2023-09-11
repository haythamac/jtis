<?php session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost/ARIOS%20CAFE%20WEBSITE/customerImages/Arios%20Cafe%20Logo.jpg">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">
    <link rel="stylesheet" href="..//login-system-main/verification.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Verification</title>
</head>
<body>

<section class="w3l-mockup-form">
    <br>
    <br>
    <br>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                    <span><a href="http://localhost/ARIOS%20CAFE%20WEBSITE/CustomerEnd/index.php"><</a></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                           
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Verification</h2>
                        <p>Kindly type the Verification code that we sent to your email.</p>
                        <form action="" method="post">
                        <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>

                            <button  class="btn" type="submit" value="Verify" name="verify">Verify</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
</body>
</html>
<?php 
    include('functions.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($db, "UPDATE user_info SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                alert("Verify account done, you may sign in now");
                window.location.replace("../login.php");
             </script>
             <?php
        }

    }

?>