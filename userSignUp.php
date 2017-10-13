<?php
session_start();
require "dbConnect.php";
require "student.php";

if(isset($_SESSION['login_user'])){
    header("location: userIndex.php");
    exit();
}

$databaseConnection = new DatabaseConnection;
$student = new Students;

$databaseConnection->tempConnection();

$stdName = $gender = $dateOfBirth =$course = $email =  $linkedInURL =   "";
$address = $city = $province = $postalCode = $password = $reTypePassword = "";
$rdo1Chcked = $rdo2Chcked = "";
$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $sql = "SELECT * FROM LibraryUSer WHERE loginId = '$email'";
        $result = mysqli_query($databaseConnection->conn1, $sql);
    }

    if(mysqli_num_rows($result) >= 1){
        echo "<script>
        alert('This email is already being used Please Sign In to User your account');
        
        </script>";

        //exit("This email is already being used Please Sign In to User your account");
    }else{
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
        if(isset($_POST["email"])){
            $email = $_POST["email"];
            $student->setStdEmail($email);
        }
        if(empty($_POST["email"])){
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
    
        if(isset($_POST["password"])){
            $password = $_POST["password"];
            $student->setPassword($password);
        }
        if(empty($_POST["password"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        // if(isset($_POST["reTypePassword"])){
        //     $reTypePassword = $_POST["reTypePassword"];
        // ////	$student->setPostalCode($password);
        // }
        // if(empty($_POST["reTypePassword"])){
        //     //$errName="Please enter name";
        //     $valid = false;
        // }
        if($valid){
            $student->insertStudent();
            $student->insertLibraryUser();
            $_SESSION['login_user']= $email;
            header('Location: userIndex.php');
            exit();
        }
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codepassenger.com/html/axilboard/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:36:58 GMT -->
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
							<a href="#">
								
							</a>
						</div>
					</div>
				</div>
				<div class="widget-form-block">
					<div class="box-widget">
						<div class="panel-default">
							<div class="widget-block-title">
								<h3>Sign up now</h3>
								<p>Please enter your data to register.</p>
							</div>
							<div class="form-block">
								<form class="form-common" action="" method="post">
                                    <div class="form-group">
										<input type="text" class="form-control" name="stdName" id="formGroupExampleInput" placeholder="Name" required>
                                    </div>
                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Gender</label>
                                                        <div class="col-md-8">
                                                            <div class="form-check form-check-inline">
                                                                <label class="custom-control custom-radio">
                                                                    <input id="radioStacked11" name="gender" value="Male"type="radio" class="custom-control-input" <?php echo htmlspecialchars ($rdo1Chcked);?>>
                                                                    <span class="custom-control-indicator"></span>
                                                                    <span class="custom-control-description">Male</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="custom-control custom-radio">
                                                                    <input id="radioStacked22" name="gender" type="radio" value="Female" class="custom-control-input" <?php echo htmlspecialchars ($rdo2Chcked);?>>
                                                                    <span class="custom-control-indicator"></span>
                                                                    <span class="custom-control-description">Female</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <div class="form-group">
										<input type="date" class="form-control" name="dateOfBirth" id="formGroupExampleInput" placeholder="YYYY-MM-DD"max=<?php
												echo date('Y-m-d',strtotime('-10 years'));
											?> required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="course" id="formGroupExampleInput" placeholder="Course" required>
                                    </div>
									<div class="form-group">
										<input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="linkedInURL" id="formGroupExampleInput" placeholder="LinkedIn URL" required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="address" id="formGroupExampleInput" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="city" id="formGroupExampleInput" placeholder="City" required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="province" id="formGroupExampleInput" placeholder="Province" required>
                                    </div>
                                    <div class="form-group">
										<input type="text" class="form-control" name="postalCode" id="formGroupExampleInput" placeholder="Postal Code" required>
                                    </div>
                                    <div class="form-group">
										<input type="password" class="form-control" name="password" id="formGroupExampleInput" placeholder="Password" required>
									</div>
									<div class="form-group row form-check-row">
										<div class="col-lg-12">
											<div class="form-check">
												<label class="custom-control custom-checkbox condition-text">
													<input type="checkbox" class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description">I accept <a href="#">Terms and Conditions</a></span>
												</label>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<input type="submit" style="width:100%;background-color: #4285F4;    border: none;
    color: white;padding: 1%;" name="Sign Up" value="Sign Up">
									</div>
								</form>
								<div class="signin-others-option-block">
									
									<p>Already have an account? <a href="userSignIn.php">Sign In Here</a></p>
								</div>
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
	<script src="assets/js/classie.js"></script>
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

<!-- Mirrored from codepassenger.com/html/axilboard/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2017 23:36:58 GMT -->
</html>
