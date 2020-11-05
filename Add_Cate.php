<?php
require_once 'config.php';
$cate=new Category();
if(!isset($_SESSION['email']))
{
    header('location:index.php');
}
?>

<div class="product">
    <?php require_once 'inc/subnav.php'?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <p style="font-size:30px" class="text-center mb-3 ">Add New Product</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" name="name"  value="<?php if(isset($_POST['name'])) echo $_POST['name']?>" class="form-control" placeholder="Product Name ..">
                    </div>
                    <div class="text-center mb-4">
                    <button type="submit" style="width: 30%; text-align: center" name="add_btn" class="btn btn-success">Add Category</button>
                    </div>
                </form>
                <?php
                if(isset($_POST['add_btn']))
                {
                    $name=$_POST['name'];
                    $valid=new Validation();
                    if($valid->Is_Empty("Category Name",$name)&&$valid->wordCount("Category Name", $name,1 )&&$valid->Is_String( "Category Name",$name))
                    {
                        $res=$cate->Insert($name);
                        if($res)
                            $success_msg = "Successfully Added";
                        else
                            $error_msg = "This Category already exist";

                        require_once 'function/message.php';
                   }
                }
                ?>
            </div>
        </div>
    </div>

</div>
