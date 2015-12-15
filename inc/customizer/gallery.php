<?php
add_action( 'customize_register', 'training_wpo_ct_gallery_setting' );
function training_wpo_ct_gallery_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_gallery', array(
        'priority' => 82,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Gallery', 'training' ),
        'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
    ) );

    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'gallery_layout_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Layout Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_gallery',
    ) );

     ///  Archive layout setting
    $wp_customize->add_setting( 'wpo_theme_options[gallery-archive-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[gallery-archive-layout]', array(
        'settings'  => 'wpo_theme_options[gallery-archive-layout]',
        'label'     => esc_html__('Archive Layout', 'training'),
        'section'   => 'gallery_layout_settings',
        'priority' => 1

    ) ) );

   
    $wp_customize->add_setting( 'wpo_theme_options[gallery-archive-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'gallery-sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[gallery-archive-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[gallery-archive-left-sidebar]',
        'label'     => esc_html__('Archive Left Sidebar', 'training'),
        'section'   => 'gallery_layout_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[gallery-archive-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'gallery-sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[gallery-archive-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[gallery-archive-right-sidebar]',
        'label'     => esc_html__('Archive Right Sidebar', 'training'),
        'section'   => 'gallery_layout_settings',
         'priority' => 2 
    ) ) );

     ///  single layout setting
    $wp_customize->add_setting( 'wpo_theme_options[gallery-single-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[gallery-single-layout]', array(
        'settings'  => 'wpo_theme_options[gallery-single-layout]',
        'label'     => esc_html__('Single Blog Layout', 'training'),
        'section'   => 'gallery_layout_settings' 
    ) ) );

   
    $wp_customize->add_setting( 'wpo_theme_options[gallery-single-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'gallery-sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[gallery-single-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[gallery-single-left-sidebar]',
        'label'     => esc_html__('Single gallery Left Sidebar', 'training'),
        'section'   => 'gallery_layout_settings' 
    ) ) );

     $wp_customize->add_setting( 'wpo_theme_options[gallery-single-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'gallery-sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[gallery-single-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[gallery-single-right-sidebar]',
        'label'     => esc_html__('Single gallery Right Sidebar', 'training'),
        'section'   => 'gallery_layout_settings' 
    ) ) );

    /**
     * Archive Setting
     */
    $wp_customize->add_section( 'gallery_archive_general_settings', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Archive Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_gallery',
    ) );

     $wp_customize->add_setting('wpo_theme_options[gallery-archive-column]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '4',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[gallery-archive-column]', array(
        'label'      => esc_html__( 'Select column', 'training' ),
        'section'    => 'gallery_archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => esc_html__('2 column', 'training' ),
            '3' => esc_html__('3 column', 'training' ),
            '4' => esc_html__('4 column', 'training' ),
            '6' => esc_html__('6 column', 'training' ),
        )
    ) ); 
}
