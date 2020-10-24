<?php
namespace helpers;

class  Str
{
   public static function max_Letter($str,$max)
   {
       if(strlen($str)>$max)
       {
           $str=substr($str,0,$max).'...';
           return $str;
       }
       return $str;
   }
   public static function is_String($value)
   {
       if(!is_numeric($value))
       {
          return true;
       }
       return  false;
   }



}