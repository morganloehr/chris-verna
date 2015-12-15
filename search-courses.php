<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>
<?php 
	if(have_posts()){
		do_action( 'training_wpo_layout_breadcrumbs_render' );
	}else{
?>
	<div style="<?php echo training_wpo_layout_breadcrumbs_bg(); ?>" class="wpo-breadcrumbs">
	   <div class="wpo-breadcrumbs-inner breadcrumbs light-style space-35">
			<div class="container">
				<h2 class="breadcrumb-heading"><span class="active"><?php esc_html_e('Resource not found', 'training') ?></span></h2>
			</div>
		</div>
	 </div>
<?php
	}	
?>

	<section id="wpo-mainbody" class="wpo-mainbody clearfix">
	    <div class="container">
	      <div class="container-inner">
	        <div class="row">
	        		<?php if(have_posts()): ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-4 col-xs-12">
								<?php get_template_part( 'ibeducator/content', 'course' ); ?>
							</div>	
						<?php endwhile; ?>
					<?php endif ?>	
				</div>
			</div>
		</div>	
	</section>			

<?php get_footer(); ?>