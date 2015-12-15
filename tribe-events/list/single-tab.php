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

$postconfig = get_post_meta( get_the_ID(),'wpo_postconfig', true );

$featured_image = tribe_event_featured_image( null, 'thumbnails-medium' );
$start = strtotime($post->EventStartDate);
$image_url =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
$style = 'background-image: url(\''.$image_url.'\')';
?>

<div class="wpo-event-inner">
   <div class="height-group small-event-header clearfix <?php if(empty($featured_image)) echo 'no-image' ?>" style="<?php echo trim($style) ?>">
      <a class="link-overlay" href="<?php echo the_permalink();?>"></a>
      <div class="event-body">
         <div class="event-meta">
            <div class="end-time"><?php esc_html_e('Time end', 'training') ?></div>
            <div class="time">
               <div class="pts-countdown clearfix" data-countdown="countdown"
                    data-date="<?php echo tribe_get_start_date($post->ID, false, 'Y-m-d-H-i-s' ); ?>">
               </div>
            </div>
            <div class="register hidden">
               <a class="btn radius-4x btn-success" href="<?php the_permalink(); ?>"><?php esc_html_e('register online', 'training'); ?></a>
            </div>
         </div>
      </div>
   </div>   
</div>   
