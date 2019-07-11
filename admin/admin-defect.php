<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';


$admin = new User();
if($admin->isLoggedIn()){
$uni_code = Input::get('uni_code');
   $date = date('Y-m-d');
   $result = array();
  $destination = '../uploads/'.$uni_code.'/';
       if(isset($_POST['save'])){
       $item    = escape($_POST['item']);
       $criteria   = escape($_POST['criteria']);
       $description   = escape($_POST['description']);
       $upload = new Upload($destination);
       $upload->upload();
       $picname = $upload->newname();

       $defect =   array(
           'uni_code'=> $uni_code,
           'item' => $item,
           'criteria' => $criteria,
           'description' =>$description,
           'image' => $picname,
           'created_at' => $date,
           'updated_at' => ''
            );

       $insert = $admin->create_all('defect', $defect);

      if($insert == true){
      	$result = $upload->getMessage();
           Session::flash('defect_add', ' Defect is add Successfully! If you want to add more Defect Please fill the form and save again.');
           Redirect::to('admin-defect.php?uni_code='.$uni_code);
      }else{
           Session::flash('defect_error', ' Defect is not Save your database');
           Redirect::to('admin-defect.php?uni_code='.$uni_code);
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
													<h2 style="color:#0D8C6E">ADD DEFECT</h2>
													<p style="color:#0D8C6E">Add your ship Defect</p>
													<a href="view-defect.php?uni_code=<?php  echo $uni_code;?>">View Defect</a>
												</div>
												<hr>
												<label for="text"><b>Item</b></label>&nbsp;&nbsp;&nbsp;
												<input type="text" placeholder="Item" name="item" required>
												<label for="text"><b>Criteria</b></label>
												<input type="text" placeholder="Criteria" name="criteria" required>
												<label for="text">Description/Recomendation</label><br/>
												<textarea name="description" rows="10" cols="45" required></textarea><br/><br/>
												
												<label for="file"><b>Photograph</b></label>
												<input type="file" placeholder="Photograph" name="photograph"  required>
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
				<?php require_once('footer.php') ?>
<?php
}else{
	Redirect::to('admin-login.php');
}

?>
