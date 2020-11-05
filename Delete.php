<?php
require_once 'config.php';
if(isset($_SESSION['email']))
{
    $pro=new Product();
    $id=$_GET['id'];
        //delete image in original project
        $product=$pro->Get_Product($id);
        $img=$product['img'];
        unlink('assets/images/'.$img);

        //delete product
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
}
else
    header('location:index.php');
?>
