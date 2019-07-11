<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
      Redirect::to('unapprove.php');
	}else{

  $id = Input::get('message_id');


 $user->remove('reply_inquiry', 'id', $id);

  Session::flash('inqu_delete', ' Message is Successfully Deleted');
      Redirect::to('message.php');


 }
}else{
 Redirect::to('index.php');
}
?>