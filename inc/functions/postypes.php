<?php 
/**
 * Defined function to render contents or process logic related with rendering.
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

/*********************************************************************
 * Event 
 *********************************************************************/
function training_wpo_event_page_config(){
	$defaults = array(  'config_layout'  => false);
	//$postconfig = wp_parse_args((array) $portconfig, $defaults);
	
	$config = array();
	if(!is_single()){
		$config['page_layout']  			= training_wpo_theme_options('event-archive-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('event-archive-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('event-archive-right-sidebar', 'sidebar-right');
	}else{
		$config['page_layout']  			= training_wpo_theme_options('event-single-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('event-single-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('event-single-right-sidebar', 'sidebar-right');
	}	

	if( empty($config))
		$lt = 'fullwidth';
	else
		$lt = $config['page_layout'];
	
	$config = training_wpo_config_layout( $lt, $config );
	return $config;
}

/**********************************************************************
 * Gallery Postype
 **********************************************************************/	
	
	/**
	 * Get Page Configuration
	 */
	function training_wpo_gallery_page_config(){

		$defaults = array(  'config_layout'  => false);
		
		$config = array();
		if(!is_single()){
			$config['page_layout']  			= training_wpo_theme_options('gallery-archive-layout', 'mainright');
			$config['left-sidebar']['widget']	= training_wpo_theme_options('gallery-archive-left-sidebar', 'sidebar-left');
			$config['right-sidebar']['widget'] 	= training_wpo_theme_options('gallery-archive-right-sidebar', 'sidebar-right');
		}else{
			$config['page_layout']  			= training_wpo_theme_options('gallery-single-layout', 'mainright');
			$config['left-sidebar']['widget']	= training_wpo_theme_options('gallery-single-left-sidebar', 'sidebar-left');
			$config['right-sidebar']['widget'] 	= training_wpo_theme_options('gallery-single-right-sidebar', 'sidebar-right');
		}	

		if( empty($config) ){
			$lt = 'fullwidth';
		}else {
			$lt = $config['page_layout'];
		}
		
		$config = training_wpo_config_layout($lt, $config);

		return $config;
	}

	if(!function_exists('training_wpo_gallieries')){
	    function training_wpo_gallieries($size='full'){
	        $postconfig = get_post_meta( get_the_ID(),'wpo_postconfig', true );
	        $output = array();
	        if( isset( $postconfig['post_gallery'] ) && !empty( $postconfig['post_gallery'] )){
	            $img_ids = explode(",",$postconfig['post_gallery']);
	        }

	        if(isset( $img_ids) && is_array( $img_ids)){
	            foreach ($img_ids as $key => $id){
	                $img_src = wp_get_attachment_image_src($id,$size);
	                $output[] = $img_src[0];
	            }
	            return $output;
	        }else
	            return array();
	        
	    }
	}

/**********************************************************************
 * Profolio Postype
 **********************************************************************/	

function training_wpo_portfolio_page_config(){
	global $wp_query;
	$portconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_portfolio',true);

	$defaults = array(  'config_layout'  	=> false);
	$postconfig = wp_parse_args((array) $portconfig, $defaults);
	$config = array();
	if( $postconfig['config_layout'] ==1){
		$config['page_layout'] 				= $postconfig['page_layout'];
		$config['right-sidebar']['widget']	= $postconfig['right_sidebar'];
		$config['left-sidebar']['widget'] 	= $postconfig['left_sidebar'];
	}else{
		$config['page_layout']  			= training_wpo_theme_options('portfolio-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('portfolio-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('portfolio-right-sidebar', 'sidebar-right');
	}

	if( empty($config))
		$lt = 'fullwidth';
	else
		$lt = $config['page_layout'];
	
	$config = training_wpo_config_layout( $lt, $config );
	return $config;
}

/**
 * Get all taxonomies and order theme by id
 */
function training_wpo_portfolio_list_categories(){
	return get_terms('category_portfolio',array('orderby'=>'id'));
}

function training_wpo_portfolio_categories( $tID ){
	return get_the_terms( $tID, 'category_portfolio' );
}


function training_wpo_profolio_items( $number, $pagination=1 ){
	$args = array(
	  'post_type' => 'portfolio',
	  'posts_per_page'=>$number
	  );

	if($pagination == 1){
	   $paged = get_query_var( 'paged', 1 );
	   $args['paged'] = $paged; 
	}
	$loop = new WP_Query($args);	

	return $loop;
}


/*****************************************************************************************
 * Teacher Posttype
 *****************************************************************************************/
function Training_WPO_Teacher_page_config(){
	global $wp_query;
	$portconfig = get_post_meta($wp_query->get_queried_object_id(),'Training_WPO_Teachers',true);

	$defaults = array(  'config_layout'  	=> false);
	$postconfig = wp_parse_args((array) $portconfig, $defaults);
	$config = array();
	if( $postconfig['config_layout'] ==1){
		$config['page_layout'] 				= $postconfig['page_layout'];
		$config['right-sidebar']['widget']	= $postconfig['right_sidebar'];
		$config['left-sidebar']['widget'] 	= $postconfig['left_sidebar'];
	}else{
		$config['page_layout']  			= training_wpo_theme_options('portfolio-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('portfolio-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('portfolio-right-sidebar', 'sidebar-right');
	}

	if( empty($config))
		$lt = 'fullwidth';
	else
		$lt = $config['page_layout'];
	
	$config = training_wpo_config_layout( $lt, $config );
	return $config;
}


/*****************************************************************************************
 * Courses Posttype
 *****************************************************************************************/
function training_wpo_course_page_config(){
	$defaults = array(  'config_layout'  => false);
	$config = array();
	if(!is_single()){
		$config['page_layout']  			= training_wpo_theme_options('courses-archive-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('courses-archive-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('courses-archive-right-sidebar', 'sidebar-right');
	}else{
		$config['page_layout']  			= training_wpo_theme_options('courses-single-layout', 'mainright');
		$config['left-sidebar']['widget']	= training_wpo_theme_options('courses-single-left-sidebar', 'sidebar-left');
		$config['right-sidebar']['widget'] 	= training_wpo_theme_options('courses-single-right-sidebar', 'sidebar-right');
	}	

	if( empty($config))
		$lt = 'fullwidth';
	else
		$lt = $config['page_layout'];
	
	$config = training_wpo_config_layout( $lt, $config );
	return $config;
}

function training_enqueue_script_porfolio(){
	wp_enqueue_script( 'wpo_isotope_js', WPO_THEME_URI.'/js/isotope.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'wpo_prettyPhoto_js', WPO_THEME_URI.'/js/jquery.prettyPhoto.js', array( 'jquery' ) );
	wp_enqueue_style( 'wpo_prettyPhoto_css', WPO_THEME_URI.'/css/prettyPhoto.css');
}
