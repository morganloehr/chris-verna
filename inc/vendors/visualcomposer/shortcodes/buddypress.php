<?php 
if( WPO_PUDDYPRESS_ACTIVED ){
 
		   vc_map( array(
		        "name" => esc_html__("PuddyPress Members",'training'),
		        "base" => "wpo_puddypress_members",
		        "class" => "",
		        "category" => esc_html__('Opal PuddyPress','training'),
		        "description"	=> esc_html__( 'Display Active, Newest Members with avatar', 'training' ),
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
		                "heading" => esc_html__("Max members to show", 'training'),
		                "param_name" => "max_members",
		                "value" => '10',
		                "description" => esc_html__("Show Maximun Members", 'training')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Default Show Members",'training'),
		                "param_name" => "member_default",
		                "value" => array(
		                	esc_html__( 'Newest', 'training' ) => 'newest',
		                	esc_html__( 'Aactive', 'training' ) => 'active',
		                	esc_html__( 'Popular', 'training' ) => 'popular',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Show List of Members As expected.",'training')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Avatar Size",'training'),
		                "param_name" => "avatar_size",
		                "value" => array(
		                	esc_html__( 'Large', 'training' ) => 'avatar-md',
		                	esc_html__( 'Medium', 'training' ) => 'avatar-md',
		                	esc_html__( 'Small', 'training' ) => 'avatar-sm',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Display Avatar with expected size.",'training')
		            ),

		             array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Style Display",'training'),
		                "param_name" => "style",
		                "value" => array(
		                	esc_html__( 'Block', 'training' ) => 'block',
		                	esc_html__( 'Inline', 'training' ) => 'inline',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Display Title and Avatar Block in expected Style",'training')
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Extra class name", 'training'),
		                "param_name" => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
		            ),
		        )
		    ));
		 

		    ///

		     vc_map( array(
		        "name" => esc_html__("PuddyPress Group",'training'),
		        "base" => "wpo_puddypress_groups",
		        "class" => "",
		        "category" => esc_html__('Opal PuddyPress','training'),
		        "description"	=> esc_html__( 'Display Active, Newest Group with avatar', 'training' ),
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
		                "heading" => esc_html__("Max group to show", 'training'),
		                "param_name" => "max_group",
		                "value" => '10',
		                "description" => esc_html__("Show Maximun Group", 'training')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Default Show Group",'training'),
		                "param_name" => "group_default",
		                "value" => array(
		                	esc_html__( 'Newest', 'training' ) => 'newest',
		                	esc_html__( 'Aactive', 'training' ) => 'active',
		                	esc_html__( 'Popular', 'training' ) => 'popular',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Show List of Group As expected.",'training')
		            ),
		           
		             array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Column Display",'training'),
		                "param_name" => "column",
		                "value" => array(
		                	esc_html__( '2 Columns', 'training' ) => '2',
		                	esc_html__( '1 Column', 'training' ) => '1',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Display Title and Avatar Block in expected Style",'training')
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Extra class name", 'training'),
		                "param_name" => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'training')
		            ),
		        )
		    ));
		    
		    //

		 


		    $output = array(); 

		    if( is_admin() ){
			    $posts = get_posts (array ('post_type' => 'bps_form', 'orderby' => 'ID', 'order' => 'ASC', 'nopaging' => true));  
			    foreach ($posts as $post) {
			    	$output[$post->post_title] = $post->ID;
			    }   
			}


		     vc_map( array(
		        "name" => esc_html__("PuddyPress Profile Search",'training'),
		        "base" => "wpo_profile_search",
		        "class" => "",
		        "category" => esc_html__('Opal PuddyPress','training'),
		        "description"	=> esc_html__( 'Display Profiles Search Form', 'training' ),
		        "params" => array(
		            array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Title', 'training'),
		                "param_name" => "title",
		                "admin_label" => true
		            ),
		            
		           
		             array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Form Display",'training'),
		                "param_name" => "form",
		                "value" => $output,
		                "admin_label" => false,
		                "description" => esc_html__("Display Title and Avatar Block in expected Style",'training')
		            ),

		             array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Template",'training'),
		                "param_name" => "template",
		                "value" => array(
		                	esc_html__( 'Couple Style', 'training' ) => 'pbs-couple-form',
		                	esc_html__( 'Normal style', 'training' ) => 'pbs-normal-form',
		                ),
		                "admin_label" => false,
		                "description" => esc_html__("Display Title and Avatar Block in expected Style",'training')
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