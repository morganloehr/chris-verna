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
global $trainingconfig;
$trainingconfig = training_wpo_gallery_page_config();
 
$column = training_wpo_theme_options('gallery-archive-column', 4);
$class = floor(12/$column);

?>
<?php 	get_header( $wpoEngine->getHeaderLayout() ); ?>
  
<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>   
  
<?php do_action( 'training_wpo_layout_template_before' ) ; ?>
        <?php  if ( have_posts() ) : ?>
         		<div class="gallery-inner">
		  			 <?php if ( have_posts() ) : ?>

						<?php while( have_posts() ) : ?>

							<?php the_post() ?>
							<div class="col-sm-<?php echo esc_attr($class); ?> col-xs-12">
								<?php get_template_part( 'templates/gallery/item' ) ?>					
							</div>
						<?php endwhile ?>

					<?php endif ?>
					<div class="clearfix"></div>
					<?php training_wpo_pagination(); ?>
				</div>	
        <?php else : ?>
            <?php get_template_part( 'templates/elements/none' ); ?>
        <?php endif; ?>
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>