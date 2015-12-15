<?php 
  $atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
  extract( $atts );

	$args = array( 
		'post_type' => 'video',
		'posts_per_page' => $number 
	);
  $_id = training_wpo_makeid();  
  $class = floor(12/$grid_columns);  

?>

<section class="widget wpo-grid-posts section-blog <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content"><div class="video-v1 row">
        <?php

            $loop = new WP_Query($args);
            if($loop->have_posts()){  ?>
			      <?php while ( $loop->have_posts() ) : $loop->the_post(); 
                  $meta = get_post_meta(get_the_ID(),'wpo_formatvideo',true);
               ?>
	              <div class="col-sm-<?php echo esc_attr( $class); ?>">
	               		<article class="post-type-video row">
		                    <?php if ( has_post_thumbnail() ) { ?>
	                            <figure class="entry-thumb col-sm-6">
	                                <a href="<?php the_permalink(); ?>" title="" class="entry-image">
	                                    <?php the_post_thumbnail( );?>
	                                </a>
	                            </figure>
	                        <?php } ?>
		                    <div class="entry-content col-sm-6">
		                        <?php if (get_the_title()) { ?>
		                            <h4 class="entry-title">
		                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                            </h4>
		                        <?php  } ?>
                         <?php if( isset($meta['timing']) ) { ?>
                         <span class="timing"><?php echo trim($meta['timing']); ?></span>
                         <?php } ?>
		                    </div>
	               	 	</article>
	               </div>
	             <?php endwhile; ?>  
	             <?php wp_reset_postdata();?>	
         
             <?php  } ?>
    </div></div>
</section>
