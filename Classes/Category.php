<?php


class Category extends DB
{
    public function Insert($cate_name)
    {

        $query="insert into categories (`Cate_Name`) VALUES ('$cate_name')";
        $result =mysqli_query($this->conn,$query);
        if($result)
            return true;
        else
            return false;
    }


}