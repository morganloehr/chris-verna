<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		$posts_per_page = training_wpo_theme_options('courses-number-related-single', 6);
		$column	= 2;
		
    $userId = (int)get_post_meta( $post->ID, '_relateduser', true );
 
  if( $userId > 0 ) {
    $args = array(
        'post_type' => 'ib_educator_course',
        'posts_per_page' => $posts_per_page,      
        'meta_query' => array(
          array(
            'key' => '_ib_educator_teacher',
            'value' => $userId,
          )
        ),
    );

     $col = floor( 12/$column ); 
    $class_col = "col-lg-".$col." col-md-".$col." col-sm-".$col." col-xs-12";



       $query = new WP_Query( $args );
   ?>

<?php if ( $query->have_posts() ) : ?>
<div class="space-padding-top-45">
    <div class="widget wpo-courses-related wpo-educator-grid">
       <h3 class="widget-title visual-title font-size-sm separator_align_left">
          <span><?php esc_html_e('Currently Teaching', 'training') ?></span>
       </h3>
 	
 		<div class="widget-content space-padding-top-10">
 			<?php 
 				while ( $query->have_posts() ) : $query->the_post();
 					$i = $query->current_post + 1;
 			?>
 			<?php if($i%$column==1) echo '<div class="row">'; ?>
 			
 			<div class="<?php echo esc_attr($class_col); ?>">
 				<?php get_template_part( 'ibeducator/content', 'course' ) ?> 
 			</div>	

 			<?php if($i%$column==0 || $i==($query->found_posts)) echo '</div>'; ?>
 			<?php endwhile; 
 				wp_reset_postdata();
 			?>
 		</div>
 	</div>
</div>      
<?php endif; ?>
<?php } ?>
