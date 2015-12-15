<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$arg = array(); 

add_action( 'wp_enqueue_scripts', 'training_enqueue_script_coundown' );

switch ( $mode ) {
    case 'most_recent' : 
       $arg = array( 
            'posts_per_page' => $number, 
            'post_type' => 'tribe_events',
            'meta_key'=>'_EventStartDate',
            'orderby' => 'meta_value',
            'order' => 'DESC',
        );
        break;

    case 'featured' :
        $arg = array( 
            'posts_per_page' => $number, 
            'post_type' => 'tribe_events',
            'meta_key'=>'_EventStartDate',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'meta_query' => array(
                    array(
                        'key'     => 'wpo_postconfig',
                        'value' => '"is_featured";s:1:"1"',
                        'compare' => 'like'
                    ),
                ),
            );  
        break;

    case 'random' : 
        $arg = array(
            'post_type' => 'tribe_events',
            'posts_per_page' => $number, 
            'orderby' => 'rand'
        );
        break;

    default : 
      $arg = array('p' => $mode);
}

$query = new WP_Query( $arg );
$_id = training_wpo_makeid();
?>
<div class="widget widget-event-slide <?php echo esc_attr($el_class); ?>">
  <?php if( $title ) { ?>
    <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
      <span><?php echo trim($title); ?></span>
    </h3>
  <?php } ?>

  <div class="widget-content owl-carousel-play <?php echo esc_attr($el_class); ?>" id="productcarouse-<?php echo esc_attr($_id); ?>" data-ride="carousel">
    <div class="owl-carousel" data-slide="1" data-singleItem="true" data-navigation="true" data-pagination="false">  
      <?php if ( $query->have_posts() ) :
         while ( $query->have_posts() ) : $query->the_post();
            $i = $query->current_post + 1;
      ?>
      <div class="item">
         <article <?php post_class('item-event'); ?>>
            <?php get_template_part( 'tribe-events/list/single', 'slide' ) ?> 
         </article>  
      </div>
      <?php endwhile; 
         wp_reset_postdata();
         endif;
      ?>
    </div>  
  </div>
</div>