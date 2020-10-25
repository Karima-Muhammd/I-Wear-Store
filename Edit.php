<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'Classes/Product.php';
require_once 'Classes/Image.php';
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
                    <img  style="height: 90%" src="assets/images/<?php echo $product['img']?>" class="img-fluid">
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
                            <input name="img" value=""  class="form-control" type="file" style="overflow: hidden" >
                        </div>
                        <button type="submit" id="edit_btn" name="update_btn" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                        $name=$_POST['name'];
                        $price=$_POST['price'];
                        $descr=$_POST['descr'];
                        $quantity=$_POST['quantity'];
                        $cate_id=$_POST['cate_id'];
                        $img=$_FILES['img'];
                        if(true)
                        {
                            $data=[
                                'name'=>$name,
                                'price'=>$price,
                                'descr'=>$descr,
                                'quantity'=>$quantity,
                                'cate_id'=>$cate_id,
                                'img'=>$img,
                        ];

                            if($pro->Update($id,$data)) {
                                $success_msg = "Successfully Updated";
                                header('location:Shopping.php');
                            }
                            else
                                $error_msg="Failed Update Product";

                            require_once 'function/message.php';


                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <P class="text-center mt-5">No Product Found  !! </P>
    <?php endif;?>

</div>
