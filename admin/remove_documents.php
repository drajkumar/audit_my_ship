<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$id = Input::get('document_id');
$uni_code = Input::get('uni_code');
$file = Input::get('file');
$path = '../uploads/'.$uni_code.'/'.$ifile;
 $admin->remove('documents', 'id', $id);
 unlink($path);
  Session::flash('document_delete', ' Document is Successfully Deleted');
      Redirect::to('view-documents.php?uni_code='.$uni_code);
}else{
 Redirect::to('admin-login.php');
}	

?>