<?php


class Image
{
    public $name ,$tmp_name ,$upload_name;
    public function __construct($img)
    {
        $this->name=$img['name'];
        $this->tmp_name=$img['tmp_name'];
        $ext=pathinfo($this->name,PATHINFO_EXTENSION);
        $this->upload_name=uniqid().".$ext";

    }
    public function upload()
    {

        move_uploaded_file($this->tmp_name,'./assets/images/'.$this->upload_name);
    }
    public function Delete_Image($img_updated_name)
    {

    }
}