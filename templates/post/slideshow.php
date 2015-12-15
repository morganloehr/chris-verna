<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>
<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                    <?php the_post_thumbnail( $thumbsize );?>
                </a>
                <!-- vote    -->
                <?php do_action('wpo_rating') ?>
            </figure>
        <?php
    }
    ?>
    <div class="entry-content">
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                <div class="entry-category">
                    <?php the_category(); ?>
                </div>
            
                <ul class="entry-comment list-inline">
                    <li class="comment-count">
                        <?php comments_popup_link(esc_html__(' 0 ', 'training'), esc_html__(' 1 ', 'training'), esc_html__(' % ', 'training')); ?>
                    </li>
                </ul>

                 <div class="entry-create">
                    <span class="author"><?php echo esc_html_e('By ', 'training'); the_author_posts_link(); ?></span>
                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                </div>
            </div>
              <p class="entry-description"><?php echo training_wpo_excerpt(40,'...'); ?></p>
        </div>
    </div>

</article>