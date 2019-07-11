<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';
$user = new User();
$user = new User();
$notifi= $user->getNotify('users');
 foreach ($notifi as $key => $value):
 
?>
     

                <a class="notify-item clickme" href="user-all-table-view.php" noti-id="<?php echo $notifi[$key]['id']?>">
				<div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
				<div class="notify-text">

				<p><?php echo $notifi[$key]['name']  ?></p>
				<span>Just Now</span>
				</div>
				</a>

				<?php endforeach;  ?>