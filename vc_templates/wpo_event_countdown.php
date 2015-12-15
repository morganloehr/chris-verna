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
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array( 
    'post_type' => 'tribe_events',
    'p' => $event_id
);
$query = new WP_Query($args);
?>

<?php
    //register countdown js
    wp_register_script( 'countdown_js', WPO_THEME_URI.'/js/countdown.js', array( 'jquery' ) );
    wp_enqueue_script('countdown_js');
?>

<div class="widget wpo-event-countdown <?php echo esc_attr($el_class); ?> <?php echo esc_attr($layout); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

	<div class="widget-content tribe-events-list">
        <div class="hidden title-2 col-sm-2 col-xs-12">
            <i class="fa fa-th-large"></i><span><?php echo trim($title); ?></span>
        </div>
        <?php if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();?>
            	<?php get_template_part('vc_templates/event_countdown/event', $layout); ?>
    	<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>
       
	</div>
</div>