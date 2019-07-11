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
									<input type="text" name="search" placeholder="Search Your Ship..." required>
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
									<a class="dropdown-item" href="change_password.php">Setting</a>
									<a class="dropdown-item" href="logout.php">Log Out</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- page title area end -->
<?php
 if(Session::exists('ship_delete')){
            echo '<div class="alert alert-success alert-block">
             <a class="close" data-dismiss="alert" href="#">×</a>
             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
             '<p style="font-size:15px; color:green; margin-left:60px">'.
               Session::flash('ship_delete') .'</p>           
              </div>';
             }
             ?>
				<div class="main-content-inner">
					<div class="card-area">
						<div class="row">
                           
							<?php
							 
							   
                              $shipinfo = $admin->get_all('shipall', 'id');
                               foreach ($shipinfo as $key => $value) {

                               	?>
                               
                         
							<div class="col-lg-3 col-md-6 mt-5">
								<div class="card card-bordered h-100" style="position: relative;">
									<img class="card-img-top img-fluid " src="../uploads/<?php echo $shipinfo[$key]['picture']?>" alt="image">
									
									<div class="card-body">
										<h4 class="title"><?php echo $shipinfo[$key]['shipname']?></h4>
										<a href="update.php?uni_code=<?php echo $shipinfo[$key]['ship_unicode'];?>" class="btn btn-success btn-sm">Update</a>

										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog modal-dialog-centered" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Delete Ship</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        Do you really want to Delete?
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
										        <a href="remove.php?uni_code=<?php echo $shipinfo[$key]['ship_unicode'];?>&img=<?php echo $shipinfo[$key]['picture']?>" class="btn btn-danger">Yes</a>
										      </div>
										    </div>
										  </div>
										</div>




										<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete</a>
										
									</div>
								</div>
							</div>
							<?php }?>

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
		<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/owl.carousel.min.js"></script>
		<script src="../assets/js/metisMenu.min.js"></script>
		<script src="../assets/js/jquery.slimscroll.min.js"></script>
		<script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- others plugins -->
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/scripts.js"></script>
			<script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){

          function loadnoti(){
         	$("#counter").load("ajax/count_noti.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#tiuser").click(function(){
        
            var nid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_noti.php",
			  data: {'nid': nid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti").load("ajax/get_noti.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadnoti();

		}, 500);

});
       </script>

       <script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){

          function loadmessage(){
         	$("#counter2").load("ajax/count_message.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#timess").click(function(){
        
            var mid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_message.php",
			  data: {'mid': mid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti2").load("ajax/get_message.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadmessage();

		}, 500);

});
       </script>

        <script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){

          function loadmessage(){
         	$("#counter3").load("ajax/count_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#tiinqu").click(function(){
        
            var inid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_inquiry.php",
			  data: {'inid': inid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti3").load("ajax/get_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadmessage();

		}, 500);

});
       </script>
	</body>

</html>
<?php
}else{
 Redirect::to('admin-login.php');
}

?>
