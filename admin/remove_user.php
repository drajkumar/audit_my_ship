<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('user_id');
//echo $id;

$admin->remove('users', 'id', $id);
  Session::flash('user_delete', ' User Reject Successfully');
      Redirect::to('user-all-table-view.php');
}else{
 Redirect::to('admin-login.php');
}	

?>