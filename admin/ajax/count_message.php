<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';

$user = new User();
$data = $user->getNotifycount('message', 'status');
$count = count($data);
//echo $count;

if($count == 0){
  echo '0';
}else{
 echo $count;
}
?>