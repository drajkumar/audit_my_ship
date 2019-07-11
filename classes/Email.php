<?php
class Email{

public function sendmail($to, $subject, $message, $header){
	return mail($to, $subject, $message, $header);

}


}












?>