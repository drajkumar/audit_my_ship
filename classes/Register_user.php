<?php

class Register_user{

	private $_db,
 	        $_data,
 	        $_sessionuserName,
 	        $_isLoggedInuser;

 	 public function  __construct($user = null){
      $this->_db = DB::getInstance();
      $this->_sessionuserName = Config::get('session/session_register');

          if(!$user){
        if(Session::exists($this->_sessionuserName)){
          $user = Session::get($this->_sessionuserName);

          if($this->find($user)){
            $this->_isLoggedInuser = true;
          }else{

          }
        }
        
      }else{
        $this->find($user);
      }
      
 	 }


      public function find($user = null){
       if($user){
         $field = (is_numeric($user)) ? 'id' : 'email';
         $data = $this->_db->get('users', array($field, '=', $user));
          if($data->count()){
            $this->_data = $data->first();
            return true;
          }
       }
       return false;
   }

  public function login($username = null, $password = null){
      $user = $this->find($username);

      if(!$username && !$password && $this->exists()){
        Session::put($this->_sessionuserName, $this->data()->id);
      }else{

         if($user){
          if($this->data()->password === Hash::make($password, $this->data()->salt)){
            Session::put($this->_sessionuserName, $this->data()->id);

            return true;
          }
         }
     }
       return false;
   }

    public function data(){
     return $this->_data;
    }

  public function exists(){
    return (!empty($this->_data)) ? true : false;
   }
  public function isLoggedInuser(){
    return $this->_isLoggedInuser;
   }

   public function logout(){
    Session::delete($this->_sessionuserName);
    unset($this->_sessionuserName);
    //session_destroy();
   }


   public function update_all($table, $column, $sid,  $fields = array()){
    if(!$this->_db->update($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

      public function update_all2($table, $column, $sid,  $fields = array()){
    if(!$this->_db->updateship($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

  public function updateEmailCode($code){
     $sql = "UPDATE users SET emailalert = 1 WHERE email_code = $code ";
     if(!$this->_db->updateManual($table, $sql)){
      throw new Exception("There was a problem updating...");
    }
   }

      public function updateM($table, $culam, $culam2, $culam3, $id){
     $sql = "UPDATE {$table} SET {$culam} = 0 WHERE {$culam2} = 1 AND $culam3 = $id";
     if(!$this->_db->updateManual($table, $sql)){
      throw new Exception("There was a problem updating...");
    }
   }


      public function getNotifycount($table, $culam, $id, $culam2){
     $sql = "SELECT * FROM {$table} WHERE $culam = $id AND $culam2 = 1 ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function getNotify($table, $culam2, $id){
     $sql = "SELECT * FROM {$table} WHERE $culam2 = '$id' ORDER BY id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


     public function get_all($table){
      $sql = "SELECT * FROM {$table} ORDER BY `id` DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

    public function getEmailCode(){
      $sql = "SELECT email_code FROM users ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }





   public function getchat_product($table, $culam, $chata){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$chata' AND `status`= 1";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

     public function getData_one_cul($table, $culam, $id){
      $sql = "SELECT * FROM {$table} WHERE {$culam} = '{$id}' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


   public function shipLimit($table, $array){
      $sql = "SELECT * FROM {$table} WHERE id IN (".$array.")";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
  



     public function getGroupImage($id, $value){
      $sql = "SELECT * FROM `gallary_img` WHERE `uni_code` = '$id' AND group_name = '$value' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }



   public function get_main_cata($cluam, $table){
    $sql = "SELECT DISTINCT {$cluam} FROM {$table}";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  
     public function getData_main_cata($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
     public function search_result($table, $cluam, $search){
      $sql = "SELECT * FROM {$table} WHERE {$cluam} LIKE '$search%' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


   public function create_all($table,$fields = array()){
       if($this->_db->insert($table, $fields)){
          return true;
       }
   }

   public function create($fields = array()){
       if(!$this->_db->insert('register', $fields)){
          throw new Exception("There was a problem creating an account");
       }
   }

     public function remove($table, $column, $id){
     $this->_db->delete($table, array($column, '=', $id));
     return true;
   }

}



?>