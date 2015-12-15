<?php
/*
*Template Name: Coming soon
*
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

	<section class="wpo-mainbody clearfix notfound-page">
			<div class="page_not_found text-center clearfix">
				<div class="space-padding-tb-50">
					<div class="content-inner">
						<div class="clearfix"></div>
						<div class="text-center image"><img src="<?php echo esc_url_raw(get_template_directory_uri() . '/images/image-404.jpg') ?>" alt="<?php esc_html_e('Not found', 'training'); ?>"/></div>
						<div class="title">
							<span>404</span>
						</div>
						<div class="container">
							<div class="error-description"><?php esc_html_e('Sorry, it appears the page you were looking for doesn\'t exist anymore or might have been moved.', 'training') ?> </div>
							<div class="page-action">
								<a class="btn btn-md btn-success" href="javascript: history.go(-1)"><?php esc_html_e('Go back to previous page', 'training'); ?></a>
								<a class="btn btn-md btn-info" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Return to homepage', 'training'); ?></a>
							</div>
						</div>
					</div>	
				</div>
			</div>
	</section>

   <?php wp_footer(); ?>
</body>
</html>