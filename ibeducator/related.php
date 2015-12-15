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
		$column	= training_wpo_theme_options('courses-number-related-single', 3);
		$terms = get_the_terms( get_the_ID(), 'ib_educator_category' );
        $termids =array();

        if($terms){
            foreach($terms as $term){
                $termids[] = $term->term_id;
            }
        }
        $taxonomy = 'ib_educator_category';
        $args = array(
            'post_type' => 'ib_educator_course',
            'posts_per_page' => $posts_per_page,
            'post__not_in' => array( get_the_ID() ),
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $termids,
                    'operator' => 'IN'
                )
            )
        );

 
     $col = floor( 12/$column ); 
     $class_col = "col-lg-".$col." col-md-".$col." col-sm-".$col." col-xs-12";

      $query = new WP_Query( $args );
   ?>

<?php if ( $query->have_posts() ) : ?>
<div class="bg-v6 space-padding-top-45">
   <div class="container">
      <div class="widget wpo-courses-related wpo-educator-grid">
         <h3 class="widget-title visual-title font-size-sm separator_align_left">
            <span><?php esc_html_e('Others Courses', 'training') ?></span>
         </h3>
   	  
   		<div class="widget-content">
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
</div>      
<?php endif; ?>
   <?php