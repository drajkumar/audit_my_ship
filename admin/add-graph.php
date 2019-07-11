<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
	$uni_code = Input::get('uni_code');
	if(isset($_POST['save'])){
		$score = $_POST;
		for($i = 'a'; $i <= 'u'; $i++){
			if($score[$i] == null){
				$score[$i] = 0;
			}
		}
		$condition = array_slice($score, 0, 14);
		$management = array_slice($score, 14, 22);
		$condition_score = ceil(array_sum($condition)/14);
		$management_score = ceil(array_sum($management)/7);
		$overall_score = floor(($condition_score + $management_score)/2);
		
		$insert = $admin->update_all_ship('ship_score', 'uni_code', $uni_code, array(
           'uni_code'=> $uni_code,
           'a' => $score['a'],
           'b' => $score['b'],
           'c' => $score['c'],
           'd' => $score['d'],
           'e' => $score['e'],
           'f' => $score['f'],
           'g' => $score['g'],
           'h' => $score['h'],
           'i' => $score['i'],
           'j' => $score['j'],
           'k' => $score['k'],
           'l' => $score['l'],
           'm' => $score['m'],
           'n' => $score['n'],
           'o' => $score['o'],
           'p' => $score['p'],
           'q' => $score['q'],
           'r' => $score['r'],
           's' => $score['s'],
           't' => $score['t'],
           'u' => $score['u'],
           'condition_score' => $condition_score,
           'management_score' => $management_score,
           'overall_score' => $overall_score
            ));
           
           Session::flash('graph_add', 'Ship Score is successfully calculated.');
           Redirect::to('add-graph.php?uni_code='.$uni_code);
           
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
		<link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="../assets/css/ccss.css">
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<link rel="stylesheet" href="../assets/css/upload.css">
		<!-- modernizr css -->
		<script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
					<?php 
						if(Session::exists('graph_add')){
				            echo '<div class="alert alert-success alert-block">
				             <a class="close" data-dismiss="alert" href="#">×</a>
				             <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
				             '<p style="font-size:15px; color:green; margin-left:60px">'.
				               Session::flash('graph_add') .'</p>           
				              </div>';
             			}
					?>
					<form action="" method="post">
					<div class="card-area">
						<div class="row">
							<?php   
							  $data = $admin->getData_main_cata('ship_score', 'uni_code', $uni_code);
												foreach ($data as $key => $value):


												?>

							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">

									<div class="card-body">
										<div class="container">
											<div class="text-center"><br>
												<h2 style="color:#0D8C6E">VESSEL GRADING</h2>	
											</div>
											<hr>			
											<label for="text"><b>VESSEL BUILDING QUALITY AND GENERAL APPEARANCE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="a" value="<?php echo $data[$key]['a']?>">
											<label for="text"><b>VESSEL HULL AND STRUCTURAL CONDITION </b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="b" value="<?php echo $data[$key]['b']?>">
											<label for="text"><b>FORECASTLE AND POOP DECK CONDITION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="c" value="<?php echo $data[$key]['c']?>">
											<label for="text"><b>MAIN DECK AND FITTINGS CONDITION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="d" value="<?php echo $data[$key]['d']?>">
											<label for="text"><b>BALLAST TANKS CONDITION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="e" value="<?php echo $data[$key]['e']?>">
											<label for="text"><b>ACCOMMODATION AND SUPERSTRUCTURE CONDITION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="f" value="<?php echo $data[$key]['f']?>">
											<label for="text"><b>BRIDGE AND NAVIGATION EQUIPMENT</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="g" value="<?php echo $data[$key]['g']?>">
											<label for="text"><b>FIREFIGHTING SYSTEM</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="h" value="<?php echo $data[$key]['h']?>">
											<label for="text"><b>LIFESAVING APPLIANCES</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="i" value="<?php echo $data[$key]['i']?>">
											<label for="text"><b>MACHINERY AND MACHINERY SPACES</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="j" value="<?php echo $data[$key]['j']?>">
											<label for="text"><b>SAFE WORKING PRACTICE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="k" value="<?php echo $data[$key]['k']?>">
											<label for="text"><b>POLLUTION PREVENTION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="l" value="<?php echo $data[$key]['l']?>">
											<label for="text"><b>CARGO SYSTEM</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="m" value="<?php echo $data[$key]['m']?>">
											<label for="text"><b>MANNING AND CREW QUALIFICATION</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="n" value="<?php echo $data[$key]['n']?>">			
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mt-5">
								<div class="card card-bordered">
									<div class="card-body">
										<div class="container">
											<div class="text-center"><br>
												<h2 style="color:#0D8C6E">MANAGEMENT GRADING</h2>	
											</div>
											<hr>
											<label for="text"><b>MANAGEMENT SYSTEM</b></label>
											<input type="number"  placeholder="INSERT YOUR SCORE" name="o" value="<?php echo $data[$key]['o']?>">
											<label for="text"><b>VESSEL SECURITY</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="p" value="<?php echo $data[$key]['p']?>">			
											<label for="text"><b>VESSEL INTELLIGENCE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="q" value="<?php echo $data[$key]['q']?>">			
											<label for="text"><b>CLASSIFICATION AND CERTIFICATIONS</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="r" value="<?php echo $data[$key]['r']?>">			
											<label for="text"><b>VESSEL MAINTENANCE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="s" value="<?php echo $data[$key]['s']?>">
											<label for="text"><b>PSC PERFORMANCE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="t" value="<?php echo $data[$key]['t']?>">
											<label for="text"><b>FLAG STATE PERFORMANCE</b></label>
											<input type="number" placeholder="INSERT YOUR SCORE" name="u" value="<?php echo $data[$key]['u']?>">	
										</div>
									</div>
								</div>
							</div>
                          <?php endforeach; ?>
						</div>
					</div>

					<input type="submit" style="width:100%" id="submit" class="btn btn-primary registerbtn" name="save" value="Save">
					</form>
				</div>


			</div>
			<!-- main content area end -->
			<!-- footer area start-->
				<?php require_once('footer.php') ?>
<?php
}else{
	Redirect::to('admin-login.php');
}

?>










