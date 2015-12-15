<?php
$size = 'font-size-lg'; $alignment = 'separator_align_left';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="heading clearfix <?php echo esc_attr( $alignment ); ?> heading-<?php echo esc_attr($heading_style); ?> <?php echo esc_attr($el_class); ?>">
    <div class="heading-inner">
        <h2><?php echo trim($title); ?></h2>
        <?php if( $subheading ){ ?>
          <small class="subheading"> <?php echo trim($subheading); ?></small>
        <?php } ?>
    </div>    
    <?php if( trim($descript) ){ ?>
        <small class="des"> <?php echo trim($descript); ?></small>
    <?php } ?>
</div>