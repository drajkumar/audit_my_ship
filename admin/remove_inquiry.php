<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('inquiry_id');

 $admin->remove('inquiry', 'id', $id);

  Session::flash('inquiry_delete', ' Inquiry is Successfully Removed.');
      Redirect::to('view-inquiry.php');
}else{
 Redirect::to('admin-login.php');
}	

?>