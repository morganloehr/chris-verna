<?php
/*
*Template Name: Portfolio
*
*/

global $trainingconfig, $wp_query;
// Get Page Config
$trainingconfig = $wpoEngine->getPageConfig();
$columns = 2; $i = 0;
?>

<?php get_header( $wpoEngine->getHeaderLayout() );  ?>

<?php if( isset($trainingconfig['breadcrumb']) && $trainingconfig['breadcrumb'] ){
    do_action( 'training_wpo_layout_breadcrumbs_render' ); 
  } ?>	

<?php do_action( 'training_wpo_layout_template_before' ) ; ?>
	<?php while(have_posts()):the_post(); $i++;?>
		<?php if($i%2==1) echo '<div class="row space-60">' ?>
		
		<div class="col-sm-6">
			<div class="teacher-category-wrap">
				<?php get_template_part('templates/content/content','teacher'); ?>
			</div>
		</div>	
		
		<?php if($i%2==0 || $i==$wp_query->found_posts) echo '</div>' ?>	
	<?php endwhile; ?>
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>