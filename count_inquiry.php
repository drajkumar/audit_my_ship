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

$data = $user->getNotifycount('reply_inquiry', 'user_id', $id, 'status');
$count = count($data);
//echo $count;

if($count == 0){
  echo '0';
}else{
 echo $count;
}

 }
}else{
 Redirect::to('index.php');
}
?>