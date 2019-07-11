<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('id');
//echo $id;
$img = Input::get('img');
$uni_code = Input::get('uni_code');
$group = Input::get('group');
$path = '../uploads/'.$uni_code.'/'.$img;
 $admin->remove('gallary_img', 'id', $id);

 unlink($path);
  Session::flash('image_delete', ' Image is Successfully Deleted');
      Redirect::to('view-group-image.php?uni_code='.$uni_code.'&group='.$group);
}else{
 Redirect::to('admin-login.php');
}	

?>