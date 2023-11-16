<?php
namespace Inc\Cls; 











class Activate 
{

    public function __construct()
    {

    }




 public static function makeActivation()
 {
      register_activation_hook( __FILE__ , array('Activate' , 'init') );
 }


 public static function init()
 {
    
 }

}