<?php
require_once 'config.php';
$id=$_GET['id'];
$x=0;

foreach ($_SESSION['cart_j'] as $cart_id)
{
  if($cart_id['id']==$id)
  {
      unset($_SESSION['cart_j'][$x]);
      $_SESSION['cart_j']=array_values($_SESSION['cart_j']);

  }
  $x+=1;
}
header('location:buy_product.php');?>