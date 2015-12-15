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
$trainingconfig = $wpoEngine->getPageConfig();

?>

<?php get_header( $wpoEngine->getHeaderLayout() ); ?>
<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>

<?php do_action( 'training_wpo_layout_template_before' ) ; ?>
        <!-- MAIN CONTENT -->
        <div class="col-lg-9 col-md-9 col-sm-9">
            <div id="wpo-content">
                <?php  if ( have_posts() ) : ?>
                    <div class="post-area">
                        <?php while ( have_posts() ) : the_post(); ?>
                          <?php get_template_part( 'templates/blog/blog'); ?>
                        <?php endwhile; ?>
                    </div>
                 
                <?php else : ?>
                    <?php get_template_part( 'templates/elements/none' ); ?>
                <?php endif; ?>
            </div>
            <?php training_wpo_pagination(); ?>
        </div>
        <div class="col-xs-3 wpo-sidebar">
           <?php dynamic_sidebar('sidebar-default'); ?>
        </div>
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>