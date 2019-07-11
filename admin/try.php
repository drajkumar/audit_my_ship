<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$user = new Register_user();
$file_names = array();
if(isset($_POST['getd'])){

  $uni_code = $_POST['uni_code'];
  $gorup  = $_POST['group'];
  	 $files = glob('../uploads/'.$uni_code.'/'.$gorup.'/*');
  	 $rep = '../uploads/'.$uni_code.'/'.$gorup.'/'; // 
foreach($files as $file){ // iterate files
  if(is_file($file))
    $file_names[] = str_replace($rep, '', $file);  
}
$archive_file_name = $gorup.'.zip';
$file_path ='../uploads/'.$uni_code.'/'.$gorup.'/';

$zip = new ZipArchive;
$archive_file_name= $gorup.'.zip';
if($zip->open($archive_file_name,ZipArchive::CREATE)==true){
	foreach ($file_names as $file) {
		$zip->addFile($file_path.$file,$file);
	}
	$zip->close();
	 header("Content-type: application/octet-stream"); 
	 header("Content-Disposition: attachment; filename=$archive_file_name");
	 readfile($archive_file_name);
}
unlink('hull.zip');
}

?>




<form action="try.php" method="post">
	<input type="hidden" name="uni_code" value="5caf8c15d1558">
	<input type="hidden" name="group" value="hull">
<input type="submit" name="getd" value="Download">

</form>



