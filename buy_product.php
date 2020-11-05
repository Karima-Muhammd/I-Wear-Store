<?php
require_once 'config.php';

?>
    <div class="row ml-2 mr-2 mt-5">
        <div class="col-md-8">
            <?php  if(!empty($_SESSION['cart_j'])): ?>
                <div style="overflow-y:scroll; height:300px">

                <table class="table text-center table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Remove</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                $x=1;
                $price=0;
                  foreach ($_SESSION['cart_j'] as $cart_Id):

                          $pro=new Product();
                          $product=$pro->Get_Product($cart_Id['id']);
                          $category=$pro->GetCategory($cart_Id['id']);?>

                          <th scope="row"><?php echo $x?></th>
                          <td><?php echo $product['name']?></td>
                          <td><?php echo $product['descr']?></td>
                          <td><?php echo $product['price']?>$</td>
                          <td><img width="160px" height="160px" src="assets/images/<?php echo $product['img']?>" alt=""></td>
                          <td><?php echo $category['Cate_Name']?></td>
                          <td><?php echo $cart_Id['quantity']?></td>

                           <td>
                              <form  action="delete_item.php?id=<?php echo $product['id']?>" method="post">
                               <input style="height: 24px;width: 18px; padding:0" type="submit" name="de_btn" class="btn btn-danger" value="x">
                              </form>
                          </td>


                      </tr>

                  <?php $x++;  endforeach; ?>

                <?php ?>

                </tbody>
                </table>
                </div>

            <?php else:?>
                          <p class="text-center">No Products in Cart<p>
                <?php endif;?>

        </div>
        <?php  if(!empty($_SESSION['cart_j'])):?>
        <div STYLE="margin-top:1% ;" class="col-md-3">
            <h6 class="text-center">We Need Some Information to Complete Order </h6>
            <form action="" method="post" autocomplete="off" >
                <div class="form-group">
                    <input  type="text" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>"  placeholder="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <input  type="text" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"  placeholder="Email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <input type="text"  value="<?php if(isset($_POST['address'])) echo $_POST['address']?>" placeholder="Address" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <input  type="text" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']?>"  placeholder="Phone" class="form-control" name="phone">
                </div>
                <button type="submit"  name="check_btn" class="btn btn-success">Check Out </button>
            </form>
            <?php

                    if(isset($_POST['check_btn'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $valid = new Validation();
                        if ($valid->Is_Empty("Name", $name) && $valid->wordCount('Name',$name,2)&& $valid->Is_Empty("Email", $email) && $valid->Is_Empty("Address", $address) && $valid->Is_Empty("Phone", $phone))
                        {
                            if ($valid->Email_Validation("Email", $email)&&$valid->LetterEqual('Phone',$phone,10))
                            {
                                $ord = new Order();
                                $result1 = $ord->Insert_order($name, $email, $phone, $address);
                                if ($result1) {

                                    foreach ($_SESSION['cart_j'] as $cart_id)
                                    {
                                        $pro = new Product();
                                        $product = $pro->Get_Product($cart_id['id']);
                                        $ord = new Order();
                                        $order = $ord->Get_Order($email);
                                        $orderDetails = [
                                            'order_id' => $order['id'],
                                            'product_id' => $product['id'],
                                            'price' => $product['price'],
                                            'number_Of_Quantity' =>$cart_id['quantity'] ,
                                            'total_price' => ($cart_id['quantity'] * $product['price']),
                                        ];
                                        $ordD = new OrderDetails();
                                        $result2 = $ordD->Insert($orderDetails);
                                        //  $update_qu=$pro->Update_Quantity($product['id'],($product['quantity']-$quantity));
                                        if ($result2) {
                                            $rest_quentity = $product['quantity'] - $cart_id['quantity'];
                                            if ($pro->Update_Quantity($product['id'], $rest_quentity)) {
                                                 $_SESSION['cart_j']=[];
                                                 $success_msg = "Successfully Checkout";
                                                 header('location:Shopping.php');
                                            } else
                                                echo 'not Update Quantity';

                                        } else
                                            echo 'order details not insert';

                                    }
                                }
                                else
                                    echo 'not save';

                        }
                       }
                    }
                    ?>
    </div>
        <?php endif;?>
    </div>
<?php
require_once 'inc/footer.php';
?>


