<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
if($admin->isLoggedIn()){


	if(isset($_POST['define'])){

		$user_id = $_POST['user_id'];
        
   
		$ship_id = $_POST['ship_id'];
		$imp = implode(",", $ship_id);
	
	
        $admin->update_all('users', 'id', $user_id, array(
           'define_ship' => $imp
            ));
		//}
         //Session::flash('define_ship', ' Ship Successfully Define for user');
          // Redirect::to('user-all-table-view.php');
	}
 


}else{
 Redirect::to('admin-login.php');
}

?>