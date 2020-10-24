<?php
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'Classes/Product.php';
$pro=new Product();
$categories=$pro->GetAllCategories();
?>

<div class="product">
    <?php require_once 'inc/subnav.php'?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <p style="font-size:30px" class="text-center mb-3">Add New Product</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Product Name ..">
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" class="form-control" placeholder="Price ..">
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" name="descr" rows="3" placeholder="Description .."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="quantity"  placeholder="Available Quantity">
                        </div>
                        <div class="input-group mb-3 " style="border-radius: 4px">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categories</label>
                            </div>
                            <select name="cate_name" class="custom-select" id="inputGroupSelect01">
                                <?php foreach ($categories as $category):?>
                                <option value="<?php echo $category['id'] ?>" ><?php echo ucfirst($category['Cate_Name']) ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <input name="name" class="form-control" type="file" style="overflow: hidden" >
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

</div>
