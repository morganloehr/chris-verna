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
 	

  

/**
 * Create variant objects to modify and proccess actions of only theme.
 */  
 	
 	function training_wpo_vc_woocommerce_shortcode_render( $atts, $content='' , $tag='' ){
	    $output = '';
	    if(is_file( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'woocommerce/'. $tag.'.php')){
	      ob_start();
	      require( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'woocommerce/'.$tag.'.php' );
	      $output .= ob_get_clean();
	    }
	    return $output;
	}

 	function training_wpo_vc_news_shortcode_render( $atts, $content='' , $tag='' ){
	    $output = '';
	    if(is_file( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'news/'. $tag.'.php')){
	      ob_start();
	      require( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'news/'.$tag.'.php' );
	      $output .= ob_get_clean();
	    }
	    return $output;
	}

 	function training_wpo_vc_buddypress_shortcode_render( $atts, $content='' , $tag='' ){
	    $output = '';
	    if(is_file( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'buddypress/'. $tag.'.php')){
	      ob_start();
	      require( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'buddypress/'.$tag.'.php' );
	      $output .= ob_get_clean();
	    }
	    return $output;
	}

	///// Define  list of function processing theme logics.
	function training_wpo_vc_shortcode_render( $atts, $content='' , $tag='' ){
	  	$output = '';
	  	if(is_file( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER. $tag.'.php')){
	  		ob_start();
	  		require( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.$tag.'.php' );
	  		$output .= ob_get_clean();
	  	}
	  	return $output;
	}



	function training_wpo_vc_elements_render( $atts, $content='' , $tag='' ){
	  $output = '';
	  if(is_file( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'elements/'. $tag.'.php')){
	    ob_start();
	    require( WPO_THEME_TEMPLATE_DIR_PAGEBUILDER.'elements/'.$tag.'.php' );
	    $output .= ob_get_clean();
	  }
	  return $output;
	}
		
		/** 
		 * Replace pagebuilder columns and rows class by bootstrap classes
		 */
		function training_wpo_change_bootstrap_class( $class_string,$tag ){
		 
			if ($tag=='vc_column' || $tag=='vc_column_inner') {
				$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
				$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
				$class_string = preg_replace('/vc_col-(\w)/', 'col-$1', $class_string);
				$class_string = str_replace(' wpb_column column_container', '', $class_string);
			}
			return $class_string;
		}
		  add_filter( 'vc_shortcodes_css_class', 'training_wpo_change_bootstrap_class',10,2);

		/** 
		 * Add vc parameters 
		 */
		function training_wpo_add_vc_params(){
			
			/**
			 * add new params for row
			 */
			vc_add_param( 'vc_row', array(
			    "type" => "checkbox",
			    "heading" => esc_html__("Parallax", 'training'),
			    "param_name" => "parallax",
			    "value" => array(
			        'Yes, please' => true
			    )
			));

			vc_add_param( 'vc_row',   array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Background Styles', 'training' ),
                'param_name' => 'bgstyle',
                'description'	=> esc_html__('Use Styles Supported In Theme, Select No Use For Customizing on Tab Design Options','training'),
                'value' => array(
					esc_html__( 'No Use', 'training' ) => '',
					esc_html__( 'Background Color Primary', 'training' ) => 'bg-primary',
					esc_html__( 'Background Color Info', 'training' ) 	 => 'bg-info',
					esc_html__( 'Background Color Danger', 'training' )  => 'bg-danger',
					esc_html__( 'Background Color Warning', 'training' ) => 'bg-warning',
					esc_html__( 'Background Color Success', 'training' ) => 'bg-success',
					esc_html__( 'Background Color Theme', 'training' ) 	 => 'bg-theme',
				    esc_html__( 'Background Image 1', 'training' ) => 'bg-style-v1',
					esc_html__( 'Background Image 2', 'training' ) => 'bg-style-v2',
					esc_html__( 'Background Image 3', 'training' ) => 'bg-style-v3',
					esc_html__( 'Background Image 4', 'training' ) => 'bg-style-v4',
					esc_html__( 'Background Image 5', 'training' ) => 'bg-style-v5',
					esc_html__( 'Background Style Center', 'training' ) => 'bg-style-center',
                )
            ) );

			 vc_add_param( 'vc_row', array(
			     "type" => "dropdown",
			     "heading" => esc_html__("Is Boxed", 'training'),
			     "param_name" => "isfullwidth",
			     "value" => array(
			     				esc_html__('Yes, Boxed', 'training') => '1',
			     				esc_html__('No, Wide', 'training') => '0'
			     			)
			));

			vc_add_param( 'vc_row', array(
			    "type" => "textfield",
			    "heading" => esc_html__("Icon", 'training'),
			    "param_name" => "icon",
			    "value" => '',
				'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'training' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. esc_html__( 'here to see the list, and use class icons-lg, icons-md, icons-sm to change its size', 'training' ) . '</a>'
			));
		}

		vc_add_param( 'vc_row', array(
			     "type" => "dropdown",
			     "heading" => esc_html__("Is Element OnePage (Use only Template OnePage)", 'training'),
			     "param_name" => "is_e_onepage",
			     "value" => array(
			     				esc_html__('No', 'training') => '0',
			     				esc_html__('Yes', 'training') => '1'
			     			)
			));

		vc_add_param( 'vc_row', array(
		     "type" => "textfield",
		     "heading" => esc_html__("Title Navigation Tooltips For Element OnePage (Use only Template OnePage)", 'training'),
		     "param_name" => "e_onepage_title",
		     "value" => ''
		));

		vc_add_param( 'vc_row', array(
		     "type" => "colorpicker",
		     "heading" => esc_html__("Background For Element OnePage (Use only Template OnePage)", 'training'),
		     "param_name" => "e_onepage_bg",
		     "value" => ''
		));

	 	add_action('init','training_wpo_add_vc_params',100);

		/**
		 * auto add footer type in visual composer
		 */
		function training_wpo_set_visual_composer_footer(){

			if($options = get_option('wpb_js_content_types')){
				$check = true;
				foreach ($options as $key => $value) {
					if( $value== 'footer' ){  
						$check=false;
					}
				}
				if($check)
					$options[] =  'footer';
			}else{
				$options = array('page', 'footer');
			}

			update_option( 'wpb_js_content_types',$options );
		}

		function training_wpo_set_visual_composer_megamenu_profile(){

			if($options = get_option('wpb_js_content_types')){
				$check = true;
				foreach ($options as $key => $value) {
					if( $value== 'megamenu_profile' ){  
						$check=false;
					}
				}
				if($check)
					$options[] =  'megamenu_profile';
			}else{
				$options = array('page', 'footer', 'megamenu_profile');
			}

			update_option( 'wpb_js_content_types',$options );
		}
		
		if( WPO_PLGTHEMER_ACTIVED ) {
			add_action('init','training_wpo_set_visual_composer_footer',100);
			add_action('init','training_wpo_set_visual_composer_megamenu_profile',100);
		}

		add_shortcode_param('wpo_datepicker', 'training_wpo_datepicker_settings_field', get_template_directory_uri().'/inc/assets/js/datepicker.js');
		function training_wpo_datepicker_settings_field( $settings, $value ) {
			
			wp_enqueue_script( 'jquery-ui-datepicker' );
			
			return '<div class="wpo_datetimepicker_block">'             
							.'<input id="wpo_datepicker" name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .              
							esc_attr( $settings['param_name'] ) . ' ' .              
							esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />
	                </div>';
		}

		/**
		 * auto add footer type in visual composer
		 */
		function training_wpo_load_vc_widgets(){ 
			training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/visualcomposer/shortcodes/class/*.php' );
			training_wpo_includes(  WPO_THEME_INC_DIR . '/vendors/visualcomposer/shortcodes/*.php' );



		}

		add_action('init','training_wpo_load_vc_widgets',1);
 
?>