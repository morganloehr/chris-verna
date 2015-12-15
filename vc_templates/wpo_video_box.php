<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>

<?php $style='width:'.$width .'px; height:'.$height.'px;max-width:100%;'; ?>

<?php if(isset($img[0]) && $img[0]) { 
   $style .= 'background: url(\''.esc_url($img[0]).'\') no-repeat center center;';
 } ?>  

<div class="widget wpo-video-box <?php echo esc_attr($el_class);?> clearfix">
   <div class="video-inner parallax" <?php if($style) echo ('style="' . trim($style) . '"') ?>>
      <div class="wpo-video-body">
         <a class="wpo-video-link" data-height="<?php echo esc_attr($height) ?>" data-width="<?php echo esc_attr($width) ?>" data-url="<?php echo esc_url($url) ?>" href="#">
            <i class="icon-play space-40"></i>
            <span class="video-title"><?php if($title) echo esc_html( $title ); ?></span>
        </a>
      </div> 
   </div>    
</div>   
