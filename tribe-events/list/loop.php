<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php
	$GLOBALS['more'] = false;

	$GLOBALS['wpv_pretty_tribe_date_headers'] = true;
	$GLOBALS['wpv_pretty_tribe_date_headers_first'] = true;
	global $wp_query;
?>

<div class="tribe-events-loop hfeed vcalendar clearfix">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'tribe_events_inside_before_loop' ); ?>

			<?php tribe_events_list_the_date_headers(); ?>

			<!-- Event  -->
			<article id="post-<?php the_ID() ?>" class="col-sm-4 col-xs-12 <?php tribe_events_event_classes() ?>">
				<?php tribe_get_template_part( 'list/single', 'event' ) ?>
			</article><!-- .hentry .vevent -->

			<?php do_action( 'tribe_events_inside_after_loop' ); ?>
			<?php $GLOBALS['wpv_pretty_tribe_date_headers_first'] = false; ?>
		<?php endwhile; ?>

	</div>	

</div><!-- .tribe-events-loop -->
