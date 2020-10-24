<?php
require_once 'config.php';
$pro=new Product();
$id=$_GET['id'];

$product=$pro->Delete($id);
if($product)
{
    header('location:Shopping.php');
    $success_msg = 'Successfully Deleted';
}
else
{
    header('location:Shopping.php');
    $error_msg="Faild To Delete Product ";
}
require_once 'function/message.php';
?>
