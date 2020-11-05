<?php


class Admin extends DB
{

    public function login($email,$password)
    {
        $query ="select * from admins where email='$email' and password='$password' ";
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)==1)
        {
            $admin=mysqli_fetch_assoc($result);
            return $admin;
        }
        return  false;
    }

}