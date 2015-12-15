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
            'orderby' => 'date', 
            'order' => 'DESC',
            'post_type' => 'ib_educator_course'
        );
        break;

    case 'random' : 
        $arg = array(
            'post_type' => 'ib_educator_course',
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
<div class="widget wpo-educator-carousel <?php echo esc_attr($el_class); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.esc_attr( $alignment ); ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

	<div class="widget-content">
		<div class="widget-brands-inner owl-carousel-play" id="productcarouse-<?php echo esc_attr($_id); ?>" data-ride="carousel">
            <?php   if( $query->post_count > $column ) { ?>
            <div class="carousel-controls">
                <a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="prev" class="left carousel-control carousel-xs radius-x">
                    <i class="zmdi zmdi-arrow-back zmd-fw"></i>
                </a>
                <a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="next" class="right carousel-control carousel-xs radius-x">
                    <i class="zmdi zmdi-arrow-forward zmd-fw"></i>
                </a>
            </div>
            <?php } ?>
            <div class="owl-carousel" data-slide="<?php echo esc_attr($column); ?>"  data-singleItem="true" data-navigation="true" data-pagination="false">

                <?php if ( $query->have_posts() ) :
        			while ( $query->have_posts() ) : $query->the_post();
        				$i = $query->current_post + 1;
        		?>
        		<div class="item">
        			<?php get_template_part( 'ibeducator/content', 'course' ) ?> 
        		</div>	

		          <?php endwhile; 
        			wp_reset_postdata();
        			endif;
		          ?>
            </div>
        </div>          
	</div>
</div>