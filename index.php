<?php
require "dbConnect.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;
//Comment this code After connection has been established, Database Created and Record Inserted
// $databaseConnection->createConection();
// $databaseConnection->createDataBase();
// $databaseConnection->createAdminTable();
// $databaseConnection->createBookTable();
// $databaseConnection->createStudentTable();
// $databaseConnection->createLibraryUser();
// $databaseConnection->createTranscationTable();
// $databaseConnection->createRequestTable();
// $databaseConnection->insertAdminData();
// $book->insertBookDetails();
//Comment this code After connection has been established, Database Created and Record Inserted

$databaseConnection->tempConnection();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codepassenger.com/html/axilboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:36:58 GMT -->
<head>
    <meta charset="UTF-8">
	
	<title>Library Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="AxilBoard Bootstrap 4 Admin Template">
	<meta name="author" content="CodePassenger">
	
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=css?family=Robot%7cMaterial+Icons" rel="stylesheet" type='text/css'>
	
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap-formhelpers.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="assets/css/uploadfile.css">
    <link rel="stylesheet" href="assets/css/emoji.css">
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/lobipanel.min.css">
	
	<!-- Material Design CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="assets/css/ripples.min.css">
	<link rel="stylesheet" href="assets/css/mdb.min.css">
	
	<!-- Responsive Mobile Menu -->
	<link rel="stylesheet" href="assets/css/responsive-menu/jquery.accordion.css">
	<link rel="stylesheet" href="css/vertical-menu.css">
	
    <link rel="stylesheet" href="css/app.css">
	
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body class="menu-collapsed">
	<div class="apps-container-wrap page-container widget-page">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="page-banner">
						<div class="banner-logo-block">
							<h1>Library System</h1>
						</div>
					</div>
				</div>
				<div class="widget-form-block">
					<div class="box-widget">
						<div class="panel-default">

							<div class="form-block">
								<form class="form-common">
									
									<div class="form-group row last">
										<div class="col-md-12">
											<div class="form-btn-block">
                                                <input type="button" onclick='location.href="adminSignIn.php"' class="btn btn-raised btn-primary waves-effect waves-light btn-block" value="Click here for Admin Login"><br><br>
                                                <input type="button" onclick='location.href="userSignIn.php"' class="btn btn-raised btn-primary waves-effect waves-light btn-block" value="Click here for User Login">
											</div>
										</div>
									</div>
								</form>
								
							</div>
						</div><!-- panel -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-toggle.min.js"></script>
    <script src="assets/js/bootstrap-formhelpers.min.js"></script>
    <script src="assets/js/bootstrap-formhelpers-languages.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
	<script src="assets/js/validator.min.js"></script>
	<script src="assets/js/jquery.inputmask.bundle.min.js"></script>
	<script src="assets/js/jquery-tree-view.js"></script>
	<script src="assets/js/jquery.uploadfile.min.js"></script>
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<script src="assets/js/jquery.simpleWeather.min.js"></script>
	<script src="assets/js/tinymce/tinymce.min.js"></script>
	<script src="assets/js/fullcalendar/moment.min.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/lobipanel.min.js"></script>
	<script src="assets/js/jquery.steps.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	
	<!-- Material-JS -->
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/ripples.min.js"></script>
	
	<!-- Responsive Mobile Menu -->
	<script src="assets/js/responsive-menu/jquery.accordion.js"></script>
	
	<!-- Counter-Up-JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	
	<!-- Emoji-JS -->
	<script src="assets/js/emoji/config.js"></script>
	<script src="assets/js/emoji/util.js"></script>
	<script src="assets/js/emoji/jquery.emojiarea.js"></script>
	<script src="assets/js/emoji/emoji-picker.js"></script>

    <script src="js/custom.js"></script>
</body>

<!-- Mirrored from codepassenger.com/html/axilboard/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:36:58 GMT -->
</html>
