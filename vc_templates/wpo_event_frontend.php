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
$class_col = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
switch ( $mode ) {
    case 'most_recent' : 
       $arg = array( 
            'posts_per_page' => $number, 
            'orderby' => 'date', 
            'order' => 'DESC',
            'post_type' => 'tribe_events'
        );
        break;

    case 'featured' :
        $arg = array( 
            'posts_per_page' => $number, 
            'orderby' => 'date', 
            'order' => 'DESC',
            'post_type' => 'tribe_events',
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
     	$arg = array(
            'post_type' => 'tribe_events',
            'posts_per_page' => $number, 
            'orderby' => 'rand'
        );
        break;
}

switch ( $columns ) {
    case '2' : 
        $class_col = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
        break;
    case '3' : 
      	$class_col = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
        break;
    case '4' : 
      	$class_col = "col-lg-3 col-md-3 col-sm-3 col-xs-12";
        break;
    default : 
     	$class_col = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
}


$query = new WP_Query( $arg );
$_id = training_wpo_makeid();
?>

<div class="widget wpo-event-frontend <?php echo esc_attr($style); ?> <?php echo esc_attr($el_class); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

	<div class="widget-content tribe-events-list">
		<?php if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$i = $query->current_post + 1;
		?>
		<?php if($i%$columns==1) echo '<div class="row">'; ?>
		
		<article <?php post_class($class_col . ' item-event'); ?>>
			<?php get_template_part( 'tribe-events/list/single', 'event' ) ?>	
		</article>	

		<?php if($i%$columns==0 || $i==($query->found_posts)) echo '</div>'; ?>
		<?php endwhile; 
			wp_reset_postdata();
			endif;
		?>
	</div>
</div>