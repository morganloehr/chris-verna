<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
 
$loop = new WP_Query($args);
?>

<section class="widget widget-highlighted frontpage-posts frontpage-9 layout-<?php echo esc_attr($layout); ?>  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php
        if($title!=''){ ?>
            <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
                <span><?php echo trim($title); ?></span>
            </h3>
        <?php }
    ?>
    <div class="widget-content"> 
      <?php
        /**
         * $loop
         * $class_column
         *
         */

        $_count =0;

        $colums = $grid_columns;
        $bscol = floor( 12/$colums );

        ?>
         
        <div class="posts-grid">
            <?php
                $i =0; while($loop->have_posts()){  $loop->the_post(); ?>
                 <?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>

                 <?php if(  $i++%$colums==0 ) {  ?>
                <div class="posts-grid"><div class="row">
                <?php } ?>
                <div class="col-sm-<?php echo esc_attr($bscol); ?>">
                    <article class="post">
                        <?php
                        if ( has_post_thumbnail() ) {
                            ?>
                                <figure class="entry-thumb">
                                    <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                                        <?php the_post_thumbnail( $thumbsize );?>
                                    </a>
                                    <!-- vote    -->
                                    <?php do_action('wpo_rating') ?>
                                </figure>
                            <?php
                        }
                        ?>
                        <div class="entry-content">
                           
                            <?php if (get_the_title()) { ?>
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                            <?php  } ?>
                        </div>
                    </article>
                </div>
                <?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
                </div></div>
                <?php } ?>
            <?php   }  ?>
            <?php wp_reset_postdata();?>
        </div>
    </div>
</section>