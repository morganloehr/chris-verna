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

wp_register_script( 'countdown_js', WPO_THEME_URI.'/js/countdown.js', array( 'jquery' ) );
wp_enqueue_script('countdown_js');

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
<div class="widget wpo-event-tabs <?php echo esc_attr($el_class); ?>">
  <?php if( $title ) { ?>
    <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
      <span><?php echo trim($title); ?></span>
    </h3>
  <?php } ?>

  <div class="widget-content <?php echo esc_attr($el_class); ?>" id="event-tabs-<?php echo esc_attr($_id); ?>">
    <div class="events-tabs">
      <div class="tablist col-xs-12 col-md-3 space-padding-0">
        <ul class="nav nav-tabs height-group" role="tablist">
          <?php if ( $query->have_posts() ) :
           while ( $query->have_posts() ) : $query->the_post();
              $i = $query->current_post + 1;
          ?>
          <li <?php if($i == 1) echo 'class="active"' ?>>  
              <div class="event-date">
                <?php
                  echo tribe_get_start_date(get_the_ID(), false, 'd M, Y | H:i');
                ?>
                <span>-</span>
                <?php
                   if(trim(tribe_get_end_date(get_the_ID(), false, 'd-M-Y')) != tribe_get_start_date(get_the_ID(), false, 'd-M-Y')){
                     echo tribe_get_end_date(get_the_ID(), false, 'd M, Y | H:i');
                   }else{
                      echo tribe_get_end_date(get_the_ID(), false, 'H:i');
                   }
                ?>
             </div>
              <a href="#tab-<?php echo esc_attr($_id); ?>-<?php echo esc_attr($i) ?>" role="tab" data-toggle="tab"><?php the_title(); ?></a>
          </li>
          <?php endwhile;  wp_reset_postdata(); endif;?>
        </ul> 
      </div>  

      <div class="tab-content col-xs-12 col-md-9 space-padding-0"> 
        <?php if ( $query->have_posts() ) :
           while ( $query->have_posts() ) : $query->the_post();
              $i = $query->current_post + 1;
        ?>

        <div id="tab-<?php echo esc_attr($_id); ?>-<?php echo esc_attr($i) ?>" class="tab-pane fade <?php if($i==1) echo (' active in') ?>" role="tabpanel">
          <article <?php post_class('item-event'); ?>>
            <?php get_template_part( 'tribe-events/list/single', 'tab' ) ?> 
          </article>  
        </div>

        <?php endwhile; 
          wp_reset_postdata();
          endif;
        ?>
      </div>
    </div>    
  </div>
</div>