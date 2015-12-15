<?php
$classes = apply_filters( 'ib_educator_course_classes', array( 'course' ) );
$classes[] = 'course-item';
$categories = '';
$separator = ', ';
$title = get_the_title();
$link = get_the_permalink();
$terms = get_the_terms(get_the_id(), 'ib_educator_category' );
$options = get_post_meta(get_the_id(), 'wpo_postconfig', true );
$post_id = get_the_id();
$excerpt = training_wpo_excerpt(22, '...');
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   foreach ( $terms as $term ) {
     $categories .=  $term->name . $separator;  
   }
}
$categories = trim($categories, $separator);
$educator =  IB_Educator::get_instance();
$lesson = $educator->get_num_lessons(get_the_id());
?>
<article id="course-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"> 
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="course-image">
		<a href="<?php echo esc_url($link) ?>"><?php the_post_thumbnail( 'course-image' ); ?></a>
		<div class="ib-edu-course-price">
			<?php if(ib_edu_get_course_price(get_the_ID()) == 0){ ?>
				 <span class="label-free"><?php esc_html_e('Free', 'training') ?></span>
			<?php }else{ ?>		
				<span><?php echo ib_edu_format_price( ib_edu_get_course_price( get_the_ID() ) ); ?></span>
			<?php } ?>	
		</div>
	</div>
	<?php endif; ?>
	<div class="course-inner">
		<div class="course-header">
			<h4><a href="<?php echo esc_url($link) ?>"><?php echo esc_html($title); ?></a></h4>
			<div class="description"><?php echo esc_html($excerpt); ?></div>
			<div class="readmore"><a href="<?php the_permalink(); ?>" class="btn btn-outline btn-primary border-2 btn-sm"><?php esc_html_e('Read more', 'training'); ?></a></div>
		</div>
	</div>	
</article>