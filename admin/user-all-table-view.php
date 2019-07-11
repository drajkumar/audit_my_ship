<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){

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
		<!-- modernizr css -->
		<script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
		<style>
			.button {
    display: block;
    width: 115px;
    height: 25px;
    background: #4E9CAF;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}</style>
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
					<div class="col-lg-12 mt-5">
						<div class="card">
							<div class="card-body">
								<?php
									 if(Session::exists('user_delete')){
									            echo '<div class="alert alert-success alert-block">
									             <a class="close" data-dismiss="alert" href="#">×</a>
									             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
									             '<p style="font-size:15px; color:green; margin-left:60px">'.
									               Session::flash('user_delete') .'</p>           
									              </div>';
									  }else  if(Session::exists('aprove_user')){
									            echo '<div class="alert alert-success alert-block">
									             <a class="close" data-dismiss="alert" href="#">×</a>
									             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
									             '<p style="font-size:15px; color:green; margin-left:60px">'.
									               Session::flash('aprove_user') .'</p>           
									              </div>';
									  }else  if(Session::exists('define_ship')){
									            echo '<div class="alert alert-success alert-block">
									             <a class="close" data-dismiss="alert" href="#">×</a>
									             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
									             '<p style="font-size:15px; color:green; margin-left:60px">'.
									               Session::flash('define_ship') .'</p>           
									              </div>';
									  }
							    ?>
								<h4 class="header-title">Total Register <?php
                                  $user = $admin->get_all_usres('users', 'emailalert', 1, 'id');
                                  echo count($user);
								?> users </h4>
								<div class="single-table">
									<div class="table-responsive">
										<table class="table text-center">
											<thead class="text-uppercase bg-dark">
												<tr class="text-white">
													<th scope="col">Title</th>
													<th scope="col">Name</th>
													<th scope="col">Mobile</th>
													
													<th scope="col">Email</th>
													<th scope="col">Country</th>
													<th scope="col">Company</th> 
													<th scope="col">Status</th>
													<th scope="col">Define ship</th>  
													<th scope="col">Action</th>                                                    
												</tr>
											</thead>
											<tbody>
												 <?php
									                   $x = 0;
									                  $content = $admin->get_all_usres('users', 'emailalert', 1, 'id');
									                   foreach ($content as $key => $value):
									                   	$x++;
									               ?>
												<tr>
													<th><?php  echo $content[$key]['title'] ;?></th>
													<td><?php  echo $content[$key]['name'] ;?></td>
													<td><?php  echo $content[$key]['mobile'] ;?></td>
													
													<td><?php  echo $content[$key]['email'] ;?></td>
													<td><?php  echo $content[$key]['country'] ;?></td>
													<td><?php  echo $content[$key]['company'] ;?></td>
													<td>

														<?php
                                                           if($content[$key]['status'] == 1){
                                                            echo '<img src="../assets/img/yes.jpg" width="35" height="35"';
                                                           }else{
                                                           	echo '<img src="../assets/img/worng.jpg" width="35" height="35"';
                                                           }
														  ?>
															

														</td>
														<td><a href="define-ship.php?user_id=<?php  echo $content[$key]['id'] ;?>" class="btn btn-success btn-xs">For user</a></td>
													<td>
                                                     <div class="modal fade" id="exampleModalCenter<?php  echo $content[$key]['id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h5 class="modal-title" id="exampleModalLongTitle">Reject user</h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body">
													        Do you really want to Reject?
													      </div>
													      <div class="modal-footer">
													        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
													        <a href="remove_user.php?user_id=<?php  echo $content[$key]['id'] ;?>" class="btn btn-danger">Yes</a>
													      </div>
													    </div>
													  </div>
													</div>
														<div class="dropdown">
														<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
															&nbsp;<span class="ti-settings"></span></button>
														<ul class="dropdown-menu">
															<li class="text-center" style="padding: 7px"><a class="btn btn-success btn-xs"  href="user-aprove.php?user_id=<?php  echo $content[$key]['id'] ;?>">Accept</a></li>
															<li class="text-center"><a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#exampleModalCenter<?php  echo $content[$key]['id'] ;?>">Reject</a></li>
															
														</ul>
														</div></td>
												</tr>
												
												 <?php endforeach;?>
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- main content area end -->
			<!-- footer area start-->
			<?php require_once('footer.php') ?>
			<!-- footer area end-->

<?php
}else{
 Redirect::to('admin-login.php');
}

?>
