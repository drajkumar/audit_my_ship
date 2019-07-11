<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
	$userid = Input::get('user_id');
         $admin->updateUser('users', 'status', 'id', $userid);
          Session::flash('aprove_user', ' User is Successfully Accepted');
	      Redirect::to('user-all-table-view.php');


}else{
	Redirect::to('admin-login.php');
}
