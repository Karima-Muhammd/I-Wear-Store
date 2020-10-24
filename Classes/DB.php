<?php


class DB
{
    private $Server_Name,$Username,$Password,$DB_Name;
    public $conn;
    public function __construct()
    {
        $this->Server_Name='localhost';
        $this->Username='root';
        $this->Password='';
        $this->DB_Name='e-commerce';
        $this->conn=mysqli_connect($this->Server_Name,$this->Username,$this->Password,$this->DB_Name);
        if($this->conn)
        {
            return $this->conn;

        }

        return false;
    }
    public function connect()
    {


    }
    protected function SelectRow($query)
    {
        $result =mysqli_query($this->conn,$query);
        if($result) {
            $row = [];
            if (mysqli_num_rows($result) > 0) {
                $row[] = mysqli_fetch_assoc($result);
            }
            return $row[0];
        }

        else
            return false;

    }
    protected function ifExist($table ,$filed,$fieldValue)
    {
        $query="select * from $table where $filed='$fieldValue'";
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
        else
            return false;

    }
    protected function SelectFunc($query)
    {
        $result =mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result) > 0)
        {
            while ($row[]=mysqli_fetch_assoc($result))
            {

            }
            return $row;
        }
        else
            return false;
    }
    public function db_insert($query)
    {

        $result =mysqli_query($this->conn,$query);

        if($result)
        {
            return true;
        }
        else
            return false;
    }


}