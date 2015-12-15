<div class="testimonials-v6 text-left">
    <div class="testimonials-body">
        
        <div class="left">
            <div class="avata text-left"><?php the_post_thumbnail('widget');?></div>
        </div>
        <div class="right">
             <h5 class="testimonials-name text-left">
                <?php the_title(); ?>
            </h5>  
            <div class="text-muted testimonials-position text-left"><?php the_excerpt(); ?></div>  
        </div>

        <div class="clearfix"></div>

        <div class="testimonials-description text-left"><?php the_content() ?></div>                                          
        
    </div>                      
</div>