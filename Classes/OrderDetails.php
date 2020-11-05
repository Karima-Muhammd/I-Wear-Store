<?php
require_once 'Image.php';
class OrderDetails extends DB
{
    public function Get_All_Orders()
    {
        $query="Select * from orderdetails ";
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
    public function Get_One($id)
    {
        $query="Select * from orderDetails where id='$id'";
        $result=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        return false;

    }
    //create one
    public function Insert(array $data)
    {

        $query="insert into orderdetails (`order_id`, `product_id`, `price`,`number_Of_Quantity`,`total_price`)
                VALUES ('{$data['order_id']}','{$data['product_id']}','{$data['price']}','{$data['number_Of_Quantity']}','{$data['total_price']}')";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;
    }


}