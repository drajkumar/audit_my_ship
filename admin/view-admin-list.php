<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

  ?>
<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>ADUIT MY SHIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="../assets/img/icon/favicon.ico">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/themify-icons.css">
		<link rel="stylesheet" href="../assets/css/metisMenu.css">
		<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="../assets/css/slicknav.min.css">
		<!-- amchart css -->
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<!-- others css -->
		<link rel="stylesheet" href="../assets/css/typography.css">
		<link rel="stylesheet" href="../assets/css/default-css.css">
		<link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">

		
		<!-- modernizr css -->
		<script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
			<?php require_once('sidebar.php'); ?>
			<!-- sidebar menu area end -->
			<!-- main content area start -->
			<div class="main-content">
				<!-- header area start -->
				<?php require_once('header.php'); ?>
				<!-- header area end -->
				<!-- page title area start -->
				
				<!-- page title area end -->
				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
                      
                       <?php   
                            $data = $admin->get_data('admin');
                            foreach ($data as $key => $value):
    

                       ?>

							<div class="col-lg-3 col-md-6 mt-5">
								<div class="card card-bordered" style="position: relative;">
									<img class="card-img-top img-fluid" src="../assets/img/author/avatar.png" alt="image">
									<p style="position: absolute;">100%</p>
									<div class="card-body">
										<p class="title">Username: <?php echo $data[$key]['username']?></p>
										<p class="title">Email: <?php echo $data[$key]['email']?></p>
										
										<a href="#" class="btn btn-danger btn-sm">Delete</a>
										
									</div>
								</div>
							</div>
							
						<?php   endforeach;  ?>	
						

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
		<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="../assets/js/popper.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/owl.carousel.min.js"></script>
		<script src="../assets/js/metisMenu.min.js"></script>
		<script src="../assets/js/jquery.slimscroll.min.js"></script>
		<script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- others plugins -->
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/scripts.js"></script>
	</body>

</html>
<?php
}else{
 Redirect::to('admin-login.php');
}

?>
