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
<div class="widget wpo-educator-odds <?php echo esc_attr($el_class); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

	<div class="widget-content tribe-events-list">
		<?php if ( $query->have_posts() ) :
            $k = 0; $col_class="";
			while ( $query->have_posts() ) : $query->the_post();
				$i = $query->current_post + 1;
		?>
		<?php 
            if($i % 6 == 1) echo '<div class="row">'; 
                if($i % 3 == 1) echo '<div class="col-sm-6"><div class="row">';
        ?>
	   
        <?php 
            if($k%2==0){
                if($i%3==1){  
                    $col_class = 'col-xs-12 item-large';
                }elseif($i%3==2 || $i%3==0){  
                    $col_class = 'col-md-6 item-small';
                }
            }else{
               if($i%3==1 || $i%3==2){  
                    $col_class = 'col-md-6 item-small';
                }elseif($i%3==0){  
                    $col_class = 'col-md-12 item-large';
                } 
            }    
        ?>

		<div class="<?php echo esc_attr($col_class) ?>">
			<?php get_template_part( 'ibeducator/content', 'course' ) ?> 
		</div>	

		<?php 
                if($i %  3 == 0 || $i==($query->found_posts)){$k++; echo '</div></div>'; }
            if($i %  6 == 0 || $i==($query->found_posts)){ echo '</div>';}
         ?>
		<?php endwhile; 
			wp_reset_postdata();
			endif;
		?>
	</div>
</div>