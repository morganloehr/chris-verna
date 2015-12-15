<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}
$phone = tribe_get_phone();
$website = tribe_get_venue_website_link();
?>

<div class="widget tribe-events-meta-group tribe-events-meta-group-venue">
	<h3 class="widget-title special font-size-sm separator_align_left tribe-events-single-section-title"> <span><?php echo ( tribe_get_venue_label_singular()); ?></span> </h3>
	<div class="widget-content">
		<dl>
			<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

			<dd class="author fn org"> <?php echo tribe_get_venue() ?> </dd>
			<div class="clearfix"></div>
			<?php
			// Do we have an address?
			$address = tribe_address_exists() ? '<address class="tribe-events-address">' . tribe_get_full_address() . '</address>' : '';

			// Do we have a Google Map link to display?
			$gmap_link = tribe_show_google_map_link() ? tribe_get_map_link_html() : '';
			$gmap_link = apply_filters( 'tribe_event_meta_venue_address_gmap', $gmap_link );

			// Display if appropriate
			if ( ! empty( $address ) ) {
				echo '<dd class="location">' . "$address $gmap_link </dd>";
				echo '<div class="clearfix"></div>';
			}
			?>

			<?php if ( ! empty( $phone ) ): ?>
				<dt> <?php esc_html_e( 'Phone:', 'training' ) ?> </dt>
				<dd class="tel"> <?php echo esc_html( $phone ) ?> </dd>
				<div class="clearfix"></div>
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<dt> <?php esc_html_e( 'Website:', 'training' ) ?> </dt>
				<dd class="url"> <?php echo trim( $website ); ?> </dd>
				<div class="clearfix"></div>
			<?php endif ?>

			<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
		</dl>
	</div>	
</div>