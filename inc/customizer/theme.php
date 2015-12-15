<?php
 
add_action( 'customize_register', 'training_wpo_cst_customizer' );

function training_wpo_cst_customizer($wp_customize){

    # General Settings
    // Panel Header
    $wp_customize->add_section('wpo_cst_general_settings', array(
        'title'      => esc_html__('General Settings', 'training'),
        'description'    => esc_html__('Website General Settings', 'training'),
        'transport'  => 'postMessage',
        'priority'   => 10,
    ));

    // Parameter Options
    $wp_customize->add_setting('blogname', array( 
        'default'    => get_option('blogname'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('blogname', array( 
        'label'    => esc_html__('Site Title', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 1,
    ) );
    
    //
    $wp_customize->add_setting('blogdescription', array( 
        'default'    => get_option('blogdescription'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('blogdescription', array( 
        'label'    => esc_html__('Tagline', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 2,
    ) );


    // 
    $wp_customize->add_setting('display_header_text', array( 
        'default'    => 1,
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );    
    $wp_customize->add_control( 'display_header_text', array(
        'settings' => 'header_textcolor',
        'label'    => esc_html__( 'Show Title & Tagline', 'training' ),
        'section'  => 'wpo_cst_general_settings',
        'type'     => 'checkbox',
        'priority' => 4,
    ) );


    /* 
     * Custom Logo 
     */
     $wp_customize->add_setting('wpo_theme_options[logo]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[logo]', array(
        'label'    => esc_html__('Logo', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[logo]',
        'priority' => 10,
    ) ) );
    
     /* 
     * Custom payment 
     */
     $wp_customize->add_setting('wpo_theme_options[image-payment]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[image-payment]', array(
        'label'    => esc_html__('Payment Logo', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[image-payment]',
        'priority' => 11,
    ) ) );

    //
    $wp_customize->add_setting( 'wpo_theme_options[preloader]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => 'default',
         'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[preloader]', array(
        'label'      => esc_html__( 'Enable Preloader', 'training' ),
        'section'    => 'wpo_cst_general_settings',
        'type'       => 'select',
        'choices'    => array('1'=> 'Enable', '0'=>'Disable'),
        'default'    => '0'
    ) );

      /* 
     * Custom preloader 
     */
     $wp_customize->add_setting('wpo_theme_options[image-preloader]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpo_theme_options[image-preloader]', array(
        'label'    => esc_html__('Preloader Logo', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[image-preloader]',
        'priority' => 11,
    ) ) );

    //
    $wp_customize->add_setting('wpo_theme_options[copyright_text]', array(
        'default'    => 'Copyright 2015 - Mixtheme - All Rights Reserved.',
        'type'       => 'option',
        'transport'=>'refresh',
         'sanitize_callback' => 'training_wpo_sanitize_textarea',
    ) );

    $wp_customize->add_control( new WPOpalTextAreaControl( $wp_customize, 'wpo_theme_options[copyright_text]', array(
        'label'    => esc_html__('Copyright text', 'training'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'wpo_theme_options[copyright_text]',
        'priority' => 12,
    ) ) );


    function training_wpo_sanitize_textarea( $content ){
        return wp_kses_post( force_balance_tags( $content ) );
    }
   /***************************************************************************
    * Theme Settings 
    ***************************************************************************/

  
   /**
     * General Setting
     */
    $wp_customize->add_section( 'ts_general_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Themes And Layouts Setting', 'training' ),
        'description' => '',
    ) );

    //
    $wp_customize->add_setting( 'wpo_theme_options[skin]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => 'default',
         'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[skin]', array(
        'label'      => esc_html__( 'Default Theme', 'training' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
        'choices'    => training_wpo_cst_skins(),
    ) );

     $wp_customize->add_setting( 'wpo_theme_options[headerlayout]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[headerlayout]', array(
        'label'      => esc_html__( 'Header Layout Style', 'training' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
      //  'choices' => array(''=>'Default'), 
         'choices'    => training_wpo_cst_headerlayouts(),
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[footer-style]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => 'default'   ,
        'sanitize_callback' => 'sanitize_text_field'
        //  'theme_supports' => 'static-front-page',
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[footer-style]', array(
        'label'      => esc_html__( 'Footer Styles Builder', 'training' ),
        'section'    => 'ts_general_settings',
        'type'       => 'select',
        'choices'    => training_wpo_get_footerbuilder_profiles()
    ) );
     
    //if( defined("WPO_CTS_STYLE_PATH") ){
         $wp_customize->add_setting( 'wpo_theme_options[customize-theme]', array(
            'type'       => 'option',
            'capability' => 'manage_options',
            'default'  => '',
	       'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control(  new WPO_CustomizeProfile_DropDown( $wp_customize, 'wpo_theme_options[customize-theme]', array(
            'label'      => esc_html__( 'Custom Theme Profile', 'training' ),
            'section'    => 'ts_general_settings'
        ) ) );
     //}


    /******************************************************************
     * Social share
     ******************************************************************/
    $wp_customize->add_section( 'social_share_settings', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Social Share setting', 'training' ),
        'description' => '',
    ) );

    // Share facebook
    training_wpo_social_config( $wp_customize, 'facebook_share_blog', esc_html__('Share facebook ', 'training'), 'social_share_settings');
    //share twitter
    training_wpo_social_config( $wp_customize, 'twitter_share_blog', esc_html__('Share twitter ', 'training'), 'social_share_settings');
    //share linkedin
    training_wpo_social_config( $wp_customize, 'linkedin_share_blog', esc_html__('Share linkedin ', 'training'), 'social_share_settings');
    //share tumblr
    training_wpo_social_config( $wp_customize, 'tumblr_share_blog', esc_html__('Share tumblr ', 'training'), 'social_share_settings');
    //share google plus
    training_wpo_social_config( $wp_customize, 'google_share_blog', esc_html__('Share google plus ', 'training'), 'social_share_settings');
    //share pinterest
    training_wpo_social_config( $wp_customize, 'pinterest_share_blog', esc_html__('Share pinterest ', 'training'), 'social_share_settings');
    //share mail
    training_wpo_social_config( $wp_customize, 'mail_share_blog', esc_html__('Share mail ', 'training'), 'social_share_settings');


    /******************************************************************
     * Social url topbar
     ******************************************************************/
    $wp_customize->add_section( 'social_share_topbar', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Social Link For Topbar', 'training' ),
        'description' => '',
    ) );

    training_wpo_social_url_config( $wp_customize, 'facebook_url_topbar', esc_html__('Url facebook ', 'training'), 'social_share_topbar');
    training_wpo_social_url_config( $wp_customize, 'twitter_url_topbar', esc_html__('Url twitter ', 'training'), 'social_share_topbar');
    training_wpo_social_url_config( $wp_customize, 'linkedin_url_topbar', esc_html__('Url linkedin ', 'training'), 'social_share_topbar');
    training_wpo_social_url_config( $wp_customize, 'tumblr_url_topbar', esc_html__('Url tumblr ', 'training'), 'social_share_topbar');
    training_wpo_social_url_config( $wp_customize, 'google_url_topbar', esc_html__('Url google plus ', 'training'), 'social_share_topbar');
    training_wpo_social_url_config( $wp_customize, 'pinterest_url_topbar', esc_html__('Url pinterest ', 'training'), 'social_share_topbar');


    /******************************************************************
     * Navigation
     ******************************************************************/

     # Sticky Top Bar Option
    $wp_customize->add_setting('wpo_theme_options[verticalmenu]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[verticalmenu]', array(
        'settings'  => 'wpo_theme_options[verticalmenu]',
        'label'     => esc_html__('Vertical Megamenu', 'training'),
        'section'   => 'nav',
        'type'      => 'select',
        'choices' => training_wpo_get_menugroups(),
    ) );
    


    # Sticky Top Bar Option
    $wp_customize->add_setting('wpo_theme_options[megamenu-is-sticky]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[megamenu-is-sticky]', array(
        'settings'  => 'wpo_theme_options[megamenu-is-sticky]',
        'label'     => esc_html__('Sticky Top Bar', 'training'),
        'section'   => 'nav',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
    
    $wp_customize->add_setting( 'wpo_theme_options[magemenu-animation]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[magemenu-animation]', array(
        'label'      => esc_html__( 'Megamenu Animation', 'training' ),
        'section'    => 'nav',
        'type'    => 'select',
        'choices'    => training_wpo_get_menuanimation(),
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[megamenu-duration]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '300',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[megamenu-duration]', array(
        'label'      => esc_html__(  'Megamenu Duration', 'training' ),
        'section'    => 'nav',
        'type'    => 'text'
    ) );



    /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'static_front_page', array(
        'title'          => esc_html__( 'Front Page Settings', 'training' ),
        'priority'       => 120,
        'description'    => esc_html__( 'Your theme supports a static front page.', 'training'),
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[sidebar_position]', array(
        'default' => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
 
    $wp_customize->add_control( 'wpo_theme_options[sidebar_position]', array(
        'type' => 'radio',
        'label' => 'Sidebar Position',
        'section' => 'static_front_page',
        'priority' => 1,
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
        ),
    ) );

    $wp_customize->add_setting( 'show_on_front', array(
        'default'        => get_option( 'show_on_front' ),
        'capability'     => 'manage_options',
        'type'           => 'option',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'show_on_front', array(
        'label'   => esc_html__( 'Front page displays', 'training' ),
        'section' => 'static_front_page',
        'type'    => 'radio',
        'choices' => array(
            'posts' => esc_html__( 'Your latest posts', 'training' ),
            'page'  => esc_html__( 'A static page', 'training' ),
        ),
    ) );
    
    $wp_customize->add_setting( 'page_on_front', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_on_front', array(
        'label'      => esc_html__( 'Front page', 'training' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );

    $wp_customize->add_setting( 'page_for_posts', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_for_posts', array(
        'label'      => esc_html__( 'Posts page', 'training' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );


    /* 
     /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'pages_setting', array(
        'title'          => esc_html__( 'Pages Settings', 'training' ),
        'priority'       => 120,
        'description'    => esc_html__( 'Your theme supports a static front page.', 'training'),
    ) );

     
    $wp_customize->add_setting( 'wpo_theme_options[404_post]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => ''   ,
        'sanitize_callback' => 'sanitize_text_field'
        //  'theme_supports' => 'static-front-page',
    ) );
    
     $wp_customize->add_control( 'wpo_theme_options[404_post]', array(
        'label'      => esc_html__( '404 Page', 'training' ),
        'section'    => 'pages_setting',
        'type'       => 'dropdown-pages',
    ) );
         // 
    $wp_customize->add_setting('wpo_theme_options[showpagecomment]', array( 
        'default'    => 1,
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );    
    $wp_customize->add_control( 'wpo_theme_options[showpagecomment]', array(
        'settings' => 'wpo_theme_options[showpagecomment]',
        'label'    => esc_html__( 'Show Page Comment Form', 'training' ),
        'section'  => 'pages_setting',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );
     // 
}

function training_wpo_social_config( $wp_customize, $id, $name_social, $section){
    $wp_customize->add_setting('wpo_theme_options['.$id.']', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options['.$id.']', array(
        'settings'  => 'wpo_theme_options['.$id.']',
        'label'     => $name_social,
        'section'   => $section,
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
}

function training_wpo_social_url_config( $wp_customize, $id, $name_social, $section){
    $wp_customize->add_setting('wpo_theme_options['.$id.']', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options['.$id.']', array(
        'settings'  => 'wpo_theme_options['.$id.']',
        'label'     => $name_social,
        'section'   => $section,
        'type'      => 'text',
        'transport' => 4,
    ) );
}