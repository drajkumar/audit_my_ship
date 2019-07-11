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
 if(!empty($_REQUEST['nid'])){
  $up = $user->updateM('reply_inquiry', 'status', 'status', 'user_id', $id);
  if($up){
  
  }
 }
  }
}else{
 Redirect::to('index.php');
}
?>