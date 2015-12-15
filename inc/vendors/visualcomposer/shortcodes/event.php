<?php
if( WPO_EVENT_ACTIVED ){
		/*********************************************************************************************************************
		 * Event Frontend
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event Frontend (Grid)",'training'),
		    "base" => "wpo_event_frontend",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Frontend (Grid)',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Style display', 'training' ),
					"param_name" => "style",
					"value" => array(
						esc_html__('Style 1', 'training') => 'style-1',
						esc_html__('Style 2', 'training') => 'style-2'
					)
			    ),
				 array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Mode', 'training' ),
					"param_name" => "mode",
					"value" => array(
						esc_html__('Featured Events', 'training') => 'featured',
						esc_html__('Lastest Events', 'training') => 'most_recent',
						esc_html__('Randown Events', 'training') => 'random'
					)
			    ),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number', 'training' ),
					"param_name" => "number",
					"value" => ''
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Column', 'training' ),
					"param_name" => "columns",
					"value" => array(
						'2' => '2',
						'3' => '3',
						'4' => '4'
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


		/*********************************************************************************************************************
		 * Event List
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event List",'training'),
		    "base" => "wpo_event_list",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event List',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Mode', 'training' ),
					"param_name" => "mode",
					"value" => array(
						esc_html__('Featured Events', 'training') => 'featured',
						esc_html__('Lastest Events', 'training') => 'most_recent',
						esc_html__('Randown Events', 'training') => 'random'
					)
			    ),
				 array(
				 	"type" => "dropdown",
					'heading' => esc_html__( 'Order by', 'training' ),
					"param_name" => "order",
					"value" => array(
						esc_html__('Date', 'training') => 'date',
						esc_html__('Name', 'training') => 'name',
					)
				),
				 array(
				 	"type" => "dropdown",
					'heading' => esc_html__( 'Order', 'training' ),
					"param_name" => "order",
					"value" => array(
						esc_html__('ESC', 'training') => 'ESC',
						esc_html__('DESC', 'training') => 'DESC'
					)
				),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number', 'training' ),
					"param_name" => "number",
					"value" => ''
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Style Display', 'training' ),
					"param_name" => "style",
					"value" => array(
						esc_html__('Style Default', 'training') => 'style-default'
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

		/*********************************************************************************************************************
		 * Event List Accordion
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event Accordion",'training'),
		    "base" => "wpo_event_accordion",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Accordion',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Mode', 'training' ),
					"param_name" => "mode",
					"value" => array(
						esc_html__('Featured Events', 'training') => 'featured',
						esc_html__('Lastest Events', 'training') => 'most_recent',
						esc_html__('Randown Events', 'training') => 'random'
					)
			    ),
				 array(
				 	"type" => "dropdown",
					'heading' => esc_html__( 'Order by', 'training' ),
					"param_name" => "order",
					"value" => array(
						esc_html__('Date', 'training') => 'date',
						esc_html__('Name', 'training') => 'name',
					)
				),
				 array(
				 	"type" => "dropdown",
					'heading' => esc_html__( 'Order', 'training' ),
					"param_name" => "order",
					"value" => array(
						esc_html__('ESC', 'training') => 'ESC',
						esc_html__('DESC', 'training') => 'DESC'
					)
				),
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number', 'training' ),
					"param_name" => "number",
					"value" => ''
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
		 * Event Slide
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event Slide",'training'),
		    "base" => "wpo_event_slide",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display event slide',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Mode', 'training' ),
					"param_name" => "mode",
					"value" => array(
						esc_html__('Featured Events', 'training') => 'featured',
						esc_html__('Lastest Events', 'training') => 'most_recent',
						esc_html__('Randown Events', 'training') => 'random'
					)
			    ),				
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number', 'training' ),
					"param_name" => "number",
					"value" => ''
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
		 * Event Slide
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event Tabs",'training'),
		    "base" => "wpo_event_tabs",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display event slide',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Mode', 'training' ),
					"param_name" => "mode",
					"value" => array(
						esc_html__('Featured Events', 'training') => 'featured',
						esc_html__('Lastest Events', 'training') => 'most_recent',
						esc_html__('Randown Events', 'training') => 'random'
					)
			    ),				
				array(
					"type" => "textfield",
					'heading' => esc_html__( 'Number', 'training' ),
					"param_name" => "number",
					"value" => ''
			    ),
			    array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				)
		   )
		));

		/********************************************************************************************************************
		 * Event Frontend
		*********************************************************************************************************************/
		require_once(ABSPATH . 'wp-admin/includes/screen.php');
		$query = get_posts( array('post_type'=> 'tribe_events', 'orderby' => 'id', 'posts_per_page' => -1 ));
		$posts = array();

		foreach ( $query as $post ) {
			if($post->ID){
		   		$posts[$post->post_title] = $post->ID;
		   }
		}
		wp_reset_postdata();

		vc_map( array(
		    "name" => esc_html__("WPO Event Countdown",'training'),
		    "base" => "wpo_event_countdown",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Single',
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					"type" => "dropdown",
					'heading' => esc_html__( 'Event Single', 'training' ),
					"param_name" => "event_id",
					"value" => $posts
			    ),
			    array(
					"type" => "dropdown",
					'heading' => esc_html__( 'Layout', 'training' ),
					"param_name" => "layout",
					"value" => array(
						'Layout 1' => 'layout-1',
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

		/*********************************************************************************************************************
		 * Event of day
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("WPO Event Of Date",'training'),
		    "base" => "wpo_event_of_date",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Of Date',
		    'admin_enqueue_js'	=> array(
		    		get_template_directory_uri(). '/inc/assets/js/event_of_date.backend.js'
		    	),
		    'admin_enqueue_style'	=> array(
		    		get_template_directory_uri(). '/inc/assets/css/colorpicker.css'
		    	),
		    "class" => "",
		    "category" => esc_html__('Opal Event', 'training'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'training'),
					"param_name" => "title",
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
					'heading' => esc_html__( 'Date', 'training' ),
					"param_name" => "event_date",
					"value" => ''
			   ),
				array(
					"type" => "dropdown_multiple",
					'heading' => esc_html__('Events', 'training'),
					'param_name' => "event_ids",
					'value' => array()
				), 
			   array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'training'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
				),
				)
		));
}

		add_shortcode_param( 'dropdown_multiple', 'dropdown_multi_settings_field' );
		function dropdown_multi_settings_field( $settings, $value ) {
			$output = '';
			$css_option = vc_get_dropdown_option( $settings, $value );
			$output .= '<select multiple name="'
			           . $settings['param_name']
			           . '" class="wpb_vc_param_value wpb-input wpb-select '
			           . $settings['param_name']
			           . ' ' . $settings['type']
			           . ' ' . $css_option
			           . '" data-option="' . $css_option . '" data-value="'.$value.'">';
			if ( is_array( $value ) ) {
				$value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
			}
			foreach ( $settings['value'] as $index => $data ) {
				if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
					$option_label = $data;
					$option_value = $data;
				} elseif ( is_numeric( $index ) && is_array( $data ) ) {
					$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
					$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
				} else {
					$option_value = $data;
					$option_label = $index;
				}
				$option_label =  $option_label;
				$selected = '';
				if ( $value !== '' && (string) $option_value === (string) $value ) {
					$selected = ' selected="selected"';
				}
				$output .= '<option class="' . $option_value . '" value="' . $option_value . '"' . $selected . '>'
				           . htmlspecialchars( $option_label ) . '</option>';
			}
			$output .= '</select>';

			return $output;
		}

		add_action('wp_ajax_load_event_of_date', '_backend_load_event_of_date');
		function _backend_load_event_of_date(){
			if ( isset( $_POST['event_date'] ) && $_POST['event_date'] ) {
				TribeEventsQuery::init();
				$states[] = 'publish';
				if ( 0 < get_current_user_id() ) {
					$states[] = 'private';
				} 
				$args = array(
					'post_status'  => $states,
					'eventDate'    => $_POST["event_date"],
					'eventDisplay' => 'day'
				);

				TribeEvents::instance()->displaying = 'day';
				$query = TribeEventsQuery::getEvents( $args, true );
				global $wp_query, $post;
				$wp_query = $query;
				add_filter( 'tribe_is_day', '__return_true' );
				$html='';

				 if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$html .= '<option value="' . get_the_ID() . '"> ' . get_the_title() . '</option>';
					endwhile;
					wp_reset_postdata();
				endif;

		$response = array(
			'html'        => $html,
			'success'     => true,
			'total_count' => $query->found_posts,
			'view'        => 'day',
		);
		header( 'Content-type: application/json' );
		echo json_encode( $response );
		die();
	}
}

	/*********************************************************************************************************************
		* Event Timeline
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => esc_html__("WPO Event Timeline",'training'),
	    "base" => "wpo_event_timeline",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Event Timeline',
	    "class" => "",
	    "category" => esc_html__('Opal Event', 'training'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => esc_html__("Title", 'training'),
				"param_name" => "title",
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
				"type" => "dropdown",
				'heading' => esc_html__( 'Mode', 'training' ),
				"param_name" => "mode",
				"value" => array(
					esc_html__('Featured Events', 'training') => 'featured',
					esc_html__('Lastest Events', 'training') => 'most_recent',
					esc_html__('Randown Events', 'training') => 'random'
				)
		    ),
			array(
				"type" => "textfield",
				'heading' => esc_html__( 'Number', 'training' ),
				"param_name" => "number",
				"value" => ''
		    ),
		   array(
				"type" => "textfield",
				"heading" => esc_html__("Extra class name", 'training'),
				"param_name" => "el_class",
				"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
			),
			)
	));
