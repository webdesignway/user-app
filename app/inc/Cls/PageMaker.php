<?php 
namespace Inc\Cls;



/**
 *  Create Page 
 * 
 */






class PageMaker
{
    protected   $pageData = null  ; 
    public  int     $page_id = 0  ;  
     function __construct( array $pageData )
     {

        /**
         *  @param object $page  if the parameter is null
         * the class won't create the page because the page already exists 
         * 
         */
 
        $oldePageData = self::getPageData(   $pageData['post_title']  );  
       

       if( count( $oldePageData) == 0  )
       {
          $this->pageData = $pageData ;
        
       }

           $this->createPage() ;
    
     } 

     

      /**
       *  Function for getting all pages from database because the original 
       * wordpress function is deprecated and some other function was not convenient 
       * 
       * @param string $page_title get if it's null the function will return all pages that were created
       * 
       * @return   array  
       */

      protected static function getPageData( string $page_title = null   )  
     {
        global $wpdb;
        if( !is_null($page_title ) )
        {
          $sql    =  "SELECT * FROM ".$wpdb->prefix ."posts  P WHERE P.post_type = 'page' AND P.post_title = %s LIMIT 1 ; " ;
          $query  = $wpdb->prepare($sql , $page_title );
        }else
        {
        
         $query  = "SELECT * FROM ".$wpdb->prefix ."posts  P WHERE P.post_type = 'page'  ; "  ;
        }
          
          $result = $wpdb->get_results( $query );  
          return $result ;
     }



     /**
      * 
      * create new Page 
      */

     public function init(){

         if(  !is_null( $this->pageData )  )
         {

           $this->page_id = wp_insert_post( $this->pageData  ) ;

           update_post_meta(  $this->page_id   , '_wp_page_template' , 'custome-login-page.php' );

           return ;
         }

       return null ;
     }


      /**
       * initialize new created page 
       */

     public function createPage()
     {
            add_action( 'init', [ $this, 'init' ] );
            add_filter('theme_page_templates' , array( $this , 'register_new_template') , 10 , 3 );
            add_filter('template_include' , array( $this , 'selectTemplate'  ) , 99 );        
     
     }


     /**
      * add new template to activate theme 
      * @return array 
      */

     protected function addNewTemplate():array 
     {
        $temp = [] ;
        $temp['custome-login-page.php'] = ' Login Page ' ;
        return $temp ;
     }


     public  function register_new_template( $page_templates , $theme , $post )
     {
          $templates = $this->addNewTemplate() ;

          foreach($templates  as $key => $value )
          {
             $page_templates[$key] = $value ;
          }

          return $page_templates ;
     } 



     public function selectTemplate($template)
     {
            global  $post  ;
            $page_temp_slug =  get_page_template_slug( $post->ID ); 
             
            $templates = $this->addNewTemplate() ;
            $folder_name = 'customer' ; 
           
             if( isset($templates[$page_temp_slug] ) )
             {
               
                $template   =  BASE_PLUGIN_DIR . 'templates/'. $page_temp_slug ;
               
               if(file_exists( $template))
               {
                return  $template ;
               }
             
             }

             
             
            return $template ;
     }


    
}














  