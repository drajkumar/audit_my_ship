<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
$file_names = array();
if(isset($_POST['MachinerySpacesd'])){
  $uni_code = $_POST['uni_code'];
  $gorup  = $_POST['group'];
  	 $files = glob('uploads/'.$uni_code.'/'.$gorup.'/*');
  	 $rep = 'uploads/'.$uni_code.'/'.$gorup.'/'; // 
foreach($files as $file){ // iterate files
  if(is_file($file))
    $file_names[] = str_replace($rep, '', $file);
}
$archive_file_name= $gorup.'.zip';
$file_path = 'uploads/'.$uni_code.'/'.$gorup.'/';
zipFilesAndDownload($file_names,$archive_file_name,$file_path);
unlink($gorup.'.zip');
 Redirect::to('photo-folder.php?uni_code='.$uni_code);
}
?>