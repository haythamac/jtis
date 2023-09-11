<?php
session_start();
require_once '../../vendor/autoload.php'; // include PHPWord library
$objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');



?>

<!DOCTYPE html>
<html>

<head>
	<title>JTIS</title>
	<!----css file link-->
	<link rel="stylesheet" type="text/css" href="../../css/science_topic.css">
	<link rel="stylesheet" type="text/css" href="../../css/science-lesson.css">
	<link rel="stylesheet" type="text/css" href="../../css/custom.css">
	<link rel="stylesheet" type="text/css" href="../../css/all.css">

	<!----favicon setting-->
	<link rel="shortcut icon" type="text/css" href="../../img/shortcuticon.svg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!----Linking google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<script src="https://apis.google.com/js/platform.js"></script>




</head>

<body>
	<!---Navigation Starts	----->
	<nav class="nav-bar nav-bar-inverse nav-bar-fixed-top">
		<div class="container">

			<!------Responsive Button---->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle bg-dark" data-toggle="collapse" data-target="#navi">
					<i class="fa-solid fa-bars"></i>
				</button>
				<h1 style="color: white; margin-top: 10px; font-size: 25px; " id="myhead2">Jhiane Therese International
					School</h1>
			</div>
			<div class="collapse navbar-collapse" id="navi">
				<!------Navigation menus starts---->

				<ul class="nav navbar-nav navbar-right" id="nav-ul">
					<li class="w100 nav-li"> <a href="../../index.php" class="border-bot nav-a">Home</a></li>
					<li class="w100 nav-li dropdown">
						<a class="w100 nav-li border-bot nav-a">menu</a>
						<div class="dropdown-content">
							<a class="w100 nav-li border-bot nav-a" href="../../video tutorials\lesson\display_video_lesson.php">TUTORIALS</a>
							<a class="w100 nav-li border-bot nav-a" href="../../online_quize/quizhome.php">EXERCISES</a>
						</div>
					</li>
					<!-----dropdown end ---->
					<?php
					if ($_SESSION['user']['user_type'] == 'user') {
					?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="../../profile.php" class="border-bot nav-a">Setting</a></li>
					<?php
					} elseif ($_SESSION['user']['user_type'] == 'admin') {
					?>
						<li class="w100 nav-li" id="resetpassbutton"> <a href="../../admin/admin_main.php" class="border-bot nav-a">Admin setting</a></li>
					<?php
					}
					?>
					<li> <a href="../../logout.php" id="our-location" class="btn-success">
							<?php echo $_SESSION['user']['username']; ?>
						</a></li>
				</ul>
				<!------Navigation menus ends---->
			</div>
		</div>
	</nav>

	<!------Side bar start---->

	<div class="contentnair">
		<div class="sidemenu" id="sidebarleftmenu">
			<ul class="sidemenulist">
				<a href="" class="crossbutton" onclick="closesidemenu()"><i class="fa-solid fa-xmark"></i></a>
				<h4 id="backto">LESSONS</h4>

				<?php
				$con = mysqli_connect('localhost', 'root');
				mysqli_select_db($con, 'jtis');
				$course_name = $_GET['course_name'];

				//$_GET['course_name'];
				// unset($_GET['course_name']);
				$q = "select * from courses where course_name='$course_name'";
				$result = mysqli_query($con, $q);
				while ($res = mysqli_fetch_array($result)) {
				?>
					<form action="fetch_main_content.php" method="POST">
						<input type="hidden" name="txt1" value="<?php echo $res['id'] ?>">
						<button style="background-color: transparent;border: none;text-align:left;color: white;">
							<li style="width: 300px;">
								<?php echo $res['topic_name']; ?>
							</li>
						</button>
					</form>

				<?php } ?>

			</ul>
			<a href="../../sciencedemo.php" id="backto">
				<h4>Other Lesson</h4>
			</a>
		</div>

		<!------Side bar ends---->

		<!------java main content starts ---->

		<div id="mainpagecontent" style="box-shadow:none;">

		<div class="content">
				<p>

					<?php

					$docx_name = $_SESSION['path']; // Name of the document. example.docx
					//echo $docx_name; 

					// Get the filename without the extension
					$filenameWithoutExtension = pathinfo($docx_name, PATHINFO_FILENAME);
					// Get the file extension
					$fileExtension = pathinfo($docx_name, PATHINFO_EXTENSION);
					// Separate with a comma
					$filenameSeparated = $filenameWithoutExtension . ', ' . $fileExtension;

					$docx_path = '../../' . $docx_name; // path ../../example.docx
					//echo "<br>";
					//echo $docx_path;
					?>
				</p>
				<?php
				$phpWord = $objReader->load($docx_path);

				$rendererName = \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
				$rendererLibrary = 'tcpdf';
				$rendererLibraryPath = '../../vendor/tecnickcom/' . $rendererLibrary;
				if (
					!\PhpOffice\PhpWord\Settings::setPdfRenderer(
						$rendererName,
						$rendererLibraryPath
					)
				) {
					die(
						'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
						'<br />' .
						'at the top of this script as appropriate for your directory structure'
					);
				}
				$rendererLibraryPath = '../../vendor/tecnickcom/' . $rendererLibrary;

				$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
				$pdfName =  $filenameWithoutExtension . '.' .'pdf'; // example.pdf
				$pdfPath = '../../uploadtopic/pdf/' . $pdfName; // ../../uploadtopic/pdf/
				$objWriter->save($pdfPath);

				?>

				<embed type="application/pdf" src="<?php echo $pdfPath; ?>" width="1500px" height="800px"></embed>


			</div>


		</div>


		<script type="text/javascript">
			var li = document.getElementsByTagName('li')[0].style = "color:red";
		</script>

</body>

</html>