<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="widget widget-text-heading <?php echo esc_attr($el_class); ?>">
	<?php if($title!=''): ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($title_align).' '.$size; ?>" style="<?php echo 'color:'.$font_color;?>">
           <span><?php echo trim($title); ?></span>
        </h3>
        <?php if(trim($descript)!=''){ ?>
            <span class="widget-desc">
                <?php echo trim($descript); ?>
            </span>
        <?php } ?>
    <?php endif; ?>
</div>