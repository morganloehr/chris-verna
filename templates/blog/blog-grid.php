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
if(is_single()) $class .= ' post-single'; else $class .= ' not-post-single';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
        <?php endif; ?>
        <div class="post-container">
            <div class="blog-post-detail blog-post-grid">
                <figure class="entry-thumb">
                    <?php training_wpo_post_thumbnail(); ?>
                     <?php if(!empty($icon)){ ?>
                        <span class="icon-post fa <?php echo esc_attr($icon); ?>"></span>
                    <?php } ?>
                </figure>
                <div class="entry-data">
                    <h3 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="entry-meta">
                        <span class="entry-date"><?php echo get_the_date(); ?></span>
                        <span class="meta-sep"> / </span>
                        <span class="comment-count">
                            <?php comments_popup_link(esc_html__(' 0 comment', 'training'), esc_html__(' 1 comment', 'training'), esc_html__(' % comments', 'training')); ?>
                        </span>
                        <span class="meta-sep"> / </span>
                        <span class="author-link"><?php the_author_posts_link(); ?></span>
                        <?php if(is_tag()): ?>
                            <span class="meta-sep"> / </span>
                            <span class="tag-link"><?php the_tags('Tags: ',', '); ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="entry-description">
                        <?php echo training_wpo_excerpt(30); ?>
                    </p>
                </div>
            </div>
        </div>
    </article>
