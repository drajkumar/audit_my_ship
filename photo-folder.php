<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
		Redirect::to('unapprove.php');
	}else{

		$uni_code = Input::get('uni_code');
		if (empty($uni_code)) {
			Redirect::to('Error.php');
		}

		$main_cata_arr = array();
		$code = $user->get_main_cata('ship_unicode', 'shipall');

		foreach ($code as $key => $value) {
			$main_cata_arr[] = $code[$key]['ship_unicode'];
		}

		if(in_array($uni_code, $main_cata_arr, true)){
			echo '';
		}else{
			Redirect::to('Error.php');
		}



?>


<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>ADUIT MY SHIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/themify-icons.css">
		<link rel="stylesheet" href="assets/css/metisMenu.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/slicknav.min.css">
		<!-- amchart css -->
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<!-- others css -->
		<link rel="stylesheet" href="assets/css/typography.css">
		<link rel="stylesheet" href="assets/css/default-css.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/ccss.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		<!-- modernizr css -->
		<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">

			$(document).ready(function(){

				function loadnoti(){
					$("#counter").load("count_inquiry.php", function(responseTxt, statusTxt, xhr){
						if(statusTxt == "success")

							return statusTxt
					});
				}


				$("#tibell").click(function(){

					var nid = 'yes';


					$.ajax({
						type: "POST",
						url: "update_inquiry.php",
						data: {'nid': nid},
						success:  function(data){


						}
					});

					$("#popnoti").load("get_inquiry.php", function(responseTxt, statusTxt, xhr){
						if(statusTxt == "success")

							return statusTxt
					});
				});

				setInterval(function(){

					loadnoti();

				}, 500);



			});

		</script>
		<!-----circlestyle---->
		<link rel="stylesheet" href="assets/css/circlestyle.css">
		<style>
			table, td, th {  
				border: 1px solid black;
				text-align: left;
				word-break: break-all;
				word-wrap: break-word;

			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				padding: 15px;
			}



			/* Style the Image Used to Trigger the Modal */
			#myImg {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				padding-top: 100px; /* Location of the box */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			}

			/* Modal Content (Image) */
			.modal-content {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
			}

			/* Caption of Modal Image (Image Text) - Same Width as the Image */
			#caption {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
				text-align: center;
				color: #ccc;
				padding: 10px 0;
				height: 150px;
			}

			/* Add Animation - Zoom in the Modal */
			.modal-content, #caption { 
				animation-name: zoom;
				animation-duration: 0.6s;
			}

			@keyframes zoom {
				from {transform:scale(0)} 
				to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
				position: absolute;
				top: 15px;
				right: 35px;
				color: #f1f1f1;
				font-size: 40px;
				font-weight: bold;
				transition: 0.3s;
			}

			.close:hover,
			.close:focus {
				color: #bbb;
				text-decoration: none;
				cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
				.modal-content {
					width: 100%;
				}
			}


		</style>




	</head>

	<body>
		<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
		<!-- preloader area start -->
		<div id="preloader">
			<div class="loader"></div>
		</div>
		<!-- preloader area end -->
		<!-- page container area start -->
		<div class="page-container">
			<!-- sidebar menu area start -->
			<div class="sidebar-menu">
				<div class="sidebar-header">
					<div class="logo">
						<a href="user-dashboard.php"><img src="assets/img/LO1.png" alt="logo"></a>
					</div>
				</div>
				<div class="main-menu">
					<div class="menu-inner">
						<nav>
							<ul class="metismenu" id="menu">
								<li>
									<a href="user-dashboard.php"  class="active" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
								</li>
								<li  class="active">
									<a href="user-summary.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Summary
										</span></a>

								</li>
								<li>
									<a href="manager-owner.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Manager / Owner </span></a>

								</li>

								<li>
									<a href="vessel-particular.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Vessel Particulars</span></a>

								</li>
							
								<li >
									<a href="photo-folder.php?uni_code=<?php echo $uni_code;?>" aria-expanded="true"><i class="fa fa-camera" aria-hidden="true"></i><span>Photographs</span></a>
									
								</li>
								<li>
									<a href="defects.php?uni_code=<?php echo $uni_code;?>" aria-expanded="true"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><span>Defects</span></a>
								</li>
								<li>
									<a href="documents.php?uni_code=<?php echo $uni_code; ?>" aria-expanded="true"><i class="fa fa-book" aria-hidden="true"></i>
										<span>Documents</span></a>
								</li>

							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- sidebar menu area end -->
			<!-- main content area start -->
			<div class="main-content">
				<!-- header area start -->
				<div class="header-area">
					<div class="row align-items-center">
						<!-- nav and search button -->
						<div class="col-md-6 col-sm-8 clearfix">
							<div class="nav-btn pull-left">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="search-box pull-left">
								<form action="search.php" method="post">
									<input type="text" name="search" placeholder="Search Your Ship..." required>
									<input type="hidden" name="token" value="<?php echo Token::generete();?>">

									<i class="ti-search"></i>
								</form>
							</div>
						</div>
						<!-- profile info & task notification -->
						<div class="col-md-6 col-sm-4 clearfix">
							<ul class="notification-area pull-right">
								<li id="full-view"><i class="ti-fullscreen"></i></li>
								<li id="full-view-exit"><i class="ti-zoom-out"></i></li>
								<li class="dropdown">
									<i id="tibell" class="ti-bell dropdown-toggle" data-toggle="dropdown">
										<span id="counter"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have 3 new notifications <a href="message.php">view all</a></span>
										<div id="popnoti" class="nofity-list">






										</div>
									</div>
								</li>

								<li>
									<button class="btn btn-success" onclick="window.location.href='user-inquery.php'"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; &nbsp;NEW QUOTATION</button>
								</li>


							</ul>
						</div>
					</div>
				</div>
				<!-- header area end -->
				<!-- page title area start -->
				<div class="page-title-area">
					<div class="row align-items-center">
						<div class="col-sm-8">
							<div class="breadcrumbs-area clearfix">

								<div class="row">
									<?php
		$shipdata = $user->getData_one_cul('shipall', 'ship_unicode', $uni_code);
		$shipname = '';
		$imo = '';
		$pic = '';



		foreach ($shipdata as $key => $value) {
			$shipname = $shipdata[$key]['shipname'];
			$imo = $shipdata[$key]['shipimo'];
			$pic = $shipdata[$key]['picture'];
		}


									?>

									<div class="col-md-4">
										<p><b>VESSEL :</b> <?php echo $shipname;  ?></p>
									</div>
									<div class="col-md-3">
										<p><b>IMO ON :</b> <?php echo $imo;?></p>
									</div>

									<?php
		$summary = $user->getData_one_cul('summary', 'uni_code', $uni_code);
		$refnum = '';
		$isnum = '';



		foreach ($summary as $key => $value) {
			$refnum = $summary[$key]['reference_no'];
			$isnum = $summary[$key]['Issued_date'];

		}


									?>
									<div class="col-md-2">
										<p><b>REF :</b> <?php echo $refnum;?></p>
									</div>
									<div class="col-md-3">
										<p><b>ISSUED ON :</b> <?php echo $isnum;?></p>
									</div>

								</div>
							</div>
						</div>
						<div class="col-sm-4 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo escape($user->data()->name) ;?>  <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-content-inner" style="background-color:white">
					<div class="col-md-12 p-2 mt-3" style="background-color:#2A2532;color:#0AE6A4">
						<h3 class="text-center">VESSEL PHOTO GALLERY</h3>
					</div>

					<div class="card-area" >
						<div class="row mt-3" >
							<div class="col-lg-12 col-md-12" style="color:#4B4F4A">
								<div class="row">
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Hull</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="hull-photo-download.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="hull">
													<input type="submit" class="btn btn-success" name="hulldownload" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=hull" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Main Deck</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="maindeck-photo-download.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="mainDeck">
													<input type="submit" class="btn btn-success" name="mainDeckdownload" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=mainDeck" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Ballast Tanks</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">												
												<form action="ballast-tanks-pd.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="BallastTanks">
													<input type="submit" class="btn btn-success" name="BallastTanksdownload" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=BallastTanks" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Superstructure</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="superstructure-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="Superstructure">
													<input type="submit" class="btn btn-success" name="Superstructured" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Superstructure" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Bridge</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="bridge-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="Bridge">
													<input type="submit" class="btn btn-success" name="Bridged" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Bridge" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Machinery Spaces</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="machineryspaces-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="MachinerySpaces">
													<input type="submit" class="btn btn-success" name="MachinerySpacesd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MachinerySpaces" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
								</div>
								<div class="row mt-5 " >

									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Firefighting Equipment</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="firefightingequipment-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="FirefightingEquipment">
													<input type="submit" class="btn btn-success" name="FirefightingEquipmentd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=FirefightingEquipment" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Lifesaving Appliances</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="lifesavingappliances-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="LifesavingAppliances">
													<input type="submit" class="btn btn-success" name="LifesavingAppliancesd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=LifesavingAppliances" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Mooring Equipment</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="mooringequipment-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="MooringEquipment">
													<input type="submit" class="btn btn-success" name="MooringEquipmentd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MooringEquipment" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Pollution Equipment</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="pollutionequipment-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="PollutionEquipment">
													<input type="submit" class="btn btn-success" name="PollutionEquipmentd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=PollutionEquipment" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>

									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Accommodation</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="accommodation-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="Accommodation">
													<input type="submit" class="btn btn-success" name="Accommodationd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Accommodation" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
									<div class="col-lg-2 col-md-2">
										<h5 class="text-center"><b>Cargo Systems</b></h5>
										<img src="assets/img/fr.png">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<form action="cargosystems-p-d.php" method="post">
													<input type="hidden" name="uni_code" value="<?php echo $uni_code?>">
													<input type="hidden" name="group" value="CargoSystems">
													<input type="submit" class="btn btn-success" name="CargoSystemsd" value="Download">
												</form>
											</div>
											<div class="col-lg-6 col-md-12"><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=CargoSystems" class="btn btn-dark text-white">Preview</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



				</div>
			</div>


			<!-- main content area end -->
			<!-- footer area start-->
			<footer>
				<div class="footer-area">
					<p>© Copyright 2018. All right reserved. Developed by <a href="https://developerarena.com">Developer Arena</a>.</p>
				</div>
			</footer>
			<!-- footer area end-->
		</div>
		<!-- jquery latest version -->
		<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- others plugins -->
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/scripts.js"></script>

		<!-------circle-------->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js'></script>
		<script  src="assets/js/circleindex.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				$('.template-article img').each(function() {
					var currentImage = $(this);
					currentImage.wrap("<a class='image-link' href='" + currentImage.attr("src") + "'</a>");
				});
				$('.image-link').magnificPopup({type:'image'});  
			});		</script>
	</body>

</html>
<?php
	}
}else{
	Redirect::to('index.php');
}

?>