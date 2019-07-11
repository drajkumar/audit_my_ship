<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

	$uni_code = Input::get('uni_code');
	$max = 50 * 1024;

	$result = array();
	$destination = '../uploads/';
	if(isset($_POST['save']) ){
		$date = date('Y-m-d H:i:s');
		$shipname = escape($_POST['shipname']);
		$imo = escape($_POST['imo']);
		$image_name  = escape($_POST['image_name']);

		$upload = new Upload($destination);
		$upload->upload();
		$picname = $upload->newname();

		if(isset($picname)){

			$admin->update_all_ship('shipall', 'ship_unicode', $uni_code, array(
				'shipname' => $shipname,
				'shipimo' => $imo,
				'picture' => $picname,
				'updated_at' => $date
			));
            unlink('../uploads/'.$image_name);
			Session::flash('product_edit', ' Ship is Successfully updated');
			Redirect::to('update.php?uni_code='.$uni_code);

		}else{

			$admin->update_all_ship('shipall', 'ship_unicode', $uni_code, array(
				'shipname' => $shipname,
				'shipimo' => $imo,
				'picture'   => $image_name,
				'updated_at' => $date
			));

			Session::flash('product_edit', ' Ship is Successfully updated');
			Redirect::to('update.php?uni_code='.$uni_code);
		}
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
			
				<!-- page title area end -->
				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="row">
									<div style="width:800px; margin:0 auto;" class="login-area login-s1">
										<div class="container">


											<form action="" method="post" enctype="multipart/form-data">

												<?php  
	if(Session::exists('product_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('product_edit') .'</p>           
              </div>';
	}else if(Session::exists('indntification_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('indntification_edit') .'</p>           
              </div>';
	}else if(Session::exists('dimensions_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('dimensions_edit') .'</p>           
              </div>';
	}else if(Session::exists('hull_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('hull_edit') .'</p>           
              </div>';
	}else if(Session::exists('classification_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('classification_edit') .'</p>           
              </div>';
	}else if(Session::exists('classhistory_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('classhistory_edit') .'</p>           
              </div>';
	}else if(Session::exists('machinery_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('machinery_edit') .'</p>           
              </div>';
	}else if(Session::exists('electrical_installations')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('electrical_installations') .'</p>           
              </div>';
	}else if(Session::exists('boilers_edit')){
		echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
			'<p style="font-size:15px; color:green; margin-left:60px">'.
			Session::flash('boilers_edit') .'</p>           
              </div>';
	}
												?>
												<?php   
												$data = $admin->getData_main_cata('shipall', 'ship_unicode', $uni_code);
												foreach ($data as $key => $value):


												?>
												<div class="container">
													<div class="text-center"><br>
														<h2 style="color:#0D8C6E">EDIT SHIP</h2>
														<p style="color:#0D8C6E">Update your ship details with a IMO number and Image</p>
													</div>
													<hr>
													<label for="text"><b>Ship Name </b></label>
													<input type="text" placeholder="Company Name" name="shipname" value="<?php echo $data[$key]['shipname']?>" required>
													<label for="text"><b>Ship Imo</b></label>
													<input type="text" placeholder="Ship Imo" name="imo" value="<?php echo $data[$key]['shipimo']?>">
													<label for="text"><b>Old image</b></label><br/>
													<img src="../uploads/<?php echo $data[$key]['picture']?>" width="300" height="300"><br/>
													<label for="file"><b>Select Ship Image</b></label>&nbsp;&nbsp;&nbsp;
													<input type="hidden" name ="image_name"  value="<?php echo $data[$key]['picture']?>"/>
													<input type="file" placeholder="Ship Image" name="pic" accept="image/*"><br><br>

													<input type="submit" class="registerbtn" name="save" value="Update Ship">
												</div>
												<?php   endforeach;  ?>
											</form>
											<!-- From end Here  -->
										</div>
									</div>
								</div>
							</div>
							<!-- Left Div end Here  -->

							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">

									<div class="card-body">
										<h2>Update Vessel Particualars</h2><br>

										<div class="row">
											<div class="col-sm-3">
												<a href="add-identification.php?uni_code=<?php echo $uni_code;?>"  class="btn btn-primary btn-sm btn-block">Identification</a>
												<a href="add-classification.php?uni_code=<?php echo $uni_code;?>"   class="btn btn-primary btn-sm btn-block">Classification</a>

											</div>
											<div class="col-sm-3">
												<a href="add-dimensions.php?uni_code=<?php echo $uni_code;?>" class="btn btn-primary btn-sm btn-block">Dimensions</a>
												<a href="add-machinery.php?uni_code=<?php echo $uni_code;?>"class="btn btn-primary btn-sm btn-block">Machinery</a>

											</div>
											<div class="col-sm-3">
												<a href="add-hul.php?uni_code=<?php echo $uni_code;?>"class="btn btn-primary btn-sm btn-block">Hul</a>
												<a href="add-electrical-installations.php?uni_code=<?php echo $uni_code;?>" class="btn btn-primary btn-sm btn-block">Electrical</a>

											</div>
											<div class="col-sm-3">
												<a href="add-class-history.php?uni_code=<?php echo $uni_code;?>" class="btn btn-primary btn-sm btn-block">Class History</a>
												<a href="add-boilers.php?uni_code=<?php echo $uni_code;?>" class="btn btn-primary btn-sm btn-block">Boilers</a>

											</div>

										</div>

									</div>

								</div><br>
								<div class="card card-bordered">
									<div class="card-body">
										<div class="single-table">
											<div class="table-responsive">
												<table class="table text-center">
													<tbody>
														<tr>
															<td><h3 style="display: inline;">Add Photographs</h3></td>
															<td><a href="upload-pic.php?uni_code=<?php echo $uni_code;?>" class="btn btn-success btn-sm">Add Ship Image</a></td>
														</tr>
														<tr>		
															<td><h3 style="display: inline;">Add Defects</h3></td>
															<td><a href="admin-defect.php?uni_code=<?php echo $uni_code;?>" class="btn btn-success btn-sm">Add Defects</a></td>
														</tr>
														<tr>
															<td><h3 style="display: inline;">Add Documents</h3></td>
															<td><a href="admin-documents.php?uni_code=<?php echo $uni_code;?>" class="btn btn-success btn-sm">Add Documents</a></td>

														</tr>
														<tr>
															<td><h3 style="display: inline;">Add Summary</h3></td>
															<td><a href="admin_summary.php?uni_code=<?php echo $uni_code;?>" class="btn btn-success btn-sm">Add Summary</a></td>

														</tr>

														<tr>
															<td><h3 style="display: inline;">Add Ship Score</h3></td>
															<td><a href="add-graph.php?uni_code=<?php echo $uni_code;?>" class="btn btn-success btn-sm">Add Ship Score</a></td>

														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- Right column end Here  -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- main content area end -->
				<!-- footer area start-->
				<?php require_once('footer.php') ?>
<?php
}else{
	Redirect::to('admin-login.php');
}

?>

