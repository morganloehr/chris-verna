<?php
if( WPO_WOOCOMMERCE_ACTIVED  ) {
    
    add_action( 'customize_register', 'training_wpo_ct_woocommerce_setting' );
    function training_wpo_ct_woocommerce_setting( $wp_customize ){
        


    	$wp_customize->add_panel( 'panel_woocommerce', array(
    		'priority' => 70,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => esc_html__( 'training', 'training' ),
    		'description' =>esc_html__( 'Make default setting for page, general', 'training' ),
    	) );

        /**
         * General Setting
         */
        $wp_customize->add_section( 'wc_general_settings', array(
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'General Setting', 'training' ),
            'description' => '',
            'panel' => 'panel_woocommerce',
        ) );

        //config mini cart
        $wp_customize->add_setting('wpo_theme_options[woo-show-minicart]', array(
            'capability' => 'manage_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('wpo_theme_options[woo-show-minicart]', array(
            'settings'  => 'wpo_theme_options[woo-show-minicart]',
            'label'     => esc_html__('Enable Mini Basket', 'training'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox'
        ) );

        
        $wp_customize->add_setting('wpo_theme_options[is-quickview]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('wpo_theme_options[is-quickview]', array(
            'settings'  => 'wpo_theme_options[is-quickview]',
            'label'     => esc_html__('Enable QuickView', 'training'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );



        $wp_customize->add_setting('wpo_theme_options[is-swap-effect]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('wpo_theme_options[is-swap-effect]', array(
            'settings'  => 'wpo_theme_options[is-swap-effect]',
            'label'     => esc_html__('Enable Swap Image', 'training'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );

        $wp_customize->add_setting('wpo_theme_options[wc_cartnotice]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('wpo_theme_options[wc_cartnotice]', array(
            'settings'  => 'wpo_theme_options[wc_cartnotice]',
            'label'     => esc_html__('Enable Adding Cart Notification', 'training'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );
        $wp_customize->add_setting('wpo_theme_options[wc_cartnotice_text]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'Add to cart success!',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('wpo_theme_options[wc_cartnotice_text]', array(
            'settings'  => 'wpo_theme_options[wc_cartnotice_text]',
            'label'     => esc_html__('Text add cart success', 'training'),
            'section'   => 'wc_general_settings',
            'type'      => 'text',
            'transport' => 5,
        ) );



        /**
         * Archive Page Setting
         */
        $wp_customize->add_section( 'wc_archive_settings', array(
            'priority' => 2,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Archive Page Setting', 'training' ),
            'description' => 'Configure categories, search, shop page setting',
            'panel' => 'panel_woocommerce',
        ) );

         ///  Archive layout setting
        $wp_customize->add_setting( 'wpo_theme_options[woocommerce-archive-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-archive-layout]', array(
            'settings'  => 'wpo_theme_options[woocommerce-archive-layout]',
            'label'     => esc_html__('Archive Layout', 'training'),
            'section'   => 'wc_archive_settings',
            'priority' => 1

        ) ) );

       //sidebar archive left
        $wp_customize->add_setting( 'wpo_theme_options[woocommerce-archive-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-left',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-archive-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[woocommerce-archive-left-sidebar]',
            'label'     => esc_html__('Archive Left Sidebar', 'training'),
            'section'   => 'wc_archive_settings' ,
             'priority' => 3
        ) ) );

          //sidebar archive right
        $wp_customize->add_setting( 'wpo_theme_options[woocommerce-archive-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-right',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-archive-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[woocommerce-archive-right-sidebar]',
            'label'     => esc_html__('Archive Right Sidebar', 'training'),
            'section'   => 'wc_archive_settings',
             'priority' => 4 
        ) ) );

        //list-grid  style archive
        $wp_customize->add_setting( 'wpo_theme_options[wc_listgrid]', array(
            'type'       => 'option',
            'default'    => 'product',
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[wc_listgrid]', array(
            'label'      => esc_html__( 'List Grid', 'training' ),
            'section'    => 'wc_archive_settings',
            'type'       => 'select',
            'choices'     => array(
                'product-list' => esc_html__('List', 'training' ),
                'product' => esc_html__('Grid', 'training' ),
            ),
            'description' => 'Select default layout archive product',
            'priority' => 5
        ) );

        //number product per page
        $wp_customize->add_setting( 'wpo_theme_options[woo-number-page]', array(
            'type'       => 'option',
            'default'    => 12,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'wpo_theme_options[woo-number-page]', array(
            'label'      => esc_html__( 'Number of Products Per Page', 'training' ),
            'section'    => 'wc_archive_settings',
            'priority' => 6
        ) );

        //number product per row
        $wp_customize->add_setting( 'wpo_theme_options[wc_itemsrow]', array(
            'type'       => 'option',
            'default'    => 4,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[wc_itemsrow]', array(
            'label'      => esc_html__( 'Number of Products Per Row', 'training' ),
            'section'    => 'wc_archive_settings',
            'type'       => 'select',
            'choices'     => array(
                '2' => esc_html__('2 Items', 'training' ),
                '3' => esc_html__('3 Items', 'training' ),
                '4' => esc_html__('4 Items', 'training' ),
                '6' => esc_html__('6 Items', 'training' ),
            ),
            'priority' => 7
        ) );
    	

        /**
    	 * Product Single Setting
    	 */
    	$wp_customize->add_section( 'wc_product_settings', array(
    		'priority' => 12,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => esc_html__( 'Single Product Page Setting', 'training' ),
    		'description' => 'Configure single product page',
    		'panel' => 'panel_woocommerce',
    	) );
        ///  single layout setting
        $wp_customize->add_setting( 'wpo_theme_options[woocommerce-single-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Select layout
        $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-single-layout]', array(
            'settings'  => 'wpo_theme_options[woocommerce-single-layout]',
            'label'     => esc_html__('Product Detail Layout', 'training'),
            'section'   => 'wc_product_settings',
            'priority' => 1
        ) ) );

       
        $wp_customize->add_setting( 'wpo_theme_options[woocommerce-single-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Sidebar left
        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-single-left-sidebar]', array(
            'settings'  => 'wpo_theme_options[woocommerce-single-left-sidebar]',
            'label'     => esc_html__('Product Detail Left Sidebar', 'training'),
            'section'   => 'wc_product_settings',
            'priority' => 2 
        ) ) );

         $wp_customize->add_setting( 'wpo_theme_options[woocommerce-single-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Sidebar right
        $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[woocommerce-single-right-sidebar]', array(
            'settings'  => 'wpo_theme_options[woocommerce-single-right-sidebar]',
            'label'     => esc_html__('Product Detail Right Sidebar', 'training'),
            'section'   => 'wc_product_settings',
            'priority' => 3 
        ) ) );

        //Show related product
        $wp_customize->add_setting('wpo_theme_options[wc_show_related]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 0,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('wpo_theme_options[wc_show_related]', array(
            'settings'  => 'wpo_theme_options[wc_show_related]',
            'label'     => esc_html__('Disable show related product', 'training'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'priority' => 4
        ) );
         //Show upsells product
        $wp_customize->add_setting('wpo_theme_options[wc_show_upsells]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 0,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('wpo_theme_options[wc_show_upsells]', array(
            'settings'  => 'wpo_theme_options[wc_show_upsells]',
            'label'     => esc_html__('Disable show upsells product', 'training'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'transport' => 3,
            'priority' => 5
        ) );

        //number of product per row 
        $wp_customize->add_setting( 'wpo_theme_options[product-number-columns]', array(
            'type'       => 'option',
            'default'    => 3,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[product-number-columns]', array(
            'label'      => esc_html__( 'Number of Product Per Row', 'training' ),
            'section'    => 'wc_product_settings',
            'type'       => 'select',
            'choices'     => array(
                '2' => esc_html__('2 Items', 'training' ),
                '3' => esc_html__('3 Items', 'training' ),
                '4' => esc_html__('4 Items', 'training' )
            ),
            'priority' => 6
        ) );
        
        //Number of product to show 
        $wp_customize->add_setting( 'wpo_theme_options[woo-number-product-single]', array(
            'type'       => 'option',
            'default'	 => 6,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'wpo_theme_options[woo-number-product-single]', array(
            'label'      => esc_html__( 'Number of Products to Show', 'training' ),
            'section'    => 'wc_product_settings',
            'priority' => 7
        ) );

         //Show Social share product
        $wp_customize->add_setting('wpo_theme_options[wc_show_share_social]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('wpo_theme_options[wc_show_share_social]', array(
            'settings'  => 'wpo_theme_options[wc_show_share_social]',
            'label'     => esc_html__('Show Social share product', 'training'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'priority' => 8
        ) );

        /**
    	 * Product Listing Setting
    	 */
    	/*$wp_customize->add_section( 'wc_product_settings', array(
    		'priority' => 13,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => esc_html__( 'Product Page Setting', 'training' ),
    		'description' => '',
    		'panel' => 'panel_woocommerce',
    	) );

        $wp_customize->add_setting( 'page_on_frontaas', array(
            'type'       => 'option',
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'page_on_frontaas', array(
            'label'      => esc_html__( 'Front page', 'training' ),
            'section'    => 'wc_product_settings',
            'type'       => 'dropdown-pages',
        ) );*/

    }
}    
?>