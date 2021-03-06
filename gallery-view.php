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
$group = Input::get('group');
if (empty($uni_code) or empty($group)) {
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


$garray = array();
$gdata = $user->get_main_cata('group_name', 'gallary_img');

foreach ($gdata as $key => $value) {
	$garray[] = $gdata[$key]['group_name'];
}

if(in_array($group, $garray, true)){
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
			* {
				box-sizing: border-box;
			}

			body {
				margin: 0;
				font-family: Arial;
			}

			/* The grid: Four equal columns that floats next to each other */
			.column {
				float: left;
				width: 25%;
				padding: 10px;
				display: inline;
			}

			/* Style the images inside the grid */
			.column img {
				opacity: 0.8; 
				cursor: pointer; 
			}

			.column img:hover {
				opacity: 1;
			}

			/* Clear floats after the columns */
			.row:after {
				content: "";
				display: table;
				clear: both;
			}

			/* The expanding image container */
			.container {
				position: relative;
				display: none;
			}

			/* Expanding image text */
			#imgtext {
				position: absolute;
				bottom: 15px;
				left: 15px;
				color: white;
				font-size: 20px;
			}

			/* Closable button inside the expanded image */
			.closebtn {
				position: absolute;
				top: 10px;
				right: 15px;
				color: white;
				font-size: 35px;
				cursor: pointer;
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
									<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-camera" aria-hidden="true"></i><span>Photographs</span></a>
									<ul class="collapse">
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=hull">Hull</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=mainDeck">Main Deck</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=BallastTanks">Ballast Tanks</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Superstructure">Superstructure</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Bridge">Bridge</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MachinerySpaces">Machinery Spaces</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=FirefightingEquipment">Firefighting Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=LifesavingAppliances">Lifesaving Appliances</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MooringEquipment">Mooring Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=PollutionEquipment">Pollution Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Accommodation">Accommodation</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=CargoSystems">Cargo Systems</a></li>
									</ul>
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
                      
                                          
                      foreach ($shipdata as $key => $value) {
                      	$shipname = $shipdata[$key]['shipname'];
                      	$imo = $shipdata[$key]['shipimo'];
                      	                   	
                      }
					?>

									<div class="col-md-4">
										<p><b>VESSEL :</b> <?php echo $shipname;  ?></p>
									</div>
									<div class="col-md-2">
										<p><b>REF :</b> <?php echo $imo;?></p>
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
									<div class="col-md-3">
										<p><b>ISSUED ON :</b> <?php echo $refnum;?></p>
									</div>
									<div class="col-md-3">
										<p><b>IMO ON :</b> <?php echo $isnum;?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo escape($user->data()->name) ;?> <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
							<div class="col-lg-12 col-md-12 mt-5">
								<div style="text-align:center">
									<h2>

								 <?php  
								 if($group == 'hull'){
                                   echo 'Hull';
								 }elseif($group == 'mainDeck'){
                                    echo 'Main deck';
								 }elseif($group == 'BallastTanks'){
                                    echo 'Ballast Tanks';
								 }elseif($group == 'Superstructure'){
 									echo 'Superstructure';
								 }elseif($group == 'Bridge'){
 									echo 'Bridge';
								 }elseif($group == 'MachinerySpaces'){
 									echo 'Machinery Spaces';
								 }elseif($group == 'FirefightingEquipment'){
 									echo 'Firefighting Equipment';
								 }elseif($group == 'LifesavingAppliances'){
 									echo 'Lifesaving Appliances';
								 }elseif($group == 'MooringEquipment'){
 									echo 'Mooring Equipment';
								 }elseif($group == 'PollutionEquipment'){
 									echo 'Pollution Equipment';
								 }elseif($group == 'Accommodation'){
 									echo 'Accommodation';
								 }elseif($group == 'CargoSystems'){
 									echo 'Cargo Systems';
								 }


                                   ?>
									 Image Gallery</h2>
									<p>Click on the images below:</p>
								</div>
								<!-- The four columns -->
								<div class="row">
									<?php
                                   $img = $user->getGroupImage($uni_code, $group);
                                    foreach ($img as $key => $value):
                                    	
                                    

									?>
						<div class="column">
						<img src="uploads/<?php echo $uni_code;?>/<?php echo $img[$key]['image']?>" alt="Ship" style="width:100%" onclick="myFunction(this);">
						</div>
								 <?php endforeach; ?>
								</div>
                               
								<div class="container">
									<span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
									<img id="expandedImg" style="width:100%">
									<div id="imgtext"></div>
								</div>
							</div>

							<!------end------------------->
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
		<script>
			function myFunction(imgs) {
				var expandImg = document.getElementById("expandedImg");
				var imgText = document.getElementById("imgtext");
				expandImg.src = imgs.src;
				imgText.innerHTML = imgs.alt;
				expandImg.parentElement.style.display = "block";
			}
		</script>

	</body>

</html>

<?php
 }
}else{
 Redirect::to('index.php');
}

?>