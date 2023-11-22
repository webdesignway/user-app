<?php 
namespace Inc\Abstr;








abstract class AddAction 
{
    
    
    function  __construct( $name ,  $priority , $accepted_arr = array())
    {
            
    }

   function add_action($name  )
   {

      add_action( $name )        
   }

}