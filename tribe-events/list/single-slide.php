<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

global $post;
$room = "";
$postconfig = get_post_meta( get_the_ID(),'wpo_postconfig', true );
if( isset( $postconfig['event_room'] ) && !empty( $postconfig['event_room'] )){
   $room = $postconfig['event_room']; 
} 

$featured_image = tribe_event_featured_image( null, '' );
$start = strtotime($post->EventStartDate);

$image_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$style = '';
if(isset($image_url) && $image_url){
   $style .= 'background: url(\''.$image_url.'\') no-repeat center center; height: 660px; background-size: cover;';
}

?>
<div class="wpo-event-inner" style="<?php echo trim($style) ?>">
	<div class="small-event-header clearfix <?php if(empty($featured_image)) echo 'no-image' ?>">
      <div class="event-body">
         
         <div class="event_heading">
            <div class="container">
               <h2><a class="event-title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
               <div class="event-des"><?php echo training_wpo_excerpt(28, '...'); ?></div>
            </div>
         </div>

         <div class="event-meta hidden-xs">
            <div class="container">
               <div class="event-meta-inner">   
                  <div class="event-label">
                     <span><?php esc_html_e('start in', 'training'); ?></span>
                  </div>
                  <div class="time">
                     <div class="pts-countdown clearfix" data-countdown="countdown"
                          data-date="<?php echo  tribe_get_start_date($post->ID, false, 'Y-m-d-H-i-s' ); ?>">
                     </div>
                  </div>
                  <div class="register space-top-30">
                     <a class="btn radius-4x btn-success" href="<?php the_permalink(); ?>"><?php esc_html_e('register online', 'training'); ?></a>
                  </div>
               </div>   
            </div>  
         </div>

		</div>
   </div>   
</div>	
