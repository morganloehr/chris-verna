<?php
$classes = apply_filters( 'ib_educator_course_classes', array( 'course' ) );
$classes[] = 'course-item style-absolute';
$separator = ', ';
$title = get_the_title();
$link = get_the_permalink();
$terms = get_the_terms(get_the_id(), 'ib_educator_category' );
$options = get_post_meta(get_the_id(), 'wpo_postconfig', true );
$post_id = get_the_id();
$educator =  IB_Educator::get_instance();
$lesson = $educator->get_num_lessons(get_the_id());
?>
<article id="course-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"> 
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="course-image">
		<?php the_post_thumbnail( 'course-image' ); ?>
	</div>
	<?php endif; ?>
	<div class="course-inner">
		<div class="course-header">
			<h4><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($title); ?></a></h4>
		</div>
		<div class="meta">
			<h4><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($title); ?></a></h4>
			<div class="description"><?php echo training_wpo_excerpt(18, '...'); ?></div>
			<div class="ib-edu-course-price">
				<?php if(ib_edu_get_course_price(get_the_ID()) == 0){ ?>
					 <span class="label-free"><?php esc_html_e('Free', 'training') ?></span>
				<?php }else{ ?>		
					<span><?php echo ib_edu_format_price( ib_edu_get_course_price( get_the_ID() ) ); ?></span>
				<?php } ?>	
			</div>
		</div>	
	</div>	
</article>