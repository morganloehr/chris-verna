<?php if ( has_post_thumbnail() ) { ?>
	<div class="entry-thumb">
		<?php the_post_thumbnail('');?>
	</div>
<?php } ?>

<div class="single-body">
   <div class="created"><?php the_date('M, d Y'); ?></div>
   <div class="entry-title"><h1 class="title-post fweight-800 text-big-1"><?php the_title(); ?></h1></div>
   <div class="post-area single-portfolio">
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
                     <div class="pull-left">
                        <?php training_wpo_share_box(); ?>
                     </div>      
                  </div>
                </div>
            </div>
            <?php } ?>

            <?php
               if(training_wpo_theme_options('show-related-portfolio')){
                  $relate_count = training_wpo_theme_options('portfolio-items-show', 4);
                  training_wpo_related_post($relate_count, 'portfolio', 'category_portfolio');
               }
            ?>
         </div>
      </article>
   </div>
</div>   