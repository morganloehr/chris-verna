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
$postformat = get_post_format();

$icon = training_wpo_related_post();

$class = 'post-default';
if(is_single()) $class .= ' post-single'; else $class .= ' not-post-single';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
          
        <?php endif; ?>
        <div class="post-container clearfix row">
            <div class="blog-post-detail">
                <div class="col-md-4">
                    <figure class="entry-thumb">
                
                        <?php the_post_thumbnail( $size, $attr ); ?> 
                    </figure>
                </div>
                <div class="col-md-8 post-info">
                    <div class="entry-data ">
                        <h3 class="entry-title">
                            <?php the_title(); ?>
                        </h3>
                        <p class="entry-content">
                             <?php the_content(); ?> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>