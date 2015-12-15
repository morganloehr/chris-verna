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
switch ( $mode ) {
    case 'most_recent' : 
       $arg = array( 
            'posts_per_page' => $number, 
            'meta_key'=>'_EventStartDate',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_type' => 'tribe_events'
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
<div class="widget wpo-event-list <?php echo esc_attr($el_class); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content tribe-events-list">
        <div class="tribe-events-content">
            <?php if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                $i = $query->current_post + 1;
                global $post;
                $start = strtotime($post->EventStartDate);
                $end = strtotime($post->EventEndDate);
                $day = date('d', $start);
                $month = date('M', $start);    
                $room = "";
                $postconfig = get_post_meta( get_the_ID(),'wpo_postconfig', true );
                if( isset( $postconfig['event_room'] ) && !empty( $postconfig['event_room'] )){
                    $room = $postconfig['event_room']; 
                } 
            ?>
               <article class="event-item-list <?php echo esc_attr($style); ?>">
                    <div class="event-header-inner">
                        <div class="event-date">
                            <span class="date"><?php echo trim($day); ?></span>
                            <span class="month"><?php echo trim($month); ?></span>
                        </div>
                        <div class="event-header">                   
                            <div class="event-meta">
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
                                <span class="event-address">
                                    <?php echo ($room ? '<address class="tribe-events-address"><i class="fa fa-map-marker"></i>' . $room . '</address>' : ''); ?>
                                </span>  
                            </div> 
                            <h4 class="event-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4> 
                          
                        </div> 
                    </div>
                    <div class="clearfix"></div>
                </article>
            <?php endwhile; wp_reset_postdata(); endif;?>
        </div>
    </div>
</div>