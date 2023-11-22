<?php
namespace Inc\Cls; 












class Activate 
{

    public function  __construct( )
    {
        
    }




 public  function makeActivation()
 {
      

       
      
      if( version_compare(  get_bloginfo( 'version' ) ,TOOLS_PLUGIN_VERSION  , '<' ) )
      {
          require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
         
          
              deactivate_plugins(  plugin_basename( __FILE__ ) );
              //wp_die("deactivation doen't work !!!! ");
          
      }
           
       

       $this->init();

       
      

      
 }


 public  function init()
 {
    
    $tools_myplugin_options = array(
        'view' => 'grid'  ,
        'food' => 'bacon' ,
        'mode' => 'zombie'
        );

    update_option( 'tools_polugin_options',  $tools_myplugin_options  );
 }

public    function installToolsPlugin()
 {
    

 }

}