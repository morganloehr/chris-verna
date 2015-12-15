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
   
   $states[] = 'publish';
   $args = array(
      'post_status'  => $states,
      'post_type' => 'tribe_events',
      'posts_per_page' => $number
   );
   
switch ( $mode ) {
   case 'most_recent' : 
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
   break;

   case 'random' : 
      $args['orderby'] = 'rand';
   break;

   default : 
      $args = array('p' => $mode);
}
$query = new WP_Query( $args );

$_id = training_wpo_makeid();

?>
<div class="widget wpo-event-timeline wpo-event-of-date <?php echo esc_attr($el_class); ?>">
   <?php if( $title ) { ?>
      <h3 class="widget-title visual-title <?php echo esc_attr($size) . ' ' . $alignment; ?>">
      </h3>
   <?php } ?>

   <div class="widget-content">
      <div class="events-timeline">
         <?php if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
               $i = $query->current_post + 1;
               $_imgs = training_wpo_gallieries();
               $galleries = array();
               foreach( $_imgs as $val){
                  if( $val ) $galleries[] = $val;
               }
               $room = "";
               $postconfig = get_post_meta( get_the_ID(),'wpo_postconfig', true );
              if( isset( $postconfig['event_room'] ) && !empty( $postconfig['event_room'] )){
                 $room = $postconfig['event_room']; 
              }
         ?>
            <article <?php post_class('tribe-events-item'); ?>>
               <div class="row">
                  <div class="col-sm-1 hidden-xs">

                  </div>

                  <div class="col-sm-5 col-xs-12">
                     <div class="event-date">
                        <?php echo tribe_get_start_date(get_the_ID(), false, 'M d, Y'); ?>
                     </div>
                     <div class="clearfix"></div>
                     <div class="event-title text-right"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>
                  </div>

                  <div class="col-sm-6">
                     <div class="event-content text-left">
                        <div class="content-inner">
                           <div class="time">
                              <span class="event-time">
                                 <i class="fa fa-calendar"></i>
                                 <?php
                                     echo tribe_get_start_date(get_the_ID(), false, 'H:i');
                                 ?>
                                 <span>-</span>
                                 <?php
                                     if(tribe_get_end_date(get_the_ID(), false, 'dMY') == tribe_get_start_date(get_the_ID(), false, 'dMY')){
                                         echo tribe_get_end_date(get_the_ID(), false, 'H:i');
                                     }else{
                                         echo tribe_get_end_date(get_the_ID(), false, 'M, d H:i');
                                     }
                                 ?>
                             </span>
                           </div>  
                           <p class="event-description"><?php echo training_wpo_excerpt(20, '...'); ?></p>
                        </div>   
                     </div>   
                  </div>
               </div>  
               <div class="clearfix"></div>    
            </article>  
         <?php endwhile; 
            wp_reset_postdata();
            endif;
         ?>
      </div>   
   </div>
</div>