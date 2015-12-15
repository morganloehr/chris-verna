<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

global $post;

$featured_image = tribe_event_featured_image( null, 'post-thumbnail' );
?>
<div class="wpo-event-inner">
	<div class="small-event-header clearfix <?php if(empty($featured_image)) echo 'no-image' ?>">
		<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12">
					<?php echo trim( $featured_image ); ?>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12">	
					<div class="tribe-events-event-meta-wrapper">
						<?php do_action( 'tribe_events_before_the_meta' ); ?>
							<div class="tribe-events-event-meta">
								<?php
									$start = strtotime($post->EventStartDate);
									$end = strtotime($post->EventEndDate);
									$day = date('d', $start);
									$month = date('M', $start);

									$stime = date(get_option('time_format'), $start);
									$etime = date(get_option('time_format'), $end);
								?>
								<div class="caption">	
									<div class="event-heading">
										<div class="event-title">
											<?php do_action( 'tribe_events_before_the_event_title' ); ?>
											<h4 class="tribe-events-list-event-title entry-title summary">
												<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
													<?php the_title(); ?>
												</a>
											</h4>
											<?php do_action( 'tribe_events_after_the_event_title' ); ?>
										</div>
										<div class="date"><?php echo esc_html( date('M, d Y', $start) ); ?></div>
									</div>	
								</div>
							</div><!-- .tribe-events-event-meta -->

							<div class="des"><?php echo training_wpo_excerpt(30); ?></div>

						<?php do_action( 'tribe_events_after_the_meta' ); ?>
					</div>
				</div>

			</div>	
	</div>

	<div class="tribe-events-event-details tribe-clearfix <?php if(empty($featured_image)) echo 'no-image' ?> hidden">
		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ); ?>
		<div class="tribe-events-list-photo-description tribe-events-content entry-summary description">
			<?php the_excerpt(); ?>
		</div>
		<?php do_action( 'tribe_events_after_the_content' ) ?>

	</div><!-- /.tribe-events-event-details -->
</div>	
