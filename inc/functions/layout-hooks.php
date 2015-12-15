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
	 * Functioning OF Template
	 */
	function training_wpo_header_style(){
	    $text_color = get_header_textcolor();
	    return ;
	}

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'wpo_custom_background_args', array(
	    'default-color' => 'f5f5f5',
	  ) ) );

	function training_wpo_custom_header_setup() {
		  add_theme_support( 'custom-header', apply_filters( 'wpo_custom_header_args', array(
		    'default-text-color'     => 'fff',
		    'width'                  => 1920,
		    'height'                 => 420,
		    'flex-height'            => true,
		    'wp-head-callback'       => 'training_wpo_header_style',
		    'admin-head-callback'    => 'wpo_admin_header_style',
		    'admin-preview-callback' => 'wpo_admin_header_image',
		  ) ) );
	}

	add_action( 'after_setup_theme', 'training_wpo_custom_header_setup' );
	
	function training_theme_slug_setup() {
	   add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'training_theme_slug_setup' );

	/**
	 * Add Custom Class To Body Tag
	 */
	add_filter('body_class', 'training_wpo_body_class');
	
	function training_wpo_body_class( $classes ){
		foreach ( $classes as $key => $value ) {
		
		if ( $value == 'boxed' || $value == 'default' ) 
			unset( $classes[$key] );
		}
		
		$classes[] = training_wpo_theme_options('configlayout');
		$classes[] = 'wpo-animate-scroll';

		return $classes;
	}

	/**
	 *
	 */
	function training_wpo_render_breadcrumbs_heading_tag( $tag ){
		if( ! is_single() ){
			return 'h1';
		}
		return $tag;
	}

	add_filter( 'training_wpo_render_breadcrumbs_heading_tag', 'training_wpo_render_breadcrumbs_heading_tag' );
	/**
	 * Customize Breadcrumd with Background Color Or Background Images
	 */
	function training_wpo_layout_breadcrumbs_bg(){
		$customize_image = get_header_image();
		if( isset($trainingconfig['background_breadcrumb']) && $trainingconfig['background_breadcrumb'] ){
			switch ( $trainingconfig['background_breadcrumb']) {
				case 'bg_image':
					$style = 'background-image: url('.esc_url_raw( $trainingconfig['image_breadcrumb'] ).');';
					break;
				
				case 'bg_color':
					$style = 'background-color:'.esc_attr( $trainingconfig['bg_color'] );
					break;

				case 'global':
					if( $customize_image  ){
						$style = "background: url('".esc_url_raw( $customize_image )."') no-repeat center center #f9f9f9";
						break;
					}
				default:
					$style="background: url('".get_template_directory_uri()."/images/breadcrumb.jpg') no-repeat center center #f9f9f9";
					break;
			}
		}elseif( isset( $customize_image) && !empty( $customize_image)) {
					$style="background: url('".esc_url_raw( $customize_image )."') no-repeat center center #f9f9f9";
		}else{
			$style="background: url('".get_template_directory_uri()."/images/breadcrumb.jpg') no-repeat center center #f9f9f9";
		}
		return $style;
	}

	/**
	 * Hooks to render BreadCrumb
	 */
	function training_wpo_layout_breadcrumbs_render(){
		global $trainingconfig;
		if( is_front_page() ){
			return ;
		}
		$style = training_wpo_layout_breadcrumbs_bg();
?>
	    <div class="wpo-breadcrumbs" style="<?php echo ($style);?>">
	        <?php training_wpo_breadcrumb(); ?>
	    </div>
 	<?php 
	}
	add_action( 'training_wpo_layout_breadcrumbs_render', 'training_wpo_layout_breadcrumbs_render' );

	/**
	 * Hook To Renderr With Layout Having Configed Layout as left-right, or fullwidth 
	 * With Open Tags
	 */
	function training_wpo_layout_template_before(){
		global $trainingconfig; 
	?>
		
		<section id="wpo-mainbody" class="wpo-mainbody default-template clearfix">
	  		<div class="container<?php if( isset($trainingconfig['layout'])&&$trainingconfig['layout']=='fullwidth') { ?>-fuild<?php } ?>">
	      	<div class="container-inner">
	        		<div class="row">
	          		<?php get_sidebar( 'left' );  ?>
			        <!-- MAIN CONTENT -->
			        <div id="wpo-content" class="<?php echo esc_attr( $trainingconfig['main']['class'] ); ?>">
			            <div class="wpo-content">

	<?php }  
	add_action( 'training_wpo_layout_template_before', 'training_wpo_layout_template_before' );

	/**
	 * Hook To Renderr With Layout Having Configed Layout as left-right, or fullwidth 
	 * With Close Tags
	 */
	function training_wpo_layout_template_after(){
		global $trainingconfig; 
	?>	
				         	</div>
			            </div>
			          <!-- //MAIN CONTENT -->
			          <?php get_sidebar( 'right' );  ?>
			         </div>
			   </div>
		   </div>
		</section>

	<?php }
	add_action( 'training_wpo_layout_template_after', 'training_wpo_layout_template_after' );
?>