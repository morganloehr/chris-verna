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
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/molo.css" media="all" />
</head>

<body <?php body_class(); ?>>
	<?php locate_template('templates/preloader.php', true); ?>
	<section class="wpo-page row-offcanvas row-offcanvas-left"> <?php locate_template('templates/mobile/topbar.php', true);?>
		<?php
		$meta_template = get_post_meta(get_the_ID(),'wpo_template',true);
		?>
		
	

		<!-- START Wrapper -->
		<section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? $meta_template['el_class'] : '' ; ?>">
			<section id="wpo-topbar" class="wpo-topbar topbar-dark hidden">
				<div class="container">
					<div class="topbar-inner">
						<div class="pull-left">
							<ul class="social">
								<?php if(training_wpo_theme_options('facebook_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('facebook_url_topbar')?>"><i class="fa fa-facebook"></i></a></li>
								<?php if(training_wpo_theme_options('twitter_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('twitter_url_topbar')?>"><i class="fa fa-twitter"></i></a></li>
								<?php if(training_wpo_theme_options('linkedin_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('linkedin_url_topbar')?>"><i class="fa fa-linkedin"></i></a></li>
								<?php if(training_wpo_theme_options('tumblr_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('tumblr_url_topbar')?>"><i class="fa fa-tumblr"></i></a></li>
								<?php if(training_wpo_theme_options('google_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('google_url_topbar')?>"><i class="fa fa-google-plus"></i></a></li>
								<?php if(training_wpo_theme_options('pinterest_url_topbar')) ?>
								<li><a href="<?php echo training_wpo_theme_options('pinterest_url_topbar')?>"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
						<div class="pull-right">
							<?php do_action('wpo-login-button'); ?>
							<?php if(!is_user_logged_in()){ ?>
							<a class="btn btn-outline-light text-white radius-4x border-2 btn-sm" href="<?php echo wp_registration_url(); ?>">Register</a>
							<?php } ?>
						</div>    
					</div>      
				</div>    
			</section>
			
			<!-- HEADER -->
			<header id="wpo-header" class="header-absolute header-center space-top-40">
				<section class="wpo-header header-topbar">
					<div class="container-inner">
						<div class="container">
							<div class="header-wrapper row header-quick-action">

								<!-- MENU -->
								<div class="wpo-mainmenu-wrap hidden-xs col-xs-12">
									<div class="mainmenu-content-wapper">
										<div class="mainmenu-content">
											<nav id="wpo-mainnav" data-duration="<?php echo training_wpo_theme_options('megamenu-duration',400); ?>" class="padding-small style-dark wpo-megamenu <?php echo training_wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">

												<?php
												$args = array(  'theme_location' => 'mainmenu',
													'container_class' => 'collapse navbar-collapse navbar-ex1-collapse space-padding-0',
													'menu_class' => 'nav navbar-nav megamenu',
													'fallback_cb' => '',
													'menu_id' => 'main-menu',
													'walker' => class_exists("Wpo_Megamenu") ? new Wpo_Megamenu() : new Training_Wpo_bootstrap_navwalker );
												wp_nav_menu($args);
												?>
												<div class="box-quick-action hidden-xs hidden-sm">
													<div class="search_form hidden-input">
														<?php get_search_form(); ?>
													</div>
												</div>
											</nav>
										</div>
									</div>    
								</div>    
								<!-- //MENU -->

								<!-- LOGO -->
								<div id="logo-inner" class="logo-in-theme text-center col-xs-12">
									<?php if( training_wpo_theme_options('logo') ) { ?>
									<div class="logo">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<img src="<?php echo esc_url_raw( training_wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
										</a>
									</div>
									<?php } else { ?>
									<div class="logo logo-theme">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<img src="<?php echo esc_url_raw( get_template_directory_uri() . '/images/logo-v3.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
										</a>
									</div>
									<?php } ?>
								</div>
							</div>  
							</div>   
							<!-- // Setting -->
						</div>
					</section>
				</header>
						<!-- //HEADER -->