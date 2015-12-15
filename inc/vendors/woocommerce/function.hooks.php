<?php 
/**
 * $Desc
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

if(WPO_WOOCOMMERCE_ACTIVED){

	/**
	 * Apply filter to change templates of minibask button following header layout
	 */
	function training_wpo_minibasket_template( $template ){
		global $wp_query, $wpoEngine;

		$layout = $wpoEngine->getHeaderLayout($wp_query->get_queried_object_id()) ;

 		if( $layout == 'absolute'){
 			$template = 'mini-cart-button-v2';
 		}
		return $template; 
	}

	add_filter( 'training_wpo_minibasket_template', 'training_wpo_minibasket_template' );
	/**
	 * add social share in product detail at bottom
	 */
//	add_action( 'woocommerce_single_product_summary', 'training_wpo_share_box', 120 );
	 
	/**
	 * Style 1
	 */

	function training_wpo_woocommerce_product_style_accordion(){
		
		/**
		 * Remove orginal action
		 */
		//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


		//add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 20 );
		

	}

	/**
	 * Change style for tab styles
	 */
	function training_wpo_woocommerce_single_product_tab_class( $value ){
		return  $value;
	}
	add_filter( 'training_wpo_woocommerce_single_product_tab_class', 'training_wpo_woocommerce_single_product_tab_class' );


	/**
	 * Change style for accordions styles
	 */
	function training_wpo_woocommerce_single_product_accordion_class( $value ){
		return  $value;
	}
	add_filter( 'training_wpo_woocommerce_single_product_accordion_class', 'training_wpo_woocommerce_single_product_accordion_class' );



	training_wpo_woocommerce_product_style_accordion();

	 //Check config show popup add to cart success.
    if( training_wpo_theme_options('wc_cartnotice') ) {
        add_action('init','WPO_jsWoocommerce');
        function WPO_jsWoocommerce(){
            wp_dequeue_script('wc-add-to-cart');
            wp_register_script( 'wc-add-to-cart', WPO_THEME_URI . '/js/add-to-cart.js' , array( 'jquery' ) );
            wp_localize_script('wc-add-to-cart','woocommerce_localize',array(
                'cart_success'=> training_wpo_theme_options('wc_cartnotice_text', esc_html__('Success: Your item has been added to cart!', 'training') ),
       ));
        wp_enqueue_script('wc-add-to-cart');
        wp_register_script( 'noty_js', WPO_THEME_URI.'/js/jquery.noty.packaged.min.js', array( 'jquery' ) );
        wp_enqueue_script('noty_js');
        }
    }

}