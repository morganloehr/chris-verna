<div class="testimonials-wrap testimonials-v4">
    <div class="testimonials-description"><?php the_content() ?></div>                
    <div class="testimonials-avatar radius-x">
        <a href="#"><?php the_post_thumbnail('widget', '', 'class="radius-x"');?></a>
    </div>
    <h5 class="testimonials-name">
         <?php the_title(); ?>
    </h5>  
    <p class="text-muted testimonials-position"><?php the_excerpt(); ?></p>              
</div>