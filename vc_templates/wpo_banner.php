<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$class = "";  
$class .= ( $color != '' ) ? $color : '';
$class .= ( $btn_style != '' ) ? ' ' . $btn_style : '';
?>
<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>

<div class="widget wpo-banner <?php echo esc_attr($el_class);?> clearfix <?php echo esc_attr($content_position); ?> <?php echo esc_attr($hover_effect);?>">
   <div class="banner-inner">
      <div class="banner-image">
         <?php if(isset($img[0]) && $img[0]) { ?>
            <img src="<?php echo esc_url($img[0]); ?>" alt=""/>
         <?php } ?>  
      </div>
      <div class="banner-body">

         <div class="heading">
            <?php if( $subheading ){ ?>
               <small class="subheading"> <?php echo trim($subheading); ?></small>
             <?php } ?>
            <h3 class="<?php echo esc_attr($size); ?>"><?php echo trim($title); ?></h3>
            <?php if( trim($information) ){ ?>
               <small class="des"> <?php echo trim($information); ?></small>
            <?php } ?>
            <div class="clearfix"></div>
            <?php if($link) { ?>
               <p class="clearfix"><a class="link btn btn-md <?php echo esc_attr($class ); ?>" href="<?php echo esc_url($link); ?>"><?php echo esc_attr($link_text); ?></a></p>
            <?php } ?>
         
         </div>   
      </div>
    </div> 
</div>   
