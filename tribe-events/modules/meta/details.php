<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */
?>

<div class="widget tribe-events-meta-group tribe-events-meta-group-details">
	<h3 class="widget-title special font-size-sm separator_align_left tribe-events-single-section-title"><span> <?php esc_html_e( 'Details', 'training' ) ?> </span></h3>
	<div class="widget-content">
	<dl>

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		$time_format = get_option( 'time_format', Tribe__Events__Date_Utils::TIMEFORMAT );
		$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

		$start_datetime = tribe_get_start_date();
		$start_date = tribe_get_start_date( null, false );
		$start_time = tribe_get_start_date( null, false, $time_format );
		$start_ts = tribe_get_start_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

		$end_datetime = tribe_get_end_date();
		$end_date = tribe_get_end_date( null, false );
		$end_time = tribe_get_end_date( null, false, $time_format );
		$end_ts = tribe_get_end_date( null, false, Tribe__Events__Date_Utils::DBDATEFORMAT );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

			<dt> <?php esc_html_e( 'Start:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>
			<dt> <?php esc_html_e( 'End:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr dtend" title="<?php echo esc_attr( $end_ts ) ?>"> <?php echo esc_html( $end_date ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<dt> <?php esc_html_e( 'Date:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>
		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<dt> <?php esc_html_e( 'Start:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_datetime ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>
			<dt> <?php esc_html_e( 'End:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr dtend" title="<?php echo esc_attr( $end_ts ) ?>"> <?php echo esc_html( $end_datetime ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>
		<?php
		// Single day events
		else :
			?>

			<dt> <?php echo esc_html( 'Date:', 'training' ) ?> </dt>
			<dd>
				<abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr>
			</dd>
			<div class="clearfix"></div>
			<dt> <?php esc_html_e( 'Time:', 'training' ) ?> </dt>
			<dd><abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $end_ts ) ?>">
					<?php if ( $start_time == $end_time ) {
						echo esc_html( $start_time );
					} else {
						echo esc_html( $start_time . $time_range_separator . $end_time );
					} ?>
				</abbr></dd>
			<div class="clearfix"></div>
		<?php endif ?>

		<?php
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ):
			?>
			<dt> <?php esc_html_e( 'Cost:', 'training' ) ?> </dt>
			<dd class="tribe-events-event-cost"> <?php echo esc_html( tribe_get_formatted_cost() ) ?> </dd>
			<div class="clearfix"></div>
		<?php endif ?>

		<?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt>',
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>'
			)
		);
		?>

		<?php echo tribe_meta_event_tags( esc_html__( 'Event Tags:', 'training' ), ', ', false ) ?>

		<?php
		$website = tribe_get_event_website_link();
		if ( ! empty( $website ) ):
			?>
			<dt> <?php esc_html_e( 'Website:', 'training' ) ?> </dt>
			<dd class="tribe-events-event-url"> <?php echo esc_html( $website ); ?> </dd>
			<div class="clearfix"></div>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>
	</div>
</div>