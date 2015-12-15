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

$featured_image = tribe_event_featured_image( null, 'post-thumbnail' );
$start = strtotime($post->EventStartDate);

$day = date('d', $start);
$month = date('M', $start);

?>
<div class="wpo-event-inner">
	<div class="small-event-header clearfix <?php if(empty($featured_image)) echo 'no-image' ?>">
	 <div class="image">
       <?php echo trim( $featured_image ); ?>
    </div>
    
    <div class="event-body bg-white">
      <div class="event-meta">
        <div class="meta-left">
          <div class="entry-create">
            <span class="date"><?php echo esc_attr( $day ); ?></span>
            <span class="month"><?php echo esc_attr( $month ); ?></span>
          </div>  
        </div>
        <div class="meta-right">
           <span class="event-time">
              <i class="fa fa-clock-o"></i>
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
      </div>
      <div class="bottom">
        <div class="clearfix"></div>
  		  <h4 class="event-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4> 
        <div class="clearfix"></div>
        
        <div class="tribe-events-event-details tribe-clearfix <?php if(empty($featured_image)) echo 'no-image' ?>">
          <div class="tribe-events-content entry-summary description">
            <?php echo training_wpo_excerpt(22, '...'); ?>
          </div>
        </div>
      </div>  
    </div>
	</div>
</div>	
