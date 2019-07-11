<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
	$uni_code = Input::get('uni_code');
	if(isset($_POST['save'])){
    $destination = '../uploads/'.$uni_code.'/';
    $upload = new Upload($destination);
       $upload->upload();
       $pdffile = $upload->newname();
        $data = array(
           'uni_code'=> $uni_code,
           'description' => Input::get('description'),
           'app_file' => $pdffile,
            );
        $insert = $admin->create_all('documents', $data);
        if($insert == ture){

       $result = $upload->getMessage();
           Session::flash('document_add', ' Document Saved Successfully');
           Redirect::to('admin-documents.php?uni_code='.$uni_code);

          }else{
           Session::flash('document_error', ' Document Don\'t Saved ');
           Redirect::to('admin-documents.php?uni_code='.$uni_code);
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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
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
										<form action="" method="post" enctype="multipart/form-data">
											<div class="container">
												<?php
												 if(Session::exists('document_add')){
										            echo '<div class="alert alert-success alert-block">
										             <a class="close" data-dismiss="alert" href="#">×</a>
										             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
										             '<p style="font-size:15px; color:green; margin-left:60px">'.
										               Session::flash('document_add') .'</p>           
										              </div>';
										             }
													?>									<div class="text-center"><br>
													<h2 style="color:#0D8C6E">ADD DOCUMENTS</h2>
												<a href="view-documents.php?uni_code=<?php  echo $uni_code;?>">View Documents</a>
												</div>
												<hr>
												<label for="file"><b>Description</b></label><br/>
                                                 <textarea name="description" rows="10" cols="50" required></textarea><br/>
												<label for="file"><b>Documents</b></label>
												<input type="file" placeholder="Documents" name="file" required>
												<input type="submit" class="registerbtn" name="save" value="Save">
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
			<?php require_once('footer.php'); ?>
<?php
}else{
 Redirect::to('admin-login.php');
}

?>
