<?php

class Upload{
 protected $destination;
 	protected $messages = array();
	protected $maxSize = 204800;
	public $getname = array();	
	protected $permittedTypes = array(
			'image/jpeg',
			'image/pjpeg',
			'image/gif',
			'image/png',
			'image/webp',
			'application/pdf',
			'application/vnd.ms-excel',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
	);
	protected $newName;
    protected $typeCheckingOn = true;
	protected $notTrusted = array('bin', 'cgi', 'exe', 'js', 'pl', 'php', 'py', 'sh', 'sql');
	protected $suffix = '.upload';
	protected $renameDuplicates;

	public function __construct($uploadFolder)
	{
		$this->destination = $uploadFolder;
	}


	public function setMaxSize($bytes){
		$serverMax = self::convertToBytes(ini_get('upload_max_filesize'));
		if($bytes > $serverMax){
         throw new Exception('Maximum size cannot exceed server limit for individual files: '.self::convertFromBytes($serverMax));
         
		}
		if(is_numeric($bytes) && $bytes > 0){
          $this->maxSize = $bytes;
		}
		
	}

	public static function convertToBytes($val){
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		if (in_array($last, array('g', 'm', 'k'))){
			switch ($last) {
				case 'g':
					$val *= 1024;
				case 'm':
					$val *= 1024;
				case 'k':
					$val *= 1024;
			}
		}
		return $val;
	}
	
	public static function convertFromBytes($bytes){
		$bytes /= 1024;
		if ($bytes > 1024) {
			return number_format($bytes/1024, 1) . ' MB';
		} else {
			return number_format($bytes, 1) . ' KB';
		}
	}

	public function allowAllTypes($suffix = null){
		$this->typeCheckingOn = false;
		if (!is_null($suffix)) {
			if (strpos($suffix, '.') === 0 || $suffix == '') {
				$this->suffix = $suffix;
			} else {
				$this->suffix = ".$suffix";
			}
		}
	}


	public function upload(){
      $uploaded = current($_FILES);
     if(is_array($uploaded['name'])){

     foreach ($uploaded['name'] as $key => $value) {
       $current['name'] = $uploaded['name'][$key];
       $current['type'] = $uploaded['type'][$key];
       $current['tmp_name'] = $uploaded['tmp_name'][$key];
       $current['error'] = $uploaded['error'][$key];
       $current['size'] = $uploaded['size'][$key];
       if($this->checkFile($current)){
          $this->moveFile($current);
       }
     }

     }else{
       if($this->checkFile($uploaded)){
        $this->moveFile($uploaded);
      }
     }



	}

    public function getname(){
     return $this->getname;
   }

	public function getMessage(){
		return $this->messages;
	}



	protected function checkFile($file){
       if($file['error'] !=0){
         $this->getErrorMessage($file);
         return false;
       }
       if(!$this->checkSize($file)){
        return false;
       }
       if($this->typeCheckingOn){
	      if(!$this->checkType($file)){
	       return false;
	      }
	   }
       $this->checkName($file);
      return true;
	}



	protected function getErrorMessage($file){
       switch($file['error']){
         case 1:
         case 2:
            $this->messages[] = $file['name'] . ' is too big: (max: ' . 
			self::convertFromBytes($this->maxSize) . ').';
             break;
         case 3:
            $this->messages[] = $file['name'] . ' was only partially uploaded.';
             break;
         case 4:
             $this->messages[] = 'Chose a file.';
             break;
         default:
            $this->messages[] = 'Sorry, there was a problem uploading ' . $file['name'];
             break;

       }
	}

	protected function checksize($file){
      if($file['size'] = 0){
        $this->messages[] = $file['name'] . ' is empty.';
      }elseif ($file['size'] > $this->maxSize) {
        $this->messages[] = $file['name'] . ' exceeds the maximum size for a file ('
		. self::convertFromBytes($this->maxSize) . ').';	
      }else{
      	return true;
      }
	}

	protected function checkType($file){
      if(in_array($file['type'], $this->permittedTypes)){
         return true;
      }else{
 		$this->messages[] = $file['name'] . ' is not permitted type of file.';
		return false;      
      }
	}


/*
	protected function checkName($file){
      $this->newName = null;
      $nospaces = str_replace(' ', '_', $file['name']);
      if($nospaces != $file['name']){
        $this->newName = $nospaces;
      }
      $namepart = pathinfo($nospaces);
      $extension = isset($namepart['extension']) ? $namepart['extension'] : '';
      if(!$this->typeCheckingOn && !empty($this->suffix)){
        if(in_array($extension, $this->notTrusted) || empty($extension)){
          $this->newName = $nospaces . $this->suffix;
        }
      }
	}
	*/

	protected function checkName($file){
       $this->newName = null;
       //$nospaces =  $file['name'];
       //$namepart = pathinfo($nospaces, PATHINFO_EXTENSION);
       //$code = md5(uniqid(rand(), true));
       $nospaces = str_replace(' ', '_', $file['name']);
       $this->newName =  $nospaces;

	}

	protected function moveFile($file){

		$filename = isset($this->newName) ? $this->newName : $this->newName;
		$success = move_uploaded_file($file['tmp_name'], $this->destination . $filename);
		if($success){
		$result = $file['name'] . ' was uploaded successfully';
		$this->messages[] = $result;
		if(!is_null($this->newName)){
         $this->getname[] = $this->newName;
         }
	  }else{
        $this->messages[] = 'Could not upload ' . $file['name'];
	  }
	}

	public function newname(){
		return $this->newName;
	}


}

?>