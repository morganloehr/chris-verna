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
	/**
	 * Class Training_WPO_Backend
	 */
	class Training_WPO_Backend {

		/**
		 * Constructor 
		 */
		public function __construct(){

			global $pagenow; 

			add_action( 'wp_head', array( $this, 'initAjaxUrl' ),1 ,  5 );
			add_action( 'admin_enqueue_scripts', array( $this, 'initScripts' ) );

			$this->makeCustomMetaBoxs();

			if ( isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) { 
				add_action( 'init', array($this, 'installSample' ), 1 );
			}

			$this->initAjaxAdmin();
			$this->setup();
		}

		/**
		 * automatic install data sample when theme was actived.
		 */
		public function installSample(){
			if( file_exists(WPO_THEME_DIR.'/sample/config.txt') ){
				$content = file_get_contents( WPO_THEME_DIR.'/sample/config.txt' );
				$data = @unserialize( trim($content) );
				if( is_array($data) ){ 
					update_option("wpo_theme_options",$data);
 				}
			}
		}

		/**
		 * set default mainmenu and enable postypes when active themes
		 */
		public function setup(){

			global $pagenow; 

			if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
			  $this->setActivePostypes(); 	
			  $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
			  $locations = get_theme_mod('nav_menu_locations');
			  if(!$locations['mainmenu'] && isset($menus[0]->term_id)){
			    $locations['mainmenu'] = $menus[0]->term_id;
			  }
			  set_theme_mod( 'nav_menu_locations', $locations );
			}
		}
		
		public function setActivePostypes(){

			/**
			 *
			 */
			$pts = array( 'brands', 'testimonials', 'portfolio', 'faq', 'footer', 'megamenu','woobrand');

			$options = array();	

			foreach( $pts as $key ){
				$options['enable_'.$key] = 'on'; 
			}
			
			update_option( 'wpo_themer_posttype', $options );


		}	
		/**
		 * Initial Ajax Url
		 */
		public function initAjaxUrl() {
		?>
			<script type="text/javascript">
				var ajaxurl = '<?php echo esc_js( admin_url('admin-ajax.php') ); ?>';
			</script>
			<?php
		}

		/**
		 *
		 */
		public function initAjaxAdmin(){
			add_action( 'wp_ajax_wpo_post_embed', array($this,'initAjaxPostEmbed') );
			add_action( 'wp_ajax_wpo_video_popup', array($this,'ajax_Video_Popup') );
			add_action( 'wp_ajax_nopriv_wpo_video_popup', array($this,'ajax_Video_Popup') );
		}

		/**
		 *
		 */
		public function initAjaxPostEmbed(){
			if ( !$_REQUEST['oembed_url'] )
				die();
			// sanitize our search string
			global $wp_embed;
			$oembed_string = sanitize_text_field( $_REQUEST['oembed_url'] );
			$oembed_url = esc_url( $oembed_string );
			$check_embed = wp_oembed_get(  $oembed_url  );
			if($check_embed==false){
				$check = false;
				$result ='not found';
			}else{
				$check = true;
				$result = $check_embed;
			}
			echo json_encode( array( 'check' => $check,'video'=>$result ) );
			die();
		}

		/**
		 *
		 */
		public function ajax_Video_Popup(){
			$postconfig = get_post_meta($_POST['id'],'wpo_portfolio',true);
		    $content = wp_oembed_get($postconfig['video_link']);
		    echo '<div class="video-responsive">'. $content.'</div>';
			die();
		}
		
		/**
		 *
		 */
		public function initScripts(){
			 
			wp_enqueue_style( 'wpo-admin', WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/admin.css');
			wp_enqueue_script( 'wpo-admin-plugins', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/admin_plugins.js');
			wp_enqueue_script( 'wpo-admin-metabox', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/metabox.js');

		}

		/**
		 *
		 */
		public function makeCustomMetaBoxs(){
			
			$path = WPO_THEME_INC_DIR   . 'metabox/';

		 	//Post setting
		 	new WPO_MetaBox(array(
				'id'       => 'wpo_postconfig',
				'title'    => esc_html__('Post Configuration' , 'training'),
				'types'    => array('post'),
				'priority' => 'high',
				'template' => $path . 'post.php'
			));
			
			/*
			 * Page Setting.
			 */
			$aa = new WPO_MetaBox(array(
				'id'       => 'wpo_pageconfig',
				'title'    => esc_html__('Page Configuration', 'training'),
				'types'    => array('page'),
				'priority' => 'high',
				'template' => $path . 'page.php',
			));

		}
	}
   	/** create instance of Backend */
    new Training_WPO_Backend();