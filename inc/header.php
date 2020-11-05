<?php require_once 'config.php';
ob_start();?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" ">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" ">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" ">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="main-navbar">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a style="font-family: 'Piedra', cursive;  " class="navbar-brand pl-1" href="index.php">I Wear </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="Shopping.php">Shop Now<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav pull-right">
            <?php if(isset($_SESSION['email'])):?>
                <li class="nav-item ">
                    <a class="nav-link" href="#"><?php echo $_SESSION['email']?> </a>
                </li>
            <?php endif;?>
            <?php if(!isset($_SESSION['email'])):?>
                <li class="nav-item ">
                    <a class="nav-link" href="buy_product.php">cart<?php if(isset($_SESSION['cart_j'])) echo "(".count($_SESSION['cart_j']).")"?> </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="login.php">Admin | Login </a>
                </li>

            <?php endif;?>

            <?php if(isset($_SESSION['email'])):?>
            <li class="nav-item ">
                <a class="nav-link" href="logout.php">Logout </a>
            </li>
            <?php endif;?>
        </ul>

    </div>
</nav>

</div>

