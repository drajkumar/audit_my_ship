<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

$uni_code = Input::get('uni_code');
$group = Input::get('group');
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
							<div class="col-lg-3  col-md-3  mt-5">
								<?php
						           if(Session::exists('image_delete')){
						            echo '<div class="alert alert-success alert-block">
						             <a class="close" data-dismiss="alert" href="#">×</a>
						             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
						             '<p style="font-size:15px; color:green; margin-left:60px">'.
						               Session::flash('image_delete') .'</p>           
						              </div>';
						             }
						        ?>
								<div class="card card-bordered">
									<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=hull"  style="border:5px" class="btn btn-primary btn-xs">Hull</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=mainDeck" style="border:5px" class="btn btn-primary btn-xs">Main Deck</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=BallastTanks" style="border:5px" class="btn btn-primary btn-xs">Ballast Tanks</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Superstructure" style="border:5px" class="btn btn-primary btn-xs">Superstructure</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Bridge" style="border:5px" class="btn btn-primary btn-xs">Bridge</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=MachinerySpaces" style="border:5px" class="btn btn-primary btn-xs">Machinery Spaces</a>
										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=FirefightingEquipment" style="border:5px" class="btn btn-primary btn-xs">Lifesaving Appliances</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=MooringEquipment" style="border:5px" class="btn btn-primary btn-xs">Mooring Equipment</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=PollutionEquipment" style="border:5px" class="btn btn-primary btn-xs">Pollution Equipment</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=Accommodation" style="border:5px" class="btn btn-primary btn-xs">Accommodation</a>

										<a href="view-group-image.php?uni_code=<?php echo $uni_code;?>&group=CargoSystems" style="border:5px" class="btn btn-primary btn-xs">Cargo Systems</a>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 mt-5">
								
                                <?php  
								   //$get = $admin->get_data('gallary_img');
								 $gellery = $admin->get_gellery('gallary_img', $uni_code, $group);

								   if(empty($gellery)){
                                     echo 'You have no any Image for this type grup please add some image';
								   }else{

								   	foreach ($gellery as $key => $value) {


								   		?>
								   		<div class="modal fade" id="exampleModalCenter<?php echo $gellery[$key]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Delete Image</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        Do you really want to Delete?
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
										        <a class="btn btn-danger" href="remove_image.php?id=<?php echo $gellery[$key]['id']; ?>&img=<?php echo $gellery[$key]['image']; ?>&uni_code=<?php  echo $uni_code; ?>&group=<?php echo $group;?>">Yes</a>
										      </div>
										    </div>
										  </div>
										</div>
								   		<div class="row">
								   		<div class="card card-bordered m-2 col-md-12">
								   			<img src="../uploads/<?php  echo $uni_code; ?>/<?php echo $group?>/<?php echo $gellery[$key]['image']; ?>" >
								   			<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $gellery[$key]['id']; ?>">Delete</a>
								   			
								   		</div>
								
								   	</div>

								   	<?php
								   	}

								   }

								 	?>

                                
                                 
                               
						

							</div>
		



						</div>
					</div>
				</div>

			</div>

  <?php require_once('footer.php'); ?>

<?php
}else{
 Redirect::to('admin-login.php');
}

?>