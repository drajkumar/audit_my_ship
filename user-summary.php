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
										<span class="notify-title">You have new notifications <a href="message.php">view all</a></span>
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
					<?php
		$summary = $user->getData_one_cul('summary', 'uni_code', $uni_code);
		$refnum = '';
		$isnum = '';
		$summarydata = '';


		foreach ($summary as $key => $value) {
			$refnum = $summary[$key]['reference_no'];
			$isnum = $summary[$key]['Issued_date'];
			$summarydata = $summary[$key]['summary'];
		}


					?>
					<div class="row align-items-center">
						<div class="col-sm-8">
							<div class="breadcrumbs-area clearfix">

								<div class="row">


									<div class="col-md-4">
										<p><b>REF :</b> <?php echo $refnum  ?></p>
									</div>
									<div class="col-md-4">
										<p><b>ISSUED ON :</b><?php echo $isnum; ?></p>
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
							<div class="col-lg-7 col-md-7 mt-5">
								<div class="card card-bordered">
									<div class="card-body">
										<h2 class="text-center">SUMMARY</h2><hr>
										<p><?php echo $summarydata;  ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-5 mt-5">

								<div class="row">
									<?php
		$shipdata = $user->getData_one_cul('shipall', 'ship_unicode', $uni_code);



		foreach ($shipdata as $key => $value):



									?>
									<div style="width:800px; margin:0 auto;" class="card card-bordered">
										<div class="container">
											<h4 style="color:gray " class="mt-2">Ship Name : <?php echo $shipdata[$key]['shipname'];  ?></h4>
											<h5 style="color:gray" class="mt-2">Imo Number : <?php echo $shipdata[$key]['shipimo'];  ?></h5>
											<img src="uploads/<?php echo $shipdata[$key]['picture'];  ?>" class="mt-2"><br><br>

										</div>
									</div>
									<?php  endforeach;  ?>
								</div>
								<div class="card card-bordered" style="color:white">

									<div class="container">
										<div class="row mt-3 mb-3">

											<div class="col-md-6" style="border-right:1px solid #474747">
												<?php
		$ship_score_data = $user->getData_one_cul('ship_score', 'uni_code', $uni_code);
		$condition_score = '';
		$management_score = '';
		$overall_score = '';


		foreach ($ship_score_data as $key => $value) {
			$condition_score = $ship_score_data[$key]['condition_score'];
			$management_score = $ship_score_data[$key]['management_score'];
			$overall_score = $ship_score_data[$key]['overall_score'];
		}


												?>

												<div class="box" >
													<div class="progress" id="progress">
														<div class="inner">
															<p>Overall Score</p>
															<h1><?php echo $overall_score;?></h1>
															<p id="demo"></p>
														</div>
													</div>
												</div>

											</div>





											<div class="col-md-3" style="border-right:1px solid #474747">
												<p style="font-size:14px;text-align:center"><b>Condition Score</b></p>
												<div class="text-center mt-5">
													<h4 style="padding:10px;border-radius:100%; display:inline" id="cs">
														<?php echo $condition_score;?>
													</h4>
												</div>
											</div>
											<div class="col-md-3">
												<p style="font-size:14px; text-align:center"><b>Management Score</b></p>
												<div class="text-center mt-5">
													<h4 id="ms" style="padding:10px;border-radius:100%; display:inline"><?php echo $management_score;?></h4>
												</div>
											</div></div>			

									</div>

								</div><br/><br/>

								<div class="card card-bordered">
									<div class="container">
										<div class="row mt-3 mb-3">

											<div class="col-md-12">
												<h4 style="background-color: #12470A; color: #fff; padding: 3px;">VERY GOOD</h4>
												<p class="mb-3">Unimpaired condition with almost no signs of wear or devaition from original strength or perating efficiency.</p>
												<h4 style="background-color: #4A8641; color: #fff; padding: 3px;">GOOD</h4>
												<p class="mb-3">A small degree of wear and tear and other minor defects noted that do not require immediate correction or repair.</p>
												<h4 style="background-color: #DFB620; color: #fff; padding: 3px;">FAIR</h4>
												<p class="mb-3">Obvious wear and tear evident, or deficiencies noted that are in need of some level of correction or repair.</p>
												<h4 style="background-color: #DF5320; color: #fff; padding: 3px;">POOR</h4>
												<p class="mb-3">Significant wear and tear or defects present that require remedial action.</p>
												<h4 style="background-color: #FF0400; color: #fff; padding: 3px;">UNSATISFACTORY</h4>
												<p>Condition of inadequate strength or operational efficiency. Immediate significant repair or renewal required to restore serviceability.</p>
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
				<script type="text/javascript">
					var conditionalscore='<?php echo $condition_score;?>';
					var managementscore='<?php echo $management_score;?>';
					var overallscore = '<?php echo $overall_score;?>';

					if(conditionalscore <= 19) document.getElementById('cs').style.backgroundColor = '#FF0400';
					else if(conditionalscore <= 22) document.getElementById('cs').style.backgroundColor = '#DF5320';
					else if(conditionalscore <= 59) document.getElementById('cs').style.backgroundColor = '#DFB620';
					else if(conditionalscore <= 80) document.getElementById('cs').style.backgroundColor = '#4A8641';
					else document.getElementById('cs').style.backgroundColor = '#12470A';
					
					if(conditionalscore <= 19) document.getElementById('ms').style.backgroundColor = '#FF0400';
					else if(conditionalscore <= 22) document.getElementById('ms').style.backgroundColor = '#DF5320';
					else if(conditionalscore <= 59) document.getElementById('ms').style.backgroundColor = '#DFB620';
					else if(conditionalscore <= 80) document.getElementById('ms').style.backgroundColor = '#4A8641';
					else document.getElementById('ms').style.backgroundColor = '#12470A';
					
					if(overallscore <= 19) document.getElementById('demo').innerHTML = 'UNSATISFACTORY';
					else if(overallscore <= 22) document.getElementById('demo').innerHTML = 'POOR';
					else if(overallscore <= 59) document.getElementById('demo').innerHTML = 'FAIR';
					else if(overallscore <= 80) document.getElementById('demo').innerHTML = 'GOOD';
					else document.getElementById('demo').innerHTML = 'VERY GOOD';
					
					window.onload = function onLoad() {
						var score = overallscore/100;
						var c;
						if(score <= 0.19) c = '#FF0400';
						else if(score <= 0.22) c = '#DF5320';
						else if(score <= 0.59) c = '#DFB620';
						else if(score <= 0.8) c = '#4A8641';
						else c = '#12470A';
						var progressBar = 
							new ProgressBar.Circle('#progress', {
								color: c,
								strokeWidth: 15,
								duration: 4000, // milliseconds
								easing: 'easeInOut'
							});

						progressBar.animate(score); // percent
					};
				</script>
				</body>

			</html>

		<?php
	}
}else{
	Redirect::to('index.php');
}

		?>