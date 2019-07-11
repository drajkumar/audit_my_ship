<?php

 class Cart{

 private $wasfound = false;
 private $sessionCart;

 public function __construct(){
 	//$this->sessionCart = Config::get('session/session_cart');
 }


 public function addItem($id, $q, $size, $color, $subtotal, $procode){
   $i = 0;
 if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array'])<1){
    $_SESSION['cart_array'] = array(0=>array('item_id'=>$id, 'quantity'=>$q, 'size'=>$size, 'color'=>$color, 'subtotal'=>$subtotal, 'procode'=>$procode));
 }else{
   foreach ($_SESSION['cart_array'] as $each_item) {
   	$i++;
    while(list($key, $value) = each($each_item)){
      if($key =='item_id' && $value == $id){
       array_splice($_SESSION['cart_array'], $i-1, 1, array(
       	array('item_id'=> $id, 'quantity'=>$each_item['quantity'], 'size'=>$size, 'color'=>$color, 'subtotal'=>$subtotal, 'procode'=>$procode)));
       $this->wasfound = true;
      }

    }
   }
   if($this->wasfound == false){
      array_push($_SESSION['cart_array'], array('item_id'=> $id, 'quantity'=>$q, 'size'=>$size, 'color'=>$color, 'subtotal'=>$subtotal, 'procode'=>$procode));
   }
 }
 }

 public function getItem(){
  if(isset($_SESSION['cart_array'])){
   return $_SESSION['cart_array'];
  }else{
    echo '';
  }
 	
 }

 public function removeItem($id){
    if(count(@$_SESSION['cart_array'])<=1){
     unset($_SESSION['cart_array']);
  }else{
    unset($_SESSION['cart_array'][$id]);
    sort($_SESSION['cart_array']);
  }
 }


 public function updateQuantity($id, $quantity, $size, $color, $newsub, $procode){
    $i = 0;
     foreach ($_SESSION['cart_array'] as $each_item) {
    $i++;
    while(list($key, $value) = each($each_item)){
      if($key =='item_id' && $value == $id){
       array_splice($_SESSION['cart_array'], $i-1, 1, array(
        array('item_id'=> $id, 'quantity'=>$quantity, 'size'=>$size, 'color'=>$color, 'subtotal'=>$newsub, 'procode'=>$procode)));
      }

    }
   }
 }


}

?>