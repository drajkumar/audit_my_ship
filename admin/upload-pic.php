<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

	$uni_code = Input::get('uni_code');


	$error = array();

	if(isset($_POST['save'])){
		$group = $_POST['group'];
		$date = date('Y-m-d');
		if(!is_dir('../uploads/'.$uni_code.'/'.$group)){
			mkdir("../uploads/".$uni_code.'/'.$group, 0700, true);
		}
		$destination = '../uploads/'.$uni_code.'/'.$group.'/';	



		$upload = new Upload($destination);
		$upload->upload();
		$picname = $upload->getname();
		foreach ($picname as $key => $value) {

			$group_img = array(
				'uni_code'=> $uni_code,
				'group_name' => $group,
				'image' => $value,
				'created_at' => $date,
				'updated_at' => ''
			);


			$admin->create_all('gallary_img', $group_img);
		}

		Session::flash('group_img', ' Group images Successfully Upload');
		Redirect::to('upload-pic.php?uni_code='.$uni_code);


	}



?>

<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>AUDIT MY SHIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="../assets/img/fa.png">
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
		<link rel="stylesheet" href="../assets/css/ccss.css">
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

				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">

									<div class="card-body">
										<?php
	if(Session::exists('group_img')){
		echo '<div class="alert alert-success alert-block">
					             <a class="close" data-dismiss="alert" href="#">×</a>
					             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('group_img') .'</p>           
					              </div>';
	}
										?>

										<form action="" method="post" enctype="multipart/form-data">

											<label for="file"><b>Select Ship Image group</b></label>&nbsp;&nbsp;&nbsp;
											<select id="category" name="group" required="true" class="browser-default custom-select">
												<option value="">Select</option>
												<option value="hull">Hull</option>
												<option value="mainDeck">Main Deck</option>
												<option value="BallastTanks">Ballast Tanks</option>
												<option value="Superstructure">Superstructure</option>
												<option value="Bridge">Bridge</option>
												<option value="MachinerySpaces">Machinery Spaces</option>
												<option value="FirefightingEquipment">Firefighting Equipment</option>
												<option value="LifesavingAppliances">Lifesaving Appliances</option>
												<option value="MooringEquipment">Mooring Equipment</option>
												<option value="PollutionEquipment">Pollution Equipment</option>
												<option value="Accommodation">Accommodation</option>
												<option value="CargoSystems">Cargo Systems</option>
											</select><br><br>

											<label for="file"><b>Select Ship Image</b></label>&nbsp;
											<input type="file" placeholder="Ship Image" name="pic[]" multiple required="true" ><br><br>

											<input type="submit" class="registerbtn" name="save" value="Save">
										</form>

									</div>


								</div>


								<div class="card-body">


									<h2 class="text-center">View Gallery Image Group</h2><br>

									<div class="single-table">

										<div class="table-responsive">
											<table class="table text-center">

												<tbody>
													<tr>

														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=hull"  style="border:5px" class="btn btn-primary btn-xs">Hull</a></td>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=mainDeck" style="border:5px" class="btn btn-primary btn-xs">Main Deck</a></td>
														<td>	<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=BallastTanks" style="border:5px" class="btn btn-primary btn-xs">Ballast Tanks</a></td>


													</tr>
													<tr>

														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Superstructure" style="border:5px" class="btn btn-primary btn-xs">Superstructure</a></td>
														<td>	<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Bridge" style="border:5px" class="btn btn-primary btn-xs">Bridge</a></td>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=MachinerySpaces" style="border:5px" class="btn btn-primary btn-xs">Machinery Spaces</a></td>

													</tr>
													<tr>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=FirefightingEquipment" style="border:5px" class="btn btn-primary btn-xs">Lifesaving Appliances</a></td>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=MooringEquipment" style="border:5px" class="btn btn-primary btn-xs">Mooring Equipment</a></td>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=PollutionEquipment" style="border:5px" class="btn btn-primary btn-xs">Pollution Equipment</a></td>
													</tr>
													<tr>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Accommodation" style="border:5px" class="btn btn-primary btn-xs">Accommodation</a></td>
														<td><a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=CargoSystems" style="border:5px" class="btn btn-primary btn-xs">Cargo Systems</a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-6 col-md-6 mt-5">
								<?php   
	$data = $admin->getData_main_cata('shipall', 'ship_unicode', $uni_code);
	foreach ($data as $key => $value):


								?>
								<div class="row">
									<div style="width:800px; margin:0 auto;" class="login-area">
										<div class="container">
											<img src="../uploads/<?php echo $data[$key]['picture']?>"><br><br>
											<h3 style="color:gray">Ship Name : <?php echo $data[$key]['shipname']?></h3><br>
											<h3 style="color:gray">Imo Number : <?php echo $data[$key]['shipimo']?></h3>
										</div>
									</div>
								</div>

								<?php   endforeach; ?>
							</div>



						</div>
					</div>
				</div>

			</div>
			<!-- main content area end -->
			<!-- footer area start-->
			<?php require_once('footer.php'); ?>
			<?php
}else{
	Redirect::to('admin-login.php');
}

			?>
