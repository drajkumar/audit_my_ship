<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';


?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Audit My Ship</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Free bootstrap template Atlas">
		<link rel="icon" href="assets/img/fa.png" sizes="32x32" type="image/png">
		<!-- custom.css -->
		<link rel="stylesheet" href="assets/css/custom.css">
		<!-- bootstrap.min.css -->
	
		<!-- font-awesome -->
		<link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">

		<!-- AOS -->
		<link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
                 
		<style>
			.containerr {
				position: absolute;
				right: 40px;
				top:150px;
				margin: 20px;
				max-width: 400px;
				padding: 30px;
				background-color: #00071F;
			}
			/* Add styles to the form containerr */

			/* Full-width input fields */
			input[type=text], input[type=password] {
				width: 100%;
				padding: 10px;
				margin: 20px 0 2px 0;
				border: none;
				background: #f1f1f1;
			}

			input[type=text]:focus, input[type=password]:focus {
				background-color: #ddd;
				outline: none;
			}

			/* Set a style for the submit button */

			.btnn:hover{
				color: white;
			}
			* {
				box-sizing: border-box;
			}
			.btnn:hover {
				opacity: 1;
			}
			.header{
				color:#00FFAD;
			}
			.header2{
				color:#00FFAD;
			}
			.label{
				color:#00FFAD;	
			}
			
			
			    <style type="text/css">
        .main_container{
            width: 60%;
            margin: 100px auto;
        }
        .outer_div{
            border: 5px solid #28E2A1;
            width: 125px;
            height: 100px;
        }
        .inner_div{
            background-color: #090916;
            width: 130px;
            height: 100px;
            margin: 15px 0px 0px 15px;
            color: #fff;
            //z-index: 2;
        }
        .inner_div h1{
            text-align: center;
            padding-top: 30px;
            overflow: hidden;
        }
        .left{
            float: left;
            margin-left: 100px;
        }
		</style>

	</head>

	<body>
		<!-- banner -->
		<div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(assets/img/s22.jpg);">
			<div class="container text-center text-md-left">
				<header>
					<div class="row justify-content-between">
						<div class="col-2">
							<img src="assets/img/LO1.png"  alt="logo">
						</div>
						<div class="col-6 align-self-center text-right">
							<?php
					if(Session::exists('registeruser')){
                      echo '<div class="alert alert-success alert-block">
                       <a class="close" data-dismiss="alert" href="#">×</a>
                       <h4 style="margin-left:60px" class="alert-heading">Success!</h4> '.
                       '<p style="font-size:15px; color:green; margin-left:60px">'.
                         Session::flash('registeruser') .'</p>           
                        </div>';
                               }?>
							<a href="registration.php" class="text-white lead">Didn't Sign up?</a>
						</div>
					</div>
				</header>
				<h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
					A New Morden<br>
					Shipping Business
				</h1>
				<p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="lead text-white my-4">
					Lorem ipsum dolor sit amet, id nec enim autem oblique, ei dico mentitum duo.
					<br> Illum iusto laoreet his te. Lorem partiendo mel ex. Ad vitae admodum voluptatum per.
				</p>
				<a href="#" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>
			</div>

			<!--login form--> 
			<div class="bg-img">
				
				<form action="index.php"  class="containerr" method="post">
					<h1 class="header text-center">Login</h1>
               <?php
                    if(Input::exists()){
					    if(Token::check(Input::get('token'))){
					    $validate = new Validation();
					    $validation = $validate->check($_POST, array(
					      'email'=> array('required' => true),
					      'password' => array('required' => true)
					    	));

					      if($validation->passed()){
					         $user = new Register_user();
					 
					         $login = $user->login(Input::get('email'), Input::get('password'));
					         if($login){
					           Redirect::to('user-dashboard.php');
					         }else{
					           echo '<h5 style="color:#FF4040; margin-left:40px;">Invalid Username and Password </h5>';
					         }
					      }else{
					      	 foreach($validation->errors() as $error){
					           echo $error . '<br>';
					      	 }
					      }
					  }
					  
					}

				  ?>

					<input type="text" placeholder="Enter Email" name="email" required>


					<input type="password" placeholder="Enter Password" name="password" required>
                     <input type="hidden" name="token" value="<?php echo Token::generete();?>">
					<input type="submit" style="width:100%" class="btn my-4 font-weight-bold atlas-cta cta-green" value="Login">
				</form>
			</div>
			<!--login form End--> 

		</div>
		<!-- three-blcok -->
		<div class="container my-5 py-2">
			<h2 class="text-center font-weight-bold my-5">FIND YOUR SERVICE .</h2>
			<div class="row">
				<div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
					<div class="outer_div left">
						<div class="inner_div">
							<h1><i class="fa fa-database" aria-hidden="true"></i></h1>
						</div>
						<br><h4>Shipping Audit</h4>
					</div>	
				</div>
				<div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
					<div class="outer_div left">
						<div class="inner_div">
							<h1><i class="fa fa-file-text" aria-hidden="true"></i></h1>
						</div>
						<br><h4>Shipping Audit</h4>
					</div>
				</div>
				<div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
					<div class="outer_div left">
						<div class="inner_div">
							<h1><i class="fa fa-map" aria-hidden="true"></i></h1>
						</div>
						<br><h4>Shipping Audit</h4>
					</div>
				</div>
			</div></div><br><br>
		<!-- Video-blcok -->
		<div class="container my-5 py-2">
			<!-- <h2 class="text-center font-weight-bold my-5">FIND YOUR SERVICE .</h2>-->
			<div class="row">
				<div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true" class="col-md-6 text-center">
					<br> <br> <h4>What VesselAdmin can do<br>for your business</h4><br>
				<p>
					VesselAdmin is a digital chartering solution.<br> 
					Discover how VesselAdmin can help your business become even more transparent, 
					while facilitating compliance. Here is how it works</p>
			</div>

			<div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true" class="col-md-6 text-center">
				<iframe width="400" height="250" src="https://www.youtube.com/embed/CzfN4OrCMaw">
				</iframe>
			</div>
		</div>
		</div>

	<!-- feature (skew background) -->
	<div class="jumbotron jumbotron-fluid feature" id="feature-first">
		<div class="container my-5">
			<div class="row justify-content-between text-center text-md-left">
				<div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6">
					<h2 class="font-weight-bold">Take a look inside</h2>
					<p class="my-4">Te iisque labitur eos, nec sale argumentum scribentur no,
						<br> augue disputando in vim. Erat fugit sit at, ius lorem deserunt deterruisset no.
						<br> augue disputando in vim. Erat fugit sit at, ius lorem deserunt deterruisset no.</p>

					<a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">Learn More</a>
				</div>
				<div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center">
					<img src="assets/img/sd.png" alt="Take a look inside" class="mx-auto d-block">
				</div>
			</div>
		</div>
	</div>

	<!-- contact -->
	<div class="jumbotron jumbotron-fluid" id="contact" style="background-image: url(assets/img/contact-bk.jpg);">
		<div class="container my-5">
			<div class="row justify-content-between">
				<div class="col-md-6 text-white">
					<h2 class="font-weight-bold">ABOUT US.</h2>
					<p class="my-4">
						Te iisque labitur eos, nec sale argumentum scribentur,
						<br> augue disputando in vim. Erat fugit sit at, ius lorem.
					</p>
					<ul class="list-unstyled">
						<li>Email : company_email@com</li>
						<li>Phone : 361-688-5824</li>
						<li>Address : 4826 White Avenue, Corpus Christi, Texas</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h2 class="font-weight-bold text-center header2">CONTACT US.</h2>
				     <form>


      <!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style=" text-align: center;" id="ownname" class="modal-title"></h4>
        
          
      </div>
      <div class="modal-body">
       <p style="font-size: 18px; text-align: center;" id="rest"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="this.form.reset()">Close</button>
        
      </div>
    </div>
  </div>
</div>




				     	<div id="errormes"></div>
				     	
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Your Name</label>
								<input type="name" class="form-control" id="name" required=true>
							</div>
							<div class="form-group col-md-6">
								<label for="Email">Your Email</label>
								<input type="email" class="form-control" id="email" required =true>
							</div>

						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" id="message" rows="3" ></textarea>
						</div>
						<button type="button" id="dome" class="btn font-weight-bold atlas-cta atlas-cta-wide cta-green my-3" data-toggle="modal">Send</button>
					<form>

				</div>
			</div>
		</div>
	</div>

	<!-- copyright -->
	<div class="jumbotron jumbotron-fluid" id="copyright">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
					Copyright © 2019 DEVELOPER ARENA.
				</div>
				<div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
					<a href="#" class="d-inline-block text-center ml-2">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a href="#" class="d-inline-block text-center ml-2">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a href="#" class="d-inline-block text-center ml-2">
						<i class="fa fa-medium" aria-hidden="true"></i>
					</a>
					<a href="#" class="d-inline-block text-center ml-2">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- AOS -->
	<script src="assets/js/aos.js"></script>
	<script type="text/javascript">
        	$(document).ready(function(){
           // $("#rest").hide();
             $("#dome").click(function(){
             	
              var name = $('#name').val();
    	      var email = $('#email').val();
    	      var message = $('#message').val();



    	       if(name == ''){
                $( "#errormes" ).text('Please enter name');
    	       }else if(email == ''){
                 $( "#errormes" ).text('Please enter email');
    	       }else if(message == ''){
                 $( "#errormes" ).text('Please type some message');
    	       }else{
    	       	$.ajax({
			  type: "POST",
			  url: "sendmessage.php",
			  data: {'name': name, 'email' : email, 'message' : message},
			  success:  function(data){
			  //	$("#rest").show();
			     $("#ownname").text('Hi!'+' '+name);
			  	 $("#errormes").hide();
			  	$( "#rest" ).text(data);
			    $("#exampleModal").modal();
            
			  }
			  
			   });
    	      }
                this.form.reset()
			       	       if(name == ''){
                $( "#errormes" ).text('Please enter name');
    	       }else if(email == ''){
                 $( "#errormes" ).text('Please enter email');
    	       }else if(message == ''){
                 $( "#errormes" ).text('Please type some message');
    	       }

             });
 

            });
        </script>

	<script>
		AOS.init({
		});
	</script>
	</body>

</html>