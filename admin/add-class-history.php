<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

$uni_code = Input::get('uni_code');

   if(isset($_POST['save']) ){
   	  $date = date('Y-m-d H:i:s');
       $classification = escape($_POST['classification']);
       $shipstatus = escape($_POST['shipstatus']);
       $from_date  = escape($_POST['from_date']);
       $to_date = escape($_POST['to_date']);
       $remarks = escape($_POST['remarks']);
       
          

          $admin->update_all_ship('classhistory', 'uni_code', $uni_code, array(
           'classification' => $classification,
           'shipstatus' => $shipstatus,
           'from_date' => $from_date,
           'to_date' => $to_date,
           'remarks' => $remarks
          ));

            Session::flash('classhistory_edit', ' Class history is Successfully updated');
            Redirect::to('update.php?uni_code='.$uni_code);
     
          
}
?>

<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>AUDIT MY SHIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="assets/img/fa.png">
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

										<form action="" method="post">
											<div class="container">
												<?php   
			                                       $data = $admin->getData_main_cata('classhistory', 'uni_code', $uni_code);
			                                       foreach ($data as $key => $value):
			                                    ?>
												<div class="text-center"><br>
													<h2 style="color:#0D8C6E">ADD CLASS HISTORY</h2>	
												</div>
												<hr>
												<label for="text"><b>Classification</b></label>
												<input type="text" placeholder="Classification" name="classification" value="<?php echo $data[$key]['classification']?>">
												<label for="tel"><b>Ship status</b></label>
												<input type="text" placeholder="Ship status" name="shipstatus" value="<?php echo $data[$key]['shipstatus']?>">
												<label for="email"><b>From Date</b></label>
												<input type="date" placeholder="From Date" name="from_date" value="<?php echo $data[$key]['from_date']?>">
												<label for="date"><b>To Date</b></label>
												<input type="date" name="to_date" placeholder="To Date" value="<?php echo $data[$key]['to_date']?>">
												<label for="text"><b>Remarks</b></label>
												<input type="text" name="remarks" value="<?php echo $data[$key]['remarks']?>" placeholder="Remarks">
												<input type="submit" name="save" value="Add Class History" style="width:100%" id="submit" class="btn btn-primary registerbtn">
											</div>
                                            <?php  endforeach;?>
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

			</div>
			<!-- main content area end -->
			<!-- footer area start-->
<?php require_once('footer.php'); ?>

<?php
}else{
 Redirect::to('admin-login.php');
}

?>





