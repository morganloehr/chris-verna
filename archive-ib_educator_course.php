<?php if ( ! defined( 'ABSPATH' ) ) exit; 

global $trainingconfig;
$trainingconfig = training_wpo_course_page_config();

get_header( training_wpo_theme_options('headerlayout', '') );  

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

<?php 
 	do_action( 'training_wpo_layout_breadcrumbs_render' );   
	do_action( 'ib_educator_before_main_loop', 'archive' );
?> 

	<section id="wpo-mainbody" class="wpo-mainbody clearfix">
	    <div class="container">
	      <div class="container-inner">
	        <div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
							<div class="<?php echo esc_attr($class_column) ?>">
								<?php get_template_part( 'ibeducator/content', 'course' ); ?>
							</div>	
					<?php endwhile; ?>
				</div>
			</div>
		</div>	
	</section>			

<?php do_action( 'ib_educator_after_main_loop', 'archive' ); ?>

<?php get_footer(); ?>
