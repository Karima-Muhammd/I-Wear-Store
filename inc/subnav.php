<?php
if(isset($_SESSION['email'])):

?>
<div class="sub-navbar"  >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a style="font-family: 'Piedra', cursive; font-size: 27px  " class="navbar-brand" href="Shopping.php">Shop Now</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto ">


                    <li class="nav-item ">
                        <a class="nav-link" href="Add.php"> Add Product</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Add_Cate.php"> Add Category</a>

                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">View Orders</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php endif;?>
