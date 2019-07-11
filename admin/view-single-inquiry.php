<?php
date_default_timezone_set('UTC');
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
 $id = Input::get('inquiry_id');
        if(isset($_POST['save'])){
                	
	                $user_id = $_POST['user_id']; 
	                 $reply  = $_POST['reply']; 	
	                	 $inquiry = array(
						   'user_id'=> $user_id,
				           'message' =>$reply ,
				           'created_at' => date('Y-m-d'),
				           'status' => 1
				           
				            );

	             $insert =  $admin->create_all('reply_inquiry', $inquiry);
                if($insert == true){
	         	Session::flash('inquery_reply', 'Inquery Reply is successfuly Send.');
				Redirect::to('view-inquiry.php');
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
		<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/themify-icons.css">
		<link rel="stylesheet" href="../assets/css/metisMenu.css">
		<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="../assets/css/slicknav.min.css">\
		<link rel="stylesheet" href="../assets/css/ccss.css">
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
					<div class="card-area">
						<div class="row">
							<div class="col-lg-12 col-md-12 mt-5">
								<h3 class="text-center" style="color:#0D8C6E">Name Asked For A Quotation</h3>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">

								<div class="single-table">
									<div class="table-responsive">
										<table class="table text-center">
											<tbody>
												<?php
												$user_id = '';
                                                 $data = $admin->getData_one('inquiry', 'id', $id);
                                                  foreach ($data as $key => $value):
                                                  	$user_id = $data[$key]['user_id'];
                                                  
												?>
												<tr>
													<td>Name</td>
													<td><?php echo $data[$key]['name']?></td>
												</tr>
												<tr>
													<td>Company Name</td>
													<td><?php echo $data[$key]['company_name']?></td>
												</tr>
												<tr>
													<td>Phone No.</td>
													<td><?php echo $data[$key]['phone']?></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><?php echo $data[$key]['email']?></td>
												</tr>
												<tr>
													<td>From Date</td>
													<td><?php echo $data[$key]['form_date']?></td>
												</tr>
												<tr>
													<td>To Date</td>
													<td><?php echo $data[$key]['to_date']?></td>
												</tr>
												<tr>
													<td>Location</td>
													<td><?php echo $data[$key]['location']?></td>
												</tr>
												<tr>
													<td>Inquery Type</td>
													<td><?php echo $data[$key]['aduit_type']?></td>
												</tr>
												<tr>
													<td>Additional Information</td>
													<td><?php echo $data[$key]['additional_Information']?></td>

												</tr>
												<?php endforeach;?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">
									
								<form action="" method="post">
									

									<label style="display:block" for="text"><b>Your Reply</b></label>
									<textarea class="form-control" rows="14" name="reply" required></textarea>
									<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
									<input type="hidden" name="token" value="<?php echo Token::generete();?>">
									<input type="submit" class="registerbtn" name="save" value="Reply">


								</form>

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
