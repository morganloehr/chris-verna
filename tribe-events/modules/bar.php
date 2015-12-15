<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();
?>

<?php do_action('tribe_events_bar_before_template') ?>
<div id="tribe-events-bar">

	<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_url( $current_url ); ?>">

		<div class="first-column col-xs-12">
			<div id="tribe-bar-collapse-toggle" <?php if ( count( $views ) == 1 ) { ?> class="tribe-bar-collapse-toggle-full-width"<?php } ?>>
				<?php esc_html_e( 'Find Events', 'training' ) ?><span class="tribe-bar-toggle-arrow"></span>
			</div>

			<?php if ( !empty( $filters ) ) { ?>
			<div class="tribe-bar-filters">
				<div class="tribe-bar-filters-inner tribe-clearfix">
					<?php foreach ( $filters as $filter ) : ?>
						<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
							<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo esc_html( $filter['caption'] ); ?></label>
							<?php echo ( $filter['html'] ); ?>
						</div>
					<?php endforeach; ?>
					<div class="tribe-bar-submit">
						<button class="tribe-no-param btn btn-donate-black" type="submit" name="submit-bar"><span class="icon"><i class="fa fa-setting"></i></span><span class="btext"><?php esc_html_e( 'Find Events', 'training' ) ?></span></button>
					</div><!-- .tribe-bar-submit -->
				</div><!-- .tribe-bar-filters-inner -->
			</div><!-- .tribe-bar-filters -->
			<?php } // if ( !empty( $filters ) ) ?>
		</div>

		<div class="second-column col-xs-12">
			<?php if ( count( $views ) > 1 ): ?>
			<div id="tribe-bar-views">
				<div class="tribe-bar-views-inner tribe-clearfix">
					<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'training' ) ?></h3>
					<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
						<?php foreach ( $views as $view ) : ?>
							<option <?php echo tribe_is_view($view['displaying']) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ) ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
								<?php echo trim( $view['anchor'] ); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div><!-- .tribe-bar-views-inner -->
			</div><!-- .tribe-bar-views -->
			<?php endif // if ( count( $views ) > 1 ) ?>
		</div>

	</form><!-- #tribe-bar-form -->

</div><!-- #tribe-events-bar -->

<?php do_action('tribe_events_bar_after_template') ?>
