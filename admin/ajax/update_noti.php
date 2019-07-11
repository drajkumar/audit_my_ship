<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';
$user = new User();
$user = new User();

 if(!empty($_REQUEST['nid'])){
  $up = $user->updateM('users', 'notification', 'notification');
  if($up){
  // echo "Chatagori Deleted Successfully ...";
  }
 }
?>