<?php
require_once 'config.php';
?>
<?php
if(isset($_SESSION['email']))
{
    header('location:index.php');

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 ">
            <h1 class="text-center" style="font-family: 'Piedra', cursive;margin-top:25% ; ">Admins Login <br>
                <span style="font-size: 14px"> It's not for anyone just Admins</span> </h1>

            <form style="margin-top:8% ; "  action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" >
            <div class="form-group">
                <input  type="text" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"  placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <input type="password"  value="<?php if(isset($_POST['password'])) echo $_POST['password']?>" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit"   name="login_btn" class="btn btn-primary">Login </button>
            <?php

            if(isset($_POST['login_btn']))
            {
                $email=$_POST['email'];
                $pass=$_POST['password'];
                $valid=new Validation();
                if($valid->Is_Empty("Email",$email)&&$valid->Is_Empty("Password",$pass)) {
                    if ($valid->Email_Validation("Email", $email)) {
                        $new_pass = md5($pass);
                        $admin=new Admin();
                        $res=$admin->login($email,$new_pass);
                        if($res)
                        {
                            $_SESSION['email']=$res['email'];
                            $_SESSION['username']=$res['username'];
                            header("location:index.php");
                        }
                        else
                            $error_msg="The Email is'nt Exist";

                    }
                }
                require_once 'function/message.php';
            }


            ?>
        </form>


        </div>
    </div>

</div>
</body>
</html>
