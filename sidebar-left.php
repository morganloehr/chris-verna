<?php 
global $trainingconfig;  
?> 
<?php 
if($trainingconfig['left-sidebar']['show']){ 
	$pos = empty($trainingconfig['left-sidebar']) ?training_wpo_theme_options('left-sidebar'): $trainingconfig['left-sidebar']['widget'];
?>
	<div class="<?php echo esc_attr($trainingconfig['left-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-left">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
 
		</div>
	</div>
<?php } ?>
 