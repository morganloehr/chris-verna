<?php $config = array('type' => 'wpo_portfolio', 'format' =>'portfolio_video'); ?>
<div class="row content-video">
   <div class="col-sm-6 col-xs-12">
      <?php if( training_wpo_embed( $config) ): ?>
      	<div class="entry-thumb post-type-video">
      		<div class="video-thumb video-responsive">
      			<?php echo training_wpo_embed( $config ); ?>
      		</div>
      	</div>
      <?php endif; ?>
   </div>

   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="single-body space-padding-top-20">
         <div class="created"><?php the_date('M, d Y'); ?></div>
         <div class="entry-title">
            <h1 class="title-post fweight-800 text-big-1"><?php the_title(); ?></h1>
         </div>
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
               </div>
            </article>
         </div>
      </div>   
   </div>

   <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
   </div> 
</div>     