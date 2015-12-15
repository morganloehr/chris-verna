<?php

 
	/*********************************************************************************************************************
	 *  Vertical menu
	 *********************************************************************************************************************/
	
    $option_menu = array( esc_html__('---Select Menu---','training')=>'');

    if( is_admin() ){
	    $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
	    foreach ($menus as $menu) {
	    	$option_menu[$menu->name]=$menu->term_id;
	    }
	}    
	vc_map( array(
	    "name" => esc_html__("WPO Vertical Menu",'training'),
	    "base" => "wpo_verticalmenu",
	    "class" => "",
	    "category" => esc_html__('Opal Elements', 'training'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => esc_html__("Title", 'training'),
				"param_name" => "title",
				"value" => 'Vertical Menu'
			),
	    	array(
				"type" => "dropdown",
				"heading" => esc_html__("Menu", 'training'),
				"param_name" => "menu",
				"value" => $option_menu,
				"admin_label" => true,
				"description" => esc_html__("Select menu.", 'training')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Position", 'training'),
				"param_name" => "postion",
				"value" => array(
						'left'=>'left',
						'right'=>'right'
					),
				"admin_label" => true,
				"description" => esc_html__("Postion Menu Vertical.", 'training')
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'training'),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
			)
	   	)
	));
	
	/*********************************************************************************************************************
	 * Pricing Table
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => esc_html__("WPO Pricing",'training'),
	    "base" => "wpo_pricing",
	    "description" => esc_html__('Make Plan for membership', 'training' ),
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
				"heading" => esc_html__("Price", 'training'),
				"param_name" => "price",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Currency", 'training'),
				"param_name" => "currency",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Period", 'training'),
				"param_name" => "period",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Subtitle", 'training'),
				"param_name" => "subtitle",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Is Featured", 'training'),
				"param_name" => "featured",
				'value' 	=> array(  esc_html__('No', 'training') => 0,  esc_html__('Yes', 'training') => 1 ),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Skin", 'training'),
				"param_name" => "skin",
				'value' 	=> array(  esc_html__('Skin 1', 'training') => 'v1',  esc_html__('Skin 2', 'training') => 'v2', esc_html__('Skin 3', 'training') => 'v3' ),
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Box Style", 'training'),
				"param_name" => "style",
				'value' 	=> array( 'boxed' => esc_html__('Boxed', 'training')),
			),

			array(
				"type" => "textarea_html",
				"heading" => esc_html__("Content", 'training'),
				"param_name" => "content",
				"value" => '',
				'description'	=> esc_html__('Allow  put html tags', 'training')
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Link Title", 'training'),
				"param_name" => "linktitle",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Link", 'training'),
				"param_name" => "link",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'training'),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
			)
	   	)
	));


	/*********************************************************************************************************************
	 *  Mega Posts
	 *********************************************************************************************************************/

	function parramMegaLayout($settings,$value){
		$dependency = vc_generate_dependencies_attributes($settings);
		ob_start();
		?>
			<div class="layout_images">
				<?php foreach ($settings['layout_images'] as $key => $image) {
					echo '<img src="'.$image.'" data-layout="'.$key.'" class="'.$key.' '.(($key==$value)?'active':'').'">';
				} ?>
			</div>
			<input 	type="hidden"
					name="<?php echo esc_attr($settings['param_name']); ?>"
					class="layout_image_field wpb_vc_param_value wpb-textinput <?php echo esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field'; ?>"
					value="<?php echo esc_attr($value); ?>" <?php echo trim($dependency); ?>>
		<?php
		return ob_get_clean();
	}
	 
	/* Heading Text Block
	---------------------------------------------------------- */
	vc_map( array(
		'name'        => esc_html__( 'WPO Widget Heading','training'),
		'base'        => 'wpo_title_heading',
		"class"       => "",
		"category"    => esc_html__('Opal Elements', 'training'),
		'description' => esc_html__( 'Create title for one Widget', 'training' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'value'       => esc_html__( 'Title', 'training' ),
				'description' => esc_html__( 'Enter heading title.', 'training' ),
				"admin_label" => true
			),
			array(
			    'type' => 'colorpicker',
			    'heading' => esc_html__( 'Title Color', 'training' ),
			    'param_name' => 'font_color',
			    'description' => esc_html__( 'Select font color', 'training' )
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
				),
				'description' => esc_html__( 'Select title font size.', 'training' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Title Align', 'training' ),
				'param_name' => 'title_align',
				'value' => array(
					esc_html__( 'Align center', 'training' ) => 'separator_align_center',
					esc_html__( 'Align left', 'training' ) => 'separator_align_left',
					esc_html__( 'Align right', 'training' ) => "separator_align_right"
				),
				'description' => esc_html__( 'Select title align.', 'training' )
			),
			array(
				"type" => "textarea",
				'heading' => esc_html__( 'Description', 'training' ),
				"param_name" => "descript",
				"value" => '',
				'description' => esc_html__( 'Enter description for title.', 'training' )
		    ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		),
	));
	

	/*********************************************************************************************************************
	*  Reassuarence
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => esc_html__("WPO Reassuarence",'training'),
	    "base" => "wpo_reassuarence",
	    "class" => "",
	    "description"=> esc_html__('Counting number with your term', 'training'),
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
				"heading" => esc_html__("FontAwsome Icon", 'training'),
				"param_name" => "icon",
				"value" => '',
				'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'training' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank"> '
							. esc_html__( 'here to see the list', 'training' ) . '</a>' . esc_html__( 'and use class icons-lg, icons-md, icons-sm to change its size', 'training' )
			),

			array(
				"type" => "textfield",
				"heading" => esc_html__("Icon Color", 'training'),
				"param_name" => "color",
				"value" => 'black'
			),


			array(
				"type" => "attach_image",
				"description" => esc_html__("If you upload an image, icon will not show.", 'training'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> esc_html__('Image', 'training' )
			),

		 	array(
				"type" => "textarea",
				"heading" => esc_html__("Short Information", 'training'),
				"param_name" => "description",
				"value" => '',
				'description'	=> esc_html__('Allow  put html tags', 'training')
			),


		 	array(
				"type" => "textarea_html",
				"heading" => esc_html__("Detail Information", 'training'),
				"param_name" => "information",
				"value" => '',
				'description'	=> esc_html__('Allow  put html tags', 'training')
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
	


	/*********************************************************************************************************************
	 *  Facebook Like Box
	 *********************************************************************************************************************/
	vc_map( array(
		'name'        => esc_html__( 'WPO Facebook Like Box','training'),
		'base'        => 'wpo_facebook_like_box',
		"class"       => "",
		"category"    => esc_html__('Opal Elements', 'training'),
		'description' => esc_html__( 'Create title for one block', 'training' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget', 'training' ),
				'param_name' => 'title',
				'value'       => esc_html__( 'Find us on Facebook', 'training' ),
				'description' => esc_html__( 'Enter heading title.', 'training' ),
				"admin_label" => true
			),
			 
		 
			array(
				"type" => "textfield",
				"heading" => esc_html__("Facebook Page URL", 'training'),
				"param_name" => "page_url",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => esc_html__("Width", 'training'),
				"param_name" => "width",
				"value" => 268
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Color Scheme', 'training' ),
				'param_name' => 'color_scheme',
				'value' => array(
					esc_html__( 'Light', 'training' ) => 'light',
					esc_html__( 'Dark', 'training' ) => 'dark'
				),
				'description' => esc_html__( 'Select Color Scheme.', 'training' )
			),
			array(
                "type" => "checkbox",
                "heading" => esc_html__("Show faces", 'training'),
                "param_name" => "show_faces",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => esc_html__("Show stream", 'training'),
                "param_name" => "show_stream",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => esc_html__("Show facebook header", 'training'),
                "param_name" => "show_header",
                "value" => array(
                    'Yes, please' => true
                )
			),	
			array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'training'),
				"param_name" => "el_class",
				"value" => ''
			),									
		),
	));
	
	//Element Coming soon
	vc_map( array(
		'name'        => esc_html__( 'WPO Coming soon','training'),
		'base'        => 'wpo_coming_soon',
		"class"       => "",
		"style" 	  => "",
		"category"    => esc_html__('Opal Elements', 'training'),
		'description' => esc_html__( 'Create Element Coming soon', 'training' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'training' ),
				'param_name' => 'title',
				'value'       => esc_html__( '', 'training' ),
				'description' => esc_html__( 'Enter heading title.', 'training' ),
				"admin_label" => true
			),
			array(
			    'type' => 'wpo_datepicker',
			    'heading' => esc_html__( 'Date coming soon', 'training' ),
			    'param_name' => 'date_comingsoon',
			    'description' => esc_html__( 'Enter Date Coming soon', 'training' )
			),
			array(
				"type" => "textarea",
				'heading' => esc_html__( 'Description', 'training' ),
				"param_name" => "description",
				"value" => '',
				'description' => esc_html__( 'Enter description for title.', 'training' )
		    ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Style", 'training'),
				"param_name" => "style",
				'value' 	=> array( 
					'style 1' => esc_html__('countdown-v1', 'training'), 
					'style 2' => esc_html__('countdown-v2', 'training') ),
			)
		),
	));
	


	/*********************************************************************************************************************
	 *  Video Box
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => esc_html__("Video box",'training'),
	    "base" => "wpo_video_box",
	    'icon' => 'icon-wpb-news-15',
	    'description'=>'Show Video box',
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
				"heading" => esc_html__("Data Url", 'training'),
				"param_name" => "url",
				"value" => '',
				"admin_label" => true,
				"description" => "example: //player.vimeo.com/video/88558878?color=ffffff&title=0&byline=0&portrait=0",
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Data Width', 'training' ),
				'param_name' => 'width',
				'value' => '1920'
		    ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Data Height', 'training' ),
				'param_name' => 'height',
				'value' => '1080'
		    ),
			array(
				"type" => "attach_image",
				"heading" => esc_html__("Backgroup Image", 'training'),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'value' => ''
		    )
	   	)
	));

	vc_map( array(
				'name'        => esc_html__( 'WPO Block Heading','training'),
				'base'        => 'wpo_block_heading',
				"class"       => "",
				"category"    => esc_html__('Opal Elements', 'training'),
				'description' => esc_html__( 'Create Block Heading with info + icon', 'training' ),
				"params"      => array(
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Block Heading Title', 'training' ),
						'param_name' => 'title',
						'value'       => esc_html__( '', 'training' ),
						'description' => esc_html__( 'Enter heading title.', 'training' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub Heading Title', 'training' ),
						'param_name' => 'subheading',
						'value'       => esc_html__( '', 'training' ),
						'description' => esc_html__( 'Enter Sub heading title.', 'training' ),
						"admin_label" => true
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
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Heading Style', 'training' ),
		                'param_name' => 'heading_style',
		                'value' => array(
		                  esc_html__( 'Version 1', 'training' ) => 'v1',
		      				esc_html__( 'Version 1 Light', 'training' ) => 'v1 light',
		      				esc_html__( 'Version 2', 'training' ) => 'v2',
		      				esc_html__( 'Version 2 Light', 'training' ) => 'v2 light', 
								esc_html__( 'Version 3', 'training' ) => 'v3',
								esc_html__( 'Version 3 Light', 'training' ) => 'v3 light',
								esc_html__( 'Version 3 Orange', 'training' ) => 'v3 orange',
								esc_html__( 'Version 3 Green', 'training' ) => 'v3 green',
								esc_html__( 'Version 4', 'training' ) => 'v4',
								esc_html__( 'Version 5', 'training' ) => 'v5',
								esc_html__( 'Version 6', 'training' ) => 'v6',
		               )
		            ),
					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'training' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'training' )
				    ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'training' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
					)
				),
			));

			/*********************************************************************************************************************
			 *  Our Service
			 *********************************************************************************************************************/
			vc_map( array(
			    "name" => esc_html__("Opal Featured Box",'training'),
			    "base" => "wpo_featuredbox",
			    "description"=> esc_html__('Decreale Service Info', 'training'),
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
						"heading" => esc_html__("Sub Title", 'training'),
						"param_name" => "subtitle",
						"value" => '',
							"admin_label" => false
					),
					
			    	array(
						"type" => "colorpicker",
						"heading" => esc_html__("Font Text Color", 'training'),
						"param_name" => "color",
						"value" => '',
							"admin_label" => false
					),

					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'training'),
						"param_name" => "style",
						'admin_label' => true,
						'value' 	=> array(
							esc_html__('Icon Right', 'training') => 'icon-box-left', 
							esc_html__('Icon Left', 'training') => 'icon-box-right', 
							esc_html__('Icon Center', 'training') => 'icon-box-center', 
							esc_html__('Icon Top - Text Left', 'training') => 'icon-box-top text-left', 
							esc_html__('Icon Top - Text Right', 'training') => 'icon-box-top text-right', 
							esc_html__('Icon Right - Text Left', 'training') => 'icon-right-text-left',
						),
					),	
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Background Block', 'training' ),
						'param_name' => 'background',
						'value' => array(
							esc_html__( 'None', 'training' ) => '',
							esc_html__( 'Success', 'training' ) => 'bg-success',
							esc_html__( 'Info', 'training' ) => 'bg-info',
							esc_html__( 'Danger', 'training' ) => 'bg-danger',
							esc_html__( 'Warning', 'training' ) => 'bg-warning',
							esc_html__( 'Light', 'training' ) => 'bg-default',
						)
					),

				 	array(
						"type" => "textfield",
						"heading" => esc_html__("FontAwsome Icon", 'training'),
						"param_name" => "icon",
						"value" => '',
						'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'training' )
										. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
										. esc_html__( 'here to see the list', 'training' ) . '</a>' . esc_html__( 'and use class icons-lg, icons-md, icons-sm to change its size', 'training' )
					),
				 	array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Icon Style', 'training' ),
						'param_name' => 'iconstyle',
						"admin_label" => true,
						'value' => training_wpo_get_iconstyles()
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__("Photo", 'training'),
						"param_name" => "photo",
						"value" => '',
						'description'	=> ''
					),

					array(
						"type" => "textarea_html",
						"heading" => esc_html__("Information", 'training'),
						"param_name" => "content",
						"value" => '',
						'description'	=> esc_html__('Allow  put html tags', 'training' )
					),

					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'training'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
					)
			   )
			));

			/*********************************************************************************************************************
			 *  WPO Counter
			 *********************************************************************************************************************/
			vc_map( array(
			    "name" => esc_html__("WPO Counter",'training'),
			    "base" => "wpo_counter",
			    "class" => "",
			    "description"=> esc_html__('Counting number with your term', 'training'),
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
						"type" => "colorpicker",
						"heading" => esc_html__("Text Color", 'training'),
						"param_name" => "color",
						"value" => '',
						'description'	=> ''
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'training'),
						"param_name" => "description",
						"value" => '',
							"admin_label" => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number", 'training'),
						"param_name" => "number",
						"value" => ''
					),

				 	array(
						"type" => "textfield",
						"heading" => esc_html__("FontAwsome Icon", 'training'),
						"param_name" => "icon",
						"value" => 'fa-pencil radius-x',
						'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'training' )
										. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
										. esc_html__( 'here to see the list', 'training' ) . '</a>' . esc_html__( 'and use class icons-lg, icons-md, icons-sm to change its size', 'training' )
					),


					array(
						"type" => "attach_image",
						"description" => esc_html__("If you upload an image, icon will not show.", 'training'),
						"param_name" => "image",
						"value" => '',
						'heading'	=> esc_html__('Image', 'training' )
					),

					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'training'),
						"param_name" => "style",
						'value' 	=> array( 
							esc_html__('Default', 'training') =>  'style-default',
							esc_html__('Style 2', 'training') =>'style-2',
							esc_html__('Style 2 light style', 'training') =>'style-2-light' ,
						)	
					),

					array(	
						"type" => "dropdown",
						"heading" => esc_html__("Text Color", 'training'),
						"param_name" => "text_color",
						'value' 	=> array( esc_html__('None', 'training') =>  'text-default', esc_html__('Primary', 'training') =>'text-primary' , esc_html__('Info', 'training') => 'text-info',  esc_html__('Danger', 'training') => 'text-danger',  esc_html__('Warning', 'training') => 'text-warning'  ),
					),
				
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'training'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
					)
			   )
			));

			/*********************************************************************************************************************
			 *  Info Box
			 *********************************************************************************************************************/
			vc_map( array(
			    "name" => esc_html__("WPO Info Box",'training'),
			    "base" => "wpo_inforbox",
			    "class" => "",
			    "description"=> esc_html__( 'Show header, text in special style', 'training'),
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
						"heading" => esc_html__("Sub Title", 'training'),
						"param_name" => "sub_title",
						"value" => '',
							"admin_label" => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Title Align', 'training' ),
						'param_name' => 'title_align',
						'value' => array(
							esc_html__( 'Align center', 'training' ) => 'separator_align_center',
							esc_html__( 'Align left', 'training' ) => 'separator_align_left',
							esc_html__( 'Align right', 'training' ) => "separator_align_right"
						),
						'description' => esc_html__( 'Select title align.', 'training' )
					), 
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Title font size', 'training' ),
						'param_name' => 'size',
						'value'      => array(
							esc_html__( 'Large', 'training' )       => 'font-size-lg',
							esc_html__( 'Medium', 'training' )      => 'font-size-md',
							esc_html__( 'Small', 'training' )       => 'font-size-sm',
							esc_html__( 'Extra small', 'training' ) => 'font-size-xs'
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Info Box Content Style', 'training' ),
						'param_name' => 'inforbox_style',
						'value'      => array(
						esc_html__( 'Light', 'training' )   => '',
						esc_html__( 'Dark', 'training' ) => 'inforbox-dark',
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Style display', 'training' ),
						'param_name' => 'style_display',
						'value'      => array(
						esc_html__( 'Default', 'training' )   => '',
						)
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
						"heading" => esc_html__("Extra class name", 'training'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
					)
			   	)
			));
		

			/*********************************************************************************************************************
			 *  Info Box
			 *********************************************************************************************************************/
			vc_map( array(
			    "name" => esc_html__("WPO Banner",'training'),
			    "base" => "wpo_banner",
			    "class" => "",
			    "description"=> esc_html__( 'Show Banner in special style', 'training'),
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
						"heading" => esc_html__("Sub title", 'training'),
						"param_name" => "subheading",
						"value" => '',
							"admin_label" => true
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Content Position', 'training' ),
						'param_name' => 'content_position',
						'value'      => array(
						esc_html__( 'Left', 'training' )   => 'content_position_left',
						esc_html__( 'Center', 'training' ) => 'content_position_center',
						esc_html__( 'Right', 'training' )  => 'content_position_right'
						)
					),
				 
					array(
						"type" => "textarea",
						"heading" => esc_html__("information", 'training'),
						"param_name" => "information",
						"value" => '',
						'description'	=> esc_html__('Allow  put html tags', 'training')
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__("Backgroup Image", 'training'),
						"param_name" => "imagebg",
						"value" => '',
						'description'	=> ''
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Link Button", 'training'),
						"param_name" => "link",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Text Button", 'training'),
						"param_name" => "link_text",
						"value" => '',
					),
					array(
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
							esc_html__( 'Outline Light', 'training' ) => 'btn-outline-light',
							
							esc_html__( 'Inverse Primary', 'training' ) => 'btn-inverse btn-primary',
							esc_html__( 'Inverse Danger', 'training' ) => 'btn-inverse btn-danger',
							esc_html__( 'Inverse Success', 'training' ) => 'btn-inverse btn-success',
							esc_html__( 'Inverse Info', 'training' ) => 'btn-inverse btn-info',
							esc_html__( 'Inverse  Warning', 'training' ) => 'btn-inverse btn-warning',
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Button Radius Style', 'training' ),
						'param_name' => 'btn_style',
						'prioryty' => 1,
						'value' => array(
							esc_html__( 'None', 'training' ) => '',
							esc_html__( 'Radius 50%', 'training' ) => 'radius-x',
						 	esc_html__( 'Radius 1x', 'training' ) => 'radius-1x',
						 	esc_html__( 'Radius 2x', 'training' ) => 'radius-2x',
						 	esc_html__( 'Radius 3x', 'training' ) => 'radius-3x',
						 	esc_html__( 'Radius 4x', 'training' ) => 'radius-4x',
							esc_html__( 'Radius 5x', 'training' ) => 'radius-5x',
							esc_html__( 'Radius 6x', 'training' ) => 'radius-6x',
						
						)
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Hover Effect', 'training' ),
						'param_name' => 'hover_effect',
						'prioryty' => 1,
						'value' => array(
							esc_html__( 'Always Show Content', 'training' ) => 'no-effect',
							esc_html__( 'Light and Hidden Content', 'training' ) => 'light-hide-effect',
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'training'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
					)
			   )
			));