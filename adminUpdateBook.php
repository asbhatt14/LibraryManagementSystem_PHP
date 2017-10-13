<?php
require "dbConnect.php";
require "books.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;

$databaseConnection->tempConnection();

$id = "";

if(!empty($_GET["bookID"])){
	$id = $_GET["bookID"];
}

$sql="SELECT * FROM Book WHERE bookID = '".$id."'";
$result = mysqli_query($databaseConnection->conn1,$sql);

$bookName = $author = $publisherName = $bookEdition = $ISBN_num = "";
$bookPrice =  "";
$valid = true;
$numOfCopies = 0 ;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['delete'])) {
		$book->deleteBookDetails($_POST["bookID"]);
		header('Location: adminIndex.php');
		exit();
	}else{
        if(isset($_POST["bookName"])){
            $bookName = $_POST["bookName"];
            $book->setBookTtile($bookName);
        }
        if(empty($_POST["bookName"])){
            //$errName="Please enter name";
            $valid = false;
        }
        
        if(isset($_POST["author"])){
            $author = $_POST["author"];	
            $book->setAuthorName($author);
        }
        if(empty($_POST["author"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["publisherName"])){
            $publisherName = $_POST["publisherName"];
            $book->setPublisherName($publisherName);
        }
        if(empty($_POST["publisherName"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["bookEdition"])){
            $bookEdition = $_POST["bookEdition"];
            $book->setEdition($bookEdition);
        }
        if(empty($_POST["bookEdition"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["ISBN_num"])){
            $ISBN_num = $_POST["ISBN_num"];
            $book->setISBN_num($ISBN_num);
        }
        if(empty($_POST["ISBN_num"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["bookPrice"])){
            $bookPrice = $_POST["bookPrice"];
            $book->setPrice($bookPrice);
        }
        if(empty($_POST["bookPrice"])){
            //$errName="Please enter name";
            $valid = false;
        }
    
        if(isset($_POST["numOfCopies"])){
            $numOfCopies = $_POST["numOfCopies"];
            $book->setNumCopies($numOfCopies);
        }
        if(empty($_POST["numOfCopies"])){
            //$errName="Please enter name";
            $valid = false;
        }
        if($valid){//bookID
            $book->updateBookDetails($_POST["bookID"]);
            header('Location: adminViewBooks.php');
            exit();
        }
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
			<a href="adminIndex.php">
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
					<form class="searchbox">
						<input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
						<input type="submit" class="searchbox-submit" value="">
						<span class="searchbox-icon ti-search"></span>
					</form>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="images/misc/lan1.png" alt="img">
						English
						<span class="ti-angle-down"></span>
						<div class="ripple-container"></div>
					</a>
					<ul class="dropdown-menu">
					  <li>
						<a href="javascript:void(0)">
							<img src="images/misc/lan4.png" alt="img">
							UK
						</a>
					  </li>
					   <li>
						<a href="javascript:void(0)">
							<img src="images/misc/lan2.png" alt="img">
							German
						</a>
					  </li>
					   <li>
						<a href="javascript:void(0)">
							<img src="images/misc/lan3.png" alt="img">
							Italy
						</a>
					  </li>
					</ul>
				</li>
	
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
			</ul>
		</div>
		<div class="clearfix"></div>
	</div><!-- apps-header -->
	<div class="slide-menu-wrap">
		<nav id="cbp-spmenu-s1" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">
			<div class="user-profile-block">
                    <a href="adminProfile.php">
				<div class="user-thumb">
					<img src="images/profile/user-thumb.jpg" alt="img" class="img-responsive">
				</div>
				<div class="user-info">
                        
                        <h5>
                            Ankur Bhatt
                        </h5>
                        <span>Librarian</span>
                        
                </div>
            </a>
			</div>
			<div class="accordion-menu responsive-menu" data-accordion-group>
				<div class="slide-navigation-wrap" data-accordion>
					<div class="nav-item has-sub" data-control>
						<a href="adminIndex.php">
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
							<a href="adminAddBook.php">
								<span class="menu-icon-wrap bullet"></span>
								<span class="menu-title">Add Books</span>
							</a>
						</div>
						<div class="nav-item">
							<a href="adminViewBooks.php">
								<span class="menu-icon-wrap bullet"></span>
								<span class="menu-title">View Books</span>
							</a>
						</div>
					</div>
                </div>
				<div class="slide-navigation-wrap" data-accordion>
						<div class="nav-item has-sub" data-control>
							<a href="adminBookTranscation.php">
								<span class="menu-icon-wrap icon ti-pencil-alt"></span>
								<span class="menu-title">Transcation History</span>
							</a>
						</div>
				</div> 
				<div class="slide-navigation-wrap" data-accordion>
						<div class="nav-item has-sub" data-control>
							<a href="logOut.php">
								<span class="menu-icon-wrap icon fa fa-sign-out"></span>
								<span class="menu-title">Log Out</span>
							</a>
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
						<h4>Add Book</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
						<li class="breadcrumb-item"><a href="#">Manage Books</a></li>
						<li class="breadcrumb-item active">Add Book</li>
					</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="box-widget">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									<h4>Book Details</h4>
								</div>
							</div>
							<div class="panel-body">
								<div class="validation-block">
									<div class="row">
										<div class="col-lg-8 offset-lg-2">
                                        <?php
                                        if(mysqli_num_rows($result) > 0) {
                                            while($row=mysqli_fetch_assoc($result)){
                                                	
                                        ?>
											<form class="form-common valided-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
												<div class="form-group row">
													<label for="required-text-input" class="col-lg-2 col-form-label">Book Title</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="bookName" placeholder="Book Name" id="required-text-input"  value="<?php echo $row['bookTitle']?>" required>
													</div>
                                                </div>
                                                <div class="form-group row">
													<label for="required-text-input" class="col-lg-2 col-form-label">Author Name</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="author" placeholder="Author Name" id="required-text-input" value="<?php echo $row['author']?>" required>
													</div>
                                                </div>
                                                <div class="form-group row">
													<label for="required-text-input" class="col-lg-2 col-form-label">Publisher Name</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="publisherName" placeholder="Publisher Name" id="required-text-input" value="<?php echo $row['publisher']?>" required>
													</div>
                                                </div>
                                                <div class="form-group row">
													<label for="text-input-max-character" class="col-lg-2 col-form-label">Edition</label>
													<div class="col-lg-10">
														<input class="form-control" maxlength="6" name="bookEdition" type="text" placeholder="Book Edition" id="text-input-max-character" value="<?php echo $row['edition']?>" required>
													</div>
                                                </div>
                                                <div class="form-group row">
													<label for="text-input-max-character" class="col-lg-2 col-form-label">ISBN No.</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="ISBN_num" placeholder="Book ISBN" id="text-input-max-character" value="<?php echo $row['ISBN_no']?>" required>
													</div>
												</div>
                                                <div class="form-group row">
													<label for="text-input-max-character" class="col-lg-2 col-form-label">Book Price</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="bookPrice" placeholder="Book Price" id="text-input-max-character" value="<?php echo $row['price']?>" required>
													</div>
                                                </div>
                                                <div class="form-group row">
													<label for="text-input-max-character" class="col-lg-2 col-form-label">Total Copies Available</label>
													<div class="col-lg-10">
														<input class="form-control" type="text" name="numOfCopies" placeholder="Number of Copies Available" id="text-input-max-character" value="<?php echo $row['NumOfCopies']?>" required>
													</div>
                                                </div>
                                                <input type="hidden" class="form-control1" name="bookID" id="bookID" value="<?php echo $row['bookID']?>">
												<div class="offset-2">
                                                    <input type="submit" class="btn btn-raised btn-primary waves-effect waves-light" value="Submit" name="submit">
                                                    <input type="submit" class="btn btn-raised btn-primary waves-effect waves-light" value="delete" name="delete">
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
