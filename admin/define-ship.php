<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$user_id = Input::get('user_id');

  ?>

<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>ADUIT MY SHIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
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
		<style>
			.button {
    display: block;
    width: 115px;
    height: 25px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}</style>
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
					<div class="col-lg-12 mt-5">
						<div class="card">
							<div class="card-body">
								<?php
									 if(Session::exists('message_delete')){
									            echo '<div class="alert alert-success alert-block">
									             <a class="close" data-dismiss="alert" href="#">×</a>
									             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
									             '<p style="font-size:15px; color:green; margin-left:60px">'.
									               Session::flash('message_delete') .'</p>           
									              </div>';
									  }
							    ?>
								<h4 class="header-title">Total Messages <?php
                                  $user = $admin->get_all('shipall', 'id');
                                  echo count($user);
								?></h4>
								<div class="single-table">
									<div class="table-responsive">
										<table class="table text-center">
											<thead class="text-uppercase bg-dark">
												<tr class="text-white">
													<th scope="col">Check</th>
													<th scope="col">Ship Name</th>
													<th scope="col">Ship Imo</th>
													<th scope="col">Picture</th>
													                                                    
												</tr>
											</thead>

											<tbody>
												<form action="add-define-ship.php" method="post">
												
												 <?php
									                   $x = 0;
									                  $content = $admin->get_all('shipall', 'id');
									                   foreach ($content as $key => $value):
									                   	$x++;
									               ?>
												<tr>
													<th><input type="checkbox" name="ship_id[]" value="<?php  echo $content[$key]['id'] ;?>"></th>
													<td><?php  echo $content[$key]['shipname'] ;?></td>
													<td><?php  echo $content[$key]['shipimo'] ;?></td>
													<td><img src="../uploads/<?php echo $content[$key]['picture']?>" width="100" height="100" alt="image"></td>
													
												</tr>

											
												 <?php endforeach;?>
												 <td>
												 	<input type="hidden" name="user_id" value="<?php  echo $user_id ;?>">
											 <input class="btn btn-success btn-xs" type="submit" name="define" value="Define Ship">
											
											</td>
											</form>
											</tbody>
												
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- main content area end -->
			<!-- footer area start-->
			<?php require_once('footer.php') ?>
			<!-- footer area end-->

<?php
}else{
 Redirect::to('admin-login.php');
}

?>