<div class="posts-list">
   <?php
       $i = 0;
       while($loop->have_posts()){
       $loop->the_post();
   ?>
   <?php $thumbsize = isset($thumbsize)? $thumbsize : 'post-thumbnail';?>
   <?php
     $post_category = "";
     $categories = get_the_category();
     $separator = ' | ';
     $output = '';
     if($categories){
       foreach($categories as $category) {
         $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'training' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
       }
     $post_category = trim($output, $separator);
     }      
   ?>
 
   <article class="post">
       <?php
       if ( has_post_thumbnail() ) {
           ?>
               <figure class="entry-thumb col-sm-6 col-xs-12 space-padding-0">
                   <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                       <?php the_post_thumbnail( $thumbsize );?>
                   </a>
               </figure>
           <?php
       }
       ?>
       <div class="entry-content space-padding-lr-5p <?php if ( has_post_thumbnail() ) { echo 'col-sm-6 col-xs-12'; }else{echo 'col-sm-12 col-xs-12'; } ?>">       
           <div class="entry-content-inner clearfix">
               <div class="entry-meta space-padding-bottom-10">
                   <div class="left text-center">
                       <div class="entry-create">
                           <span class="date"><?php the_time( 'd' ); ?></span>
                           <span class="month"><?php the_time('M'); ?></span>
                       </div>
                   </div>
                   <div class="right text-center">    
                       <span class="author">
                           <span class="icon zmdi zmdi-edit"></span><?php the_author(); ?>
                       </span>
                       <span class="entry-category">
                           <span class="icon zmdi zmdi-folder-outline"></span><?php echo trim($post_category) ?>
                       </span>
                       <span class="comment-link"><span class="icon zmdi zmdi-comments"></span><?php comments_popup_link(esc_html__(' 0', 'training'), esc_html__(' 1', 'training'), esc_html__(' %', 'training')); ?></span>
                   </div>
               </div>
           </div>

           <div class="entry-info text-center space-padding-top-10">
               <?php
                   if (get_the_title()) {
                   ?>
                       <h4 class="entry-title">
                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                       </h4>
                   <?php
               }
               ?>
               <?php
                   if (! has_excerpt()) {
                       echo "";
                   } else {
                       ?>
                           <p class="entry-description"><?php echo training_wpo_excerpt(22,'...'); ?></p>
                       <?php
                   }
               ?>
         </div>    
      </div>  
   </article>
   <?php  } ?>
   <?php wp_reset_postdata(); ?>
</div>