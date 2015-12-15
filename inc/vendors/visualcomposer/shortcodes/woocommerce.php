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
if( WPO_WOOCOMMERCE_ACTIVED ) {
		$params 	= array();
	 	$cats 		= array();
		$product_columns_deal = array(1, 2, 3, 4);
		$value 		= array();

		/**
		 * wpo_productcategory
		 */
		

		$product_layout  = array('Grid'=>'grid','List'=>'list','Carousel'=>'carousel');
		$product_type    = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
		$product_columns = array(6,4, 3, 2, 1);
		$show_tab 		 = array(
			                array('recent', esc_html__('Latest Products', 'training')),
			                array( 'featured_product', esc_html__('Featured Products', 'training' )),
			                array('best_selling', esc_html__('BestSeller Products', 'training' )),
			                array('top_rate', esc_html__('TopRated Products', 'training' )),
			                array('on_sale', esc_html__('Special Products', 'training' ))
			            );


		
		if( is_admin() ){
			global $wpdb;
			$sql     = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat'";
			$results = $wpdb->get_results($sql);
		
			foreach ($results as $vl) {
				$value[$vl->name] = $vl->slug;
			}
			$query 		= "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat' and b.parent = 0";
			$categories = $wpdb->get_results($query);
			
			foreach ($categories as $category) {
				$cats[$category->name] = $category->term_id;
			}
		}

	


	    vc_map( array(
	        "name" => esc_html__("WPO Product Deals",'training'),
	        "base" => "wpo_product_deals",
	        "class" => "",
	        "category" => esc_html__('Opal Woocommece','training'),
	        "params" => array(
	            array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Title', 'training'),
	                "param_name" => "title",
	                "admin_label" => true
	            ),
	            array(
	                "type" => "textfield",
	                "heading" => esc_html__("Extra class name", 'training'),
	                "param_name" => "el_class",
	                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
	            ),
	            array(
	                "type" => "dropdown",
	                "heading" => esc_html__("Columns count",'training'),
	                "param_name" => "columns_count",
	                "value" => $product_columns_deal,
	                "admin_label" => true,
	                "description" => esc_html__("Select columns count.",'training')
	            ),
	            array(
	                "type" => "dropdown",
	                "heading" => esc_html__("Layout",'training'),
	                "param_name" => "layout",
	                "value" => array(esc_html__('Carousel', 'training') => 'carousel', esc_html__('Grid', 'training') =>'grid' ),
	                "admin_label" => true,
	                "description" => esc_html__("Select columns count.",'training')
	            )
	        )
	    ));
	

	

		vc_map( array(
		    "name" => esc_html__("WPO Product Category",'training'),
		    "base" => "wpo_productcategory",
		    "class" => "",
		    "category" =>esc_html__("Opal Woocommece",'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__('Title', 'training'),
					"param_name" => "title",
					"value" =>''
				),
		    	array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Category', 'training'),
					"param_name" => "category",
					"value" =>$value,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style",'training'),
					"param_name" => "style",
					"value" => $product_layout
				),
				array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image for categories", 'training'),
					"param_name"  => "image_cat",
					"value"       => '',
					'heading'     => esc_html__('Image', 'training' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of products to show",'training'),
					"param_name" => "number",
					"value" => '4'
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns count",'training'),
					"param_name" => "columns_count",
					"value" => $product_columns,
					"admin_label" => true,
					"description" => esc_html__("Select columns count.",'training')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Icon",'training'),
					"param_name" => "icon"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name",'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'training')
				)
		   	)
		));

		/**
		* wpo_category_filter
		*/

		vc_map( array(
				"name"     => esc_html__("WPO Product Categories Filter",'training'),
				"base"     => "wpo_category_filter",
				"class"    => "",
				"category" => esc_html__('Opal Woocommece', 'training'),
				"params"   => array(

				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Category', 'training'),
					"param_name" => "term_id",
					"value" =>$cats,
					"admin_label" => true
				),

				array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image for categories (190px x 190px)", 'training'),
					"param_name"  => "image_cat",
					"value"       => '',
					'heading'     => esc_html__('Image', 'training' )
				),

				array(
					"type"       => "textfield",
					"heading"    => esc_html__("Number of categories to show",'training'),
					"param_name" => "number",
					"value"      => '5'
				),

				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name",'training'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'training')
				)
		   	)
		));


		/**
		 * wpo_products
		 */
		vc_map( array(
		    "name" => esc_html__("WPO Products",'training'),
		    "base" => "wpo_products",
		    "class" => "",
		    "category" => esc_html__('Opal Woocommece', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title",'training'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => ''
				),
				 
		    	array(
					"type" => "dropdown",
					"heading" => esc_html__("Type",'training'),
					"param_name" => "type",
					"value" => $product_type,
					"admin_label" => true,
					"description" => esc_html__("Select columns count.",'training')
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style",'training'),
					"param_name" => "style",
					"value" => $product_layout
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns count",'training'),
					"param_name" => "columns_count",
					"value" => $product_columns,
					"admin_label" => true,
					"description" => esc_html__("Select columns count.",'training')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of products to show",'training'),
					"param_name" => "number",
					"value" => '4'
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name",'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'training')
				)
		   	)
		));
	

		vc_map( array(
			"name"     => esc_html__("WPO Product Categories List",'training'),
			"base"     => "wpo_category_list",
			"class"    => "",
			"category" => esc_html__('Opal Woocommece', 'training'),
			"params"   => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__('Title', 'training'),
				"param_name" => "title",
				"value"      => '',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show post counts', 'training' ),
				'param_name' => 'show_count',
				'description' => esc_html__( 'Enables show count total product of category.', 'training' ),
				'value' => array( esc_html__( 'Yes, please', 'training' ) => 'yes' )
			),
			array(
				"type"       => "checkbox",
				"heading"    => esc_html__("show children of the current category",'training'),
				"param_name" => "show_children",
				'description' => esc_html__( 'Enables show children of the current category.', 'training' ),
				'value' => array( esc_html__( 'Yes, please', 'training' ) => 'yes' )
			),
			array(
				"type"       => "checkbox",
				"heading"    => esc_html__("Show dropdown children of the current category ",'training'),
				"param_name" => "show_dropdown",
				'description' => esc_html__( 'Enables show dropdown children of the current category.', 'training' ),
				'value' => array( esc_html__( 'Yes, please', 'training' ) => 'yes' )
			),

			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Extra class name",'training'),
				"param_name"  => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'training')
			)
	   	)
	));
	
	$params =  array(
    	array(
			"type" => "textfield",
			"heading" => esc_html__("Title",'training'),
			"param_name" => "title",
			"admin_label" => true,
			"value" => ''
		),
		  
		array(
            "type" => "sorted_list",
            "heading" => esc_html__("Show Tab", 'training'),
            "param_name" => "show_tab",
            "description" => esc_html__("Control teasers look. Enable blocks and place them in desired order.", 'training'),
            "value" => "recent,featured_product,best_selling",
            "options" => $show_tab
        ),
        array(
			"type" => "dropdown",
			"heading" => esc_html__("Style",'training'),
			"param_name" => "style",
			"value" => $product_layout
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Number of products to show",'training'),
			"param_name" => "number",
			"value" => '4'
		),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Columns count",'training'),
			"param_name" => "columns_count",
			"value" => $product_columns,
			"admin_label" => true,
			"description" => esc_html__("Select columns count.",'training')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class name",'training'),
			"param_name" => "el_class",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'training')
		)
   	);
 

	/**
	 * wpo_all_products
	 */
	vc_map( array(
	    "name" => esc_html__("WPO Products Tabs",'training'),
	    "base" => "wpo_all_products",
	    "class" => "",
	    "category" => esc_html__('Opal Woocommece', 'training'),
	    "params" => $params
	));
}