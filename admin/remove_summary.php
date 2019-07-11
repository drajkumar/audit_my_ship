<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('summary_id');
$uni_code = Input::get('uni_code');

 $admin->remove('summary', 'id', $id);

  Session::flash('view_delete', ' Summary is Successfully Deleted');
      Redirect::to('view-summary.php?uni_code='.$uni_code);
}else{
 Redirect::to('admin-login.php');
}	

?>