<?php
require_once 'Image.php';
class Product extends DB
{
    private $pro_id;
    //get all
    public function Get_All_Products()
    {
        $query="Select * from products ";
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
    public function Get_Product($Pro_Id)
    {
        $query="Select * from products where id='$Pro_Id'";
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


        $query="insert into products (`name`,`price`,`descr`,`cate_id`,`img`,`quantity`)
                VALUES ('{$data['name']}','{$data['price']}','{$data['descrip']}',
                '{$data['cate_id']}','{$data['img']}','{$data['quantity']}') ";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;
    }
    public function QuantityAvail($id)
    {
        $query="SELECT * FROM  products  WHERE id='$id';";
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while ($res=mysqli_fetch_assoc($result))
            {
                echo $res['quantity'];
            }
        }

        return false;
    }

    public function GetCategory($id)
    {
        $query="SELECT * FROM  products join categories on 
                 products.cate_id=categories.id WHERE products.id='$id';";
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_assoc($result);
            return $row;
        }
        return false;
    }
    public function GetAllCategories()
    {
        $query="SELECT * FROM categories";
        $result =mysqli_query($this->conn,$query);
        $rows=[];
        if(mysqli_num_rows($result)>0)
        {
            while ($row=mysqli_fetch_assoc($result))
            {
                $rows[]=$row;
            }
            return $rows;
        }
        return false;
    }
    public function Update_Quantity($id,$RestQuantity)
    {
        $query = "Update  products set `quantity`='$RestQuantity' where id='$id'";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;

    }
        //edit
    public function Update($id,array $data)
    {
        $product =$this->Get_Product($id);
        $image_Product=$product['img'];

        if(!empty($data['img']['name']))
        {
            //delete old img
            unlink('assets/images/'.$image_Product);
            $image=new Image($data['img']);
            $image->upload();
            $image_upload=$image->upload_name;
            $query="Update  products set 
                    `name`='{$data['name']}',
                    `price`='{$data['price']}',
                    `descr`='{$data['descr']}', 
                    `cate_id`='{$data['cate_id']}', 
                    `img`='$image_upload',
                    `quantity`='{$data['quantity']}'
                     where id='$id'";
        }
        else
            {

            $query="Update  products set 
                    `name`='{$data['name']}',
                    `price`='{$data['price']}',
                    `descr`='{$data['descr']}', 
                    `img`='$image_Product',
                    `cate_id`='{$data['cate_id']}', 
                    `quantity`='{$data['quantity']}'
                     where id='$id'";

        }


        $result =mysqli_query($this->conn,$query);
        return $result;
    }
    //delete one
    public function Delete($id)
    {
        $query="delete from  products where id='$id'";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;
    }


}