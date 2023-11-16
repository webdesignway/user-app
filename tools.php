<?php
/**
 * Plugin Name
 *
 * @package     user-app
 * @author      David Kahadze
 * @copyright   2023 App-impuls
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Tools
 * Plugin URI:  https://github.com/webdesignway/user-app
 * Description: Tutorial made by app-impuls developers
 * Version:     1.0.0
 * Author:      David kahadze
 * Author URI:  https://localhost/impuls
 * Text Domain: impuls
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// plugins_url() ;
// includes_url() ;



 if( !defined( 'ABSPATH' ))
 {  
    wp_die( 'Hi there!  I\'m just a plugin, not much I can do when called directly.' , 'title is error to get in directly !!! ') ; 
 } 
	

define( "BASE_PLUGIN_DIR" , plugin_dir_path( __FILE__ ) );
define( "PLUGIN_VERSION" , "6.4" );

 if(file_exists( BASE_PLUGIN_DIR ."/app/vendor/autoload.php"))
 {
       require_once( BASE_PLUGIN_DIR ."/app/vendor/autoload.php" );
 }else
 {
       wp_die( "Please include app file ");
 }


use Inc\Cls\Activate ;
use Inc\Cls\Deactivate ;
use Ramsey\Uuid\Uuid; ;
/**
 *  Activate Tools Plugin 
 */
Activate::makeActivation();
Deactivate::makeDeactivation();

