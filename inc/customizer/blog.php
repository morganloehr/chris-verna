<?php
add_action( 'customize_register', 'training_wpo_ct_blog_setting' );
function training_wpo_ct_blog_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_blog', array(
        'priority' => 80,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Blog', 'training' ),
        'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
    ) );


    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'blog_layout_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Layout Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

     ///  Archive layout setting
    $wp_customize->add_setting( 'wpo_theme_options[blog-archive-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[blog-archive-layout]', array(
        'settings'  => 'wpo_theme_options[blog-archive-layout]',
        'label'     => esc_html__('Archive Layout', 'training'),
        'section'   => 'blog_layout_settings',
        'priority' => 1

    ) ) );

   

   
    $wp_customize->add_setting( 'wpo_theme_options[blog-archive-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[blog-archive-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[blog-archive-left-sidebar]',
        'label'     => esc_html__('Archive Left Sidebar', 'training'),
        'section'   => 'blog_layout_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[blog-archive-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[blog-archive-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[blog-archive-right-sidebar]',
        'label'     => esc_html__('Archive Right Sidebar', 'training'),
        'section'   => 'blog_layout_settings',
         'priority' => 2 
    ) ) );

     ///  single layout setting
    $wp_customize->add_setting( 'wpo_theme_options[blog-single-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[blog-single-layout]', array(
        'settings'  => 'wpo_theme_options[blog-single-layout]',
        'label'     => esc_html__('Single Blog Layout', 'training'),
        'section'   => 'blog_layout_settings' 
    ) ) );

   
    $wp_customize->add_setting( 'wpo_theme_options[blog-single-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[blog-single-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[blog-single-left-sidebar]',
        'label'     => esc_html__('Single blog Left Sidebar', 'training'),
        'section'   => 'blog_layout_settings' 
    ) ) );

     $wp_customize->add_setting( 'wpo_theme_options[blog-single-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[blog-single-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[blog-single-right-sidebar]',
        'label'     => esc_html__('Single blog Right Sidebar', 'training'),
        'section'   => 'blog_layout_settings' 
    ) ) );


    /**
     * General Setting
     */
    $wp_customize->add_section( 'blog_general_settings', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'General Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    
    $wp_customize->add_setting('wpo_theme_options[blog_show-title]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[blog_show-title]', array(
        'settings'  => 'wpo_theme_options[blog_show-title]',
        'label'     => esc_html__('Show title', 'training'),
        'section'   => 'blog_general_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[blog_show-breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[blog_show-breadcrumb]', array(
        'settings'  => 'wpo_theme_options[blog_show-breadcrumb]',
        'label'     => esc_html__('Show breadcrumb', 'training'),
        'section'   => 'blog_general_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    /**
     * Archive Setting
     */
    $wp_customize->add_section( 'archive_general_settings', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Archive Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    
    $wp_customize->add_setting('wpo_theme_options[archive-style]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $path = WPO_THEME_DIR.'/templates/blog/blog-*.php';
    $file_name = 'blog-';

    $wp_customize->add_control( 'wpo_theme_options[archive-style]', array(
        'label'      => esc_html__( 'Archive style', 'training' ),
        'section'    => 'archive_general_settings',
        'type'       => 'select',
        'choices'     => training_wpo_get_styles($path, $file_name)
    ) );

     $wp_customize->add_setting('wpo_theme_options[archive-column]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '4',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[archive-column]', array(
        'label'      => esc_html__( 'Select column', 'training' ),
        'section'    => 'archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => esc_html__('2 column', 'training' ),
            '3' => esc_html__('3 column', 'training' ),
            '4' => esc_html__('4 column', 'training' ),
            '6' => esc_html__('6 column', 'training' ),
        )
    ) );


    /**
     * Single post Setting
     */
    $wp_customize->add_section( 'blog_single_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Single post Setting', 'training' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    
    $wp_customize->add_setting('wpo_theme_options[show-share-post]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-share-post]', array(
        'settings'  => 'wpo_theme_options[show-share-post]',
        'label'     => esc_html__('Show share post', 'training'),
        'section'   => 'blog_single_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[show-related-post]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[show-related-post]', array(
        'settings'  => 'wpo_theme_options[show-related-post]',
        'label'     => esc_html__('Show related post', 'training'),
        'section'   => 'blog_single_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
    

    $wp_customize->add_setting( 'wpo_theme_options[blog-items-show]', array(
        'type'       => 'option',
        'default'    => 4,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[blog-items-show]', array(
        'label'      => esc_html__( 'Number Of post to show', 'training' ),
        'section'    => 'blog_single_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => esc_html__('2 posts', 'training' ),
            '3' => esc_html__('3 posts', 'training' ),
            '4' => esc_html__('4 posts', 'training' ),
            '6' => esc_html__('6 posts', 'training' ),
        )
    ) );    
}
