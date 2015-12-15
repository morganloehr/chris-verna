<?php
	
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 

	 

		// How do we want to order our results?
		switch ( $order_by ) {
			// Order by most recent replies
			case 'freshness' :
				$topics_query = array(
					'post_type'           => bbp_get_topic_post_type(),
					'post_parent'         => $parent_forum,
					'posts_per_page'      => (int) $max_shown,
					'post_status'         => array( bbp_get_public_status_id(), bbp_get_closed_status_id() ),
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'meta_key'            => '_bbp_last_active_time',
					'orderby'             => 'meta_value',
					'order'               => 'DESC',
				);
				break;

			// Order by total number of replies
			case 'popular' :
				$topics_query = array(
					'post_type'           => bbp_get_topic_post_type(),
					'post_parent'         => $parent_forum,
					'posts_per_page'      => (int) $max_shown,
					'post_status'         => array( bbp_get_public_status_id(), bbp_get_closed_status_id() ),
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'meta_key'            => '_bbp_reply_count',
					'orderby'             => 'meta_value',
					'order'               => 'DESC'
				);
				break;

			// Order by which topic was created most recently
			case 'newness' :
			default :
				$topics_query = array(
					'post_type'           => bbp_get_topic_post_type(),
					'post_parent'         => $parent_forum,
					'posts_per_page'      => (int) $max_shown,
					'post_status'         => array( bbp_get_public_status_id(), bbp_get_closed_status_id() ),
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'order'               => 'DESC'
				);
				break;
		}

		// Note: private and hidden forums will be excluded via the
		// bbp_pre_get_posts_normalize_forum_visibility action and function.
		$widget_query = new WP_Query( $topics_query );


?>
 	<div class="topics-thread">

		<?php while ( $widget_query->have_posts() ) :

			$widget_query->the_post();
			$topic_id    = bbp_get_topic_id( $widget_query->post->ID );
			$author_link = '';
			// Maybe get the topic author
				$author_link = bbp_get_topic_author_link( array( 'post_id' => $topic_id, 'type' => 'both', 'size' => 50 ) );
		 	?>
				<div class="discuss-topic">
				<?php if ( ! empty( $author_link ) ) : ?>
					<div class="topic-avatar">
					<?php printf( _x( '%1$s', 'widgets', 'bbpress' ), '<div class="topic-author">' . $author_link . '</div>' ); ?>
					</div>
				<?php endif; ?>
					<div class="topic-content">
						<h4><a class="bbp-forum-title" href="<?php bbp_topic_permalink( $topic_id ); ?>"><?php bbp_topic_title( $topic_id ); ?></a></h4>
						<?php bbp_topic_last_active_time( $topic_id ); ?>
					</div>
			</div>		
			

		<?php endwhile; ?>

	</div>
	<?php wp_reset_postdata(); ?>