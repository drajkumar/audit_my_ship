<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('message_id');

 $admin->remove('message', 'id', $id);

  Session::flash('message_delete', ' Message is Successfully Deleted');
      Redirect::to('message.php');
}else{
 Redirect::to('admin-login.php');
}	

?>