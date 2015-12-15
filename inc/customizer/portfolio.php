<?php
add_action( 'customize_register', 'training_wpo_ct_portfolio_setting' );
function training_wpo_ct_portfolio_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_portfolio', array(
        'priority' => 80,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Portfolio', 'training' ),
        'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
    ) );


    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'portfolio_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Portfolio Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

     ///  Archive layout setting
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[portfolio-layout]', array(
        'settings'  => 'wpo_theme_options[portfolio-layout]',
        'label'     => esc_html__('Layout', 'training'),
        'section'   => 'portfolio_settings',
        'priority' => 1

    ) ) );

   
   
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[portfolio-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[portfolio-left-sidebar]',
        'label'     => esc_html__('Archive Left Sidebar', 'training'),
        'section'   => 'portfolio_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[portfolio-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[portfolio-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[portfolio-right-sidebar]',
        'label'     => esc_html__('Archive Right Sidebar', 'training'),
        'section'   => 'portfolio_settings',
         'priority' => 2 
    ) ) );


    $wp_customize->add_setting('wpo_theme_options[portfolio_show-title]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[portfolio_show-title]', array(
        'settings'  => 'wpo_theme_options[portfolio_show-title]',
        'label'     => esc_html__('Show title', 'training'),
        'section'   => 'portfolio_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[portfolio_show-breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[portfolio_show-breadcrumb]', array(
        'settings'  => 'wpo_theme_options[portfolio_show-breadcrumb]',
        'label'     => esc_html__('Show breadcrumb', 'training'),
        'section'   => 'portfolio_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

     /**
     * Archive Setting
     */
    $wp_customize->add_section( 'portfolio_archive', array(
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Portfolio Archive', 'training' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[portfolio-items-show]', array(
        'type'       => 'option',
        'default'    => 4,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[portfolio-items-show]', array(
        'label'      => esc_html__( 'Number Of post to show', 'training' ),
        'section'    => 'portfolio_archive',
        'type'       => 'select',
        'choices'     => array(
            '2' => esc_html__('2 posts', 'training' ),
            '3' => esc_html__('3 posts', 'training' ),
            '4' => esc_html__('4 posts', 'training' ),
        )
    ) );

    $wp_customize->add_setting('wpo_theme_options[portfolio-style]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $path = WPO_THEME_DIR.'/templates/portfolio/portfolio-*.php';
    $file_name = 'portfolio-';

    $wp_customize->add_control( 'wpo_theme_options[portfolio-style]', array(
        'label'      => esc_html__( 'Archive style', 'training' ),
        'section'    => 'portfolio_archive',
        'type'       => 'select',
        'choices'     => training_wpo_get_styles($path, $file_name)
    ) );

     /**
     * Single Setting
     */
    $wp_customize->add_section( 'portfolio_single', array(
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Portfolio Single', 'training' ),
        'description' => '',
        'panel' => 'panel_portfolio'
    ) );

    $wp_customize->add_setting('wpo_theme_options[show-share-portfolio]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-share-portfolio]', array(
        'settings'  => 'wpo_theme_options[show-share-portfolio]',
        'label'     => esc_html__('Show share portfolio', 'training'),
        'section'   => 'portfolio_single',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[show-related-portfolio]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-related-portfolio]', array(
        'settings'  => 'wpo_theme_options[show-related-portfolio]',
        'label'     => esc_html__('Show related portfolio', 'training'),
        'section'   => 'portfolio_single',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );


}
