<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';
$user = new User();

 if(!empty($_REQUEST['mid'])){
  $up = $user->updateM('message', 'status', 'status');
  if($up){
  echo "Chatagori Deleted Successfully ...";
  }
 }
?>