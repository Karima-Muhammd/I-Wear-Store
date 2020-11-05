<?php


class Validation
{
    protected $value,$name;
    public function Email_Validation($name,$value)
    {
        if(!filter_var($value,FILTER_VALIDATE_EMAIL))
        {
            $error_msg="This Field $name is not a valid email ";
            require_once 'function/message.php';
            return false;
        }
        return true;
    }
    public function Is_Number($name , $value)
    {
        if(!is_numeric($value))
        {
            $error_msg="This Field $name Must be Number";
            require_once 'function/message.php';
            return false;
        }
        return true;
    }
    public function MaxThan($name,$value,$max)
    {
        if(strlen($value)>$max)
        {
            $error_msg="This Field $name name Must be less than $max letters";
            require_once 'function/message.php';
            return false;
        }

        return true;
    }
    public function MaxThanMin($name,$value,$max,$min)
    {
        if(strlen($value)>$max && strlen($value)<$min )
        {
            $error_msg="This Field $name name Must be less than $max and more than $min letter";
            require_once 'function/message.php';
            return false;
        }

        return true;
    }
    public function wordCount($name,$value,$equal)
    {
        if(str_word_count($value)!=$equal)
        {
            $error_msg="This Field $name Must be  $equal word";
            require_once 'function/message.php';
            return false;
        }

        return true;
    }
    public function LetterEqual($name,$value,$equal)
    {
        if(strlen($value)!=$equal)
        {
            $error_msg="This Field $name Must be  $equal letter ";
            require_once 'function/message.php';
            return false;
        }

        return true;
    }
    public function Is_String($name,$value)
    {
        if(!is_string($value))
        {
            $error_msg="This Field $name Must be String";
            require_once 'function/message.php';
            return false;
        }
        return true;
    }
    public function Is_Empty($name,$value)
    {
        if(strlen($value)=='')
        {
            $error_msg="This Field $name is Required";
            require_once 'function/message.php';
            return false;
        }
        return true;
    }
}