<?php
if( WPO_IBEDUCATOR_ACTIVED ){
   /*********************************************************************************************************************
    * EDUCATOR GRID
    *********************************************************************************************************************/
   vc_map( array(
       "name" => esc_html__("WPO Educator Grid",'training'),
       "base" => "wpo_educator_grid",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display Educator Grid',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
               esc_html__('Lastest Courses', 'training') => 'most_recent',
               esc_html__('Randown Courses', 'training') => 'random'
            )
          ),
          array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Style', 'training' ),
            "param_name" => "style",
            "value" => array(
               esc_html__('Default', 'training') => '',
               esc_html__('Style Absolute', 'training') => 'absolute'
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
            "param_name" => "column",
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
    * EDUCATOR Odds
    *********************************************************************************************************************/
   vc_map( array(
       "name" => esc_html__("WPO Educator Grid Odds",'training'),
       "base" => "wpo_educator_grid_odds",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display Educator Grid Odds',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
               esc_html__('Lastest Courses', 'training') => 'most_recent',
               esc_html__('Randown Courses', 'training') => 'random'
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
   * EDUCATOR Carousel
*********************************************************************************************************************/
   vc_map( array(
       "name" => esc_html__("WPO Educator Carousel",'training'),
       "base" => "wpo_educator_carousel",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display Educator Grid Odds',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
               esc_html__('Lastest Courses', 'training') => 'most_recent',
               esc_html__('Randown Courses', 'training') => 'random'
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
            "param_name" => "column",
            "value" => array(
               '1' => '1',
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
   * EDUCATOR Search form
*********************************************************************************************************************/
   vc_map( array(
       "name" => esc_html__("WPO Educator Searchform",'training'),
       "base" => "wpo_educator_searchform",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display Educator SearchForm',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
            'heading' => esc_html__( 'Style', 'training' ),
            "param_name" => "style",
            "value" => array(
               esc_html__('Default', 'training') => 'default',
               esc_html__('Light Style', 'training') => 'light-style',
               esc_html__('Vertical Style', 'training') => 'vertical-style',
               esc_html__('Vertical Light Style', 'training') => 'vertical-style light'
            )
          ),
          array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Display categories', 'training' ),
            "param_name" => "cat_display",
            "value" => array(
               esc_html__('Enable', 'training') => '1',
               esc_html__('Disable', 'training') => '0'
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
}

/*********************************************************************************************************************
   * Teacher
*********************************************************************************************************************/
   $teacher_categories = array('-- Category --'=> '');
  if( is_admin() ){
    global $wpdb;
    $query    = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'category_teachers' and b.parent = 0";
    $categories = $wpdb->get_results($query);
    foreach ($categories as $category) {
      $teacher_categories[$category->name] = $category->slug;
    }
  } 

   vc_map( array(
       "name" => esc_html__("WPO Teacher Grid",'training'),
       "base" => "wpo_teacher_grid",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display Teacher Grid',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
               esc_html__( 'Align center', 'training' ) => 'separator_align_center',
               esc_html__( 'Align left', 'training' ) => 'separator_align_left',
               esc_html__( 'Align right', 'training' ) => 'separator_align_right'
            )
         ),
          array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Category', 'training' ),
            "param_name" => "category",
            "value" => $teacher_categories
          ),
          array(
            "type" => "textfield",
            'heading' => esc_html__( 'Number', 'training' ),
            "param_name" => "number",
            "value" => '6'
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show Information', 'training' ),
            'param_name' => 'showinfo',
            'value' => array(
               esc_html__( 'No', 'training' ) => '0',
               esc_html__( 'Yes', 'training' ) => '1',
   
            )
         ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Display Style', 'training' ),
            'param_name' => 'layout',
             "admin_label" => true,
            'value' => array(
               esc_html__( 'Normal', 'training' ) => 'normal',
               esc_html__( 'Vertical', 'training' ) => 'vertical',
               esc_html__('Vertical 2 Light', 'training') => 'vertical-2',
               esc_html__('Horizontal V2', 'training') => 'horizontal-v2',
               esc_html__('Carousel', 'training') => 'carousel'
   
            )
         ),
         array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Column', 'training' ),
            "param_name" => "column",
            "value" => array(
               '1' => '1',
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '6' => '6'
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

//-- Category Courses Filter --


vc_map( array(
       "name" => esc_html__("WPO Category Courses Filter",'training'),
       "base" => "wpo_category_courses_filter",
       'icon' => 'icon-wpb-application-icon-large',
       'description'=>'Display WPO Category Courses Filter',
       "class" => "",
       "category" => esc_html__('Opal Educator', 'training'),
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
               esc_html__( 'Align center', 'training' ) => 'separator_align_center',
               esc_html__( 'Align left', 'training' ) => 'separator_align_left',
               esc_html__( 'Align right', 'training' ) => 'separator_align_right'
            )
         ),
          array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Category', 'training' ),
            "param_name" => "category",
            "value" => $teacher_categories
          ),

          array(
            "type" => "textfield",
            'heading' => esc_html__( 'Number', 'training' ),
            "param_name" => "number",
            "value" => '6'
          ),
         array(
            "type" => "dropdown",
            'heading' => esc_html__( 'Column', 'training' ),
            "param_name" => "column",
            "value" => array(
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '6' => '6'
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