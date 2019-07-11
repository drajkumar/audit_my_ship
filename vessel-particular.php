<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
      Redirect::to('unapprove.php');
	}else{

$uni_code = Input::get('uni_code');
if (empty($uni_code)) {
 Redirect::to('Error.php');
}

$main_cata_arr = array();
$code = $user->get_main_cata('ship_unicode', 'shipall');

foreach ($code as $key => $value) {
	$main_cata_arr[] = $code[$key]['ship_unicode'];
}

if(in_array($uni_code, $main_cata_arr, true)){
  echo '';
}else{
	Redirect::to('Error.php');
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
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/themify-icons.css">
		<link rel="stylesheet" href="assets/css/metisMenu.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/slicknav.min.css">
		<!-- amchart css -->
		<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
		<!-- others css -->
		<link rel="stylesheet" href="assets/css/typography.css">
		<link rel="stylesheet" href="assets/css/default-css.css">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/ccss.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		<!-- modernizr css -->
		<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
 
       	  $(document).ready(function(){

          function loadnoti(){
         	$("#counter").load("count_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }


           $("#tibell").click(function(){
         
            var nid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "update_inquiry.php",
			  data: {'nid': nid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti").load("get_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadnoti();

		}, 500);

       

        });

       </script>
		<!-----circlestyle---->
		<link rel="stylesheet" href="assets/css/circlestyle.css">
		<style>
		table, td, th {  
  			border: 1px solid black;
  			text-align: left;
			word-break: break-all;
			word-wrap: break-word;
			
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
			.left-td{
				width: 30%;
			}
		</style>

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
			<div class="sidebar-menu">
				<div class="sidebar-header">
					<div class="logo">
					<a href="user-dashboard.php"><img src="assets/img/LO1.png" alt="logo"></a>
					</div>
				</div>
				<div class="main-menu">
					<div class="menu-inner">
						<nav>
							<ul class="metismenu" id="menu">
								<li>
									<a href="user-dashboard.php"  class="active" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
								</li>
								<li  class="active">
									<a href="user-summary.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Summary
										</span></a>

								</li>
													<li>
									<a href="manager-owner.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Manager / Owner </span></a>
								
								</li>
										
								<li>
									<a href="vessel-particular.php?uni_code=<?php  echo $uni_code; ?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Vessel Particulars</span></a>
								
								</li>
										
								<li >
									<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-camera" aria-hidden="true"></i><span>Photographs</span></a>
									<ul class="collapse">
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=hull">Hull</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=mainDeck">Main Deck</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=BallastTanks">Ballast Tanks</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Superstructure">Superstructure</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Bridge">Bridge</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MachinerySpaces">Machinery Spaces</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=FirefightingEquipment">Firefighting Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=LifesavingAppliances">Lifesaving Appliances</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=MooringEquipment">Mooring Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=PollutionEquipment">Pollution Equipment</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=Accommodation">Accommodation</a></li>
										<li><a href="gallery-view.php?uni_code=<?php echo $uni_code;?>&group=CargoSystems">Cargo Systems</a></li>
									</ul>
								</li>
								<li>
									<a href="defects.php?uni_code=<?php echo $uni_code;?>" aria-expanded="true"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><span>Defects</span></a>
								</li>
								<li>
									<a href="documents.php?uni_code=<?php echo $uni_code; ?>" aria-expanded="true"><i class="fa fa-book" aria-hidden="true"></i>
										<span>Documents</span></a>
								</li>

							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- sidebar menu area end -->
			<!-- main content area start -->
			<div class="main-content">
				<!-- header area start -->
				<div class="header-area">
					<div class="row align-items-center">
						<!-- nav and search button -->
						<div class="col-md-6 col-sm-8 clearfix">
							<div class="nav-btn pull-left">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div class="search-box pull-left">
								<form action="search.php" method="post">
									<input type="text" name="search" placeholder="Search Your Ship..." required>
									<input type="hidden" name="token" value="<?php echo Token::generete();?>">

									<i class="ti-search"></i>
								</form>
							</div>


						</div>
						<!-- profile info & task notification -->
						<div class="col-md-6 col-sm-4 clearfix">
							<ul class="notification-area pull-right">
								<li id="full-view"><i class="ti-fullscreen"></i></li>
								<li id="full-view-exit"><i class="ti-zoom-out"></i></li>
								<li class="dropdown">
									<i id="tibell" class="ti-bell dropdown-toggle" data-toggle="dropdown">
										<span id="counter"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have 3 new notifications <a href="message.php">view all</a></span>
										<div id="popnoti" class="nofity-list">
											
											
											
										
											
											
										</div>
									</div>
								</li>

								<li>
									<button class="btn btn-success" onclick="window.location.href='user-inquery.php'"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; &nbsp;NEW QUOTATION</button>
								</li>


							</ul>
						</div>
					</div>
				</div>
				<!-- header area end -->
				<!-- page title area start -->
				<div class="page-title-area">
					<div class="row align-items-center">
						<div class="col-sm-8 col-xs-8">
							<div class="breadcrumbs-area clearfix">
										<?php
                      $shipdata = $user->getData_one_cul('shipall', 'ship_unicode', $uni_code);
                      $shipname = '';
                      $imo = '';
                      $pic = '';
                     
                     
                      
                      foreach ($shipdata as $key => $value) {
                      	$shipname = $shipdata[$key]['shipname'];
                      	$imo = $shipdata[$key]['shipimo'];
                      	$pic = $shipdata[$key]['picture'];


                      	
                      }


					?>

								<div class="row">

									<div class="col-md-4 col-sm-4">
										<p><b>VESSEL :</b> <?php echo $shipname;  ?></p>
									</div>
									<div class="col-md-3 col-sm-3">
										<p><b>IMO ON :</b><?php echo $imo;?></p>
									</div>

											<?php
                      $summary = $user->getData_one_cul('summary', 'uni_code', $uni_code);
                      $refnum = '';
                      $isnum = '';
                     
                     
                      
                      foreach ($summary as $key => $value) {
                      	$refnum = $summary[$key]['reference_no'];
                      	$isnum = $summary[$key]['Issued_date'];
                      	
                      }


					?>
									<div class="col-md-2 col-sm-2">
										<p><b>REF :</b> <?php echo $refnum;?></p>
									</div>
									<div class="col-md-3 col-sm-3">
										<p><b>ISSUED ON :</b> <?php echo $isnum;?></p>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo escape($user->data()->name) ;?> <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="profile.php">Profile</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-content-inner">
					<div class="card-area">
						<div class="row" style="background-color:white">
							<div class="col-lg-12 col-md-12 mt-5">
								<div class="card card-bordered">
									<div class="card-body">
										<img src="uploads/<?php echo $pic; ?>">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table">
												<tbody>
									   <?php
					                  $indntification = $user->getData_one_cul('indntification', 'uni_code', $uni_code);
					                     
					                     
					                      
					                      foreach ($indntification as $key => $value):
					                      						                     					                      	
										?>

													<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">IDENTIFICATION</h5></b>
													</thead>
													<tr id="table-bordered">
														<td class="left-td">Ship Name</td>
														<td><?php  echo $indntification[$key]['ship_name']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Ship Type</td>
														<td><?php  echo $indntification[$key]['ship_type']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Official No.</td>
														<td><?php  echo $indntification[$key]['official_no']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Call Sign</td>
														<td><?php  echo $indntification[$key]['call_sing']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Flag</td>
														<td><?php  echo $indntification[$key]['port_of_registry']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Port Of Registry</td>
														<td><?php  echo $indntification[$key]['flag']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Ex NAme(s)</td>
														<td><?php  echo $indntification[$key]['ex_names']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Ex Flasg(s)</td>
														<td><?php  echo $indntification[$key]['exflag']; ?></td>
													</tr>
												<?php  endforeach;  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table mb-5">
												<tbody>
								 <?php
					         $classification = $user->getData_one_cul('classification', 'uni_code', $uni_code);
					                      foreach ($classification as $key => $value):
										?>
													<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">CLASSIFICATION</h5></b>
													</thead>

													<tr>
														<td class="left-td">Classification</td>
														<td><?php  echo $classification[$key]['classification']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Class MAchinery Notation</td>
														<td><?php  echo $classification[$key]['class_machinery_notation']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Class Hull Notation</td>
														<td><?php  echo $classification[$key]['class_hull_notation']; ?></td>
													</tr>
                                                   <?php  endforeach;?>
												</tbody>
											</table>
											<table class="table text-center">
												<tbody>
						 <?php
					         $classhistory = $user->getData_one_cul('classhistory', 'uni_code', $uni_code);
					                      foreach ($classhistory as $key => $value):
						 ?>
												<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">CLASS HISTORY</h5></b>
													</thead>
													<tr>
														<td class="left-td">Classification</td>
														<td><?php  echo $classhistory[$key]['classification']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Ship Status</td>
														<td><?php  echo $classhistory[$key]['shipstatus']; ?></td>
													</tr>
													<tr>
														<td class="left-td">From Date</td>
														<td><?php  echo $classhistory[$key]['from_date']; ?></td>
													</tr>
													<tr>
														<td class="left-td">To Date</td>
														<td><?php  echo $classhistory[$key]['to_date']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Remarks</td>
														<td><?php  echo $classhistory[$key]['remarks']; ?></td>
													</tr>
												<?php endforeach; ?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</div>
							<!------end------------------->
						</div>
					</div>
					<div class="card-area" style="background-color:white">
						<div class="row">
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table text-center">
												<tbody>
                         <?php
					         $dimensions = $user->getData_one_cul('dimensions', 'uni_code', $uni_code);
					                      foreach ($dimensions as $key => $value):
						 ?>		<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">DIMENSIONS</h5></b>
													</thead>
												
													<tr>
														<td class="left-td">Gross Tonnage</td>
														<td><?php  echo $dimensions[$key]['gross_tonnage']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Net Tonnage</td>
														<td><?php  echo $dimensions[$key]['net_tonnage']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Deadweight</td>
														<td><?php  echo $dimensions[$key]['deadweight']; ?></td>
													</tr>
													<tr>
														<td class="left-td">light Ship</td>
														<td><?php  echo $dimensions[$key]['light_ship']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Length Overall</td>
														<td><?php  echo $dimensions[$key]['light_overall']; ?></td>
													</tr>

													<tr>
														<td class="left-td">LBP</td>
														<td><?php  echo $dimensions[$key]['lbp']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Breadth</td>
														<td><?php  echo $dimensions[$key]['breadth']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Draft</td>
														<td><?php  echo $dimensions[$key]['draft']; ?></td>
													</tr>
												<?php endforeach;  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table text-center">
												<tbody>
													<?php
					         $machinery = $user->getData_one_cul('machinery', 'uni_code', $uni_code);
					                      foreach ($machinery as $key => $value):
						                            ?>
						                            	<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">MACHINERY</h5></b>
													</thead>
													
													<tr>
														<td class="left-td">Main Engine Model</td>
														<td><?php  echo $machinery[$key]['main_engine_model']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Total Power</td>
														<td><?php  echo $machinery[$key]['total_power']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Stroke/Bore</td>
														<td><?php  echo $machinery[$key]['stroke_bore']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Type</td>
														<td><?php  echo $machinery[$key]['type']; ?></td>
													</tr>
													<tr>
														<td class="left-td">RPM</td>
														<td><?php  echo $machinery[$key]['rpm']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Manufacturer</td>
														<td><?php  echo $machinery[$key]['manufacturer']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Speed Of the Ship</td>
														<td><?php  echo $machinery[$key]['speed_of_ship']; ?></td>
													</tr>
												<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-area" style="background-color:white">
						<div class="row">
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table text-center">
												<tbody>
													<?php
					         $hull = $user->getData_one_cul('hull', 'uni_code', $uni_code);
					                      foreach ($hull as $key => $value):
						                            ?>
						                                  	<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">HULL</h5></b>
													</thead>
												
													<tr>
														<td class="left-td">Builder</td>
														<td><?php  echo $hull[$key]['bulider']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Date Of Build</td>
														<td><?php  echo $hull[$key]['date_of_bulid']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Place Of Build</td>
														<td><?php  echo $hull[$key]['place_of_bulid']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Yard No</td>
														<td><?php  echo $hull[$key]['yard_no']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Hull Material</td>
														<td><?php  echo $hull[$key]['hull_material']; ?></td>
													</tr>
                                                 <?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="single-table">
										<div class="table-responsive">
											<table class="table text-center mb-5">
												<tbody>
													<?php
					         $electrical_installations = $user->getData_one_cul('electrical_installations', 'uni_code', $uni_code);
					                      foreach ($electrical_installations as $key => $value):
						                            ?>
													      	<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">ELECTRICAL INSTALLATIONS</h5></b>
													</thead>
											
													<tr>
														<td class="left-td">Frequency</td>
														<td><?php  echo $electrical_installations[$key]['frequency']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Generators</td>
														<td><?php  echo $electrical_installations[$key]['generators']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Emergency Generators</td>
														<td><?php  echo $electrical_installations[$key]['emergency_enerators']; ?></td>
													</tr>
													<?php endforeach; ?>

												</tbody>
											</table>
											<table class="table text-center">
												<tbody>
													<?php
					         $boilers = $user->getData_one_cul('boilers', 'uni_code', $uni_code);
					                      foreach ($boilers as $key => $value):
						                            ?>
						                                 	<thead class="text-uppercase bg-dark" style="border:10px solid black;background-color:#A299FF">             
														<b><h5 class="text-uppercase  text-black p-3"style="border:1px solid black;background-color:#A299FF">BOILERS</h5></b>
													</thead>
												
													<tr>
														<td class="left-td">Oil Fired</td>
														<td><?php  echo $boilers[$key]['oil_fired']; ?></td>
													</tr>
													<tr>
														<td class="left-td">Exhaust Gas</td>
														<td><?php  echo $boilers[$key]['exhaust_gas']; ?></td>
													</tr>
												<?php  endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							<!------end------------------->
						</div>
					</div>

				</div>
			</div>
			<!-- main content area end -->
			<!-- footer area start-->
			<footer>
				<div class="footer-area">
					<p>© Copyright 2018. All right reserved. Developed by <a href="https://developerarena.com">Developer Arena</a>.</p>
				</div>
			</footer>
			<!-- footer area end-->
		</div>
		<!-- jquery latest version -->
		<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- others plugins -->
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/scripts.js"></script>

		<!-------circle-------->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js'></script>
		<script  src="assets/js/circleindex.js"></script>
	</body>

</html>

<?php
 }
}else{
 Redirect::to('index.php');
}

?>