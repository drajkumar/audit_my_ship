<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
      Redirect::to('unapprove.php');
	}else{
 if(!empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['message'])){
 	 $name = $_REQUEST['name'];
 	 $email = $_REQUEST['email'];
 	 $message = $_REQUEST['message'];
 	  $message = array(
	           'name'=> $name,
	           'email' => $email,
	           'message' => $message,
	           'send_at' => date('d:m:y,H:m:s'),
	           'status'        => 1
	            );

    $user->create_all('message', $message);

    echo "Message Successfully send.";
    
 }
  }
}else{
 Redirect::to('index.php');
}

