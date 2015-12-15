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
global $wp_registered_sidebars;
$meta_tabs = array(
        array(
            'id'    => 'wpo-config',
            'icon'  => 'fa-wrench',
            'title' => 'General'
        ),
        array(
            'id'    => 'option',
            'icon'  => 'fa-cogs',
            'title' => 'Template Option'
        )
    );

?>
<div id="wpo-post" class="wpo-metabox">
<!-- Nav tabs -->
    <?php $mb->getTabsConfig($meta_tabs); ?>

    <!--Genaral config -->
    <div class="wpo-meta-content active" id="wpo-config">
	<?php
		$layout = array('id' => 'page_layout', 'title' => esc_html__('Page Layout','training') );
		$mb->selectLayout($layout);
	?>
	<div style="clear:both;"></div>
		<!--Select left sidebar-->
		<p class="wpo_section left-sidebar for-leftmain for-leftmainright target-page-layout">
		    <?php $mb->the_field('left_sidebar'); ?>
    <?php 
    	$left_sidebars = array('id'=> 'left_sidebar','title'=> esc_html__('Left Sidebar','training'),'data'=>$wp_registered_sidebars,'default'=>'sidebar-left');
        $mb->getSelectElement($left_sidebars);
    ?>
		</p>
		<!--Select right sidebar-->
		<p class="wpo_section right-sidebar for-mainright for-leftmainright target-page-layout">
    <?php 
        $right_sidebars = array('id'=> 'right_sidebar','title'=> 'Right Sidebar','data'=>$wp_registered_sidebars,'default'=>'sidebar-right');
        $mb->getSelectElement($right_sidebars); 
    ?>
		</p>

		<p class="wpo_section right-sidebar for-mainright for-leftmainright for-leftmain target-page-layout">
		    <?php 

		    	$columns = array();
		    	$columns[] = array(
		    		'id' => '', 'name' => esc_html__('Default','training'),
		    	);
		    	$columns[] = array(
		    		'id' => '2', 'name' => esc_html__('2 Columns','training'),
		    	);
		    	$columns[] = array(
		    		'id' => '3', 'name' => esc_html__('3 Columns','training'),
		    	);
		    	$columns[] = array(
		    		'id' => '4', 'name' => esc_html__('4 Columns','training'),
		    	);

		        $right_sidebars = array('id'=> 'sidebar_column','title'=> 'Sidebar Columns','data'=>$columns,'default'=>'');
		        $mb->getSelectElement($right_sidebars); 
		    ?>
		    <i><?php esc_html_e( 'Set number of column bootstrap for each sidebar', 'training' );?></i>
		</p>


		<!--Select Layout-->
	    <p class="wpo_section">
			<?php
				$data_layout = array(
					array( 'id' => 'global', 'name' => 'Use Global'),
					array( 'id' => 'fullwidth', 'name' => 'Full width'),
					array( 'id' => 'boxed', 'name' => 'Boxed')
				);
				$layout = array(
		    		'id' => 'layout',
		    		'title' => 'Layout style',
		    		'data' => $data_layout,
		    		'default' => 'global'
				);
		    	$mb->getSelectElement( $layout );
			?><i><?php esc_html_e( 'Whether to set fullwidth for the page', 'training' );?></i>
		</p>

		<!--Select skins-->

		<!--Select header skin-->
		<p class="wpo_section ">
    	<?php
	    	$header = training_wpo_cst_headerlayouts();
	    	$data = array(array( 'id' => 'global', 'name' => 'Use Global'));
	    	foreach ($header as $key => $value) {
	    		$data[] = array('id'=> $key,'name' => $value);
	    	}
	    	$header_skin = array(
	    		'id' => 'header_skin',
	    		'title' => 'Header Skin',
	    		'data' => $data,
	    		'default' => 'global'
			);
	    	$mb->getSelectElement( $header_skin );
    	?>
	    </p>

       <p class="wpo_section">
       <?php 
         $footer = training_wpo_get_footerbuilder_profiles();
         $data = array(array( 'id' => 'global', 'name' => 'Use Global'));
         foreach ($footer as $key => $value) {
            $data[] = array('id'=> $key,'name' => $value);
         }
         $footer_skin = array(
            'id' => 'footer_skin',
            'title' => 'Footer Skin',
            'data' => $data,
            'default' => 'global'
         );
         $mb->getSelectElement( $footer_skin );
       ?>
       </p>
	 		<!--show title config -->

		  <!--Show Breadcrumb config -->
        <p class="wpo_section show_breadcrumb">
        <?php
            $_show_breadcrumb = array('id'=>'breadcrumb', 'title'=>esc_html__('Show Breadcrumb', 'training') );
            $mb->getCheckboxElement($_show_breadcrumb); 
        ?>
        </p>
        <p class="wpo_section background_breadcrumb" data-id="bg_color:bg_image" data-group="breadcrumb">
        <?php
        	$data_select = array(
        		array( 'id' => 'global', 'name' => 'Use Global'),
        		array( 'id' => 'bg_color', 'name' => 'Use Color'),
        		array( 'id' => 'bg_image', 'name' => 'Use Image' ));
        	$background = array('id'=>'background_breadcrumb', 'title'=>esc_html__('Select background breadcrumb', 'training'), 'data' => $data_select, 'default'=>'bg_color' );
            $mb->getSelectElement($background); 
        ?>
        <p class="wpo_section bg_color breadcrumb">
    	<?php
    		$data_color = array(
    			'id' => 'bg_color',
    			'title' => esc_html__('Background color breadcrumb', 'training')
			); 
    		$mb->addColorElement( $data_color ); 
		?>
        </p>

        <!-- Add image breadcrumb -->
        <p class="wpo_section bg_image breadcrumb">
	        <?php
	        	$_image_breadcrumbs = array(
	        		'id' => 'image_breadcrumb',
	        		'title' => esc_html__('Image breadcrumb', 'training'),
	        		'description' => esc_html__(' Add image', 'training')
	    		);
	    		$mb->wpo_image_upload( $_image_breadcrumbs );
	        ?>
        </p>
        <!--End add image-->
		
	</div>
	<div class="wpo-meta-content" id="option">
		<!--Blog config -->
		<p class="wpo_section wpo-check wpo-template-blog-template">
		<?php
			$number = array(
                'id'    => 'blog_number',
                'title' => 'Number post',
                'des'   => '(Number post per page)'
            );
			$mb->addNumberElement( $number );
		?>
		</p>
		<p class="wpo_section wpo-check wpo-template-blog-template" data-group="style_blog" data-id="default:list:masonry">
		<?php
			$path = WPO_THEME_DIR.'/templates/blog/blog-*.php';
			$file_name = 'blog-';
			$styles = training_wpo_get_styles($path, $file_name);
			foreach( $styles as $key=>$val){
				$data_styles[] = array('id'=> $key,'name' => $val);
			}
			$_styles = array(
		    		'id' => 'blog_style',
		    		'title' => 'Blog style',
		    		'data' => $data_styles,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $_styles );
		?>
		</p>

		<p class="wpo_section wpo-check wpo-template-blog-template style_blog masonry">
		<?php 
			$column = array(
	    		'id' => 'blog_columns',
	    		'title' => 'Posts Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $column );
	    	
    	?>
		</p>

		<!--Portfolio config -->
		<p class="wpo_section wpo-check wpo-template-template-portfolio">
		<?php
			$data_number = array(
                'id'    => 'portfolio_number',
                'title' => 'Number portfolio per page',
                'des'   => ''
            );
			$mb->addNumberElement( $data_number );
		?>
		</p>
		<p class="wpo_section wpo-check wpo-template-template-portfolio" data-group="style_portfolio" data-id="default:masonry">
		<?php
			$portfolio_path = WPO_THEME_DIR.'/templates/portfolio/portfolio-*.php';
			$portfolio_file = 'portfolio-';
			$portfolio_styles = training_wpo_get_styles($portfolio_path, $portfolio_file);
			$portfolio_data = array();
			foreach( $portfolio_styles as $_key=>$_val){
				$portfolio_data[] = array('id'=> $_key,'name' => $_val);
			}
			$styles_portfolio = array(
		    		'id' => 'portfolio_style',
		    		'title' => 'Portfolio style',
		    		'data' => $portfolio_data,
		    		'default' => ''
				);
	    	$mb->getSelectElement( $styles_portfolio );
		?>
		</p>

		<p class="wpo_section wpo-check wpo-template-template-portfolio">
		<?php 
			$_column = array(
	    		'id' => 'portfolio_columns',
	    		'title' => 'Portfolio Show Columns',
	    		'data' => array(
	    			array('id' => 2, 'name' => '2 columns'),
	    			array('id' => 3, 'name' => '3 columns'),
	    			array('id' => 4, 'name' => '4 columns'),
    			),
	    		'default' => '2'
			);
	    	$mb->getSelectElement( $_column );
    	?>
		</p>

	</div>
</div>