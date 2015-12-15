<div class="testimonials-v6">
    <div class="testimonials-body">
        <div class="testimonials-description text-left"><?php the_content() ?></div>                                          
        
        <div class="clearfix"></div>
        <div class="left">
            <div class="avata"><?php the_post_thumbnail('widget');?></div>
        </div>
        <div class="right space-padding-top-10">
             <h5 class="testimonials-name">
                <?php the_title(); ?>
            </h5>  
            <div class="text-muted testimonials-position"><?php the_excerpt(); ?></div>  
        </div>
    </div>                      
</div>