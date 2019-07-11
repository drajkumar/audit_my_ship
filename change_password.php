<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
      Redirect::to('unapprove.php');
	}else{
 $id = $user->data()->id;
   $error_mess = array();
    $date = date('Y-m-d H:i:s');
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

                	    $user->update_all2('users', 'id', $id, array(
				           'password' => Hash::make(Input::get('password'), $salt),
				           'salt'       => $salt,
				           'updated' => $date
				          ));
						Session::flash('profile_pass', 'Password is successfuly Change');
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
		<link rel="shortcut icon" type="image/png" href="assets/img/icon/favicon.ico">
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
								<li class="active" >
									<a href="user-dashboard.php"  class="active" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
								</li>
								<li>
									<a href="message.php" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Messages
										</span></a>

								</li>
								<li>
									<a href="" aria-expanded="true"><i class="fa fa-ship" area="hiddden"></i><span>Profile</span></a>
								<ul class="collapse">
										<li><a href="profile.php">Update Profile</a></li>
										<li><a href="change_password.php">Change password</a></li>
									</ul>
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
										<span class="notify-title">You have new notifications <a href="message.php">view all</a></span>
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
						<div class="col-sm-6">
							<div class="breadcrumbs-area clearfix">
								<h4 class="page-title pull-left">Dashboard</h4>
								<ul class="breadcrumbs pull-left">
									<li><a href="user-dashboard.php">Home</a></li>
									<li><span>User</span></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 clearfix">
							<div class="user-profile pull-right">
								<img class="avatar user-thumb" src="assets/img/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown">
									
									 <?php echo escape($user->data()->name) ;?>  <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="message.php">Message</a>
									<a class="dropdown-item" href="profile.php">Profile</a>
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
							
					
							<div class="col-lg-6 col-md-6 mt-5 ">
								<div class="card card-bordered">
                                   <div class="card card-bordered">
									<div class="card-body">
										<h2 class="text-center">Change password</h2><hr>
										<form action="change_password.php" method="post">
				<?php
					if(Session::exists('profile_pass')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px; color:green" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('profile_pass') .'</p>           
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
					
						
						</div></div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


	</body>

</html>
<?php
 }
}else{
 Redirect::to('index.php');
}

?>
