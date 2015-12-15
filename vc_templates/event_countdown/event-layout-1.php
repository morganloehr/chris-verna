<?php 
 	global $post;
	$start = strtotime($post->EventStartDate);
	$end = strtotime($post->EventEndDate);
	$day = date('d', $start);
	$month = date('M', $start);		
?>

<article <?php echo trim($post->class); ?>>
	<div class="event-header-inner layout-1">
		<div class="event-header-inner">
			<div class="event-header clearfix">
				<div class="event-title">
					<h4 class="tribe-events-list-event-title entry-title summary">
						<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h4>
				</div>
				<div class="event-des text-white space-padding-tb-20">
					<?php echo training_wpo_excerpt(28, '...'); ?>
				</div>
			</div>
		</div>	
	
		<div class="event-time">
			<div class="label-start hidden-xs hidden-sm"><span><?php esc_html_e('Start in', 'training') ?></span></div>
			<div class="time">
	            <div class="pts-countdown clearfix" data-countdown="countdown"
	                 data-date="<?php echo  tribe_get_start_date( $post->ID, false, 'Y-m-d-H-i-s' ); ?>">
	            </div>
	        </div>
		</div>

		<div class="event-action text-center space-padding-tb-20">
			<a class="btn btn-lg btn-outline-light btn-success radius-4x border-2"><?php esc_html_e('sign up now', 'training'); ?></a>
		</div>

	</div>
</article>