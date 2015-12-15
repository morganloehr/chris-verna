<?php
/**
 * This files contain functions using for processing logic of themes not relating to any database.
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */


/**
 * auto load files and extract paramters passing to this.
 */
function training_wpo_load_template( $template_name, $args = array() ) {
    $url = get_template_directory().'/';

    $located = $url . $template_name.'.php';

    if ( ! file_exists( $located ) ) {
        return;
    }
    if ( $args && is_array( $args ) ) {
        extract( $args );
    }
    include( $located );

}

/**
 * include files in template folder and extract parameters using for this.
 */
function training_wpo_get_template( $template_name, $args = array() ) {
    $url = get_template_directory().'/templates/';

    $located = $url . $template_name;

    if ( ! file_exists( $located ) ) {
        return;
    }
    if ( $args && is_array( $args ) ) {
        extract( $args );
    }
    include( $located );

}

/**
 * create a random key to use as primary key.
 */
if(!function_exists('training_wpo_makeid')){
    function training_wpo_makeid($length = 5){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

/**
 * Get Theme Option Value.
 */
function training_wpo_theme_options($name, $default = false) {
  
    // get the meta from the database
    $options = ( get_option( 'wpo_theme_options' ) ) ? get_option( 'wpo_theme_options' ) : null;

    // d( $options );
   
    // return the option if it exists
    if ( isset( $options[$name] ) ) {
        return apply_filters( 'wpo_theme_options_$name', $options[ $name ] );
    }
    if( get_option( $name ) ){
        return get_option( $name );
    }
    // return default if nothing else
    return apply_filters( 'wpo_theme_options_$name', $default );
}

function training_enqueue_script_coundown(){
    wp_enqueue_script( 'countdown_js', WPO_THEME_URI.'/js/countdown.js', array( 'jquery' ) );
}

function training_enqueue_script_counterup(){
    wp_enqueue_script( 'counter_js', WPO_THEME_URI.'/js/jquery.counterup.min.js', array( 'jquery' ) );
}

function training_enqueue_script_waypoints(){
    wp_enqueue_script( 'waypoints_js', WPO_THEME_URI.'/js/waypoints.min.js', array( 'jquery' ) );
}