<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="widget tribe-events-meta-group tribe-events-meta-group-organizer">
	<h3 class="widget-title special font-size-sm separator_align_left tribe-events-single-section-title"><span> <?php echo (tribe_get_organizer_label_singular()); ?> </span></h3>
	<div class="widget-content">
		<dl>
			<?php do_action( 'tribe_events_single_meta_organizer_section_start' ) ?>

			<dd class="fn org"> <?php echo tribe_get_organizer() ?> </dd>
			<div class="clearfix"></div>
			<?php if ( ! empty( $phone ) ): ?>
				<dt> <?php esc_html_e( 'Phone:', 'training' ) ?> </dt>
				<dd class="tel"> <?php echo esc_html( $phone ); ?> </dd>
				<div class="clearfix"></div>
			<?php endif ?>

			<?php if ( ! empty( $email ) ): ?>
				<dt> <?php esc_html_e( 'Email:', 'training' ) ?> </dt>
				<dd class="email"> <?php echo esc_html( $email ); ?> </dd>
				<div class="clearfix"></div>
			<?php endif ?>

			<?php if ( ! empty( $website ) ): ?>
				<dt> <?php esc_html_e( 'Website:', 'training' ) ?> </dt>
				<dd class="url"> <?php echo trim( $website ); ?> </dd>
				<div class="clearfix"></div>
			<?php endif ?>

			<?php do_action( 'tribe_events_single_meta_organizer_section_end' ) ?>
		</dl>
	</div>	
</div>