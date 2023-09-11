<?php
include("../multi_login/functions.php");
include("../online_quize/class/quizUsers.php");
include("../online_exam/class/examUsers.php");
include("classes/admin.php");

$user = new quizUsers;
$euser = new examUsers;
$quizd = $user->showProfileQuizScoreAdmin();
$examd = $euser->showProfileExamScoreAdmin();
$actlog = $user->showActivityLogAdmin();

$admin = new admin;
$userd = $admin->show_users();

// Retrieve the user ID from the URL parameter
$user_id = $_GET['user_id'];

// Fetch the user details, activity logs, and exam scores based on the user ID
// Replace this with your own logic to retrieve the data from your database or source

// Details of user in array form
$userDetails = [];

$activityLogs = [];

$examScores = [];
$quizScores = [];

// Place the details from database to the variables

// User details
foreach ($userd as $userdata) {
    if (!empty($userdata) && $userdata['user_id'] === $user_id) {
        $userDetails = $userdata;
        break;
    }
}

// User activity logs
foreach ($actlog as $log) {
    if (!empty($log) && $log['user_id'] === $user_id) {
        array_push($activityLogs, $log);
    }
}

// User exam scores
foreach ($examd as $exam) {
    if (!empty($exam) && $exam['student_id'] === $user_id) {
        array_push($examScores, $exam);
    }
}

// User quiz scores
foreach ($quizd as $quiz) {
    if (!empty($quiz) && $quiz['student_id'] === $user_id) {
        array_push($quizScores, $quiz);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
    <!-- <link rel="stylesheet" href="../css/check_user_details.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Aleo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <!----magnific popup css file for work section -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!----owlcarousel css file for our team section -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">

    <!----Linking google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <!----font-awsome start-->
    <link rel="stylesheet" href="css/all.css">

    <!----font-awsome ends-->

    <!----favicon setting-->
    <link rel="shortcut icon" type="text/css" href="img/shortcuticon.svg">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!----css file link-->
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!----magnific popup js file for work section -->
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

    <!----owlcarousel js file for our team section -->

    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
            <?php ?>

        <table class="table bg-white shodow pl-5 table-responsive" style="overflow-y: scroll; max-height: 600px;">

            <!-- table stsrts  --> <!--  use table-responsive class -->
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Section</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Is verified</th>
                </tr>
            </thead>
            <tbody style="">
                <tr>
                    <td><?php echo $userDetails['user_id']; ?></td>
                    <td><?php echo $userDetails['firstName']; ?></td>
                    <td><?php echo $userDetails['lastName']; ?></td>
                    <td><?php echo $userDetails['lastName']; ?></td>
                    <td><?php echo $userDetails['username']; ?></td>
                    <td><?php echo $userDetails['email']; ?></td>
                    <td><?php echo $userDetails['grade']; ?></td>
                    <td><?php echo $userDetails['section']; ?></td>
                    <td><?php echo $userDetails['studentid']; ?></td>
                    <td><?php 
                    if ($userDetails['status'] == 1)
                    {
                        echo "Verified"; 
                    }
                    elseif ($userDetails['status'] == 0)
                    {
                        echo "Not yet verified"; 
                    }
                    
                    ?></td>
                </tr>
            </tbody>
        </table>

        <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0" style="overflow-y: scroll; max-height: 500px;">
                <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <p class="mb-0"><strong>Action</strong></p>
                        <p class="mb-0"><strong>Date</strong></p>
                    </li>
                    <?php
                    foreach ($activityLogs as $log) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0">
                                <?php echo $log['action']; ?>
                            </p>
                            <p class="mb-0">
                                <?php echo $log['activity_date']; ?>
                            </p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="card mb-4 mb-md-0 score-card" style="overflow-y: scroll; max-height: 300px;">
                <div class="card-body">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Exam</span>score
                    </p>
                    <table id="examTable" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Difficulty</th>
                                <th scope="col">Score</th>
                                <th scope="col">Correct</th>
                                <th scope="col">Wrong</th>
                                <th scope="col">Date taken</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $exam_counter = 1;
                            if (!empty($examd)) {
                                foreach ($examd as $details) {

                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $exam_counter; ?>
                                        </th>
                                        <td>
                                            <?php echo ucfirst($details['course']); ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($details['difficulty']); ?>
                                        </td>
                                        <td>
                                            <?php echo $details['score']; ?>%
                                        </td>
                                        <td>
                                            <?php echo $details['correct']; ?>
                                        </td>
                                        <td>
                                            <?php echo $details['wrong']; ?>
                                        </td>
                                        <td>
                                            <?php echo $details['date_taken']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $exam_counter++;
                                }
                            } else { ?>
                                <th scope="row">Null</th>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="card mb-4 mb-md-0 score-card" style="overflow-y: scroll; max-height: 300px;">
                <div class="card-body">
                    <p class="mb-4"><span class="text-primary font-italic me-1">Quiz</span>score
                    </p>
                    <table id="quizTable" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Difficulty</th>
                                <th scope="col">Score</th>
                                <th scope="col">Correct</th>
                                <th scope="col">Wrong</th>
                                <th scope="col">Date taken</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $quiz_counter = 1;
                            if (!empty($quizd)) {
                                foreach ($quizd as $details) {

                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $quiz_counter; ?>
                                        </th>
                                        <td>
                                            <?php echo ucfirst($details['course']); ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($details['difficulty']); ?>
                                        </td>
                                        <td>
                                            <?php echo $details['score']; ?>%
                                        </td>
                                        <td>
                                            <?php echo $details['correct']; ?>
                                        </td>
                                        <td>
                                            <?php echo $details['wrong']; ?>
                                        </td>
                                        <td>
                                            <?php echo $details['date_taken']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $quiz_counter++;
                                }
                            } else { ?>
                                <th scope="row">Null</th>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <td>Null</td>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add additional content and styling as needed -->
    </div>
</body>

</html>