<?php
/**
 * List View Nav Template
 * This file loads the list view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/nav.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */
global $wp_query;

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Events List Navigation', 'training' ) ?></h3>

<div class="wp-pagenavi">
	<?php
		global $wp_query;

		$total_pages = (int)$wp_query->max_num_pages;

		if($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			echo '<span class="pages">'.sprintf(esc_html__('Page %d of %d', 'training'), $current_page, $total_pages).'</span>';
		}
	?>
	<div class="tribe-events-sub-nav">
		<ul>
			<!-- Left Navigation -->
			<!-- Display Previous Page Navigation -->
			<li class="tribe-events-nav-previous"><a href="#" class="tribe_map_paged"><?php esc_html_e( '&laquo; Previous Events', 'training' ) ?></a></li>
			<!-- Display Next Page Navigation -->
			<li class="tribe-events-nav-next"
			<?php if ( $wp_query->max_num_pages === ( $wp_query->query_vars['paged'] ) ) : ?>
				 style="display:none;"
			<?php endif; ?>
			>
				<a href="#" class="tribe_map_paged"><?php esc_html_e( 'Next Events &raquo;', 'training' ) ?></a>
			</li><!-- .tribe-events-nav-next -->
		</ul>
	</div>
</div>