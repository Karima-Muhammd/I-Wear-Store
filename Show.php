<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'Classes/Product.php';
$id=$_GET['id'];
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
                <img  style=" height: 90%" src="assets/images/<?php echo $product['img']?>" class="img-fluid" alt="...">
            </div>
                <div class="col-md-6 mt-5 ">
                            <h6 class="card-title"><?php echo ucfirst($Cate_name['Cate_Name'])?></h6>
                            <h6 class="card-title"><?php echo ucfirst($product['name'])?></h6>
                            <p style="margin-right: 30px;" class="card-title text-muted">- <?php echo '$'.$product['price']?></p>
                            <p style="font-weight: lighter" class="card-title "><?php echo ($product['descr'])?></p>
                            <p style="margin-right: 30px;" class="card-title text-muted">Available Quantity :  <?php echo '$'.$product['quantity']?></p>
                    <form action="" method="post" class="mt-5">
                        <a  href="Shopping.php" class="btn btn-success ">Back</a>
                        <a href="#" class="btn btn-primary ">Edit</a>
                        <a href="#" class="btn btn-danger ">Delete</a>
                    </form>
                </div>
        </div>
    </div>
    <?php else: ?>
    <P class="text-center mt-5">No Product Found  !! </P>
    <?php endif;?>

</div>
