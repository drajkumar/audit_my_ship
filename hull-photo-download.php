<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
function folderToZip($folder, &$zipFile, $subfolder = null) {
    if ($zipFile == null) {
        // no resource given, exit
        return false;
    }
    // we check if $folder has a slash at its end, if not, we append one
    $folder .= end(str_split($folder)) == "/" ? "" : "/";
    $subfolder .= end(str_split($subfolder)) == "/" ? "" : "/";
    // we start by going through all files in $folder
    $handle = opendir($folder);
    while ($f = readdir($handle)) {
        if ($f != "." && $f != "..") {
            if (is_file($folder . $f)) {
                // if we find a file, store it
                // if we have a subfolder, store it there
                if ($subfolder != null)
                    $zipFile->addFile($folder . $f, $subfolder . $f);
                else
                    $zipFile->addFile($folder . $f);
            } elseif (is_dir($folder . $f)) {
                // if we find a folder, create a folder in the zip 
                $zipFile->addEmptyDir($f);
                // and call the function again
                folderToZip($folder . $f, $zipFile, $f);
            }
        }
    }
}

//$user = new Register_user();
$file_names = array();
//if(isset($_POST['hulldownload'])){
  $uni_code = '5caf8c15d1558';
  $gorup  = 'hull';
  	 $files = glob('uploads/'.$uni_code.'/'.$gorup.'/*');
  	 $rep = 'uploads/'.$uni_code.'/'.$gorup.'/'; // 
foreach($files as $file){ // iterate files
  if(is_file($file))
    $file_names[] = str_replace($rep, '', $file);  
}
print_r($file_names);
$zip_file = $gorup.'.zip';
$file_path = 'uploads/5caf8c15d1558/hull/';
 // name for downloaded zip file

$z = new ZipArchive();
$z->open("test.zip", ZIPARCHIVE::CREATE);
folderToZip("$file_path", $z);
$z->close();

///Then download the zipped file.
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zip_file);
header('Content-Length: ' . filesize($zip_file));
readfile('test.zip');

//unlink($gorup.'.zip');
 //Redirect::to('hull-photo-download.php');
 
//}
?>
