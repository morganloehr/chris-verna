<?php
/**
 * $loop
 * $class_column
 *
 */

$_count =0;

$colums = $grid_columns;
$bscol = floor( 12/$colums );

?>
<?php
	if( $colums >1 ){
	$i = 0;
	while($loop->have_posts()){
	$loop->the_post();
 ?>
 		<?php if(  $i++%$colums==0 ) {  ?>
 		<div class="posts-grid grid-center"><div class="row">
 		<?php } ?>
	 	<div class="col-sm-<?php echo esc_attr($bscol); ?> text-center">
		    <?php get_template_part( 'templates/post/_single' ) ?>
		</div>
		<?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
		</div></div>
		<?php } ?>
<?php  } } ?>
<?php wp_reset_postdata();?>
<?php else { ?>
	<div class="posts-grid grid-center text-center">
	<?php
		while($loop->have_posts()){  $loop->the_post(); ?>
		<?php get_template_part( 'templates/post/_single' ) ?>
	<?php 	} ?>
	<?php wp_reset_postdata();?>
	</div>
<?php } ?>

