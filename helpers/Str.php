<?php
namespace helpers;

class  Str
{
   public static function max_Letter($str)
   {
       if(strlen($str)>30)
       {
           $str=substr($str,0,30).'...';
           return $str;
       }
       return $str;
   }
}