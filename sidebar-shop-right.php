<?php  
global $trainingconfig;  
$pos = training_wpo_theme_options('woocommerce-archive-right-sidebar');
?>

<?php if($trainingconfig['right-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($trainingconfig['right-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
		</div>
	</div>
<?php } ?>
