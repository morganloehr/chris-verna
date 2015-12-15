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
if( $term_id && !empty($term_id) ){
    $term = get_term( $term_id, 'product_cat' );
    $args = array(
              'taxonomy'     => 'product_cat',
              'child_of'     => 0,
              'parent'       => $term_id,
              'number'       => $number,
            );
    $sub_cats = get_categories( $args );
    if( $image_cat && !empty( $image_cat ))
        $image = wp_get_attachment_image_src( $image_cat, 'postthumb-grid');
    else {
        $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_image_src( $thumbnail_id, 'postthumb-grid');
    }

    $category_link = get_term_link( $term->term_id, 'product_cat' );
}


?>

<div class="widget wpo-category-filter <?php echo (($el_class!='')?' '.$el_class:''); ?>">
	<div class="widget-content media">
		<a class="pull-left category-filter-image" href="<?php echo esc_url($category_link); ?>">
			<?php if( $image ) { ?>
				<img src="<?php echo esc_url($image[0]); ?>" title="<?php echo esc_attr($term->name); ?>" class="media-object" style="max-width: 100%" alt="">
			<?php } ?>
		</a>
		<div class="media-body category-filter-content">
            <?php if($title!=''):?>
                <h3 class="category-filter-title">
                    <span><?php echo trim($title); ?></span>
            </h3>
            <?php endif; ?>
			<?php
			if( $sub_cats && !empty($sub_cats)) { ?>
                <ul class="list-unstyled category-filter-list">
					<?php
    					foreach( $sub_cats as $cat){
    						$sub_link = get_term_link( $cat->slug, 'product_cat');
    						$cat_name = $cat->name .' ('. $cat->count .')';
    					?>
                        <li class="category-filter-list-item">
    						<a href="<?php echo esc_attr($sub_link); ?>">
                                <?php echo trim($cat_name); ?>
                            </a>
                        </li>
				    <?php } ?>
                </ul>
			<?php } ?>
			<div class="category-filter-link">
                <a href="<?php echo esc_url($category_link); ?>" title="<?php echo esc_html__( 'more', 'training'); ?>" class="btn btn-link"><?php echo esc_html__( 'more', 'training' ); ?></a>
            </div>
		</div>
	</div>
</div>