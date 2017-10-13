<?php
require "dbConnect.php";
require "student.php";
include "session.php";

$numOfBooksRent1 = "";

$databaseConnection = new DatabaseConnection;
$student = new Students;

$databaseConnection->tempConnection();

$displayName = "";
$sql = "Select * FROM Student where email='$login_session'";
$result = mysqli_query($databaseConnection->conn1, $sql);

$stdName = $gender = $dateOfBirth =$course = $email =  $linkedInURL =   "";
$address = $city = $province = $postalCode = $password = $reTypePassword = "";
$rdo1Chcked = $rdo2Chcked = "";
$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(isset($_POST["stdName"])){
            $stdName = $_POST["stdName"];
            $student->setStdName($stdName);
        }
        if(empty($_POST["stdName"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["gender"])){
            $gender = $_POST["gender"];
            $student->setStdGender($gender);
            if($_POST["gender"]=="Male"){
                $rdo1Chcked = "Checked";
            }elseif($_POST["gender"]=="Female"){
                $rdo2Chcked = "Checked";
            }
        }else{
            //$errGender = "Please select any option";
            $valid = false;
        }
    
        if(isset($_POST["dateOfBirth"])){
            $dateOfBirth = $_POST["dateOfBirth"];
            $student->setDateOfBirth($dateOfBirth);
        }
        if(empty($_POST["dateOfBirth"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["course"])){
            $course = $_POST["course"];
            $student->setStdCourse($course);
        }
        if(empty($_POST["course"])){
            //$errName="Please enter name";
            $valid = false;
        }
        
        if(isset($_POST["linkedInURL"])){
            $linkedInURL = $_POST["linkedInURL"];
            $student->setWebURL($linkedInURL);
        }
        if(empty($_POST["linkedInURL"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["address"])){
            $address = $_POST["address"];
            $student->setAddress($address);
        }
        if(empty($_POST["address"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["city"])){
            $city = $_POST["city"];
            $student->setCity($city);
        }
        if(empty($_POST["city"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["province"])){
            $province = $_POST["province"];
            $student->setProvince($province);
        }
        if(empty($_POST["province"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if(isset($_POST["postalCode"])){
            $postalCode = $_POST["postalCode"];
            $student->setPostalCode($postalCode);
        }
        if(empty($_POST["postalCode"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if($valid){
            $student->updateStudentDetails($_POST["stdid"]);
            header('Location: userIndex.php');
            exit();
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
                    <?php
                    echo $displayName;
                                    // if(mysqli_num_rows($result) > 0) {
                                    //     while($row=mysqli_fetch_assoc($result)){
                                    //         echo $row['name'];
                                    //     }
                                    // }
					?>
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
	<div class="apps-container-wrap page-container">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="page-title-block">
                            <h4>Update Profile</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-widget">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Profile Details <?php echo $login_session;?></h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="validation-block">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
											<?php
												if(mysqli_num_rows($result) > 0) {
													while($row=mysqli_fetch_assoc($result)){
														if($row['gender']=="Male"){
															$rdo1Chcked = "Checked";
														}elseif($row['gender']=="Female"){
															$rdo2Chcked = "Checked";
                                                        }	
                                                        $displayName = $row['name'];
											?>
                                                <form id="myForm" class="form-common valided-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                                    <div class="form-group row">
                                                        <label for="required-text-input" class="col-lg-2 col-form-label">Name</label>
                                                        <div class="col-lg-10">
														<input type="hidden" class="form-control1" name="stdid" id="stdid" value="<?php echo $row['stdid']?>">
                                                            <input class="form-control" name="stdName" type="text" placeholder="Name" id="required-text-input" value="<?php echo $row['name'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label">Gender</label>
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="custom-control custom-radio">
                                                                        <input id="radioStacked11" value="Male" name="gender" type="radio" class="custom-control-input" <?php echo htmlspecialchars ($rdo1Chcked);?>>
                                                                        <span class="custom-control-indicator"></span>
                                                                        <span class="custom-control-description">Male</span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="custom-control custom-radio">
                                                                        <input id="radioStacked22" value="Female" name="gender" type="radio" class="custom-control-input" <?php echo htmlspecialchars ($rdo2Chcked);?>>
                                                                        <span class="custom-control-indicator"></span>
                                                                        <span class="custom-control-description">Female</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="form-group row">
                                                            <label for="text-input-max-character" class="col-lg-2 col-form-label">Email Address</label>
                                                            <div class="col-lg-10">
                                                                <input class="form-control" name="email" type="text" placeholder="Email Address" id="text-input-max-character" value="<?php echo $row['email'];?>" disabled required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="text-input-max-character" class="col-lg-2 col-form-label">LinkedIn Profile</label>
                                                            <div class="col-lg-10">
                                                                <input class="form-control" name="linkedInURL" type="text" placeholder="LinkedIn Profile" id="text-input-max-character" value="<?php echo $row['url'];?>" required>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="text-input-max-character" class="col-lg-2 col-form-label">Birth Date</label>
                                                            <div class="col-lg-10">
                                                                <input class="form-control" name="dateOfBirth" type="date" placeholder="Birth Date" id="text-input-max-character" value="<?php echo $row['dob'];?>" max=<?php
												echo date('Y-m-d',strtotime('-10 years'));
											?> required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="text-input-max-character" class="col-lg-2 col-form-label">Enrolled Course</label>
                                                                <div class="col-lg-10">
                                                                    <input class="form-control" type="text" name="course" placeholder="Enrolled Course" id="text-input-max-character" value="<?php echo $row['course'];?>" required>
                                                                </div>
                                                        </div>    
                                                    <div class="form-group row">
                                                        <label for="required-text-input" class="col-lg-2 col-form-label">Address</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" type="text" placeholder="Address" name="address" id="required-text-input" value="<?php echo $row['address'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="required-text-input" class="col-lg-2 col-form-label">City</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" name="city" type="text" placeholder="City" id="required-text-input" value="<?php echo $row['city'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="text-input-max-character" class="col-lg-2 col-form-label">Province</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" maxlength="6" name="province" type="text" placeholder="Province" id="text-input-max-character" value="<?php echo $row['province'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="text-input-max-character" class="col-lg-2 col-form-label">Postal Code</label>
                                                        <div class="col-lg-10">
                                                            <input class="form-control" type="text" name="postalCode" placeholder="Postal code" id="text-input-max-character" value="<?php echo $row['zipcode'];?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="offset-2">
														<input type="submit" class="btn btn-raised btn-primary waves-effect waves-light" value="Submit" name="submit">
														<input type="submit" class="btn btn-raised btn-primary waves-effect waves-light" value="Cancel" name="Cancel">
													</div>
													<?php				 
													}
												}
												?> 
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- validation-block -->
                                </div><!--panel Body -->
                            </div><!--panel -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="footer">
                            <p>© 2017 LibrarySystem by <a href="#">AB Inc</a></p>
                        </div>
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
