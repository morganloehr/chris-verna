<?php
/*
*Template Name: Blog
*
*/
global $trainingconfig;
// Get Page Config
$trainingconfig = $wpoEngine->getPageConfig();

?>

<?php get_header( $wpoEngine->getHeaderLayout() );  ?>

 <?php 
 	if( isset($trainingconfig['breadcrumb']) && $trainingconfig['breadcrumb'] ){
    do_action( 'training_wpo_layout_breadcrumbs_render' ); 
  } 
?>  
    
 <?php do_action( 'training_wpo_layout_template_before' ) ; ?>

     <div class="post-area blog-page-<?php echo (esc_attr($trainingconfig['blog_style']) ?  esc_attr($trainingconfig['blog_style']) : 'default'); ?> <?php echo ($trainingconfig['blog_style']=='masonry')? 'blog-masonry ': ''; ?>" id="container">
         <?php get_template_part('contents-post');?>
     </div>

 <?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>