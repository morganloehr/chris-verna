<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = wp_get_attachment_image_src($photo,'full');

$style .= $background ? ' hasbg space-padding-tb-20 space-padding-lr-30':'';

$css = 'style="color:'.$color.'" ';
?>
<div class="feature-box <?php echo esc_attr($style); ?> <?php echo esc_attr($background); ?> <?php echo esc_attr($el_class) ?> " <?php echo trim($css); ?>>
	<?php if(isset($img[0]) && $img[0]){?>
	<div class="fbox-image separator_align_center">
		<img src="<?php echo esc_url($img[0]);?>" alt="<?php echo esc_attr($title); ?>" />
	</div>
	<?php } ?>
	<?php if($icon){ ?>
    <div class="fbox-icon space-25 separator_align_center">
        <i class="icons fa <?php echo esc_attr($icon); ?> <?php echo esc_attr($iconstyle); ?>"></i>
    </div>
    <?php } ?>
      <div class="fbox-content">  
         <div class="fbox-body">                            
            <h4 <?php echo trim($css); ?>><?php echo trim($title); ?></h4> 
            <?php if( $subtitle ) { ?>
            <small><?php echo esc_html($subtitle); ?></small>  
            <?php } ?>
            <?php if(trim($content)!=''){ ?>
              <div class="description description-1 hidden"><?php echo trim( $content );?></div>  
           <?php } ?>                        
         </div>
         <?php if(trim($content)!=''){ ?>
           <div class="description description-2"><?php echo trim( $content );?></div>  
         <?php } ?>
      </div>      
</div>

