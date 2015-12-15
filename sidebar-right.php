<?php  
	global $trainingconfig;
?>
<?php if($trainingconfig['right-sidebar']['show']){ 
	$pos = empty($trainingconfig['right-sidebar']) ?training_wpo_theme_options('right-sidebar'): $trainingconfig['right-sidebar']['widget'];
?>
	<div class="<?php echo esc_attr($trainingconfig['right-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
		</div>
	</div>
<?php } ?>