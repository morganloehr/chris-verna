<?php
	$postconfig = get_post_meta( get_the_ID(),'wpo_portfolio', true ); 
    $output = array();
    $galleries = array();
    if( isset( $postconfig['portfolio_gallery'] ) && !empty( $postconfig['portfolio_gallery'] )){
        $img_ids = explode(",",$postconfig['portfolio_gallery']);
    }

    if(isset( $img_ids) && is_array( $img_ids)){
        foreach ($img_ids as $key => $id){
            $img_src = wp_get_attachment_image_src( $id, 'post-thumbnail');
            if( $img_src){
            	$galleries[] = $img_src[0];
            }
        }
    }
    if($galleries):
    	if(count( $galleries) >1){
    		$class_col_1 = 'col-lg-8 col-md-8 col-sm-8 col-xs-12';
    		$class_col_2 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
    	}else{
    		$class_col_1 = '';
    		$class_col_2 = '';
    	}
	endif;
  add_action( 'wp_enqueue_scripts', 'training_enqueue_script_perttyPhoto' );
	

	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnails-medium' );

?>
<div class="row">
	<div class="portfolio-gallery <?php echo esc_attr($class_col_1);?>">
		<?php if( has_post_thumbnail() ): ?>
			<div class="entry-thumb">
				<a href="<?php echo esc_url( $image_url[0]); ?>" data-rel="prettyPhoto[pp_gal]">
					<?php the_post_thumbnail('full');?>
				</a>
			</div>
		<?php endif; ?>
	</div>
	<div id="post-slide-<?php the_ID(); ?>" class="<?php echo esc_attr($class_col_2); ?> carousel slide" data-ride="carousel">
		<div class="carousel-inner list-gallery" role="listbox">
		<?php if(is_array( $galleries)): ?>
			<?php foreach( $galleries as $key=> $_img): ?>
					<?php if( $key%6==0): ?>
						<div class="item <?php echo ($key==0)? 'active':''; ?>">
					<?php endif; ?>
						<?php if($key%2==0):?>
							<div class="row">
						<?php endif;?>
							<div class="col-md-6">
								<a href="<?php echo esc_url( $_img); ?>" data-rel="prettyPhoto[pp_gal]">
									<img src="<?php echo esc_url_raw( $_img ) ?>" alt="<?php echo get_the_title(); ?>">
								</a>
							</div>
						<?php if($key%2==1 || $key==count( $galleries)-1):?>
							</div>
						<?php endif; ?>
					<?php if( $key%6==5 || $key==count( $galleries) -1):?>
						</div>
					<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
      <?php if(count( $galleries) > 6){ ?>
   		<!-- Controls -->
   	 	<a class="left carousel-control carousel-xs radius-x" data-slide="prev" href="#post-slide-<?php the_ID(); ?>">
   			<span class="fa fa-left"></span>
   		</a>
   		<a class="right carousel-control carousel-xs radius-x" data-slide="next" href="#post-slide-<?php the_ID(); ?>">
   			<span class="fa fa-right"></span>
   		</a>
       <?php } ?>  
	</div>
</div>

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
         </div>
      </article>
   </div>
</div>   