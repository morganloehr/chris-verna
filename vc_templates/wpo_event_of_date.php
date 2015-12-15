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
   
TribeEventsQuery::init();
   $states[] = 'publish';
   $args = array(
      'post_status'  => $states,
      'eventDate'    => $event_date,
      'eventDisplay' => 'day',
      'orderby' => 'date', 
      'order' => 'DESC',
      'post_type' => 'tribe_events',
      'post__in' => wp_parse_id_list($event_ids)
   );
   TribeEvents::instance()->displaying = 'day';
   $query = TribeEventsQuery::getEvents( $args, true );

$_id = training_wpo_makeid();
?>
<div class="widget wpo-event-of-date <?php echo esc_attr($el_class); ?>">
   <?php if( $title ) { ?>
      <h3 class="widget-title visual-title <?php echo esc_attr($size) . ' ' . $alignment; ?>">
      </h3>
   <?php } ?>

   <div class="widget-content">
      <div class="row">
         <div class="col-xs-12">
            <div class="date-heading"><?php echo tribe_event_format_date($event_date, false, 'd M Y') ?></div>
         </div>
      </div>
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
                  <div class="col-sm-2">
                     <div class="event-date">
                        <?php
                           if( trim(tribe_get_start_date(get_the_ID(), false, 'Y-m-d'))  != trim($event_date) ){
                              echo '00:00';
                           }else{
                              echo tribe_get_start_date(get_the_ID(), false, 'H:i');
                           }
                        ?>
                        <span>-</span>
                        <?php
                           if(trim(tribe_get_end_date(get_the_ID(), false, 'Y-m-d')) != trim($event_date)){
                              echo '23:59';
                           }else{
                              echo tribe_get_end_date(get_the_ID(), false, 'H:i');
                           }
                        ?>
                     </div>
                     <div class="clearfix"></div>
                     <div class="event_room text-right">
                        <span><?php echo esc_html($room); ?></span>
                     </div>
                     <div class="clearfix"></div>
                     <div class="speaker">
                        <?php foreach ($galleries as $key => $_img) {
                           echo '<div class="item '.(($key==0)?'active':'').'">';
                              echo '<img src="'.esc_url( $_img ).'" alt="">';
                           echo '</div>';
                        } ?>
                     </div>   
                        
                  </div>

                  <div class="col-sm-10">
                     <div class="event-content text-left">
                        <div class="content-inner">
                           <div class="event-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
                           <p class="event-description"><?php the_excerpt(); ?></p>
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