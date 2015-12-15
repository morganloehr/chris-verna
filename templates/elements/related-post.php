<?php
	if( $relates->have_posts() ): ?>
    <div class="heading heading-v14 separator_align_left">
      <h2 class="related-post-title space-padding-top-90">
          <?php echo esc_html__( 'You may also like', 'training' ); ?>
      </h2>
    </div>
      <div class="related-posts-content space-30">
        <div class="row">
		    <?php
            $column = wpo_theme_options('post-number-columns', 4) ;
            $col = floor(12/$column);
            $smcol = ($col > 4)? 6: $col;
            $class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;

        		while ( $relates->have_posts() ) : $relates->the_post();
        ?>
      			<div class="blog-related <?php echo esc_attr( $class_column ); ?>">
                <div class="img">
                    <?php if ( has_post_thumbnail()) {
                      the_post_thumbnail('thumbnails');
                    }?>
                </div>
                <div class="info">
                    <div class="info-inner">
                        <h3><a class="text-success" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="created hidden"><?php echo get_the_date(); ?></p>
                      </div>    
                  </div>      
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <?php
    endif;
?>