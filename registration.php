<?php
require_once 'core/init.php';
require_once 'core/country_name.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';

$user = new Register_user();

$error_mess = array();
$emcode = uniqid();
       if(Input::exists()){
          if(Token::check(Input::get('token'))){
           $validate = new Validation();
            $validation =  $validate->check($_POST, array(
               'title' => array(
               	     'required' =>true,
					  'max'      => 100 
							 ),
               'name' => array(
					 'required' =>true,
					 'max'      => 100 
							 ),

               'mobile' => array(
					 'required' =>true,
					 'max'      => 20 
							 ),
               'email' => array(
					 'required' =>true,
					 'max'      => 70 ,
					 'unique' => 'email'
							 ),
               'country' => array(
					 'required' =>true,
							 ),
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
                
                	 $register = array(
					   'title'=> Input::get('title'),
			           'name' => Input::get('name'),
			           'mobile' => Input::get('mobile'),
			           'email'=> Input::get('email'),
			           'country' => Input::get('country'),
			           'company' => Input::get('company'),
			           'password' => Hash::make(Input::get('password'), $salt),
			           'salt'       => $salt,
			           'emailalert' => 0,
			           'email_code' => $emcode,
			           'notification' => 1,
			           'createed' => date('d:m:y'),
			           'updated' => '',
			           'status'        => 0
			            );



                	$insert = $user->create_all('users', $register);
                	if($insert == true){

                   $to = Input::get('email');
                   $subject = 'Hi'. Input::get('name') . ' Confirm Your email ';
                    $message = '
								<html>
								<head>
								  <title>Confirm Your email</title>
								</head>
								<body>
								  <h1>https://www.auditmyship.com</h1>
								  <h2>Thank You For Registration in our website.</h2>
								  <table>
								    <tr>
								      <th><a href=www.auditmyship.com/active.php?emailcode='.$emcode.'>Confirm</a></th>
								    </tr>
								   <p>*Please Confirm your E-mail Account by clicking the Confirm Button.</p>
								  </table>
								</body>
								</html>
								';    
                                $headers[] = 'MIME-Version: 1.0';
								$headers[] = 'Content-type: text/html; charset=iso-8859-1';

								// Additional headers
								$headers[] = 'To:'.Input::get('name');
								$headers[] = 'From: <www.auditmyship.com>';
								$headers[] = 'Cc: www.auditmyship.com';
								$headers[] = 'Bcc: www.auditmyship.com';

								// Mail it
								mail($to, $subject, $message, implode("\r\n", $headers));

						Session::flash('registeruser', 'Account is successfuly created!  Please check mail and Confirm');
						 Redirect::to('registration.php');
                	}

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
		<link rel="stylesheet" href="assets/css/responsive.css">
		<link rel="stylesheet" href="assets/css/ccss.css">
		<!-- modernizr css -->
		<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	</head>

	<body>

		<div class="main-content-inner">
			<div class="row">
				
					<div class="container">
					<div style="width:70%; margin:0 auto;" class="bg-white">
						<div class="col-lg-12 col-md-12 mt-5">
							<div style="background-color:#2A2532;color:#0AE6A4" class="rounded-0 border border-secondary text-center pb-2"><br>
								<h2 >REGISTER NOW</h2>
								<a href="user-dashboard.php"><img style="width:300px;height:140px" src="assets/img/LO1.png" alt="logo"></a>
								
							</div>
						</div>
						
						<div class="col-lg-12 col-md-12 mt-5"> 
                           	<?php
					if(Session::exists('registeruser')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px; color:green" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('registeruser') .'</p>           
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
							<form action="" method="post">
								<div class="container">
									<label for="file"><b>Title *</b></label>&nbsp;&nbsp;&nbsp;
									<select type="text" id="category" name="title" required="true" class="browser-default custom-select">

										<option value="">Select</option>
										<option value="Mr">Mr</option>
										<option value="Ms.">Ms.</option>
										<option value="Dr.">Dr.</option>
										<option value="Captain">Captain</option>
									</select>
									<br><br>
									<label for="text"><b>Name *</b></label>
									<input type="text" name="name" placeholder="Enter Your Name">

									<label for="text"><b>Phone No. *</b></label>
									<input type="text" name="mobile" placeholder="Enter Your Phone No.">
									<label for="text"><b>Email Address: *</b></label>
									<input type="text" name="email" placeholder="Enter Your Email Address ">

									<label for="text"><b>Country *</b></label>
									<select type="text" id="category" name="country" required="true" class="browser-default custom-select">
										<option value="">Select</option>
										<?php
										foreach ($countries as $key => $value) {

										?>

										<option value="<?php echo $key;?>"><?php echo $value; ?></option>
										<?php  } ?>

									</select><br><br>
									<label for="text"><b>Company</b></label>
									<input type="text" name="company" placeholder="Enter Company Name">
									<label for="text"><b>Password *</b></label>
									<input type="password" name="password" placeholder="Enter Your Password">
									<label for="text"><b>Confirm Password</b></label>
									<input type="password" name="confirmpassword" placeholder="Confirm Password">
									<input type="hidden" name="token" value="<?php echo Token::generete();?>">
									<input type="submit" name="register" value="Register"  class="registerbtn"><br>
									<strong><label><b>Already Sign up?</b></label>
									<a href="index.php" style="color:#0D8C6E">Login Here</a></strong>
								</div>
							</form>

						</div>
					</div>
				</div>


				<!-- From end Here  -->
			</div>
		</div>

