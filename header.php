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
</head>

<body <?php body_class(); ?>>
    <section class="wpo-page row-offcanvas row-offcanvas-left"> <?php locate_template('templates/mobile/topbar.php', true);?>
    <?php
        $meta_template = get_post_meta(get_the_ID(),'wpo_template',true);
    ?>

    <!-- START Wrapper -->
    <section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? esc_attr( $meta_template['el_class'] ) : '' ; ?>">
        <section id="wpo-topbar" class="wpo-topbar topbar-dark">
            <div class="container">
                <div class="col-md-2 hidden-sm hidden-xs">
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="topbar-inner">
                        <div class="pull-right">
                            <ul class="social">
                                <?php if(training_wpo_theme_options('facebook_url_topbar')) ?>
                                <li><a href="<?php echo esc_url( training_wpo_theme_options('facebook_url_topbar') );?>"><i class="fa fa-facebook"></i></a></li>
                                <?php if(training_wpo_theme_options('twitter_url_topbar')) ?>
                                <li><a href="<?php echo esc_url( training_wpo_theme_options('twitter_url_topbar') );?>"><i class="fa fa-twitter"></i></a></li>
                                <?php if(training_wpo_theme_options('linkedin_url_topbar')) ?>
                                <li><a href="<?php echo esc_url(training_wpo_theme_options('linkedin_url_topbar') );?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php if(training_wpo_theme_options('tumblr_url_topbar')) ?>
                                <li><a href="<?php echo esc_url(training_wpo_theme_options('tumblr_url_topbar') );?>"><i class="fa fa-tumblr"></i></a></li>
                                <?php if(training_wpo_theme_options('google_url_topbar')) ?>
                                <li><a href="<?php echo esc_url(training_wpo_theme_options('google_url_topbar') )?>"><i class="fa fa-google-plus"></i></a></li>
                                <?php if(training_wpo_theme_options('pinterest_url_topbar')) ?>
                                <li><a href="<?php echo esc_url(training_wpo_theme_options('pinterest_url_topbar') )?>"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="pull-left">
                            <?php do_action('wpo-login-button'); ?>
                            <?php if(!is_user_logged_in()){ ?>
                                <a class="btn btn-outline-light text-white radius-4x border-2 btn-sm" href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e('Register', 'training'); ?></a>
                            <?php } ?>
                        </div>    
                    </div>  
                </div>    
            </div>    
        </section>
        <!-- HEADER -->
        <header id="wpo-header" class="wpo-header">
            <div class="container-inner header-wrap bg-theme special-logo">
                <div class="container header-wrapper-inner header-quick-action">
                    <!-- LOGO -->
                    <div class="logo-in-theme bg-logo col-lg-2 col-md-2 col-sm-12 col-xs-12 space-padding-top-10">
                        <?php if( training_wpo_theme_options('logo') ) { ?>
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url_raw( training_wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                        <?php } else { ?>
                            <div class="logo logo-theme">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                     <img src="<?php echo esc_url_raw( get_template_directory_uri() . '/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <!-- MENU -->
                    <div class="wpo-mainmenu-wrap col-lg-10 col-md-10 col-sm-12 col-xs-12 position-static">
                        
                        <div class="mainmenu-content-wapper">
                            <div class="mainmenu-content text-right">
                                <nav id="wpo-mainnav" data-duration="<?php echo training_wpo_theme_options('megamenu-duration',400); ?>" class="style-dark padding-large position-static  wpo-megamenu <?php echo training_wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                                    
                                     <?php
                                        $args = array(  'theme_location' => 'mainmenu',
                                                        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse space-padding-0',
                                                        'menu_class' => 'nav navbar-nav megamenu',
                                                        'fallback_cb' => '',
                                                        'menu_id' => 'main-menu',
                                                        'walker' => class_exists("Wpo_Megamenu") ? new Wpo_Megamenu() : new Training_Wpo_bootstrap_navwalker );
                                        wp_nav_menu($args);
                                    ?>
                                </nav>
                            </div>
                        </div>    
                       
                    </div>    
                    <!-- //MENU -->
                    <div class="box-quick-action hidden-xs hidden-sm">
                        <div class="search_form hidden-input">
                            <?php get_search_form(); ?>
                        </div>
                    </div>    
                </div>  
                <!-- // Setting -->
            </div>

        </header>
        <!-- //HEADER -->