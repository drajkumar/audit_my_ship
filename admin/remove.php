<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){
$uni_code = Input::get('uni_code');
$img = Input::get('img');

 $admin->remove('shipall', 'ship_unicode', $uni_code);
 $admin->remove('indntification', 'uni_code', $uni_code);
 $admin->remove('dimensions', 'uni_code', $uni_code);
 $admin->remove('classification', 'uni_code', $uni_code);
 $admin->remove('classhistory', 'uni_code', $uni_code);
 $admin->remove('hull', 'uni_code', $uni_code);
 $admin->remove('machinery', 'uni_code', $uni_code);
 $admin->remove('electrical_installations', 'uni_code', $uni_code);
 $admin->remove('boilers', 'uni_code', $uni_code);

 $admin->remove('gallary_img', 'uni_code', $uni_code);
 $admin->remove('summary', 'uni_code', $uni_code);
 $admin->remove('documents', 'uni_code', $uni_code);
 $admin->remove('defect', 'uni_code', $uni_code);
  $admin->remove('ship_score', 'uni_code', $uni_code);

 unlink('../uploads/'.$img);
 $files = glob('../uploads/'.$uni_code.'/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
    
}
 rmdir('../uploads/'.$uni_code);


  Session::flash('ship_delete', ' Ship information is Successfully Deleted');
            Redirect::to('index.php');
}else{
 Redirect::to('admin-login.php');
}	

?>