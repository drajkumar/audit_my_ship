<?php

require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';

$admin = new User();
if($admin->isLoggedIn()){
$error_mess = array();
                        if(Input::exists()){

							  if(Token::check(Input::get('token'))){
							     $validate = new Validation();
							     $validation =  $validate->check($_POST, array(
							        'username' => array(
							           'required' =>true,
							           'max'      => 100 
							        	),
							        'email' => array(
							          'required' => true
							      
							          
							        	),
							        
							        'password' => array(
							          'required' => true,
							          'max'      => 64,
							          'min'      => 8
							        	),

							        'confirm_password' => array(
							          'required' => true,
							          'matches'  => 'password',
							          'max'      => 64,
							          'min'      => 8
							        	)
							        
							    	));

							     if($validation->passed()){
                                         $salt = Hash::salt();

								 	        $register = array(
								           'username'=> Input::get('username'),
								           'email' => Input::get('email'),
								           'password' => Hash::make(Input::get('password'), $salt),
								            'salt'       => $salt
								          
								            );

								           $admin->create_all('admin', $register);
										    Session::flash('registeruser', 'Account is successfuly created');
								            Redirect::to('admin-registration.php');
											  
											

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
	<title>AUDIT MY SHIP</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../assets/img/icon/favicon.ico">
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
					<div style="width:600px; margin:0 auto;" class="login-area">
						<div style="background-color: #fafaff;">

							<form action="" method="post">
								<div class="container">
									<div class="text-center"><br>
										<h2 style="color:#0D8C6E">ADMIN REGISTRATION</h2>
										<p style="color:#0D8C6E">Make a new admin to your system.</p>
										<?php
											if(Session::exists('registeruser')){
						                      echo '<div class="alert alert-success alert-block">
						                       <a class="close" data-dismiss="alert" href="#">×</a>
						                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
						                       '<p style="font-size:15px; color:green; margin-left:60px">'.
						                         Session::flash('registeruser') .'</p>           
						                        </div>';
						                               }
						                           //print_r($error_mess);
												$i = 1;

												foreach ($error_mess as $key => $value) {
													foreach ($value as $key1 => $value1) {
														echo $i.': '.$value1.'<br/>';

														$i++;
													}
												}

					                     	?>
									</div>
									<hr>
									<label for="text"><b>Admin Username</b></label>
									<input type="text" placeholder="Admin Username" name="username">
									<label for="text"><b>Admin Email</b></label>
									<input type="text" placeholder="Admin Email" name="email">

									<label for="password"><b>Admin Password</b></label>
									<input type="password" placeholder="Password" name="password">
									<label for="password"><b>Confirm Password</b></label>
									<input type="password" placeholder="Confirm Password" name="confirm_password">
									<br>

									<input type="hidden" name="token" value="<?php echo Token::generete();?>">
									<input type="submit" class="registerbtn" name="register" value="Register"><br>
								</div>
							</form>

						</div>
					</div>


					<!-- From end Here  -->


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
