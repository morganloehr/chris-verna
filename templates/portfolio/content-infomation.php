<?php 
    $config = get_post_meta(get_the_ID(),'wpo_portfolio',true);
?>
<div class="row">
   <div class="col-md-8 col-sm-6 col-xs-12">
      <div class="entry-thumbnail">
         <?php the_post_thumbnail('full'); ?>
      </div>
   </div>

   <div class="col-md-4 col-sm-6 col-xs-12 single-body">
      <div class="created"><?php the_date('M, d Y'); ?></div>
      <div class="entry-title"><h1 class="title-post fweight-800 text-big-1"><?php the_title(); ?></h1></div>
         <div class="portfolio-info">
         <!-- Author-->
         <?php if(isset( $config['author']) && !empty( $config['author'])): ?>   
            <div class="portfolio-author">
               <span><?php echo esc_html__('Author', 'training');?></span>
               <span><?php echo esc_attr($config['author']);?></span>
            </div>
         <?php endif; ?>

         <!--Link demo-->
         <?php if(isset( $config['link_demo']) && !empty( $config['link_demo'])): ?>
            <div class="portfolio-demo">
               <span><?php echo esc_html__('Demo', 'training');?></span>
               <span><a href="<?php echo esc_url($config['link_demo']); ?>">
                  <?php echo esc_attr($config['link_demo']);?></a>
               </span>
            </div>
         <?php endif; ?>

         <!--date created-->
         <?php if(isset( $config['date_created']) && !empty( $config['date_created'])): ?>
            <div class="portfolio-date">
               <span><?php echo esc_html__('Date', 'training');?></span>
               <span><?php echo esc_attr($config['date_created']);?></span>
            </div>
         <?php endif; ?>

         <!--Category-->
         <?php
            $terms = get_the_terms( get_the_ID(), 'category_portfolio' );
            $outs ='';
            if ( $terms && ! is_wp_error( $terms ) ):
               foreach( $terms as $key=>$term ){
                  $outs .='<a href="'.esc_url( get_term_link( $term->slug,'category_portfolio' ) ) .'">'.esc_attr( $term->name ). "</a>";
                  if( ++$key < count( $terms))
                     $outs .=', ';
            }?>
            <div class="portfolio-category">
               <span><?php echo esc_html__('Category', 'training');?></span>
               <span><?php echo trim( $outs );?></span>
            </div>
         <?php endif; ?>

         <!--Client-->
         <?php if(isset( $config['client']) && !empty( $config['client'])): ?>
            <div class="portfolio-client">
               <span><?php echo esc_html__('Client', 'training');?></span>
               <span><?php echo esc_attr($config['client']);?></span>
            </div>
         <?php endif; ?>

         <!--Tags-->
         <?php 
            $tags = wp_get_post_tags(get_the_ID());
            $tag_outs ='';
            if ( $tags && ! is_wp_error( $tags ) ):
               foreach( $tags as $key=>$tag ){
                  $tag_outs .= esc_attr( $tag->name );
                  if( ++$key < count( $tags))
                     $tag_outs .=', ';
            }?>
            <div class="portfolio-tags">
               <span><?php echo esc_html__('Tags', 'training');?></span>
               <span><?php echo trim( $tag_outs );?></span>
            </div>
         <?php endif; ?>
         </div>
         
         <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-container">
               <div class="entry-content no-border">
                  <?php the_content(); ?>
                  <?php wp_link_pages(); ?>
               </div>
               <?php if( training_wpo_theme_options('show-share-portfolio', true)) { ?>
                  <div class="post-share">
                   <div class="row">
                       <div class="col-sm-12">
                           <?php training_wpo_share_box(); ?>
                       </div>
                   </div>
               </div>
               <?php } ?>

            </div>
         </article>

   </div>   
</div>   