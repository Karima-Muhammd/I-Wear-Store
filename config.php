<?php
session_start();
require_once 'inc/header.php';
require_once 'Classes/DB.php';
require_once 'helpers/Str.php';
require_once 'Classes/Image.php';
require_once 'Classes/Product.php';
require_once 'Classes/Validation.php';
require_once 'Classes/Admin.php';
require_once 'Classes/Category.php';
require_once 'Classes/Order.php';
require_once 'Classes/OrderDetails.php';

use helpers\Str;