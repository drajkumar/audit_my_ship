<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
	    $id = $admin->data()->id;
   $error_mess = array();

       if(Input::exists()){
          if(Token::check(Input::get('token'))){
           $validate = new Validation();
            $validation =  $validate->check($_POST, array(
               
                 'password' => array(
				     'required' => true,
						'max'      => 64,
					    'min'      => 8
							 ), 
							 
                'confirmpassword' => array(
					 'required' => true,
					      'matches'  => 'password',
						  'max'      => 64,
						  'min'      => 8
							        	)
                

               ));
                if($validation->passed()){
                	$salt = Hash::salt();

                	    $admin->update_all_ship('admin', 'id', $id, array(
				           'password' => Hash::make(Input::get('password'), $salt),
				           'salt'       => $salt
				          ));
						Session::flash('profile_pass_a', 'Password is successfuly Change');
						 Redirect::to('change_password.php');

				}else{
                  $error_mess[] = $validation->errors();
				}

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
		<link rel="stylesheet" href="../assets/css/ccss.css">
		<link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		 
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
		
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
									<input type="text" name="search" value="<?php echo Input::get('search');  ?>" placeholder="Search Your Ship..." required>
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

							<!-- <li><i class="fa fa-users" aria-hidden="true"></i></li> -->

								<li class="dropdown">
									<i class="ti-user dropdown-toggle" data-toggle="dropdown" id="tiuser">
										<span id="counter"></span>
									</i>
									<div id="tog" class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="user-all-table-view.php">view all</a></span>
										<div id="popnoti" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li class="dropdown">
									<i id="timess" class="ti-email dropdown-toggle" data-toggle="dropdown">
										<span id="counter2"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="message.php">view all</a></span>
										<div id="popnoti2" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li class="dropdown">
									<i id="tiinqu" class="ti-bell dropdown-toggle" data-toggle="dropdown">
										<span id="counter3"></span>
									</i>
									<div class="dropdown-menu bell-notify-box notify-box">
										<span class="notify-title">You have new notifications <a href="view-inquiry.php">view all</a></span>
										<div id="popnoti3" class="nofity-list">
											
										</div>
									</div>
								</li>

								<li>
									<button onclick="window.location.href='add-ship.php'" class="btn btn-success"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>&nbsp; &nbsp;ADD SHIP</button>
								</li>


							</ul>
						</div>
					</div>
				</div>
				<!-- header area end -->
				<!-- page title area start -->
				<div class="page-title-area">
					<div class="row align-items-center">
						<div class="col-sm-6">
							<div class="breadcrumbs-area clearfix">
								<h4 class="page-title pull-left">Dashboard</h4>
								<ul class="breadcrumbs pull-left">
									<li><a href="admin.html">Home</a></li>
									<li><span>Admin</span></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="../assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo escape($admin->data()->username) ;?> <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="#">Settings</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- page title area end -->

				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
                          	<div class="col-lg-6 col-md-6 mt-5">
					
								<div class="row">
							
								
								</div>
								<div class="card card-bordered">
                                   <div class="card card-bordered">
									<div class="card-body">
										<h2 class="text-center">Change password</h2><hr>
										<form action="change_password.php" method="post">
				<?php
					if(Session::exists('profile_pass_a')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px; color:green" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('profile_pass_a') .'</p>           
                        </div>';
                               }
                           //print_r($error_mess);
						$i = 1;

						foreach ($error_mess as $key => $value) {
							foreach ($value as $key1 => $value1) {
								echo '<p style="color: red;">'.$i.':'.$value1.'</p><br>';

								$i++;
							}
						}

						?>
                                         <label for="text"><b>Password</b></label>
									<input type="password" placeholder="Password" name="password" required>
									<label for="text"><b>Password Again:</b></label>
									<input type="password" placeholder="Confirm Password" name="confirmpassword" required>
									<input type="hidden" name="token" value="<?php echo Token::generete();?>">
									<input type="submit" name="change" value="Change Password" style="width:100%" id="submit" class="btn btn-primary registerbtn">

										</form>
									</div>
								</div>

								
							</div>
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
