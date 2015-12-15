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

/**
 * Call To Action
 */	
 
		function training_wpo_get_iconstyles(){
			return  array(
							esc_html__( 'Default', 'training' ) => '',
							esc_html__( 'Outline Default', 'training' ) => 'icons-outline icons-default',
							esc_html__( 'Outline Primary', 'training' ) => 'icons-outline icons-primary',
							esc_html__( 'Outline Danger', 'training' ) => 'icons-outline icons-danger',
							esc_html__( 'Outline Success', 'training' ) => 'icons-outline icons-success',
							esc_html__( 'Outline Warning', 'training' ) => 'icons-outline icons-warning',
							esc_html__( 'Outline Info', 'training' ) => 'icons-outline icons-info',

							esc_html__( 'Inverse Default', 'training' )  => 'icons-inverse icons-default',
							esc_html__( 'Inverse Primary', 'training' )  => 'icons-inverse icons-primary',
							esc_html__( 'Inverse Danger', 'training' )   => 'icons-inverse icons-danger',
							esc_html__( 'Inverse Success', 'training' )  => 'icons-inverse icons-success',
							esc_html__( 'Inverse Warning', 'training' )  => 'icons-inverse icons-warning',
							esc_html__( 'Inverse Info', 'training' )	 => 'icons-inverse icons-info',

							esc_html__( 'Light', 'training' )	 => 'icons-light',
							esc_html__( 'Dark', 'training' )	 => 'icons-darker',

							esc_html__( 'Color Default', 'training' )	 => 'text-default nostyle',
							esc_html__( 'Color Primary', 'training' )	 => 'text-primary nostyle',
							esc_html__( 'Color Danger', 'training' )	 => 'text-danger nostyle',
							esc_html__( 'Color Success', 'training' )	 => 'text-success nostyle',
							esc_html__( 'Color Info', 'training' )	 => 'text-info',

					);

		}	 
		vc_update_shortcode_param( 'vc_cta_button2', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Style Color', 'training' ),
			'param_name' => 'color',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'Default', 'training' ) => 'btn-default',
				esc_html__( 'Primary', 'training' ) => 'btn-primary',
				esc_html__( 'Danger', 'training' ) => 'btn-danger',
				esc_html__( 'Success', 'training' ) => 'btn-success',
				esc_html__( 'Info', 'training' ) => 'btn-info',
				esc_html__( 'Warning', 'training' ) => 'btn-warning',

				esc_html__( 'Outline Primary', 'training' ) => 'btn-outline btn-primary',
				esc_html__( 'Outline Danger', 'training' ) => 'btn-outline btn-danger',
				esc_html__( 'Outline Success', 'training' ) => 'btn-outline btn-success',
				esc_html__( 'Outline Info', 'training' ) => 'btn-outline btn-info',
				esc_html__( 'Outline Warning', 'training' ) => 'btn-outline btn-warning',

				esc_html__( 'Inverse Primary', 'training' ) => 'btn-inverse btn-primary',
				esc_html__( 'Inverse Danger', 'training' ) => 'btn-inverse btn-danger',
				esc_html__( 'Inverse Success', 'training' ) => 'btn-inverse btn-success',
				esc_html__( 'Inverse Info', 'training' ) => 'btn-inverse btn-info',
				esc_html__( 'Inverse  Warning', 'training' ) => 'btn-inverse btn-warning',
			)
		));

		vc_update_shortcode_param('vc_cta_button2', array(
		   'type' => 'dropdown',
		   'heading' => esc_html__( 'Heading Style', 'training' ),
		   'param_name' => 'heading_style',
		   'prioryty' => 2,
		   'value' => array(
		   	esc_html__('Default', 'training')	=> 'default',
		      esc_html__( 'Version 1', 'training' ) => 'v1',
		      esc_html__( 'Version 2', 'training' ) => 'v2',
		      esc_html__( 'Version 3', 'training' ) => 'v3',
				esc_html__( 'Version 4', 'training' ) => 'v4',
				esc_html__( 'Version 5', 'training' ) => 'v5',
				esc_html__( 'Version 6', 'training' ) => 'v6',
				esc_html__( 'Version 7', 'training' ) => 'v7',
				esc_html__( 'Version 8', 'training' ) => 'v8',
				esc_html__( 'Version 9', 'training' ) => 'v9',
				esc_html__( 'Version 10', 'training' ) => 'v10'
		    )
		));

		vc_update_shortcode_param( 'vc_cta_button2', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'CTA Style', 'training' ),
			'param_name' => 'style',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'Version 1', 'training' ) => '1',
				esc_html__( 'Version 2', 'training' ) => '2',
				esc_html__( 'Version Light Style 1', 'training' ) => '1 light-style ',
				esc_html__( 'Version Light Style 2', 'training' ) => '2 light-style ',
			
			)
		));

		vc_update_shortcode_param( 'vc_cta_button2', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button Radius Style', 'training' ),
			'param_name' => 'btn_style',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'None', 'training' ) => '',
				esc_html__( 'Radius 50%', 'training' ) => '',
			 	esc_html__( 'Radius 1x', 'training' ) => 'radius-1x',
			 	esc_html__( 'Radius 2x', 'training' ) => 'radius-2x',
			 	esc_html__( 'Radius 3x', 'training' ) => 'radius-3x',
			 	esc_html__( 'Radius 4x', 'training' ) => 'radius-4x',
				esc_html__( 'Radius 5x', 'training' ) => 'radius-5x',
				esc_html__( 'Radius 6x', 'training' ) => 'radius-6x',
			
			)
		));

		//Accordions
		vc_update_shortcode_param( 'vc_accordion', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'training' ),
			'param_name' => 'style',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'Style 1', 'training' ) => 'style-1',
				esc_html__( 'Style 2', 'training' ) => 'style-2',
			)
		));

		//Accordions
		vc_update_shortcode_param( 'vc_toggle', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Skin', 'training' ),
			'param_name' => 'skin',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'Skin 1', 'training' ) => '',
				esc_html__( 'Style 2', 'training' ) => 'style-2',
			)
		));

		//Tabs
		vc_update_shortcode_param( 'vc_tabs', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'training' ),
			'param_name' => 'style',
			'prioryty' => 1,
			'value' => array(
				esc_html__( 'Default', 'training' ) => '',
				esc_html__( 'Style 1', 'training' ) => 'style-1',
				esc_html__( 'Style 2', 'training' ) => 'style-2',
				esc_html__( 'Style 3', 'training' ) => 'style-3',
				esc_html__( 'Style 4', 'training' ) => 'style-4',
				esc_html__( 'Style 5', 'training' ) => 'style-5'
			)
		));

		//Tab
		vc_update_shortcode_param( 'vc_tab', array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Icon', 'training' ),
			'param_name' => 'icon',
			'prioryty' => 1,
			'value' => ''
		));		

		vc_update_shortcode_param( 'vc_tab', array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Description', 'training' ),
			'param_name' => 'description',
			'prioryty' => 1,
			'value' => ''
		));

		//Add animation column

		$cssAnimation = array(
			esc_html__("No", 'training') => '',
			esc_html__("Top to bottom", 'training') => "top-to-bottom",
			esc_html__("Bottom to top", 'training') => "bottom-to-top",
			esc_html__("Left to right", 'training') => "left-to-right",
			esc_html__("Right to left", 'training') => "right-to-left",
			esc_html__("Appear from center", 'training') => "appear",
			'bounce' => 'bounce',
			'flash' => 'flash',
			'pulse' => 'pulse',
			'rubberBand' => 'rubberBand',
			'shake' => 'shake',
			'swing' => 'swing',
			'tada' => 'tada',
			'wobble' => 'wobble',
			'bounceIn' => 'bounceIn',
			'fadeIn' => 'fadeIn',
			'fadeInDown' => 'fadeInDown',
			'fadeInDownBig' => 'fadeInDownBig',
			'fadeInLeft' => 'fadeInLeft',
			'fadeInLeftBig' => 'fadeInLeftBig',
			'fadeInRight' => 'fadeInRight',
			'fadeInRightBig' => 'fadeInRightBig',
			'fadeInUp' => 'fadeInUp',
			'fadeInUpBig' => 'fadeInUpBig',
			'flip' => 'flip',
			'flipInX' => 'flipInX',
			'flipInY' => 'flipInY',
			'lightSpeedIn' => 'lightSpeedIn',
			'rotateInrotateIn' => 'rotateIn',
			'rotateInDownLeft' => 'rotateInDownLeft',
			'rotateInDownRight' => 'rotateInDownRight',
			'rotateInUpLeft' => 'rotateInUpLeft',
			'rotateInUpRight' => 'rotateInUpRight',
			'slideInDown' => 'slideInDown',
			'slideInLeft' => 'slideInLeft',
			'slideInRight' => 'slideInRight',
			'rollIn' => 'rollIn'
		);
		$add_css_animation = array(
			"type" => "dropdown",
			"heading" => esc_html__("CSS Animation", 'training'),
			"param_name" => "css_animation",
			"admin_label" => true,
			"value" => $cssAnimation,
			"description" => esc_html__("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", 'training')
		);
		vc_add_param('vc_column',$add_css_animation);
		vc_add_param('vc_column_inner',$add_css_animation);
			

		vc_update_shortcode_param( 'vc_gmaps', array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Display Style', 'training' ),
				'param_name' => 'display_style',
				 'value' => array(
				 		'Default' => '',
				 		'Popup' => 'popup'
				)
		));
		vc_update_shortcode_param( 'vc_gmaps', array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image (use display style popup)', 'training' ),
				'param_name' => 'image',
				 'value' => array(
				 		'Default' => '',
				 		'Popup' => 'popup'
				) 		
		));