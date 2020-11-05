<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'Classes/Product.php';

$id=$_GET['id'];
$_SESSION['prodID']=$id;
if(!isset($_SESSION['cart_j']))
{
    $_SESSION['cart_j']=[];
}

$pro=new Product();
$product=$pro->Get_Product($id);
$Cate_name=$pro->GetCategory($id);
?>

<div class="show-product">
<?php require_once 'inc/subnav.php'?>
    <?php if($product!=false):?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <img  style="border-radius: 10px"  src="assets/images/<?php echo $product['img']?>" class="img-fluid"  alt="...">
            </div>
                <div class="col-md-6 mt-5 ">
                            <h6 class="card-title"><?php echo ucfirst($Cate_name['Cate_Name'])?></h6>
                            <h6 class="card-title"><?php echo ucfirst($product['name'])?></h6>
                            <p style="margin-right: 30px;" class="card-title text-muted">- <?php echo '$'.$product['price']?></p>
                            <p style="font-weight: lighter"><?php echo ($product['descr'])?></p>
                            <p style="margin-right: 30px;" class="card-title text-muted">Available Quantity :  <?php echo $product['quantity']." "?>Piece</p>
                    <form action="" method="post" class="mt-5">
                        <a  href="Shopping.php" class="btn btn-success ">Back</a>
                        <?php if(!isset($_SESSION['email'])):?>
                            <form method="post" action="Show.php?id=<?php echo $product['id']?>">

                             <br>
                            <span class="d-inline" >Choose Quantity</span>
                            <input style="width: 60px;" onkeydown="return false;" type="number" class="form-control d-inline " min="1" max="<?php echo $product['quantity']?>" value="1" name="quantity"/>
                            <input class="btn btn-warning"  name="cart" type="submit" value="Add To Cart"/>
                               <?php
                               if(isset($_POST['cart']))
                               {
                                   $r=0;
                                   foreach ($_SESSION['cart_j'] as $cart)
                                   {
                                      $r=in_array($id,array($cart['id']));
                                   }
                                   if($r!=1)
                                   {
                                       $qu=$_POST['quantity'];
                                       $_SESSION['cart_j'][]= array(
                                           'id'=>$id,
                                           'quantity'=>$qu,
                                       );
                                       $success_msg="Successfully Added To Cart";
                                       require_once 'function/message.php';

                                   }
                                   else
                                   {
                                       $error_msg="This Product Already Exist";
                                       require_once 'function/message.php';
                                   }


                               }
                               ?>
                                <?php  if(isset($_POST['cart'])):?>
                                <?php endif;?>
                            </form>
                        <?php endif;?>

                        <?php if(isset($_SESSION['email'])):?>
                            <a href="Edit.php?id=<?php echo $product['id']?>" class="btn btn-primary ">Edit</a>
                            <a  data-id="<?php echo $product['id']?>" href="Delete.php?id=<?php echo $product['id']?>" class="btn btn-danger delete ">Delete</a>
                        <?php endif;?>

                    </form>
                </div>
        </div>
    </div>
    <?php else: ?>
    <P class="text-center mt-5">No Product Found  !! </P>
    <?php endif;?>

</div>
