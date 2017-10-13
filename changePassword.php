<?php
require "dbConnect.php";
require "books.php";
require "student.php";
include "session.php";

$numOfBooksRent1 = $name = "";

$databaseConnection = new DatabaseConnection;
$student = new Students;

$databaseConnection->tempConnection();

$currentPassword=$newPassword =$reTypePassword ="";
$valid = true;
$passwordFromDB = "";

$sql1 = "Select name,numOfBooksRent FROM Student where email='$login_session'";
$result1 = mysqli_query($databaseConnection->conn1, $sql1);

if(mysqli_num_rows($result1) > 0) {
	while($row=mysqli_fetch_assoc($result1)){
		$numOfBooksRent1 = $row['numOfBooksRent'];
		$name = $row['name'];
	}
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["currentPassword"])){
		$currentPassword = $_POST["currentPassword"];
		$sql = "Select password from LibraryUSer where loginId = '$login_session'";
		$result = mysqli_query($databaseConnection->conn1, $sql);
		if(mysqli_num_rows($result) > 0) {
			while($row=mysqli_fetch_assoc($result)){
				$passwordFromDB = $row['password'];
			}
		}
		if($passwordFromDB == $currentPassword){
			if(isset($_POST["newPassword"])){
				$newPassword = $_POST["newPassword"];
				
			}
			if(empty($_POST["newPassword"])){
				//$errName="Please enter name";
				$valid = false;
			}
			if(isset($_POST["reTypePassword"])){
				$reTypePassword = $_POST["reTypePassword"];
				
			}
			if(empty($_POST["reTypePassword"])){
				//$errName="Please enter name";
				$valid = false;
			}
			if ($_POST["newPassword"] === $_POST["reTypePassword"]) {
				
			}
			 else {
				$valid = false;
				echo "<script>
				alert('Password and Confirm Password does not match');
				window.location.href='changePassword.php';
				</script>";
			 }
		}else{
			$valid = false;
			echo "<script>
			alert('Password Does not match with Data');
			window.location.href='changePassword.php';
			</script>";
		}
	}
	if(empty($_POST["currentPassword"])){
		//$errName="Please enter name";
		$valid = false;
	}

	if($valid){
		$student->changePassword($newPassword,$login_session);
		echo "<script>
		alert('Password Changed Succesfully');
		window.location.href='userIndex.php';
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codepassenger.com/html/axilboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:31:11 GMT -->
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
	
	<!-- Data Table CSS -->
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="assets/css/select.dataTables.min.css">
	
	<!-- Vector-ammap CSS -->
	<link rel="stylesheet" href="assets/css/ammap.css">
	
    <link rel="stylesheet" href="css/app.css">
	
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body class="menu-collapsed">
	<div class="apps-header navbar">
		<div class="apps-logo-block">
			<a href="userIndex.php">
				<img src="images/logo.png" alt="img" class="img-responsive">
				<div class="logo-text-block">
					<h3 class="logo-text">Library System</h3>
				</div>
			</a>
		</div>
		<div class="top-menu">
			<ul class="top-controller-icons pull-left">
				<li>
					<a id="showLeftPush" href="javascript:void(0)" class="toggolebtn">
						<span class="ti-view-grid"></span>
					</a>
				</li>
				<li>
					<!-- <form class="searchbox">
						<input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
						<input type="submit" class="searchbox-submit" value="">
						<span class="searchbox-icon ti-search"></span>
					</form> -->
				</li>
			</ul>
			<ul class="nav navbar-nav">
                    <li class="dropdown icon-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="badge badge-default primary-bg">7</span>
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu card-dropdown right">
                              <li><div class="drop-title">Notification</div></li>
                              <li>
                                <div class="card-inner-block notification-block">
                                    <a href="javascript:void(0)">
                                        <i class="notification-icon fa fa-clock-o info-bg"></i>
                                        <div class="notification-details">
                                            <h5>Events</h5>
                                            <span class="mail-desc">Todayes 5 events still Remaning</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                        <span class="time"></span>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="notification-icon fa fa-users primary-bg"></i>
                                        <div class="notification-details">
                                            <h5>Meetings</h5>
                                            <span class="mail-desc">Todayes Meeting were cancle</span>
                                            <span class="time">10:30 AM</span>
                                        </div>
                                        <span class="time"></span>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="notification-icon fa fa-plane warning-two-bg"></i>
                                        <div class="notification-details">
                                            <h5>Travel</h5>
                                            <span class="mail-desc">US Airline Departure time</span>
                                            <span class="time">5:30 PM</span>
                                        </div>
                                        <span class="time"></span>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="notification-icon fa fa-pie-chart warning-bg"></i>
                                        <div class="notification-details">
                                            <h5>Revenue</h5>
                                            <span class="mail-desc">Todayes Revenue Cross 2 crore</span>
                                            <span class="time">11:20 PM</span>
                                        </div>
                                        <span class="time"></span>
                                    </a>
                                </div>
                              </li>
                              <li><div class="drop-footer"><a href="">Check all notification</a></div></li>
                            </ul>
                        </li>                
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            
                        <i class="fa fa-cog">
						Profile Settings
						<span class="ti-angle-down"></span>
                        <div class="ripple-container"></div>
                    </i>
					</a>
					<ul class="dropdown-menu">
					  <li>
						<a href="userProfile.php">
                        User Profile
							
						</a>
					  </li>
					   <li>
						<a href="changePassword.php">
                        Change Password
							
						</a>
					  </li>
					   <li>
					   	<a href="logOut.php">
						LogOut
							
						</a>
					  </li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div><!-- apps-header -->
	<div class="slide-menu-wrap">
		<nav id="cbp-spmenu-s1" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
			<div class="user-profile-block">
					<a href="userProfile.php">
				<div class="user-thumb">
					<img src="images/profile/user-thumb.jpg" alt="img" class="img-responsive">
				</div>
				<div class="user-info">
					
					<h5>
					<?php echo $name?>
					</h5>
					<span>Student</span>
					
				</div>
			</a>
			</div>
			<div class="accordion-menu responsive-menu" data-accordion-group>
				<div class="slide-navigation-wrap" data-accordion>
					<div class="nav-item has-sub" data-control>
						<a href="userIndex.php">
							<span class="menu-icon-wrap icon ti-home"></span>
							<span class="menu-title">Home</span>
						</a>
					</div>
				</div>
            
            <div class="slide-navigation-wrap" data-accordion>
					<div class="nav-item has-sub" data-control>
						<a href="javascript:void(0)">
							<span class="menu-icon-wrap icon ti-pencil-alt"></span>
							<span class="menu-title">Manage Books</span>
						</a>
					</div>
					<div class="menu-content" data-content>
						<div class="nav-item">
							<a href="userRentBook.php">
								<span class="menu-icon-wrap bullet"></span>
								<span class="menu-title">Rent Book</span>
							</a>
						</div>
						<div class="nav-item">
							<a href="userReturnBook.php">
								<span class="menu-icon-wrap bullet"></span>
								<span class="menu-title">Return Book</span>
							</a>
						</div>
					</div>
                </div>
            </div>
		</nav>
	</div>
    <div class="apps-container-wrap page-container widget-page">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="page-banner">
                            <div class="banner-logo-block">

                            </div>
                        </div>
                    </div>
                    <div class="widget-form-block">
                        <div class="box-widget">
                            <div class="panel-default">
                                <div class="widget-block-title">
                                    <h3>Change Password</h3>
                                </div>
                                <div class="form-block">
                                    <form class="form-common" action="" method="post">
                                            <div class="row">
                                                    <div class="form-group password-group col-lg-12">
                                                        <input type="password" class="form-control" name="currentPassword" id="input-passwoed-one" placeholder="Current Password">
                                                    </div>

                                            </div>
                                            <div class="row">
                                                    <div class="form-group password-group col-lg-12">
                                                        <input type="password" class="form-control" name="newPassword" id="input-passwoed-one" placeholder=New "Passwoed">
                                                    </div>

                                            </div>
                                            <div class="row">
                                                    <div class="form-group password-group col-lg-12">
                                                        <input type="password" class="form-control" name="reTypePassword" id="input-passwoed-one" placeholder="ReType Passwoed">
                                                    </div>
                                            </div>
											<div class="offset-2">
											<input type="submit" class="btn btn-raised btn-primary waves-effect waves-light" value="Submit" name="submit">
											<input type="submit" class="btn btn-outline-default btn-xs btn-raised waves-effect" value="Cancel" name="cancel">
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
	
	<!-- Data-Table-JS -->
	<script src="assets/js/datatable/jquery.dataTables.min.js"></script>
	<script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
	<script src="assets/js/datatable/dataTables.select.min.js"></script>
	<script src="assets/js/datatable/dataTables.buttons.min.js"></script>
	<script src="assets/js/datatable/buttons.flash.min.js"></script>
	<script src="assets/js/datatable/jszip.min.js"></script>
	<script src="assets/js/datatable/vfs_fonts.js"></script>
	<script src="assets/js/datatable/buttons.html5.min.js"></script>
	<script src="js/datatable-custom.js"></script>
	
	<!-- Chart-JS -->
    <script src="assets/js/chart/Chart.bundle.min.js"></script>
	<script src="js/chart-custom.js"></script>
	
	<!-- Counter-Up-JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	
	<!-- Emoji-JS -->
	<script src="assets/js/emoji/config.js"></script>
	<script src="assets/js/emoji/util.js"></script>
	<script src="assets/js/emoji/jquery.emojiarea.js"></script>
	<script src="assets/js/emoji/emoji-picker.js"></script>
	
	<!-- Vector-Map-Ammap-JS -->
	<script src="assets/js/ammap/ammap.js"></script>
	<script src="assets/js/ammap/worldLow.js"></script>
	<script src="assets/js/ammap/black.js"></script>
	
    <script src="js/custom.js"></script>
	<script>
		AmCharts.theme = AmCharts.themes.black;
		AmCharts.ready(function(){
			var map = new AmCharts.AmMap();
			var dataProvider = {
				mapVar: AmCharts.maps.worldLow,
				getAreasFromMap:true,
				areas:[
					{ "id": "AU", "color": "#ff7979" },
					{ "id": "US", "color": "#83e9d2" },
					{ "id": "RS", "color": "#83e9d2" },
					{ "id": "RU", "color": "#83e9d2" },
					{ "id": "CA", "color": "#ff7979" },
					{ "id": "BR", "color": "#ffce2e" },
					{ "id": "MX", "color": "#ffce2e" },
					{ "id": "AR", "color": "#ffce2e" },
					{ "id": "CO", "color": "#ffce2e" },
					{ "id": "PE", "color": "#ffce2e" },
					{ "id": "EC", "color": "#ffce2e" },
					{ "id": "CU", "color": "#ffce2e" },
					{ "id": "HA", "color": "#ffce2e" },
					{ "id": "CL", "color": "#ffce2e" },
					{ "id": "PY", "color": "#ffce2e" },
					{ "id": "UY", "color": "#ffce2e" },
					{ "id": "BO", "color": "#ffce2e" },
					{ "id": "FK", "color": "#ffce2e" },
					{ "id": "VE", "color": "#ffce2e" },
					{ "id": "GT", "color": "#ffce2e" },
					{ "id": "HN", "color": "#ffce2e" },
					{ "id": "MX", "color": "#ffce2e" },
					{ "id": "GY", "color": "#ffce2e" },
					{ "id": "HT", "color": "#ffce2e" },
					{ "id": "SR", "color": "#ffce2e" },
					{ "id": "GF", "color": "#ffce2e" },
					{ "id": "DO", "color": "#ffce2e" },
					{ "id": "JM", "color": "#ffce2e" },
					{ "id": "CR", "color": "#ffce2e" },
					{ "id": "NI", "color": "#ffce2e" },
					{ "id": "SV", "color": "#ffce2e" },
					{ "id": "PA", "color": "#ffce2e" },
					{ "id": "BZ", "color": "#ffce2e" },
					{ "id": "SJ", "color": "#ffce2e" },
					{ "id": "NO", "color": "#ffce2e" },
					{ "id": "SE", "color": "#ffce2e" },
					{ "id": "FI", "color": "#ffce2e" },
				 ]
			};
			map.dataProvider = dataProvider;
			map.areasSettings ={
				autoZoom: true,
				rollOverBrightness:10,
				selectedBrightness:20,
				selectedColor: "#5eb7ff"
			};
			map.write("vectorWorldMap");
		});
	</script>
</body>

<!-- Mirrored from codepassenger.com/html/axilboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:33:42 GMT -->
</html>
