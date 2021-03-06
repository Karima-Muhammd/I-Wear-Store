<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'helpers/Str.php';
require_once 'Classes/Product.php';
use helpers\Str;

$pro=new Product();
$Arr_products=$pro->Get_All_Products();
?>


<div class="shopping">
    <?php
    if(isset($_SESSION['email']))
    {
        require_once 'inc/subnav.php';
    }
   ?>
    <div class="container mt-5 mb-5">
      <div class="row">
          <?php if(!empty($Arr_products)):?>
           <?php foreach ($Arr_products as $product):?>
              <?php if ($product['quantity']!=0):?>
                 <div  class="col-md-3">
                <div class="card">
                    <img  style=" height:300px" src="assets/images/<?php echo $product['img']?>" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h6 class="card-title"><?php echo $product['name']?></h6>

                        <p style="margin-right: 30px;" class="card-title text-muted">- <?php echo '$'.$product['price']?></p>
                        <p style="font-weight: lighter" class="card-title "><?php echo Str::max_Letter($product['descr'],30)?></p>
                        <div class="mt-1">
                       <form action="" method="post">
                        <a  href="Show.php?id=<?php echo $product['id']?>" class="btn btn-success ">Show</a>

                           <?php if(isset($_SESSION['email'])):?>
                           <a href="Edit.php?id=<?php echo $product['id']?>" class="btn btn-primary ">Edit</a>
                           <a  data-id="<?php echo $product['id']?>" href="Delete.php?id=<?php echo $product['id']?>" class="btn btn-danger delete ">Delete</a>
                          <?php endif;?>
                       </form>

                        </div>
                    </div>
                </div>
            </div>

        <?php endif; endforeach;?>
          <?php else: ?>
          <h6 class="m-auto" >No Product Added Yet .</h6>
          <?php endif;?>

</div>
</div>
<?php
require_once 'inc/footer.php';
?>

