<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
?>

<section class="widget wpo-grid-posts section-blog <?php echo (($el_class!='')?' '.esc_attr($el_class):''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.esc_attr($alignment); ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <?php
            $loop = new WP_Query($args);
            if($loop->have_posts()){  ?>
                <?php training_wpo_get_template('post/'.$layout.'.php',array( 'grid_columns' => $grid_columns, 'loop'=> $loop , 'class_column'=> $el_class,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
            <?php  } ?>
    </div>
</section>
