<?php  
	$newssupported = true; 

if( $newssupported ) {
	/**********************************************************************************
	 * Front Page Posts
	 **********************************************************************************/

	/// Front Page 1
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 1', 'training' ),
		'base' => 'wpo_frontpageposts',
		'icon' => 'icon-wpb-news-1',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	// front page 2
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 2', 'training' ),
		'base' => 'wpo_frontpageposts2',
		'icon' => 'icon-wpb-news-8',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	// front page 3
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 3', 'training' ),
		'base' => 'wpo_frontpageposts3',
		'icon' => 'icon-wpb-news-3',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

		 

			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	// front page 2
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 4', 'training' ),
		'base' => 'wpo_frontpageposts4',
		'icon' => 'icon-wpb-news-4',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

		 

			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	
		// front page 12
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 12', 'training' ),
		'base' => 'wpo_frontpageposts12',
		'icon' => 'icon-wpb-news-12',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
// frontpage 13
	vc_map( array(
		'name' => esc_html__( '(News) FontPage 13', 'training' ),
		'base' => 'wpo_frontpageposts13',
		'icon' => 'icon-wpb-news-13',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Categories Tab Hovering to show post', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );	

		/**********************************************************************************
	 * FontPage News 14
	 **********************************************************************************/
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 14', 'training' ),
		'base' => 'wpo_frontpageposts14',
		'icon' => 'icon-wpb-news-1',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),
 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	
vc_map( array(
		'name' => esc_html__( '(News) Categories Post', 'training' ),
		'base' => 'wpo_categoriespost',
		'icon' => 'icon-wpb-news-3',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

		 

			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );	

// front page 9
	vc_map( array(
		'name' => esc_html__( '(News) FrontPage 9', 'training' ),
		'base' => 'wpo_frontpageposts9',
		'icon' => 'icon-wpb-news-9',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Grid Columns", 'training'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );

	// front page 3
	vc_map( array(
		'name' => esc_html__( '(Blog) TimeLine Post', 'training' ),
		'base' => 'wpo_timelinepost',
		'icon' => 'icon-wpb-news-10',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),
 

			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Enable Pagination', 'training' ),
				'param_name' => 'pagination',
				'value' => array( 'No'=>'0', 'Yes'=>'1'),
				'std' => '0',
				'admin_label' => true,
				'description' => esc_html__( 'Select style display.', 'training' )
			)
		)
	) );

	/****/
	vc_map( array(
		'name' => esc_html__( '(News) Categories Tab Post', 'training' ),
		'base' => 'wpo_categorytabpost',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),

		 

			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
	

	$layout_image = array(
		esc_html__('Grid', 'training')             => 'grid-1',
		esc_html__('Grid - Center', 'training')    => 'grid-2',
		esc_html__('List', 'training')             => 'list-1',
		esc_html__('List not image', 'training')   => 'list-2',
	);
	vc_map( array(
		'name' => esc_html__( '(News) Grid Posts', 'training' ),
		'base' => 'wpo_gridposts',
		'icon' => 'icon-wpb-news-2',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Post having news,managzine style', 'training' ),
	 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
			),

		 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Layout Type", 'training'),
				"param_name" => "layout",
				"layout_images" => $layout_image,
				"value" => $layout_image,
				"admin_label" => true,
				"description" => esc_html__("Select Skin layout.", 'training')
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Grid Columns", 'training'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );


	
	/**********************************************************************************
	 * Mega Blogs
	 **********************************************************************************/

	/// Front Page 1
	vc_map( array(
		'name' => esc_html__( '(Blog) FrontPage', 'training' ),
		'base' => 'wpo_frontpageblog',
		'icon' => 'icon-wpb-news-1',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),
 			 
			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			array(
				"type" => "dropdown",
				"heading" => esc_html__("Number Main Posts", 'training'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );


	vc_map( array(
		'name' => esc_html__('(Blog) Grids ', 'training' ),
		'base' => 'wpo_megablogs',
		'icon' => 'icon-wpb-news-2',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

		 

		 
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Description', 'training' ),
				'param_name' => 'descript',
				"value" => ''
			),

			array(
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 10 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__("Layout", 'training' ),
				"param_name" => "layout",
				"value" => array( esc_html__('Default Style', 'training' ) => 'blog' , esc_html__('Default Style 2', 'training' ) => 'blog-v2'  ,  esc_html__('Special Style 1', 'training' ) => 'special-1',  esc_html__('Special Style 2', 'training' ) => 'special-2',  esc_html__('Special Style 3', 'training' ) => 'special-3' ),
				"std" => 3,
				'admin_label'=> true
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__("Grid Columns", 'training'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );
 

	/**********************************************************************************
	 * Slideshow Post Widget Gets
	 **********************************************************************************/
		vc_map( array(
			'name' => esc_html__( '(News) Slideshow Post', 'training' ),
			'base' => 'wpo_slideshowpost',
			'icon' => 'icon-wpb-news-slideshow',
			"category" => esc_html__('Opal News', 'training'),
			'description' => esc_html__( 'Play Posts In slideshow', 'training' ),
			 
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Widget title', 'training' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
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
					'type' => 'textarea',
					'heading' => esc_html__( 'Heading Description', 'training' ),
					'param_name' => 'descript',
					"value" => ''
				),

				array(
					'type' => 'loop',
					'heading' => esc_html__( 'Grids content', 'training' ),
					'param_name' => 'loop',
					'settings' => array(
						'size' => array( 'hidden' => false, 'value' => 10 ),
						'order_by' => array( 'value' => 'date' ),
					),
					'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Layout", 'training' ),
					"param_name" => "layout",
					"value" => array( esc_html__('Default Style', 'training' ) => 'blog'  ,  esc_html__('Special Style 1', 'training' ) => 'style1' ,  esc_html__('Special Style 2', 'training' ) => 'style2' ),
					"std" => 3
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Grid Columns", 'training'),
					"param_name" => "grid_columns",
					"value" => array( 1 , 2 , 3 , 4 , 6),
					"std" => 3
				),


				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Thumbnail size', 'training' ),
					'param_name' => 'grid_thumb_size',
					'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'training' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
				)
			)
		) );
	
	// List
	vc_map( array(
		'name' => esc_html__( '(News) List Post', 'training' ),
		'base' => 'wpo_listpost',
		'icon' => 'icon-wpb-news-10',
		"category" => esc_html__('Opal News', 'training'),
		'description' => esc_html__( 'Create Post having blog styles', 'training' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Widget title', 'training' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'training' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => esc_html__( 'Title Alignment', 'training' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				esc_html__( 'Align left', 'training' )   => 'separator_align_left',
				esc_html__( 'Align center', 'training' ) => 'separator_align_center',
				esc_html__( 'Align right', 'training' )  => 'separator_align_right'
				)
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
				'type' => 'loop',
				'heading' => esc_html__( 'Grids content', 'training' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'training' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Thumbnail size', 'training' ),
				'param_name' => 'grid_thumb_size',
				'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'training' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'training' ),
				'param_name' => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'training' )
			)
		)
	) );


}
