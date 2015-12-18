<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
add_action( 'wp_enqueue_scripts', 'training_enqueue_script_porfolio' );


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$col = floor(12/$columns_count);
$smcol = ($col > 4)? 6: $col;
$class_column= 'col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;

if( $nopadding ){
   $class_column .=' nopadding';
}
$terms = get_terms('category_portfolio',array('orderby'=>'id'));

$args = array(
  'post_type' => 'portfolio',
  'posts_per_page'=>$number
  );
if($pagination == 1){
   $paged = get_query_var( 'paged', 1 );
   $args['paged'] = $paged; 
}
$loop = new WP_Query($args);
?>
   <!-- end filters -->
      <?php $_id = training_wpo_makeid();

      ?>
<div class="widget wpb_grid wpo-portfolio <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
  <div class="teaser_grid_container">
    <div class="wpb_filtered_grid teaser_grid_container <?php echo (($nopadding) ? '' : 'row') ?>">
        <?php if( $title ) { ?>
            <h3 class="widget-title visual-title <?php echo esc_attr( $size ).' '.esc_attr( $alignment ); ?>">
               
                <?php if(trim($descript)!=''){ ?>
                <span class="widget-desc">
                <?php echo trim( $descript ); ?>
                </span>
                <?php } ?>
                 <span><?php echo esc_html( $title ); ?></span>
            </h3>
        <?php } ?>

      <?php if( $loop->have_posts()): ?>
      <!-- filters category -->
      <div id="filters"  class="tab-v8 space-50">
        <div class="nav-inner">
          <ul class="nav nav-tabs isotope-filter categories_filter" data-related-grid="isotope-<?php echo esc_attr( $_id ); ?>">
            <?php
            echo '<li class="active"><a href="javascript:void(0)" title="" data-option-value=".all">'.esc_html__('All', 'training').'</a></li>';

            if ( !empty($terms) && !is_wp_error($terms) ){
              foreach ( $terms as $term ) {
                echo '<li><a href="javascript:void(0)" title="" data-option-value=".'.esc_attr( $term->slug ).'">'.esc_html($term->name).'</a></li>';
              }
            }
            ?>
          </ul>
        </div>
      </div>

    <div class="isotope-masonry portfolio-entries clearfix masonry-spaced" data-isotope-duration="400" id="isotope-<?php echo esc_attr( $_id ); ?>">
    <?php while($loop->have_posts()): $loop->the_post();

       $item_classes = 'all ';
       $item_cats = get_the_terms( $loop->post->ID, 'category_portfolio' );
       
       if($masonry==0) $thumb = 'thumbnails-large'; else $thumb = '';
        if(!empty($item_cats) && !is_wp_error($item_cats)){
           foreach((array)$item_cats as $item_cat){
              $item_classes .= $item_cat->slug . ' ';
           }
         }
       $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'full' );
       ?>
      <div class="portfolio-masonry-entry masonry-item <?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
        <div class="wpo-portfolio-content text-center">
          <div class="ih-item square colored effect16">
              <div class="img">
                 <a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail()) {
                    the_post_thumbnail($thumb);
                  }?></a>
              </div>
              <div class="info">
                <div class="info-inner">
                    <h3><a class="text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="description"> <?php the_excerpt(); ?></p>
                    <p class="negative-marg-top"><a  href="<?php the_permalink(); ?>">  Read More <i class="fa fa-chevron-right radius-x space-padding-10"></i></a></p>
                </div>    
              </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    </div>
    <?php 
    if($pagination == 1){
      training_wpo_pagination_nav( $number, $loop->found_posts, $loop->max_num_pages );
    }
    ?>
    <?php endif; ?>
    </div>
  </div>  
</div>