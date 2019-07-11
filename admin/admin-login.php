<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
                    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		.inputfieldship{
			border-radius: 20px;
			background-color: #ccc;
			height: 50px;
		}
		.shadowborder{
			text-shadow: 1px 1px 1px 1px;
		}
	</style>
</head>
<body>
	<div class="container">
  		<div class="row">
    		<div class="col-md-3"></div>
			<div class="col-md-6"  style="box-shadow: 0px 0px 30px 1px; margin-top: 80px; padding: 0px; border-radius: 20px;">
				<div class="form_header" style="background-color: #2e2375;border-radius: 20px 20px 0px 0px;">
					<h2 style="padding: 40px 0px; color: #eee;text-align: center;">Admin Login</h2>
				</div>
				<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

                            <?php
                    if(Input::exists()){
                        if(Token::check(Input::get('token'))){
                        $validate = new Validation();
                        $validation = $validate->check($_POST, array(
                          'email'=> array('required' => true),
                          'password' => array('required' => true)
                            ));

                          if($validation->passed()){
                             $user = new User();
                     
                             $login = $user->login(Input::get('email'), Input::get('password'));
                             if($login){
                               Redirect::to('index.php');
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
<div style="width: 80%; margin: 20px auto;">
	  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control inputfieldship" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control inputfieldship" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
</div>
<div class="text-center">
	<input type="hidden" name="token" value="<?php echo Token::generete();?>">
	  <input type="submit" type="submit" name="login" class="btn btn-primary btn-lg" value="Login" style="background-color: #2e2375;">
	  <br><br>

</div>
</form>
			</div>
			<div class="col-md-3"></div>
  		</div>
	</div>
</body>
</html>