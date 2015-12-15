<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
global $wpopconfig, $post;
 
$wpopconfig  = Training_WPO_Teacher_page_config();

get_header( training_wpo_theme_options('headerlayout', '') ); 

$teacher = Training_WPO_Teacher::load( $post );
if($teacher->meta( 'relateduser' )){
	$author_id = $teacher->meta( 'relateduser' );
}
?>
<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>	

<?php do_action( 'training_wpo_layout_template_before' ) ; ?>

	<?php while(have_posts()):the_post(); ?>
		<div class="format-teacher">
			<?php global $post; 
			$courses = $teacher->getCourses();
    	?>
	   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		   <?php if(is_single() ) { ?>
	      <div class="post-container space-padding-top-40">
        	 	<div class="row">  
					<div class="col-sm-4">
						<div class="teacher-image text-center">
								<?php the_post_thumbnail('full');  ?>
						</div>
						<div class="teacher-information">
							<div class="widget space-0">
						      <h3 class="widget-title visual-title font-size-sm separator_align_left">
						      	<span><?php esc_html_e('Detail', 'training') ?></span>
						      </h3>
						      <div class="widget-content">
									<ul class="lists space-0">
					            	<li><span class="lab"><?php esc_html_e('Name: ', 'training') ?></span> <span class="val"><?php the_title(); ?></span> </li>
					            	<?php if( $teacher->meta( 'specializedin' ) ){ ?>
					            		<li><span class="lab"><?php esc_html_e('Specializedin: ', 'training') ?></span><span class="val"><?php echo esc_html($teacher->meta( 'specializedin' )); ?></span></li>
					            	<?php } ?>
					            	<?php if( $teacher->meta( 'experience' ) ){ ?>
					            	<li><span class="lab"><?php esc_html_e('Experience: ', 'training') ?></span><span class="val"><?php echo esc_html($teacher->meta( 'experience' )); ?></span></li>
					            	<?php } ?>
					            	<?php if( $teacher->meta( 'email' ) ){ ?>
					            	<li><span class="lab"><?php esc_html_e('Email: ', 'training') ?></span><span class="val"><?php echo esc_html($teacher->meta( 'email' )); ?></span></li>
					            	<?php } ?>
					            	<?php if( $teacher->meta( 'link' ) ){ ?>
					            	<li><span class="lab"><?php esc_html_e('Link: ', 'training') ?></span><span class="val"><a href="<?php echo esc_url($teacher->meta( 'link' )); ?>"><?php echo esc_url($teacher->meta( 'link' )); ?></a></span></li>
					            	<?php } ?>
					            	<?php if( $teacher->meta( 'phone' ) ){ ?>
					            	<li><span class="lab"><?php esc_html_e('Phone: ', 'training') ?></span><span class="val"><?php echo esc_html($teacher->meta( 'phone' )); ?></span></li>
					            	<?php } ?>
					            	<?php if(function_exists('the_ratings')) { ?>
					            		<li class="rating"><?php the_ratings(); ?></li>
					            	<?php } ?>
					            </ul> 
				            </div>
				           	
								<div class="bo-social-icons text-left">
				           		<?php if( $teacher->meta( 'facebook' ) ){ ?>
				           		<a href="<?php echo esc_url($teacher->meta('facebook')); ?>" class="bo-social-facebook bo-social-white radius-x"><i class="fa fa-facebook"></i></a>
				           		<?php } ?>
				           		<?php if( $teacher->meta( 'twitter' ) ){ ?>
				           		<a href="<?php echo esc_url($teacher->meta('twitter')); ?>" class="bo-social-twitter bo-social-white radius-x"><i class="fa fa-twitter"></i></a>
				           		<?php } ?>
				           		<?php if( $teacher->meta( 'linkedin' ) ){ ?>
				           		<a href="<?php echo esc_url($teacher->meta('linkedin')); ?>" class="bo-social-linkedin bo-social-white radius-x"><i class="fa fa-linkedin"></i></a>
				           		<?php } ?>
				           		<?php if( $teacher->meta( 'google' ) ){ ?>
				           		<a href="<?php echo esc_url($teacher->meta('google')); ?>" class="bo-social-google bo-social-white radius-x"><i class="fa fa-google"></i></a>
				           		<?php } ?>  
					         </div>
					      </div> 
				      </div>   
					</div>

					<div class="col-sm-8">
						<div class="widget">
					      <h3 class="widget-title visual-title font-size-sm separator_align_left">
					      	<span><?php esc_html_e('Biography', 'training') ?></span>
					      </h3>
							<div class="entry-content">
		                <?php
		                    the_content( esc_html__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'training' ) );
		                    wp_link_pages( array(
		                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'training' ) . '</span>',
		                        'after'       => '</div>',
		                        'link_before' => '<span>',
		                        'link_after'  => '</span>',
		                    ) );
		                ?>
		            	</div>
	            	</div>

	            	<div class="skills-inner">
							<?php $skills = get_post_meta( $post->ID, '_skills' ); ?>	
							<?php 
								if( isset($skills[0])  && isset($skills[0]['volume']) ) { 
								$skills = $skills[0];	 
							?>

		 					<div class="teacher-skills widget">
		 						
		 						<h3 class="widget-title visual-title font-size-sm separator_align_left">
									<span><?php esc_html_e('Skills', 'training' ); ?></span>
								</h3>
		 						
		 						<div class="widget-content">
		 							<?php foreach( $skills['volume'] as $key => $value ){ 
		 								if( !empty( $value) ){
		 							?>
			 							<div class="vc_progress_bar">
				 							<div class="vc_single_bar custom">
				 								<small class="vc_label"> <span class="vc_label_units"><?php echo trim($value); ?>%</span><?php  echo trim($skills['label'][$key]) ?></small>
				 								<span data-value="90" data-percentage-value="<?php echo trim($value); ?>" class="vc_bar" style="width: <?php echo trim($value); ?>%;"></span>
				 							</div>	
			 							</div>
		 							<?php }
		 							} ?>
		 						</div>
		 					</div>
		 					<?php } ?>
		 				</div>	

		 				<div class="clearfix"></div>

		 				<?php $data = get_post_meta( $post->ID, '_education' ); ?>	
						<?php 
							if( isset($data[0])  && isset($data[0]['time']) ) { 
							$data = $data[0];	 
							print_r($data['time']['0']);
						?>
							<?php if($data['time'] && count($data['time'])>0 && $data['time']['0'] ){ ?>
			 					<div class="teacher-education widget space-top-10">
			 						<h3 class="widget-title visual-title font-size-sm separator_align_left">
			 							<span><?php esc_html_e('Education & Training', 'training' ); ?></span>
			 						</h3>
			 						<div class="widget-content">
				 						<ul class="posts-timeline">
				 							<?php $i=0; foreach( $data['time'] as $key => $value ){ 
				 								if( !empty( $value) ){
				 									$i++;
				 							?>
				 							
					 							<li  class="entry-timeline">
					 							 	 <div class="hentry">
					 							 	 		<div class="node"></div>
					 							 	 		<div class="entry-created space-padding-top-10"><span class="radius-2x bg-success"><?php echo trim($value); ?></span></div>
											 	 			 <div class="hentry-box">
											 	 			 	<h4><?php echo trim($data['topic'][$key]) ?></h4>
											 	 			 	<h5><?php echo trim($data['name'][$key]) ?></h5>
							 							 	 	<p>
							 							 	 		<?php echo trim($data['info'][$key]) ?>
							 							 	 	</p>	
							 							 	 </div>		
					 							 	 </div>	
					 							</li>	
					 							
				 							<?php
				 								}
				 							} 
				 							?>
				 						</ul>
				 					</div>	
			 					</div>
		 					<?php } ?>
	 					<?php } ?>

	 					<div class="clearfix"></div>

	 					<div class="teacher-courses">
						   <?php  get_template_part( 'ibeducator/related_by_teacher' ); ?>
					   </div> 
					</div>
				</div>
			<?php } ?>   
		</article>   
	</div>
	<?php endwhile; ?>
	
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>