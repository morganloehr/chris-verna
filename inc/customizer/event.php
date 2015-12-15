<?php
if(WPO_EVENT_ACTIVED){
    add_action( 'customize_register', 'training_wpo_ct_event_setting' );
    function training_wpo_ct_event_setting( $wp_customize ){
        
        $wp_customize->add_panel( 'panel_event', array(
            'priority' => 81,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Event', 'training' ),
            'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
        ) );

        /**
         * Layout Setting
         */
        $wp_customize->add_section( 'event_layout_settings', array(
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Layout Setting', 'training' ),
            'description' => '',
            'panel' => 'panel_event',
        ) );

        $wp_customize->add_setting( 'wpo_theme_options[event-archive-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[event-archive-layout]', array(
            'settings'  => 'wpo_theme_options[event-archive-layout]',
            'label'     => esc_html__('Archive Layout', 'training'),
            'section'   => 'event_layout_settings',
            'priority' => 1

        ) ) );
       
        $wp_customize->add_setting( 'wpo_theme_options[event-archive-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'event-sidebar-left',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        
        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[event-archive-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[event-archive-left-sidebar]',
            'label'     => esc_html__('Archive Left Sidebar', 'training'),
            'section'   => 'event_layout_settings' ,
             'priority' => 2
        ) ) );

         /// 
        $wp_customize->add_setting( 'wpo_theme_options[event-archive-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'event-sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[event-archive-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[event-archive-right-sidebar]',
            'label'     => esc_html__('Archive Right Sidebar', 'training'),
            'section'   => 'event_layout_settings',
             'priority' => 2 
        ) ) );

         ///  single layout setting
        $wp_customize->add_setting( 'wpo_theme_options[event-single-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[event-single-layout]', array(
            'settings'  => 'wpo_theme_options[event-single-layout]',
            'label'     => esc_html__('Single Event Layout', 'training'),
            'section'   => 'event_layout_settings' 
        ) ) );

       
        $wp_customize->add_setting( 'wpo_theme_options[event-single-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'event-sidebar-left',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[event-single-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[event-single-left-sidebar]',
            'label'     => esc_html__('Single Event Left Sidebar', 'training'),
            'section'   => 'event_layout_settings' 
        ) ) );

         $wp_customize->add_setting( 'wpo_theme_options[event-single-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'event-sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[event-single-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[event-single-right-sidebar]',
            'label'     => esc_html__('Single event Right Sidebar', 'training'),
            'section'   => 'event_layout_settings' 
        ) ) );

    }
}