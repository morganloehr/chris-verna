<?php
if(WPO_IBEDUCATOR_ACTIVED){
    add_action( 'customize_register', 'training_wpo_ct_courses_setting' );
    function training_wpo_ct_courses_setting( $wp_customize ){
        
        $wp_customize->add_panel( 'panel_courses', array(
            'priority' => 81,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Courses Setting', 'training' ),
            'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
        ) );

        /**
         * Layout Setting
         */
        $wp_customize->add_section( 'courses_layout_settings', array(
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Layout Setting', 'training' ),
            'description' => '',
            'panel' => 'panel_courses',
        ));

        $wp_customize->add_setting( 'wpo_theme_options[courses-archive-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[courses-archive-layout]', array(
            'settings'  => 'wpo_theme_options[courses-archive-layout]',
            'label'     => esc_html__('Archive Layout', 'training'),
            'section'   => 'courses_layout_settings',
            'priority' => 1

        ) ) );
       
        $wp_customize->add_setting( 'wpo_theme_options[courses-archive-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'courses-sidebar-left',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[courses-archive-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[courses-archive-left-sidebar]',
            'label'     => esc_html__('Archive Left Sidebar', 'training'),
            'section'   => 'courses_layout_settings' ,
             'priority' => 2
        ) ) );

         /// 
        $wp_customize->add_setting( 'wpo_theme_options[courses-archive-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'courses-sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[courses-archive-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[courses-archive-right-sidebar]',
            'label'     => esc_html__('Archive Right Sidebar', 'training'),
            'section'   => 'courses_layout_settings',
             'priority' => 2 
        ) ) );

         ///  single layout setting
        $wp_customize->add_setting( 'wpo_theme_options[courses-single-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[courses-single-layout]', array(
            'settings'  => 'wpo_theme_options[courses-single-layout]',
            'label'     => esc_html__('Single Course Layout', 'training'),
            'section'   => 'courses_layout_settings' 
        ) ) );

       
        $wp_customize->add_setting( 'wpo_theme_options[courses-single-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'courses-sidebar-left',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[courses-single-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[courses-single-left-sidebar]',
            'label'     => esc_html__('Single Courses Left Sidebar', 'training'),
            'section'   => 'courses_layout_settings' 
        ) ) );

         $wp_customize->add_setting( 'wpo_theme_options[courses-single-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'courses-sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[courses-single-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[courses-single-right-sidebar]',
            'label'     => esc_html__('Single courses Right Sidebar', 'training'),
            'section'   => 'courses_layout_settings' 
        ) ) );

        $wp_customize->add_setting('wpo_theme_options[courses-number-related-single]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => '3',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[courses-number-related-single]', array(
            'label'      => esc_html__( 'Number Courses related single', 'training' ),
            'section'    => 'courses_layout_settings',
            'type'       => 'number',
            'default'     => '3'
        ) ); 

        /**
         * Archive Setting
         */
        $wp_customize->add_section( 'courses_archive_general_settings', array(
            'priority' => 11,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Archive Setting', 'training' ),
            'description' => '',
            'panel' => 'panel_courses',
        ) );

         $wp_customize->add_setting('wpo_theme_options[courses-archive-column]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => '4',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[courses-archive-column]', array(
            'label'      => esc_html__( 'Select column', 'training' ),
            'section'    => 'courses_archive_general_settings',
            'type'       => 'select',
            'choices'     => array(
                '2' => esc_html__('2 column', 'training' ),
                '3' => esc_html__('3 column', 'training' ),
                '4' => esc_html__('4 column', 'training' )
            )
        ) ); 
    }
}