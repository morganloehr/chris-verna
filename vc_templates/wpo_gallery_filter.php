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

    add_action( 'wp_enqueue_scripts', 'training_enqueue_script_porfolio' );
    

    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
    $args = array( 
        'post_type' => 'gallery',
        'posts_per_page' => $number,
        'paged' => $paged
    );
    $query = new WP_Query($args);
    $_id = training_wpo_makeid();

    switch ($column) {
        case '6': 
            $class_column = 'col-lg-2 col-md-4 col-sm-4 col-xs-12';
            break;
        case '4':
            $class_column='col-md-3 col-sm-3';
            break;
        case '3':
            $class_column='col-md-4 col-sm-4';
            break;
        case '2':
            $class_column='col-md-6 col-sm-6';
            break;
        default:
            $class_column='col-md-12 col-sm-12';
            break;
    }
?>

<div class="widget wpo-gallery-filters tab-theme">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <div class="gallery-filters">
            <?php if ( $query->have_posts() ) : ?>
            <?php $terms = get_terms('gallery_category',array('orderby'=>'id')); ?>
            <div class="col-xs-12">
                  <div id="filters" class="isotope-filter">
                        <ul class="nav nav-tabs wpo-gallery-filters">
                            <li>
                                <a href="javascript:void(0)" title="" data-filter=".all" class="active">
                                  <span><?php esc_html_e('All', 'training'); ?></span>
                                </a>
                            </li>
                        <?php if ( count($terms) > 0 ){
                            foreach ( $terms as $term ): ?>
                              <li><a href="javascript:void(0)" title="" data-filter=".<?php echo esc_attr($term->slug); ?>">
                               <span><?php echo esc_html($term->name); ?></span>
                              </a></li>
                        <?php endforeach;
                            }
                        ?>
                        </ul>
                  </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
                <div class="isotope" data-isotope-duration="400">
                    <?php    
                        while ( $query->have_posts() ) : $query->the_post();    
                        $item_classes = 'all ';
                        $item_cats = get_the_terms( get_the_id(), 'gallery_category' );
                        foreach((array)$item_cats as $item_cat){
                            if(count($item_cat)>0){
                                $item_classes .= $item_cat->slug . ' ';
                            }
                        }
                    ?>
                       <div class="<?php echo esc_attr( $class_column ); ?> item <?php echo esc_attr($item_classes); ?>">
                            <?php get_template_part( 'templates/gallery/item' ) ?> 
                        </div>
                    <?php endwhile; 
                        wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>    
        <?php training_wpo_pagination_nav( $number, $query->found_posts, $query->max_num_pages ); ?>
        </div>    
    </div>
</div>
