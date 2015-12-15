<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
 global $trainingconfig;
?>
<?php 
	get_header( $wpoEngine->getHeaderLayout() );
	$trainingconfig = training_wpo_gallery_page_config();
?>

<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>	
<?php do_action( 'training_wpo_layout_template_before' ) ; ?>
	<?php while(have_posts()): the_post(); ?>
	<div class="post-area single-blog">
		<?php get_template_part('templates/gallery/single'); ?>
	</div>
	<?php endwhile; ?>
 <?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>