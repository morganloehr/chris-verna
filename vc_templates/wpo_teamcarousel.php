<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 
$args = array(
	'post_type' => 'team',
	'posts_per_page'=>$number
);
$loop = new WP_Query($args);


$content =  array(
	'title'=>'',
	'photo'=> '',
	'job'	=> '',
	'phone'=>'4',
	'information' => '',
	'google' => '',
	'twitter' => '',
	'linkedin'=>'',
	'facebook' => '',
	'pinterest'=> '',

);
 
$_id = training_wpo_makeid();
?>

<?php if ( $loop->have_posts() ) : ?> 
<div id="carousel-<?php echo esc_attr($_id); ?>" class="widget-content text-center owl-carousel-play" data-ride="owlcarousel">
					<div class="owl-carousel " data-slide="<?php echo esc_attr($show); ?>" data-pagination="true" data-navigation="true">	
<?php while( $loop->have_posts() ) :  $loop->the_post();
	
	$meta = get_post_meta(get_the_ID(),'wpo_team',true);
	extract( array_merge($content, $meta) );
?>	
	 <div class="team-gallery team-hover">
      <div class="team-header text-center">

        <?php the_post_thumbnail(  ); ?>
 
         <div class="team-gallery-box">  
			<p class="team-info">
				<?php  (the_excerpt() ); ?>
			</p> 
            <div class="bo-social-icons">
               <?php if( $facebook ){  ?>
               <a class="bo-social-white radius-x" href="<?php echo esc_url( $facebook ); ?>"> <i  class="fa fa-facebook"></i> </a>
                  <?php } ?>
               <?php if( $twitter ){  ?>
               <a class="bo-social-white radius-x" href="<?php echo esc_url( $twitter ); ?>"><i  class="fa fa-twitter"></i> </a>
               <?php } ?>
               <?php if( $pinterest ){  ?>
               <a class="bo-social-white radius-x" href="<?php echo esc_url( $pinterest ); ?>"><i  class="fa fa-pinterest"></i> </a>
               <?php } ?>
               <?php if( $google ){  ?>
               <a class="bo-social-white radius-x" href="<?php echo esc_url( $google ); ?>"> <i  class="fa fa-google"></i></a>
               <?php } ?>  
                <?php if( $linkedin ){  ?>
                <a class="bo-social-white radius-x" href="<?php echo esc_url( $linkedin ); ?>"> <i  class="fa fa-linkedin"></i></a>
                <?php } ?>               
            </div> 
         </div>
      </div>     
       <div class="team-body">
           <div class="team-body-content">
               <h3 class="team-name"><?php echo trim( the_title() ); ?></h3>
               <p><?php echo esc_html($job); ?></p>
           </div>                             
       </div>                                
   </div> 
<?php endwhile; ?>
</div></div>
<?php endif; ?>
