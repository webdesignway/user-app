<?php 
namespace Inc\Cls ;

class Deactivate 
{

    public function __construct()
    {

    }




 public static function makeDeactivation()
 {
    register_deactivation_hook( __FILE__ , array('Deactivate' , 'init') );
 }


 public static function init()
 {
    
 }

}
