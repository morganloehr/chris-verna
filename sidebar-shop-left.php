<?php 
global $trainingconfig;  
$pos = esc_attr( training_wpo_theme_options('woocommerce-archive-left-sidebar') );
?> 
<?php if($trainingconfig['left-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($trainingconfig['left-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-left">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
 
		</div>
	</div>
<?php } ?>
 