<?php
require_once '../../core/init.php';
require_once '../../functions/sanitize.php';
require_once '../../vendor/autoload.php';
$user = new User();
$notifi= $user->getNotify('inquiry');
 foreach ($notifi as $key => $value):
 
?>
     

                <a class="notify-item clickme" href="view-inquiey.php" noti-id="<?php //echo $notifi[$key]['id']?>">
				<div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
				<div class="notify-text">

				<p><?php echo $notifi[$key]['name']  ?></p>
				<span>Just Now</span>
				</div>
				</a>

				<?php endforeach;  ?>