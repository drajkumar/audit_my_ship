<?php

require_once 'core/init.php';
require_once 'functions/sanitize.php';
require_once 'vendor/autoload.php';

$data = DB::getInstance()->query("SELECT * FROM users WHERE email = 'rajkumar@gmail.com' ")->count();

print_r($data);
?>