<?php
/*
*Template Name: Gallery
*
*/
global $trainingconfig;
// Get Page Config
$trainingconfig = $wpoEngine->getPageConfig();
?>

  <?php get_header( $wpoEngine->getHeaderLayout() );  ?>
  <?php if( isset($trainingconfig['breadcrumb']) && $trainingconfig['breadcrumb'] ){
    do_action( 'training_wpo_layout_breadcrumbs_render' ); 
  } ?>	

  <?php do_action( 'training_wpo_layout_template_before' ) ; ?>
        <div  class="clearfix gallery-page">
            <?php get_template_part('contents-gallery');?>
        </div>
 <?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>