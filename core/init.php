<?php
session_start();
date_default_timezone_set('GMT');
$GLOBALS['config'] = array(
 'mysql'=> array(
   'host'=> '127.0.0.1',
   'username'=>'root',
   'password'=>'',
   'db'  => 'ship'
 	),
 'remember'=> array(
     'cookie_name'=>'hash',
     'cookie_expiry'=>604800
 	),
 'session'=> array(
     'session_name'=>'user',
     'session_register' => 'register',
     'token_name' => 'token'
 	)
 );





?>