<?php
require_once '../core/init.php';
require_once '../functions/sanitize.php';
require_once '../vendor/autoload.php';
$admin = new User();
$admin->logout();

Redirect::to('admin-login.php');
?>