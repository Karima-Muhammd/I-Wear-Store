<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'Classes/Product.php';
$id=$_GET['id'];
$pro=new Product();
$product=$pro->Get_Product($id);
$categories=$pro->GetAllCategories();
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name"  value="<?php echo $product['name'] ?>" class="form-control" placeholder="Product Name ..">
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $product['price']?>" type="text" name="price" class="form-control" placeholder="Price ..">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control"  name="descr" rows="3" placeholder="Description .."><?php  echo $product['descr']?></textarea>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo $product['quantity']?>" type="text" class="form-control" name="quantity"  placeholder="Available Quantity">
                        </div>
                        <div class="input-group mb-3 " style="border-radius: 4px">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categories</label>
                            </div>
                            <select name="cate_id" class="custom-select" id="inputGroupSelect01">
                                <?php foreach ($categories as $category):?>
                                    <option value="<?php echo $category['id']  ?>" <?php if($category['id']==$Cate_name['id']):?>
                                    selected
                                  <?php endif; ?> >
                                  <?php echo ucfirst($category['Cate_Name']) ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <input name="img" value="<?php echo $product['img']  ?>"  class="form-control" type="file" style="overflow: hidden" >
                        </div>
                        <button type="submit" name="update_btn" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    var_dump($product);
                    if(isset($_POST['update_btn']))
                    {

                        $data=[];
                        $data['name']=$_POST['name'];
                        $data['price']=$_POST['price'];
                        $data['descr']=$_POST['descr'];
                        $data['quantity']=$_POST['quantity'];
                        $data['cate_id']=$_POST['cate_id'];
                        $data['img']='Vera_dress-Dresses-.png';
                        if($pro->Update($id,$data))
                            $success_msg="Successfully Updated";
                        else
                            $error_msg="Failed Update Product";

                        require_once 'function/message.php';
                    }

                    ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <P class="text-center mt-5">No Product Found  !! </P>
    <?php endif;?>

</div>
