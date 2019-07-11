<?php
class Token{
	public static function generete(){
	  return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}

	public static function check($token){
      $tokenName = Config::get('session/token_name');

      if(Session::exists($tokenName) && $token = Config::get($tokenName)){
         Session::delete($tokenName);
         return true;
      }
      return false;
	} 
}




?>