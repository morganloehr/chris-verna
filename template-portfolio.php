<?php
/*
*Template Name: Portfolio
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
    <div  class="clearfix portfolio-page">
            <?php get_template_part('contents-portfolio');?>
    </div>
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>