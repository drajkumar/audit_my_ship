<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('defect_id');
//echo $id;
$img = Input::get('img');
$uni_code = Input::get('uni_code');
$path = '../uploads/'.$uni_code.'/'.$img;
 $admin->remove('defect', 'id', $id);

 unlink($path);
  Session::flash('defect_delete', ' Defect is Successfully Deleted');
      Redirect::to('view-defect.php?uni_code='.$uni_code);
}else{
 Redirect::to('admin-login.php');
}	

?>