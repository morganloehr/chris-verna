<?php
if(WPO_PLGTHEMER_ACTIVED){

	if( training_wpo_get_posttype_enable('portfolio')){
	/*********************************************************************************************************************
	 *  Portfolio
	 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Portfolio",'training'),
		    "base" => "wpo_portfolio",
		    'icon' => 'icon-wpb-news-15',
		    'description'=>'Portfolio',
		    "class" => "",
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
					"admin_label" => true
				),
		    	 array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Item No Padding", 'training'),
	                "param_name" => "nopadding",
	                "value" => array(
	                    'Yes, It is Ok' => true
	                ),
	                'std' => true
				),	
		    	 
			 
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Description', 'training' ),
					"param_name" => "descript",
					"value" => ''
			    ),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display Masonry', 'training' ),
					'param_name' => 'masonry',
					'value' => array(
						esc_html__( 'No', 'training' ) => '0',
						esc_html__( 'Yes', 'training' ) => '1',
					)
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of portfolio to show", 'training'),
					"param_name" => "number",
					"value" => '6'
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns count', 'training' ),
					'param_name' => 'columns_count',
					'value' => array( 6, 4, 3, 2, 1 ),
					'std' => 3,
					'admin_label' => true,
					'description' => esc_html__( 'Select columns count.', 'training' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Enable Pagination', 'training' ),
					'param_name' => 'pagination',
					'value' => array( 'No'=>'0', 'Yes'=>'1'),
					'std' => 'style-1',
					'admin_label' => true,
					'description' => esc_html__( 'Select style display.', 'training' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   	)
		));
	}


	if( training_wpo_get_posttype_enable('gallery')){
		/*********************************************************************************************************************
		 *  Gallery grid
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Gallery Grid",'training'),
		    "base" => "wpo_gallery_grid",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Gallery Grid',
		    "class" => "",
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
					"admin_label" => true
				),
		    	 
				 
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number gallery', 'training' ),
					"param_name" => "number",
					"value" => '6'
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Columns', 'training' ),
					"param_name" => "column",
					"value" => array('2'=>'2', '3'=>'3', '4'=>'4')
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Remove Padding', 'training' ),
					"param_name" => "padding",
					"value" => array(esc_html__('No', 'training') => '', esc_html__('Yes', 'training') => '1')
			    ),
			    array(
					"type" => "textfield",
					'heading' => esc_html__( 'Extra class name', 'training' ),
					"param_name" => "class",
					"value" => ''
			    )
		   	)
		));
		
		/*********************************************************************************************************************
		 *  Gallery portfolio
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Gallery Filter",'training'),
		    "base" => "wpo_gallery_filter",
		    'icon' => 'icon-wpb-news-15',
		    'description'=>'Show Gallery with gallery post type',
		    "class" => "",
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
					"admin_label" => true
				),
		    	 
			 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number gallery', 'training' ),
					'param_name' => 'number',
					'value' => '9'
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Columns', 'training' ),
					'param_name' => 'column',
					"value" => array('2' => '2', '3' => '3', '4' => '4'),
			    ),
			    array(
			    	'type' => 'dropdown',
			    	'heading' => esc_html__('Show Pagination', 'training'),
			    	'param_name' => 'pagination',
			    	'value' => array(esc_html__('Yes', 'training') => '1', esc_html__('No', 'training') => '0' )
			    )
		   	)
		));
	}

	if( training_wpo_get_posttype_enable('testimonials') ){
		//Testimonials
		vc_map( array(
		    "name" => esc_html__("WPO Testimonials",'training'),
		    "base" => "wpo_testimonials",
		    'description'=> esc_html__('Play Testimonials In Carousel', 'training'),
		    "class" => "",
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"admin_label" => true,
					"value" => '',
						"admin_label" => true
				),

		    	array(
	                'type' => 'dropdown',
	                'heading' => esc_html__( 'Title font size', 'training' ),
	                'param_name' => 'size',
	                'value' => array(
	                    esc_html__( 'Large', 'training' ) => 'font-size-lg',
	                    esc_html__( 'Medium', 'training' ) => 'font-size-md',
	                    esc_html__( 'Small', 'training' ) => 'font-size-sm',
	                    esc_html__( 'Extra small', 'training' ) => 'font-size-xs'
	                )
	            ),

	            array(
	                'type' => 'dropdown',
	                'heading' => esc_html__( 'Title Alignment', 'training' ),
	                'param_name' => 'alignment',
	                'value' => array(
	                    esc_html__( 'Align left', 'training' ) => 'separator_align_left',
	                    esc_html__( 'Align center', 'training' ) => 'separator_align_center',
	                    esc_html__( 'Align right', 'training' ) => 'separator_align_right'
	                )
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Number", 'training'),
					"param_name" => "number",
					"value" => '6',
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Skin", 'training'),
					"param_name" => "skin",
					"value" => array('Version Style left'=>'left','Version Style 2'=>'v2','Version Style Slide'=>'slide','Version Style 4'=>'v4','Version Style 5'=>'v5','Version Style 6'=>'v6'),
					"admin_label" => true,
					"description" => esc_html__("Select Skin layout.", 'training')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   	)
		));
	}

	if( training_wpo_get_posttype_enable('brand') ){
	/*********************************************************************************************************************
	 *  Brands Carousel
	 *********************************************************************************************************************/

		vc_map( array(
		    "name" => esc_html__("WPO Brands Carousel",'training'),
		    "base" => "wpo_brands",
		    'description'=>'Show Brand Logos, Manufacture Logos',
		    "class" => "",
		    "category" => esc_html__('Opal Woocommece','training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__('Description', 'training'),
					"param_name" => "descript",
					"value" => ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of brands to show", 'training'),
					"param_name" => "number",
					"value" => '6'
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Icon", 'training'),
					"param_name" => "icon"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   	)
		));
	}

	if( training_wpo_get_posttype_enable('team')){

		vc_map( array(
		    "name" => esc_html__("(Team) Grid Carousel",'training'),
		    "base" => "wpo_teamcarousel",
		    "class" => "",
		    "description" => esc_html__('Show data from Posttype Team in Carousel and Grid Style', 'training'),
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),
			 	

			 	array(
					"type" => "textfield",
					"heading" => esc_html__("Number Of Items", 'training'),
					"param_name" => "number",
					"value" => '4',
						"admin_label" => false
				),
			 	
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show In Columns", 'training'),
					"param_name" => "show",
					'description'	=> esc_html__('Display Team in N Columns Of Carousel Style','training'),
					'value' 	=> array(  esc_html__('1 Column', 'training') => '1',  esc_html__('2 Columns', 'training') => '2',  esc_html__('3 Columns', 'training') => '3' , esc_html__('4 Columns', 'training')  => '4' , esc_html__('5 Columns', 'training') => '5')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   	)
		));

		/******************************
		 * Our Team
		 ******************************/
		vc_map( array(
		    "name" => esc_html__("(Team) Grid Style",'training'),
		    "base" => "wpo_team",
		    "class" => "",
		    "description" => 'Show Personal Profile Info',
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'training'),
					"param_name" => "photo",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Job", 'training'),
					"param_name" => "job",
					"value" => 'CEO',
					'description'	=>  ''
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'training'),
					"param_name" => "information",
					"value" => '',
					'description'	=> esc_html__('Allow  put html tags', 'training')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Phone", 'training'),
					"param_name" => "phone",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Google Plus", 'training'),
					"param_name" => "google",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Facebook", 'training'),
					"param_name" => "facebook",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Twitter", 'training'),
					"param_name" => "twitter",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Pinterest", 'training'),
					"param_name" => "pinterest",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Linked In", 'training'),
					"param_name" => "linkedin",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'training'),
					"param_name" => "style",
					'value' 	=> array(  esc_html__('circle', 'training') => 'circle',  esc_html__('vertical', 'training') => 'vertical',  esc_html__('horizontal', 'training') => 'horizontal' , esc_html__('special', 'training')  => 'special' , esc_html__('hover', 'training') => 'team-hover')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   	)
	));
	
	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
		"name" => esc_html__("(Team) List Style",'training'),
		"base" => "wpo_team_list",
		"class" => "",
		"description" => esc_html__('Show Info In List Style', 'training'),
		"category" => esc_html__('Opal Elements', 'training'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => esc_html__("Title", 'training'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Photo", 'training'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Phone", 'training'),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("information", 'training'),
				"param_name" => "information",
				"value" => '',
				'description'	=> esc_html__('Allow  put html tags', 'training')
			),
			array(
				"type" => "textarea",
				"heading" => esc_html__("blockquote", 'training'),
				"param_name" => "blockquote",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Email", 'training'),
				"param_name" => "email",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook", 'training'),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Twitter", 'training'),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Linked In", 'training'),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", 'training'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => esc_html__('circle', 'training'), 'vertical' => esc_html__('vertical', 'training') , 'horizontal' => esc_html__('horizontal', 'training') ),
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'training'),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
			)

	   	)
	));
	}

	if(  training_wpo_get_posttype_enable( 'video' ) ){

		 vc_map( array(
		    "name" => esc_html__("Opal Video Grid V1",'training'),
		    "base" => "wpo_video_grid_v1",
		    'icon' => 'icon-wpb-news-15',
		    'description'=>'Show Gallery with gallery post type',
		    "class" => "",
		    "category" => esc_html__('Opal Elements', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
					"value" => '',
					"admin_label" => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number gallery', 'training' ),
					'param_name' => 'number',
					'value' => '9'
			    ),
			    array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Grid Columns', 'training' ),
					'param_name' => 'grid_columns',
					'value' => '2'
			    ),
		   	)
		));
	}	
}	