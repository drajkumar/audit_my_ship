<?php
require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';
$user = new Register_user();
if($user->isLoggedInuser()){
	if($user->data()->status == 0){
      Redirect::to('unapprove.php');
	}else{
$id = $user->data()->id;
$notifi= $user->getNotify('reply_inquiry', 'user_id', $id);
 foreach ($notifi as $key => $value):
 
?>
     

                <a class="notify-item clickme" href="view-inquiey.php" noti-id="<?php //echo $notifi[$key]['id']?>">
				<div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
				<div class="notify-text">

				<p><?php echo $notifi[$key]['message']  ?></p>
				<span>By Admin <?php echo $notifi[$key]['created_at']  ?></span>
				</div>
				</a>

				<?php endforeach;  ?>


<?php
 }
}else{
 Redirect::to('index.php');
}

?>