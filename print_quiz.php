<?php
    include("multi_login/functions.php");
    include("online_quize/class/quizUsers.php");
    $euser = new quizUsers;
    $quizd = $euser->showProfilequizScore();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Jhiane Therese International School</title>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
    <script>
        window.onload = function () {
            // Trigger the print dialog
            window.print();
        };
    </script>
</head>

<body>
    <div class="row mb-4">
        <div class="card mb-4 mb-md-0 score-card" >
            <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">quiz</span>score
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

    <script src="js/jquery.ripples-min.js" type="text/javascript"></script>
    <script src="js/typed.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>

</html>