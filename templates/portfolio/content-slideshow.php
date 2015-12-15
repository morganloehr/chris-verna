<?php
	$postconfig = get_post_meta( get_the_ID(),'wpo_portfolio', true ); 
    $output = array();
    $galleries = array();
    if( isset( $postconfig['portfolio_gallery'] ) && !empty( $postconfig['portfolio_gallery'] )){
        $img_ids = explode(",",$postconfig['portfolio_gallery']);
    }

    if(isset( $img_ids) && is_array( $img_ids)){
        foreach ($img_ids as $key => $id){
            $img_src = wp_get_attachment_image_src( $id, 'full');
            if( $img_src){
            	$galleries[] = $img_src[0];
            }
        }
    }
    if($galleries): 
?>
	<?php if(count($galleries) > 1) { ?>
			<div id="post-slide-<?php the_ID(); ?>" class="owl-carousel-play" data-ride="carousel">
				<div class="owl-carousel" data-slide="1"  data-singleItem="true" data-navigation="true" data-pagination="false">
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
				</div>
				<a class="left carousel-control carousel-xs radius-x" data-slide="prev" href="#post-slide-<?php the_ID(); ?>">
					<span class="fa fa-angle-left"></span>
				</a>
				<a class="right carousel-control carousel-xs radius-x" data-slide="next" href="#post-slide-<?php the_ID(); ?>">
					<span class="fa fa-angle-right"></span>
				</a>
			</div>
		<?php } elseif (count($galleries) == 1){ ?>
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
		<?php }?>
	<?php elseif( has_post_thumbnail() ): ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail('');?>
		</div>
	<?php endif; ?>

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