<?php
 class User{
 	private $_db,
 	        $_data,
 	        $_sessionName,
 	        $_isLoggedIn;

 	 public function  __construct($user = null){
      $this->_db = DB::getInstance();
      $this->_sessionName = Config::get('session/session_name');

      if(!$user){
      	if(Session::exists($this->_sessionName)){
          $user = Session::get($this->_sessionName);

          if($this->find($user)){
            $this->_isLoggedIn = true;
          }else{

          }
      	}
        
      }else{
      	$this->find($user);
      }
 	 }
/*
   public function update($fields = array(), $id = null){

    if(!$id && $this->isLoggedIn()){
      $id = $this->data()->id;
    }

    if(!$this->_db->update('product', $id, $fields)){
      throw new Exception("There was a problem updating...");
      
    }
  }
*/
   public function update_all_ship($table, $column, $sid,  $fields = array()){
    if(!$this->_db->updateship($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

      public function update_all($table, $column, $sid,  $fields = array()){
    if(!$this->_db->update($table, $column, $sid, $fields)){
      throw new Exception("There was a problem updating...");
    }

   }

   public function updateUser($table, $culam, $culam2, $id){
     $sql = "UPDATE {$table} SET {$culam} = 1 WHERE {$culam2} = '$id'";
     if(!$this->_db->updateManual($table, $sql)){
      throw new Exception("There was a problem updating...");
    }
   }
   public function updateM($table, $culam, $culam2){
     $sql = "UPDATE {$table} SET {$culam} = 0 WHERE {$culam2} = 1";
     if(!$this->_db->updateManual($table, $sql)){
      throw new Exception("There was a problem updating...");
    }
   }

   public function create($fields = array()){
       if(!$this->_db->insert('admin_users', $fields)){
          throw new Exception("There was a problem creating an account");
          
       }
   }

  public function create_all($table,$fields = array()){
       if($this->_db->insert($table, $fields)){
       
          return true;
       }
   }




  public function chatagori_create($fields = array()){
       if(!$this->_db->insert('product_catagori', $fields)){
          throw new Exception("There was a problem add chatagori...");
          
       }
   }


  public function get_all_usres($table, $culam, $value, $id){
      $sql = "SELECT * FROM {$table} WHERE {$culam} = $value ORDER BY $id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function get_all($table, $id){
      $sql = "SELECT * FROM {$table} ORDER BY $id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

      public function getNotify($table){
     $sql = "SELECT * FROM {$table} ORDER BY id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function getNotifycount($table, $culam){
     $sql = "SELECT * FROM {$table} WHERE $culam = 1";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

    public function getNotifyuser($table, $culam, $culam2){
     $sql = "SELECT * FROM {$table} WHERE {$culam} = '1' AND {$culam2} = '0' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
      public function getNotifycountuser($table, $culam, $culam2){
     $sql = "SELECT * FROM {$table} WHERE $culam = 1 AND $culam2 = 1";
      $data = $this->_db->getInfo($sql);
      return $data;
   }



     public function get_data($table){
      $sql = "SELECT * FROM {$table} ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

   public function row_one($table, $id){
     $sql = "SELECT * FROM {$table} WHERE id = '$id'";
     $data = $this->_db->row_new($sql);
     return $data;
   }

  public function get_gellery($table, $uni_code, $group_name){
      $sql = "SELECT * FROM {$table} WHERE uni_code = '$uni_code' AND group_name = '$group_name' ORDER BY id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function get_product_cata(){
      $sql = "SELECT DISTINCT main_catagori FROM product_catagori ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

    public function get_product_sub_cata_for_manu($value){
      $sql = "SELECT DISTINCT sub_chatagori FROM product_catagori WHERE main_catagori = '$value'";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

 public function get_product_sub_cata(){
      $sql = "SELECT * FROM product_catagori ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

      public function getData_main_cata1($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ORDER BY id DESC";
      $data = $this->_db->getInfo($sql);
      return $data;
   }
     public function getData_main_cata($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }



  public function getData_one($table, $culam ,$id){
      $sql = "SELECT * FROM {$table} WHERE $culam = '$id' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }

  public function search_result($table, $cluam, $search){
      $sql = "SELECT * FROM {$table} WHERE {$cluam} LIKE '$search%' ";
      $data = $this->_db->getInfo($sql);
      return $data;
   }


  public function remove($table, $column, $id){
     $this->_db->delete($table, array($column, '=', $id));
     return true;
   }

  


 	public function find($user = null){
       if($user){
         $field = (is_numeric($user)) ? 'id' : 'email';
         $data = $this->_db->get('admin', array($field, '=', $user));
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
        Session::put($this->_sessionName, $this->data()->id);
      }else{

         if($user){
          if($this->data()->password === Hash::make($password, $this->data()->salt)){
            Session::put($this->_sessionName, $this->data()->id);

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

   public function logout(){
    Session::delete($this->_sessionName);
    //session_destroy();
   }

 	public function isLoggedIn(){
 	 	return $this->_isLoggedIn;
 	 }
 }



?>