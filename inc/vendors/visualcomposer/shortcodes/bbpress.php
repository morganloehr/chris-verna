<?php 
if( WPO_BBPRESS_ACTIVED ){ 
  
	     vc_map( array(
	        "name" => esc_html__("Recent Topics",'training').'(bbpress)',
	        "base" => "wpo_bbpress_topics",
	        "class" => "",
	        "category" => esc_html__('Opal PuddyPress','training'),
	        "description"	=> esc_html__( 'Display Topics from bbpress plugin', 'training' ),
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
	                "heading" => esc_html__("Max Topics to show", 'training'),
	                "param_name" => "max_shown",
	                "value" => '5',
	                "description" => esc_html__("Show Topics Group", 'training')
	            ),

	            array(
	                "type" => "dropdown",
	                "heading" => esc_html__("Order By",'training'),
	                "param_name" => "order_by",
	                "value" => array(
	                	esc_html__( 'Newest', 'training' ) => 'newness',
	                	esc_html__( 'Newest Topics Topics', 'training' ) => 'popular',
	                	esc_html__( 'Topics With Recent Replies', 'training' ) => 'freshness',
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

}