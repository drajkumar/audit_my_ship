<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

$uni_code = Input::get('uni_code');

   if(isset($_POST['save']) ){
   	  $date = date('Y-m-d H:i:s');
       $shipname = escape($_POST['ship_name']);
       $ship_type = escape($_POST['ship_type']);
       $official_no  = escape($_POST['official_no']);
       $call_sing = escape($_POST['call_sing']);
       $port_of_registry = escape($_POST['port_of_registry']);
       $flag  = escape($_POST['flag']);
       $ex_names = escape($_POST['ex_names']);
       $exflag = escape($_POST['exflag']);
       
          

          $admin->update_all_ship('indntification', 'uni_code', $uni_code, array(
           'ship_name' => $shipname,
           'ship_type' => $ship_type,
           'official_no' => $official_no,
           'call_sing' => $call_sing,
           'port_of_registry' => $port_of_registry,
           'flag' => $flag,
           'ex_names' => $ex_names,
           'exflag' => $exflag,
           'updated_at' => $date
          ));

            Session::flash('indntification_edit', ' Indntification is Successfully updated');
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


								<form action="" method="post" enctype="multipart/form-data">
									<div class="container">
										<?php   
			                            $data = $admin->getData_main_cata('indntification', 'uni_code', $uni_code);
			                            foreach ($data as $key => $value):
			                                ?>
										<div class="text-center"><br>
											<h2 style="color:#0D8C6E">ADD IDENTIFICATION</h2>	
										</div>
										<hr>
										<label for="text"><b>Ship Name</b></label>
										<input type="text" placeholder="Ship Name" name="ship_name" value="<?php echo $data[$key]['ship_name']?>">
										<label for="text"><b>Ship Type</b></label>
										<input type="text" placeholder="Ship Type" name="ship_type" value="<?php echo $data[$key]['ship_type']?>">
										<label for="text"><b>Official No.</b></label>
										<input type="text" placeholder="Official No." name="official_no" value="<?php echo $data[$key]['official_no']?>">
										<label for="text"><b>Call Sign</b></label>
										<input type="text" name="call_sing" placeholder="Call Sign" value="<?php echo $data[$key]['call_sing']?>">
										<label for="text"><b>Port Of Registry</b></label>
										<input type="text" placeholder="Port Of Registry" name="port_of_registry" value="<?php echo $data[$key]['port_of_registry']?>">
										<label for="text"><b>Flag</b></label>
										<input type="text" placeholder="Flag" name="flag" value="<?php echo $data[$key]['flag']?>">
										<label for="text"><b>Ex Name (s)</b></label>
										<input type="text" placeholder="Ex Name (s)" name="ex_names" value="<?php echo $data[$key]['ex_names']?>">
										<label for="text"><b>Ex Flag(s)</b></label>
										<input type="text" placeholder="Ex Flag(s)" name="exflag"value="<?php echo $data[$key]['exflag']?>">
										<input type="submit" style="width:100%" id="submit" class="btn btn-primary registerbtn" name="save" value="Add Identification">
									
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








