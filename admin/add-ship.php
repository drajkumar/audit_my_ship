<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$admin = new User();
if($admin->isLoggedIn()){
   $max = 50 * 1024;
   $date = date('Y-m-d');
   $result = array();

   $destination = '../uploads/';
     if(isset($_POST['save'])){
       $shipname    = escape($_POST['shipname']);
       $imo   = escape($_POST['imo']);
       $code = uniqid();
          if(!is_dir('../uploads/'.$code)){
          mkdir("../uploads/".$code, 0777, true);
    }
       $upload = new Upload($destination);
       $upload->upload();
       $picname = $upload->newname();
            $data = array(
           'shipname'=> $shipname,
           'shipimo' => $imo,
           'picture' => $picname,
           'ship_unicode' => $code,
           'created_at' => $date,
           'updated_at' => '',
           'status' => 0
            );

        $indntification =   array(
           'uni_code'=> $code,
           'ship_name' => $shipname,
           'ship_type' => '',
           'official_no' => '',
           'call_sing' => '',
           'port_of_registry' => '',
           'flag' => '',
           'ex_names'=> '',
           'exflag' => '',
           'create_at' => $date,
           'updated_at' => ''
            );
        $dimensions =   array(
           'uni_code'=> $code,
           'gross_tonnage' => '',
           'net_tonnage' => '',
           'deadweight' => '',
           'light_ship' => '',
           'light_overall' => '',
           'lbp' => '',
           'breadth'=> '',
           'draft' => '',
           'create_at' => $date,
           'updated_at' => '',
           'status' => 0
            ); 

        $hull =   array(
           'uni_code'=> $code,
           'bulider' => '',
           'date_of_bulid' => '',
           'place_of_bulid' => '',
           'yard_no' => '',
           'hull_material' => '',
           'created_at' => $date,
           'updated_at' => ''
            );

        $classification =   array(
           'uni_code'=> $code,
           'classification' => '',
           'class_machinery_notation' => '',
           'class_hull_notation' => '',
           'created_at' => $date,
           'updated_at' => ''
            );

        $classhistory =   array(
           'uni_code'=> $code,
           'classification' => '',
           'shipstatus' => '',
           'from_date' => '',
           'to_date' => '',
           'remarks' => '',
           'created_at' => $date,
           'updated_at' => ''
            );

        $machinery =   array(
           'uni_code'=> $code,
           'main_engine_model' => '',
           'total_power' => '',
           'stroke_bore' => '',
           'type' => '',
           'rpm' => '',
           'manufacturer' => '',
           'speed_of_ship'=> '',
           'created_at' => $date,
           'updated_at' => ''
            );  
        $electrical_installations = array(
           'uni_code'=> $code,
           'frequency' => '',
           'generators' => '',
           'emergency_enerators' => '',
           'created_at' => $date,
           'updated_at' => ''
            );

        $boiler = array(
           'uni_code'=> $code,
           'oil_fired' => '',
           'exhaust_gas' => '',
           'created_at' => $date,
           'update_at' => ''
            );

        $sdata = array(
           'uni_code'=> $code,
           'a' => '',
           'b' => '',
           'c' => '',
           'd' => '',
           'e' => '',
           'f' => '',
           'g' => '',
           'h' => '',
           'i' => '',
           'j' => '',
           'k' => '',
           'l' => '',
           'm' => '',
           'n' => '',
           'o' => '',
           'p' => '',
           'q' => '',
           'r' => '',
           's' => '',
           't' => '',
           'u' => '',
           'condition_score' => '',
           'management_score' => '',
           'overall_score' => ''
            );

         $summary = array(
           'uni_code'=> $code,
           'reference_no' => '',
           'Issued_date' => '',
           'summary' => ''
            );

            $insert = $admin->create_all('shipall', $data);
            
           if($insert == true){
           	$admin->create_all('indntification', $indntification);
            $admin->create_all('dimensions', $dimensions);
            $admin->create_all('hull', $hull);
            $admin->create_all('classification', $classification);
            $admin->create_all('classhistory', $classhistory);
            $admin->create_all('machinery', $machinery);
            $admin->create_all('electrical_installations', $electrical_installations);
            $admin->create_all('boilers', $boiler);
            $admin->create_all('ship_score', $sdata);
            $admin->create_all('summary', $summary);
             $result = $upload->getMessage();
           Session::flash('product_add', ' Ship is Store your database');
           Redirect::to('add-ship.php');

          }else{
           Session::flash('product_add_error', ' Ship is not Store your database');
           Redirect::to('add-ship.php');
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
	<link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
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
			<div class="row">
				<div style="width:600px; margin:0 auto;" class="bg-white">
					<div class="container">

						<form action="" method="post" enctype="multipart/form-data">
							<div class="container">
								<div class="text-center"><br>
									<h2 style="color:#0D8C6E">ADD SHIP</h2>
									<p style="color:#0D8C6E">Add your ship details with a IMO number and Image</p>
									             <?php  
           if(Session::exists('product_add')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('product_add') .'</p>           
              </div>';
             }elseif(Session::exists('product_add_error')){
              echo '<div class="alert alert-error alert-block">
               <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 style="margin-left:60px"  class="alert-heading">Error!</h4>'.
              '<p style="font-size:15px; color:#FF4040; margin-left:60px">'.
               Session::flash('product_add_error') .'</p></div>';
             } 
           ?> 
								</div>
								<hr>


								<label for="text"><b>Ship Name </b></label>
								<input type="text" placeholder="Ship Name" name="shipname" required>
								<label for="text"><b>Ship Imo</b></label>
								<input type="text" placeholder="Ship Imo" name="imo">
								<label for="file"><b>Select Ship Image</b></label>&nbsp;&nbsp;&nbsp;
								<input type="file" placeholder="Ship Image" name="pic"><br><br>

								<input type="submit" class="registerbtn" name="save" value="Save">
							</div>
						</form>

					</div>
				</div>


				<!-- From end Here  -->
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
