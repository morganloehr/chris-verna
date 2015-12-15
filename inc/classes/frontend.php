<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

class Training_WPO_TemplateFront {

	/**
	 * @var Array $menu
	 *
	 * @access protected
	 */
	protected $menus=array();

	/**
	 * @var Array $images
	 *
	 * @access protected
	 */
	protected $imagesSize = array();

	/**
	 * @var Array $requiredPlugins
	 *
	 * @access protected
	 */
	protected $requiredPlugins = array();

	/**
	 * @var Array $scripts storing list of javascript files
	 *
	 * @access protected
	 */
	protected $scripts = array();

	/**
	 * @var Array $styles storing list of stylesheets files
	 *
	 * @access protected
	 */
	protected $styles = array();

	/**
	 * @var Array $themesSupports storing list of stylesheets files
	 *
	 * @access protected
	 */
	protected $themesSupports = array();
 
 	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct(){
 

		// Require Plugin
		$this->initRequirePlugin();

 	

 		/* This theme uses post thumbnails */
		$this->addThemeSupport( 'post-thumbnails' );
		$this->addThemeSupport( "title-tag" );
 
		$this->setPostThumbnailSize( 650, 388, true  );
		$this->addImagesSize('thumbnails-medium', 745, 460, true);	
		
		// Add default posts and comments RSS feed links to head*/
		$this->addThemeSupport( 'automatic-feed-links' );
 

 		$this->addMenu('mainmenu','Main Menu');
 		$this->addMenu('accountmenu', 'Account Menu');
		$this->addMenu('topmenu','Top Header Menu');
		
		/* add  post types support as default */
		$this->addThemeSupport( 'post-formats',  array( 'audio', 'aside', 'chat', 'image', 'link', 'quote', 'status', 'video'  ) );
		$this->loadFrontEndMedia();
	}


	/**
	 * load css and javascript files as libirary required.
	 */
	public function loadFrontEndMedia(){

		// add Javascript and CSS

 		$this->addScript('prettyphoto-js',	  WPO_THEME_URI.'/js/jquery.prettyPhoto.js',array(),false,true);
		$this->addScript('owlcaousel-js',	  WPO_THEME_URI.'/js/owl-carousel/owl.carousel.min.js',array(),false,true);
		$this->addScript('main_js',			  WPO_THEME_URI.'/js/main.js',array(),false,true);
		$this->addScript('select-2-js',		  WPO_THEME_URI.'/js/select2.min.js',array(),false,true);
		$this->addScript('masonry-js',WPO_THEME_URI.'/js/isotope.pkgd.min.js',array(),false,true);
		$this->addScript('jquery-easings',	  WPO_THEME_URI.'/js/onepage/jquery.easings.min.js',array(),false,true);
		$this->addScript('jquery-slimscroll', WPO_THEME_URI.'/js/onepage/jquery.slimscroll.min.js',array(),false,true);
		$this->addScript('jquery-fullpage',	  WPO_THEME_URI.'/js/onepage/jquery.fullpage.min.js',array(),false,true);
		
		$this->addStyle('base-fonticon', 	WPO_THEME_URI.'/css/font-awesome.css' );
		$this->addStyle('prettyPhoto', 		WPO_THEME_URI.'/css/prettyPhoto.css' );
		$this->addStyle('select-2-css', 	WPO_THEME_URI.'/css/select2.min.css' );
		$this->addStyle('jquery-fullpage', 	WPO_THEME_URI.'/css/jquery.fullpage.css' );
	}


	/**
	 * add support image size
	 */
	public function addImagesSize( $name=null, $width=0,$height=0,$crop=false){
		if($name!=null){
			$this->imagesSize[$name] = array('width'=>$width,'height'=>$height,'crop'=>$crop);
		}
	}
 
	/**
	 * set post thumbnail size with crop or not
	 */
	public function setPostThumbnailSize($width=0,$height=0,$crop=false){
		set_post_thumbnail_size($width,$height,$crop);
	}

	/**
	 * add menu support
	 */
	public function addMenu( $location, $description  ){
		$this->menus[$location] = $description;
	}

	/**
	 * add plugin required for processing.
	 */
	public function addRequiredPlugin( $required ){
		$this->requiredPlugins[] = $required;
	}
 

	/**
	  * add to theme support types collection
	 */
	public function addThemeSupport( $support, $default=null ){
		$this->themesSupports[$support] = $default;
	}

	/**
	 *
	 */
	public function addScript( $key, $src,$deps=array(),$ver=false,$in_footer=false){
		$this->scripts[$key] = array($src,$deps,$ver,$in_footer);
	}
 

	public function addStyle( $key, $url, $deps=array(),$ver=false,$media='all'){
		$this->styles[$key] = array($url,$deps,$ver,$media);
	}


	public function init(){
		
		add_action('wp_enqueue_scripts', array( $this, 'initScripts' ) );
		add_action('after_setup_theme',  array($this,'initSetup') );
		add_action('widgets_init', 		 array($this,'setSidebarDefault') );
		add_action('tgmpa_register',	 array($this,'initRequiredPlugin') );
	}

	public function initScript(){
		foreach( $this->scripts as $key => $file ) {
			wp_register_script( $key, $file[0], $file[1], $file[2], $file[3] );
			wp_enqueue_script( $key );
		}
	}
 
	/**
	 * Initial Sidebars
	 */
	public function initSetup(){
		 
		$this->initThemeSupport();
		$this->initRegisterMenu();
		$this->initImageSize();
		
	}
 

	 	
	/**
	 * Initial FrontEnd Actions
	 */
	public function initRequiredPlugin(){  
		if(count($this->requiredPlugins)>0){
			tgmpa( $this->requiredPlugins  );
		}
	}


	/**
	 * Initial Sidebars
	 */
	public function initSidebars(){
		foreach ($this->sidebars as $key => $sidebar) {
			register_sidebar($sidebar);
		}
	}

	public function initImageSize(){
		foreach ($this->imagesSize as $key => $image) {
			add_image_size($key,$image['width'],$image['height'],$image['crop']);
		}
	}
 
	/**
	 * Initial Scripts
	 */
	public function initScripts(){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
      		wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script("jquery");
		/*  add scripts files  */
		wp_enqueue_script('base_bootstrap_js',WPO_THEME_URI.'/js/bootstrap.min.js');
		

		foreach( $this->scripts as $key => $file ) {
			wp_register_script( $key, $file[0], $file[1], $file[2], $file[3] );
			wp_enqueue_script( $key );
		}
 
		
		wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
		 

		$currentSkin = str_replace( '.css','',training_wpo_theme_options('skin','default') );
		// Check RTL
		if( is_rtl() ){
			if( file_exists(WPO_THEME_CSS_DIR.'skins/'.$currentSkin.'/bootstrap-rtl.css') ){
				wp_enqueue_style( 'bootstrap-rtl-'.$currentSkin, WPO_THEME_URI.'/css/skins/'.$currentSkin.'/bootstrap-rtl.css' );
			}else {
				wp_enqueue_style( 'bootstrap-rtl-default',WPO_THEME_URI.'/css/bootstrap-rtl.css' );
			}
		}else{
			if( file_exists(WPO_THEME_CSS_DIR.'skins/'.$currentSkin.'/bootstrap.css') ){
				wp_enqueue_style( 'bootstrap-'.$currentSkin, WPO_THEME_URI.'/css/skins/'.$currentSkin.'/bootstrap.css' );
			}else {
				wp_enqueue_style( 'bootstrap-default', WPO_THEME_URI.'/css/bootstrap.css' );
			}
		}

		if( $currentSkin == 'template' || empty($currentSkin) || $currentSkin == 'default' ){
			wp_enqueue_style( 'template-default',WPO_THEME_URI.'/css/template.css' );
		}else {
			wp_enqueue_style('template-'.$currentSkin,WPO_THEME_URI.'/css/skins/'.$currentSkin.'/template.css' );
		}

	
		/* add styles files */
		foreach( $this->styles as $key => $file ) {
			wp_register_style( $key, $file[0], $file[1], $file[2], $file[3] );
			wp_enqueue_style( $key );
		}
		if( is_rtl() ){
			wp_enqueue_style('base-style-rtl',WPO_THEME_URI.'/css/rtl/template.css');
		}

		if( training_wpo_theme_options('customize-theme','') && training_wpo_theme_options('customize-theme','') != 'nouse' ){
			wp_enqueue_style('customize-style',WPO_FRAMEWORK_CUSTOMZIME_STYLE_URI.training_wpo_theme_options('customize-theme').'.css');
		}
	}

	/**
	 * Initial Theme Support
	 */
	private function initThemeSupport(){
		add_theme_support( 'automatic-feed-links' );
		foreach ($this->themesSupports as $key => $value) {
			if($value!=null){
				add_theme_support($key,$value);
			}
			else{
				add_theme_support($key);
			}
		}
	}

	/**
	 * Initial Register Menu
	 */
	public function initRegisterMenu(){

		foreach ($this->menus as $key => $menu) {
			register_nav_menu( $key, $menu );
		}
	}

 	/**
	 *
	 */
	public function getHeaderLayout(){
		global $wp_query;
	    $layout = get_post_meta($wp_query->get_queried_object_id(),'wpo_pageconfig',true);

	    if( !isset($layout['header_skin']) || isset( $layout['header_skin'] ) && $layout['header_skin'] =='global' )
			return training_wpo_theme_options('headerlayout','');
		else
			return $layout['header_skin'];
	}


	// page Configuration
	public function getPageConfig(){ 
		
		global $wp_query;
	    $pageconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_pageconfig',true);

	
		$defaults = array(  'page_layout' 		=> 'fullwidth',
                            'right_sidebar' 	=> '' ,
                            'left_sidebar'  	=> '',
                            'showtitle'	    	=>false,
                            'advanced'			=>'',
                            'breadcrumb'		=>false,
                            'skins' 			=> 'global',
                            'layout' 			=> 'global',
                            'blog_number'		=> 10,
                            'blog_style' 		=> '',
                            'blog_columns' 		=> 4,
                            'portfolio_number'  => 10,
                            'portfolio_style'   => '',
                            'portfolio_columns' =>4,
                            'header_skin' 		=> 'global',
                            'footer' 			=> 'global',
                            'background_breadcrumb' =>'global',
                            'bg_color' 				=> '',
                            'footer_skin' 			=> 'global'
        );

		$config = wp_parse_args( (array) $pageconfig, $defaults );

		if( empty($pageconfig) ){
			$config['breadcrumb'] = true;
		}
		$lt 				= $config['page_layout'] ;
 		
 		$config['advanced'] 			   = get_post_meta( $wp_query->get_queried_object_id(), 'wpo_template', TRUE);	
 		$config['right-sidebar']['widget'] = $config['right_sidebar'];
		$config['left-sidebar']['widget']  =  $config['left_sidebar'];
		
 		$config = training_wpo_config_layout( $lt, $config );

		if(is_front_page()) {
			$config['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$config['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		return $config;
	}

	/**
	 * Custom set layout configuration as page
	 */
	public function getPostConfig(){

		global $wp_query;

		$postconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_postconfig',true);
		$defaults = array(  'config_layout'  	=> false);
		$postconfig = wp_parse_args((array) $postconfig, $defaults);
		$config = array();
		if( $postconfig['config_layout'] ==1){
			$config['page_layout'] 				= $postconfig['page_layout'];
			$config['right-sidebar']['widget']	= $postconfig['right_sidebar'];
			$config['left-sidebar']['widget'] 	= $postconfig['left_sidebar'];
		}else{
			$config['page_layout']  			= training_wpo_theme_options('blog-single-layout', 'mainright');
			$config['right-sidebar']['widget']	= training_wpo_theme_options('blog-single-right-sidebar', 'sidebar-right');
			$config['left-sidebar']['widget'] 	= training_wpo_theme_options('blog-single-left-sidebar', 'sidebar-left');
		}

		if( empty($config))
			$lt = 'fullwidth';
		else
			$lt = $config['page_layout'];
		
		$config = training_wpo_config_layout($lt,$config);

		if( isset($postconfig['audio_link']) && !empty( $postconfig['audio_link'] ) ){
			$config['audio_link']	 = $postconfig['audio_link'];
		}

		if( isset($postconfig['video_link']) && !empty( $postconfig['video_link'] )){
			$config['video_link']	 = $postconfig['video_link'];
		}

		if( isset($postconfig['link_url']) && $postconfig['link_url'] ){
			$config['link_url']	 = $postconfig['link_url'];
			$config['link_title']	 = $postconfig['link_title'];
		}

		if( isset($postconfig['chat_content']) && $postconfig['chat_content'] ){
			$config['chat_content']	 = $postconfig['chat_content'];
		}

		if( isset($postconfig['quote_content']) && $postconfig['quote_content'] ){
			$config['quote_content']	 = $postconfig['quote_content'];
			$config['quote_author']	 = $postconfig['quote_author'];
		}

		$maincontent = array();
		
		return $config;
	}
	 
	/**
	 * require plugins using for the theme
	 */
	private function initRequirePlugin(){

		$this->addRequiredPlugin(array(
			'name'                     => 'The Events Calendar', // The plugin name
		   'slug'                     => 'the-events-calendar', // The plugin slug (typically the folder name)
		   'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WooCommerce', // The plugin name
		   'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
		   'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'YITH WooCommerce Zoom Magnifier', // The plugin name
		    'slug'                     => 'yith-woocommerce-zoom-magnifier', // The plugin slug (typically the folder name)
		    'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'MailChimp', // The plugin name
		   'slug'                     => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
		   'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Contact Form 7', // The plugin name
		   'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
		   'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WPBakery Visual Composer', // The plugin name
		    'slug'                     => 'js_composer', // The plugin slug (typically the folder name)
		    'required'                 => true,
		   'source'				   => 'http://www.wpopal.com/thememods/js_composer.zip' 
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Revolution Slider', // The plugin name
         'slug'                     => 'revslider', // The plugin slug (typically the folder name)
         'required'                 => true ,
         'source'				   => 'http://www.wpopal.com/thememods/revslider.zip'
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Ibeducator', // The plugin name
		   'slug'                     => 'ibeducator', // The plugin slug (typically the folder name)
		   'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Buddypress', // The plugin name
		   'slug'                     => 'buddypress', // The plugin slug (typically the folder name)
		   'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Post ratings', // The plugin name
		   'slug'                     => 'wp-postratings', // The plugin slug (typically the folder name)
		   'required'                 =>  true
		));
		$this->addRequiredPlugin(array(
			'name'                     => 'WPO Framework', // The plugin name
		    'slug'                     => 'wpoframework', // The plugin slug (typically the folder name)
		    'source'				   => 'http://www.wpopal.com/thememods/wpoframework.zip' ,// If false, the plugin is only 'recommended' instead of required
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));
		
	}

   /**
	* Set default Siderbars for putting widgets inside
	*/
	public function setSidebarDefault(){
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Sidebar Default', 'training' ),
				'id'            => 'sidebar-default',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'			 => esc_html__('Sidebar Intro Landingpage', 'training'),
				'id'				 => 'intro-landingpage',
				'description'   => esc_html__( 'Appears on intro slider in the sidebar (use on header intro landingpage).', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget space-0 clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>', 
			));	
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Newsletter', 'training' ),
				'id'            => 'newsletter',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Twitter', 'training' ),
				'id'            => 'twitter',
				'description'   => esc_html__( 'Appears on content in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));

		register_sidebar( 
			array(
				'name'          => esc_html__( 'Social Header', 'training' ),
				'id'            => 'social-header',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));	
			
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Left Sidebar', 'training' ),
				'id'            => 'sidebar-left',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Right Sidebar', 'training' ),
				'id'            => 'sidebar-right',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
 
			register_sidebar( 
			array(
				'name'          => esc_html__( 'Blog Left Sidebar', 'training' ),
				'id'            => 'blog-sidebar-left',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</span></h3>',
			));

			register_sidebar( 
			array(
				'name'          => esc_html__( 'Blog Right Sidebar', 'training' ),
				'id'            => 'blog-sidebar-right',
				'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
		array(
			'name'          => esc_html__( 'OffCanvas Sidebar Left', 'training' ),
			'id'            => 'offcanvas-sidebar-left',
			'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'training'),
			'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		));
			

		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer 1', 'training' ),
				'id'            => 'footer-1',
				'description'   => esc_html__( 'Appears in the footer section of the site.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer 2', 'training' ),
				'id'            => 'footer-2',
				'description'   => esc_html__( 'Appears in the footer section of the site.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer 3', 'training' ),
				'id'            => 'footer-3',
				'description'   => esc_html__( 'Appears in the footer section of the site.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer 4', 'training' ),
				'id'            => 'footer-4',
				'description'   => esc_html__( 'Appears in the footer section of the site.', 'training'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
	}
}
?>