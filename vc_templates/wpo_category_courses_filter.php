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


$category = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
  'taxonomy'     => 'ib_educator_category',
  'child_of'     => 0,
  'number'       => $number,
);
if(  $category ){
    $args['parent'] = $category;
}
$categories = get_categories( $args );

$_id = training_wpo_makeid();
?>

<div class="widget wpo-category-courses-filter <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size) . ' ' . $alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>
	<div class="widget-content">
	   <?php
		if( $categories && !empty($categories)) { ?>
			<div id="carousel-<?php echo esc_attr($_id); ?>" class="space-margin-0 text-center owl-carousel-play" data-ride="owlcarousel">
                <?php if( $number  > ($column*2)) { ?>
                    <div class="owl-control">
                        <a class="left carousel-control carousel-sm radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
                                <span class="zmdi zmdi-arrow-back zmd-fw"></span>
                        </a>
                        <a class="right carousel-control carousel-sm radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
                                <span class="zmdi zmdi-arrow-forward zmd-fw"></span>
                        </a>
                    </div>  
                <?php } ?>
                <div class="owl-carousel " data-slide="<?php echo esc_attr($column); ?>" data-pagination="false" data-navigation="true">    
                    <?php $i=0; foreach( $categories as $cat){ 
                        $i++;
                        $term_meta = get_option('taxonomy_'.$cat->term_id);

                        $icon_color = get_option('icon_color' . $cat->term_id);
                    ?>
                        <?php if($i%2==1) print '<div class="item">'; ?>
                            <div class="category-item space-padding-top-40">
        						<?php if(isset($term_meta['icon']) && !empty($term_meta['icon'] )){ ?>
                                    <div class="image">
                                        <a class="title" href="<?php echo get_term_link( $cat->slug, 'ib_educator_category'); ?>">
                                            <span class="icon <?php echo esc_attr($term_meta['icon']) ?>" <?php if(!empty($term_meta['icon_color'])) echo ('style="color:'.$term_meta['icon_color'].'"'); ?>></span>
                                        </a>
                                    </div>    
                                <?php } ?>
                                <a class="title" href="<?php echo get_term_link( $cat->slug, 'ib_educator_category'); ?>">
                                    <?php echo trim($cat->name); ?>
                                </a>
                            </div>    
                        <?php if($i%2==0 || $i==count($categories)) print '</div>'; ?>
				    <?php } ?>
                </div>
            </div>        
		<?php } ?>
	</div>
</div>