<?php
$style = 'style-default';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'counter_js', WPO_THEME_URI.'/js/jquery.counterup.min.js', array( 'jquery' ) );
wp_enqueue_script( 'waypoints_js', WPO_THEME_URI.'/js/waypoints.min.js', array( 'jquery' ) );

?>
<?php $img = wp_get_attachment_image_src($image,'full'); ?>
 <?php if($style=='style-2-light'): ?>
   <div class="counters <?php  echo esc_attr($el_class); ?> <?php echo esc_attr($style) ?>">
      <div class="counter-wrap">
   		<span class="counter counterUp <?php echo esc_attr($text_color); ?>" <?php echo trim($color) ?>><?php echo (int)$number ?></span>
         <span class="clearfix"></span>
         <div class="meta">
            <div class="image">
               <?php if( isset($img[0]) ) { ?>
         			<img src="<?php echo esc_url($img[0]);?>" title="<?php echo esc_attr($title); ?>" class="image-icon">
         		<?php }else if( $icon ) { ?>
         		 	<i class="fa <?php echo esc_attr($icon); ?> <?php echo esc_attr($text_color); ?>" <?php echo trim($color) ?>></i>
         		<?php } ?>
            </div>   
            <div class="title <?php echo esc_attr($text_color); ?>" <?php echo trim($color) ?>><?php echo trim($title); ?></div>
         </div>   
      </div> 
   </div>
<?php else: ?>
   <div class="counters <?php  echo esc_attr($el_class); ?> <?php echo esc_attr($style) ?>">
      <div class="counter-wrap <?php echo esc_attr($text_color); ?>">
         <?php if( isset($img[0]) ) { ?>
            <img src="<?php echo esc_url($img[0]);?>" title="<?php echo esc_attr($title); ?>" class="image-icon">
         <?php }else if( $icon ) { ?>
            <i class="fa <?php echo esc_attr($icon); ?> <?php echo esc_attr($text_color); ?>" <?php echo trim($color) ?>></i>
         <?php } ?>
         <span class="clearfix"></span>
         <span class="counter counterUp <?php echo esc_attr($text_color); ?>" <?php echo trim($color) ?>><?php echo (int)$number ?></span>
      </div> 
       <h5 class="counter-title <?php echo esc_attr($text_color); ?>"<?php echo trim($color) ?>><?php echo trim($title); ?></h5>
   </div>
<?php endif; ?>   
