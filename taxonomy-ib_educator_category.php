<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php 
	get_header( $wpoEngine->getHeaderLayout() ); 
	global $trainingconfig;
	$trainingconfig = training_wpo_course_page_config();
	$columns = training_wpo_theme_options('courses-archive-column');

switch ($columns) {
	case '6': 
		$class_column = 'col-lg-2 col-md-4 col-sm-4';
		break;
	case '4':
		$class_column='col-md-3 col-sm-3';
		break;
	case '3':
		$class_column='col-md-4 col-sm-4';
		break;
	case '2':
		$class_column='col-md-6 col-sm-6';
		break;
	default:
		$class_column='col-md-6 col-sm-12';
		break;
}
	 
?>

<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?> 
	
	<?php 
		do_action( 'training_wpo_layout_template_before' ) ; 
		do_action( 'ib_educator_before_main_loop', 'archive' );
	?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="<?php echo esc_attr($class_column)?>">
			<?php get_template_part( 'ibeducator/content', 'course' ); ?>
		</div>	
	<?php endwhile; ?>
	<?php
		do_action( 'ib_educator_after_main_loop', 'archive' );
	   do_action( 'training_wpo_layout_template_after' ) ; 
	?>		

<?php get_footer(); ?>