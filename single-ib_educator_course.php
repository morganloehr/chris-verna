<?php if ( ! defined( 'ABSPATH' ) ) exit; 
   global $trainingconfig;
   $trainingconfig = training_wpo_course_page_config();
?> 
   <?php get_header( training_wpo_theme_options('headerlayout', '') );  ?>
    <?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>  
   <?php 
      do_action( 'training_wpo_layout_template_before' ) ; 
      do_action( 'ib_educator_before_main_loop' );
   ?>
	<?php while ( have_posts() ) : the_post(); ?>
	  <?php Edr_View::template_part( 'content', 'single-course' ); ?>
	<?php endwhile; ?>
   <?php 
      do_action( 'ib_educator_after_main_loop' );
      do_action( 'training_wpo_layout_template_after' ) ; 
   ?>   

   <div class="clearfix"></div>  
 
   <div class="clearfix space-45"></div>
   <?php 
      if(is_file(get_template_directory() . '/ibeducator/related.php')) {
         include(get_template_directory() . '/ibeducator/related.php');
      }
  ?>

<?php get_footer(); ?>

