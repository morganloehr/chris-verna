<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
// d( $args ,1 );die;


?>

<section class="widget mega-posts section-blog <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
            <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">

        <?php
            if( $layout == 'categories-posts' && !empty($args['cat']) ) {

            $categories  = explode( ",", $args['cat'] );

            $ccount = count($categories);
            $ccol = floor( 12/$ccount );
        ?>
        <div class="row mega-posts-inner">
        <?php
            foreach( $categories as $catid ) {
                $cargs = $args;
                $cargs['cat'] = $catid;
                $loop = new WP_Query($cargs);
        ?>

            <?php  if($loop->have_posts()){  ?>
                <div class="category-posts col-sm-<?php echo esc_attr($ccol); ?>">
                    <span class="label category-posts-label"><a href="<?php echo get_category_link( $catid ) ?>"><?php echo get_cat_name( $catid ) ?></a></span>
                    <?php training_wpo_get_template('post/'.$layout.'.php',array( 'loop'=> $loop , 'class_column'=> $class_column,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
                    <?php  } ?>
                </div>
            <?php  } ?>

         </div>
        <?php } else {  ?>
        <?php

            $loop = new WP_Query($args);
            if($loop->have_posts()){  ?>
                <?php training_wpo_get_template('post/'.$layout.'.php',array( 'loop'=> $loop , 'class_column'=> $class_column,'grid_thumb_size'=>$grid_thumb_size ) ); ?>
             <?php  } ?>
          <?php  } ?>
    </div>
</section>