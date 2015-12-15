<?php

/**
 * Theme function
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

define( 'WPO_THEME_DIR', get_template_directory() );
define( 'WPO_THEME_TEMPLATE_DIR',  WPO_THEME_DIR . '/templates/' );
define( 'WPO_THEME_TEMPLATE_DIR_PAGEBUILDER', WPO_THEME_DIR.'/vc_templates/' );

define( 'WPO_THEME_INC_DIR', WPO_THEME_DIR.'/inc/' );
define( 'WPO_THEME_CSS_DIR', WPO_THEME_DIR.'/css/' );

define( 'WPO_THEME_URI', get_template_directory_uri() );

define( 'WPO_THEME_NAME', 'training' );
define( 'WPO_THEME_VERSION', '1.0' );


define( 'WPO_FRAMEWORK_CUSTOMZIME_STYLE_URI', WPO_THEME_URI.'/css/customize/' );
define( 'WPO_FRAMEWORK_ADMIN_STYLE_URI', WPO_THEME_URI.'/inc/assets/' );
define( 'WPO_FRAMEWORK_ADMIN_IMAGE_URI', WPO_FRAMEWORK_ADMIN_STYLE_URI.'images/' );
define( 'WPO_FRAMEWORK_STYLE_URI', WPO_THEME_URI.'/inc/assets/' );  

/**
 * Define constants storing status enable or disable  installed plugins.
 */
define( 'WPO_WOOCOMMERCE_ACTIVED', 	   in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ); 
define( 'WPO_EVENT_ACTIVED', 		   in_array( 'the-events-calendar/the-events-calendar.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_PLGTHEMER_ACTIVED', 	   in_array( 'wpoframework/wpoframework.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_PUDDYPRESS_ACTIVED', 	   in_array( 'buddypress/bp-loader.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_BBPRESS_ACTIVED', 	       in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'WPO_IBEDUCATOR_ACTIVED',      in_array('ibeducator/ibeducator.php', apply_filters('active_plugins', get_option('active_plugins') ) ) );
define( 'WPO_POST_RATINGS',      in_array('wp-postratings/wp-postratings.php', apply_filters('active_plugins', get_option('active_plugins') ) ) );
if ( ! isset( $content_width ) ) $content_width = 900;
/* 
 * Localization
 */ 
$lang = WPO_THEME_DIR . '/languages' ;

/**
 * batch including all files in a path.
 *
 * @param String $path : PATH_DIR/*.php or PATH_DIR with $ifiles not empty
 */
function training_wpo_includes( $path, $ifiles=array() ){

    if( !empty($ifiles) ){
         foreach( $ifiles as $key => $file ){
            $file  = $path.'/'.$file; 
            if(is_file($file)){
                require($file);
            }
         }   
    }else {
        $files = glob($path);
        foreach ($files as $key => $file) {
            if(is_file($file)){
                require($file);
            }
        }
    }
}

function training_wpo_get_posttype_enable( $post_type){
    $posttypes = array();
    $opts = get_option( 'wpo_themer_posttype' );
    if( !empty($opts) ){
      foreach( $opts as $opt => $key ){
          $posttypes[] = str_replace( 'enable_', '', $opt );
      }  
    }
    return in_array( $post_type, $posttypes );
}

/*
 * Include list of files from Opal Framework.
 */ 
training_wpo_includes(  WPO_THEME_DIR . '/inc/plugins/*.php' );

 
training_wpo_includes(  WPO_THEME_DIR . '/inc/classes/*.php' );

if( is_admin() ) {
   /**
    * Admin Classess Core Frameworks Included
    */ 
    training_wpo_includes(  WPO_THEME_DIR . '/inc/classes/admin/*.php' );
 }


/// include list of functions to process logics of worpdress not support 3rd-plugins.
training_wpo_includes(  WPO_THEME_INC_DIR . '/functions/*.php' );

/// WooCommerce specified functions
if( WPO_VISUAL_COMPOSER_ACTIVED  ) {
    training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/visualcomposer/*.php' );
}

/// WooCommerce specified functions
if( WPO_WOOCOMMERCE_ACTIVED  ) {
    training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/woocommerce/*.php' );
}


if( WPO_PUDDYPRESS_ACTIVED  ) {
    training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/buddypress/*.php' );
}

if( WPO_IBEDUCATOR_ACTIVED  ) {
     training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/ibeducator/*.php' );
}

/**
 * Theme Customizer
 */ 
training_wpo_includes(  WPO_THEME_INC_DIR . '/customizer/*.php' );
 
$wpoEngine = new Training_WPO_TemplateFront();
$protocol = is_ssl() ? 'https:' : 'http:';
$wpoEngine->init();