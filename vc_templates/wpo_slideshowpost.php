<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;

$my_query = new WP_Query($args);
$columgrid = floor(12/$grid_columns);
if(  empty($layout) ){
    $layout = 'blog';
}
$id = rand();
$countposts = $args ['posts_per_page'];
?>

<section class="widget slideshowpost blog-type <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
            <?php if(trim($descript)!=''){ ?>
                <span class="widget-desc">
                    <?php echo trim($descript); ?>
                </span>
            <?php } ?>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <div class="owl-carousel-play">
           <div class="owl-carousel" data-slide="<?php echo esc_attr($grid_columns); ?>"  data-singleItem="true" data-navigation="true">
            <?php $i=0; while ( $my_query->have_posts() ): $my_query->the_post(); ?>
                <div class="item">
                    <?php get_template_part( 'templates/post/slideshow' ); ?>
                </div>
       
              <?php if( ++$i== $countposts){ break; } ?>
            <?php endwhile; ?>
            </div>
            <a class="left carousel-control carousel-xs radius-x" href="#post-slide-<?php $id; ?>" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control carousel-xs radius-x" href="#post-slide-<?php $id; ?>" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>

        </div>
    </div>
</section>