<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = wp_get_attachment_image_src($photo,'full');
?>

<div class="widget wpo-ourservice <?php echo esc_attr($el_class.' '.$style.' '); ?>">
	<?php if(isset($img[0]) && $img[0]){?>
	<div class="ourservice-image">
		<img src="<?php echo esc_url($img[0]);?>" alt="<?php echo esc_attr($title); ?>" />
	</div>
	<?php } ?>
	<?php if($icon){ ?>
	<div class="ourservice-icon">
		<i class="fa <?php echo esc_attr($icon); ?> text-skin"></i>
	</div>
	<?php } ?>
	<?php if($title!=''): ?>
		<h3 class="widget-title ourservice-heading <?php echo esc_attr($size.' '.$title_align.' '); ?>">
			<span><?php echo trim($title); ?></span>
		</h3>
	<?php endif; ?>
	<?php if(trim($information)!=''){ ?>
        <p class="ourservice-content">
			<?php echo do_shortcode( $information );?>
		</p>
    <?php } ?>
</div>