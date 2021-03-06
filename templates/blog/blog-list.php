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
$class= 'post-style-list post-default';
if(is_single()) $class .= ' post-single'; else $class .= ' not-post-single';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            
        <?php endif; ?>
        <div class="post-container">
            <div class="blog-post-detail row">
                <div class="<?php if($postformat == 'quote') echo 'col-xs-12'; else echo 'col-md-4 col-sm-4' ?>">
                    <figure class="entry-thumb">
                        <?php 
                            if(has_post_format($postformat)){
                                get_template_part( 'templates/content/content', $postformat );
                            }
                         ?>
                        <div class="post-meta-top">
                            <div class="entry-created bg-success space-padding-top-10">
                                <span class="month"><?php the_time( 'M' ); ?></span>
                                <span class="date"><?php the_time('d'); ?></span>
                            </div>
                            <?php if(!empty($icon)){ ?>
                                <div class="icon-post bg-darker color-white space-padding-top-20 text-center">
                                    <span class="space-padding-top-10 text-white fa <?php echo esc_attr($icon); ?>"></span>
                                </div>    
                            <?php } ?>
                        </div>  
                    </figure>
                </div>
                <div class="col-md-8 col-sm-8 <?php if($postformat == 'quote') echo 'hidden'; ?>">
                    <div class="entry-data">
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <div class="entry-meta">
                            <span class="author-link"><?php esc_html_e('By ', 'training') ?><?php the_author_posts_link(); ?></span>
                            <span class="meta-sep space-padding-lr-5"> . </span>
                            <span class="comment-count">
                                <?php comments_popup_link(esc_html__(' 0 comment', 'training'), esc_html__(' 1 comment', 'training'), esc_html__(' % comments', 'training')); ?>
                            </span>
                        </div>
                        <p class="entry-content">
                            <?php echo training_wpo_excerpt(40); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>