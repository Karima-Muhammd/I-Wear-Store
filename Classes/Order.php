<?php
class Order extends DB
{
    public function Get_All_Orders()
    {
        $query="Select * from orders ";
        $result=mysqli_query($this->conn,$query);
        $rows=[];
        if(mysqli_num_rows($result)>0)
        {
            while ($row=mysqli_fetch_assoc($result))
            {
                $rows[]=$row;
            }
        }

        return $rows;
    }
    //get one
    public function Get_Order($Cust_Email)
    {
        $query="Select * from orders where Email='$Cust_Email'";
        $result=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        return false;

    }
    //create one
    public function Insert_order($name,$email,$phone,$address)
    {

        $query="insert into orders (`name`,`email`,`phone`,`address`)VALUES ('$name','$email','$phone','$address')";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;
    }


}