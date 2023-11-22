<?php 


/**
 * Uninstall Tools Plugin
 */


 if( !defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

// Delete option from Database 


delete_option( 'tools_polugin_options' ) ; 