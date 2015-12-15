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

$countposts = $args ['posts_per_page'];
?>

<section class="widget post blog-type <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
            <?php if(trim($descript)!=''){ ?>
                <span class="widget-desc">
                    <?php echo trim($descript); ?>
                </span>
            <?php } ?>
        </h3>
    <?php } ?>

    <div class="widget-content">
    
            <?php $i=0; while ( $my_query->have_posts() ): $my_query->the_post(); ?>
            <?php if( $i++%$grid_columns == 0 ) { ?>
            <div class="row">
            <?php } ?>
            <div class="col-sm-<?php echo esc_html($columgrid); ?> col-md-<?php echo esc_html($columgrid); ?> col-lg-<?php echo esc_html($columgrid); ?>">
                <?php get_template_part( 'templates/blog/'.$layout ); ?>
            </div>
            <?php if( $i%$grid_columns==0 || $i==$my_query->post_count ) { ?>
             </div>
            <?php } ?>
            <?php if( $i== $countposts){ break; } ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata();?>
     
    </div>
</section>

