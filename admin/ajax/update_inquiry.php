<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';
$user = new User();

 if(!empty($_REQUEST['inid'])){
  $up = $user->updateM('inquiry', 'status', 'status');
  if($up){
  // echo "Chatagori Deleted Successfully ...";
  }
 }
?>