<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('defect_id');
//echo $id;
$img = Input::get('img');
$uni_code = Input::get('uni_code');
	$max = 50 * 1024;

	$result = array();
	$destination = '../uploads/'.$uni_code.'/';
	if(isset($_POST['save']) ){
		$date = date('Y-m-d H:i:s');
		$item = escape($_POST['item']);
		$criteria = escape($_POST['criteria']);
		$description = escape($_POST['description']);
		$image_name  = escape($_POST['img']);

		$upload = new Upload($destination);
		$upload->upload();
		$picname = $upload->newname();

		if(isset($picname)){

			$admin->update_all_ship('defect', 'id', $id, array(
				'uni_code' => $uni_code ,
				'item' => $item,
				'criteria' => $criteria,
				'description' => $description,
				'image' => $picname,
				'updated_at' => $date
			));
             $path = '../uploads/'.$uni_code.'/'.$img;
             unlink($path);
			Session::flash('defect_edit', ' Defect is Successfully updated');
			Redirect::to('view-defect.php?uni_code='.$uni_code);

		}else{

				$admin->update_all_ship('defect', 'id', $id, array(
				'uni_code' => $uni_code ,
				'item' => $item,
				'criteria' => $criteria,
				'description' => $description,
				'image' => $image_name,
				'updated_at' => $date
			));

			Session::flash('defect_edit', ' Defect is Successfully updated');
			Redirect::to('view-defect.php?uni_code='.$uni_code);
		}
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
		<link rel="stylesheet" href="../assets/css/ccss.css">
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
								<div class="card card-bordered">
									<div class="card-body">
                                         <?php  
							           if(Session::exists('defect_add')){
							            echo '<div class="alert alert-success alert-block">
							             <a class="close" data-dismiss="alert" href="#">×</a>
							             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
							             '<p style="font-size:15px; color:green; margin-left:60px">'.
							               Session::flash('defect_add') .'</p>           
							              </div>';
										}else if(Session::exists('defect_error')){
							            echo '<div class="alert alert-warning alert-block">
							             <a class="close" data-dismiss="alert" href="#">×</a>
							             <h4 style="margin-left:60px" class="alert-heading">Warning!</h4> '.
							             '<p style="font-size:15px; color:red; margin-left:60px">'.
							               Session::flash('defect_error') .'</p>           
							              </div>';
										}
								  ?>

								  
										<form action="" method="post" enctype="multipart/form-data">
											<div class="container">
												<div class="text-center"><br>
													<h2 style="color:#0D8C6E">EDIT DEFECT</h2>
													<p style="color:#0D8C6E">Edit your ship Defect</p>
													
												</div>
												<hr>
												<?php   
												$data = $admin->getData_main_cata('defect', 'id', $id);
												foreach ($data as $key => $value):


												?>
												<label for="text"><b>Item</b></label>&nbsp;&nbsp;&nbsp;
												<input type="text" placeholder="Item" name="item" value="<?php echo $data[$key]['item']?>" required>
												<label for="text"><b>Criteria</b></label>
												<input type="text" placeholder="Criteria" name="criteria" value="<?php echo $data[$key]['criteria']?>" required>
												<label for="text">Description/Recomendation</label><br/>
												<textarea name="description" rows="8" cols="45" required><?php echo $data[$key]['description']?></textarea><br/><br/>
												 
												<label for="file"><b>Photograph</b></label>
												<input type="file" placeholder="Photograph" name="photograph">
												<img src="../uploads/<?php echo $uni_code?>/<?php echo $data[$key]['image']?>" width="300" height="300">
												<input type="hidden" placeholder="Photograph" name="img" value="<?php echo $data[$key]['image']?>">
												<input type="submit" class="registerbtn" name="save" value="Save">
											<?php  endforeach;  ?>
											</div>
										</form>
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
				<!-- main content area end -->
			</div>

			<!-- footer area start-->
				<?php require_once('footer.php') ?>
<?php
}else{
	Redirect::to('admin-login.php');
}

?>
