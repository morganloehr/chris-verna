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
$title = $category = $el_class = '';
$size = 'font-size-lg';
$column = 2;
$alignment = 'separator_align_center';
$layout = 'normal';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$arg = array();    
$arg = array( 
    'posts_per_page' => $number, 
    'orderby' => 'date', 
    'order' => 'DESC',
    'post_type' => 'teacher',
    'post_status' => 'publish',
    'taxonomy' => 'category_teachers',
    'term' => $category,
);
$style = 'team-small';
 
$xcolumn = floor( 12/$column );
$class_col = "col-lg-".$xcolumn." col-md-".$xcolumn." col-sm-".$xcolumn." col-xs-12";
$query = new WP_Query( $arg );
$_id = training_wpo_makeid();
?>

<div class="widget wpo-teacher-grid <?php echo esc_attr($layout); ?> <?php echo esc_attr($el_class); ?>">
	<?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size) . ' ' . $alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

	<div class="widget-content">
		<?php if ( $query->have_posts() ) : ?>
    		<?php if ( $layout=='vertical' ) : ?>
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        global $post; $teacher = Training_WPO_Teacher::load( $post ); 
        				$i = $query->current_post + 1;
        		?>
        		<?php if($i%$column==1) echo '<div class="row">'; ?>
        		<div class="<?php echo esc_attr($class_col); ?>">
                    <div class="team-item">
                        <div class="image text-center">
                           <a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" > <?php the_post_thumbnail('full'); ?> </a>
                        </div>  
                        <div class="team-body light-style text-center">
                            <div class="team-body-content">
                                <h3 class="team-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <p class="team-job"><?php echo trim($teacher->meta('job')) ?> </p>
                                <?php if( $showinfo ) : ?>
                                <div class="teacher-info">
                                   <?php echo training_wpo_excerpt(16, '...'); ?>
                                </div> 
                                <?php endif; ?>
                            </div>  
                            <div class="bo-social-icons text-center">
                                <?php if( $teacher->meta( 'facebook' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('facebook')); ?>" class="bo-social-facebook"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'twitter' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('twitter')); ?>" class="bo-social-twitter"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'linkedin' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('linkedin')); ?>" class="bo-social-linkedin"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'google' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('google')); ?>" class="bo-social-google"><i class="fa fa-google"></i></a>
                                <?php } ?>  
                             </div>                           
                        </div>  
            		</div>	
                </div>
        		<?php if($i%$column==0 || $i==($query->found_posts)) echo '</div>'; ?>
        		<?php endwhile; 
        			wp_reset_postdata();
        		?>

            <?php elseif ( $layout=='vertical-2' ) : ?>
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        global $post; $teacher = Training_WPO_Teacher::load( $post ); 
                        $i = $query->current_post + 1;
                ?>
                <?php if($i%$column==1) echo '<div class="row">'; ?>
                <div class="vertical-2 <?php echo esc_attr($class_col); ?>">
                    <div class="team-item">
                        <div class="team-body light-style text-left">
                            <div class="team-body-content">
                                <h3 class="team-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <p class="team-job"><?php echo trim($teacher->meta('job')) ?> </p>
                                <?php if( $showinfo ) : ?>
                                <div class="teacher-info">
                                   <?php echo training_wpo_excerpt(18, '...'); ?>
                                </div> 
                                <?php endif; ?>
                            </div>  
                            <div class="bo-social-icons text-left">
                                <?php if( $teacher->meta( 'facebook' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('facebook')); ?>" class="bo-social-facebook"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'twitter' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('twitter')); ?>" class="bo-social-twitter"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'linkedin' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('linkedin')); ?>" class="bo-social-linkedin"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if( $teacher->meta( 'google' ) ){ ?>
                                <a href="<?php echo esc_url($teacher->meta('google')); ?>" class="bo-social-google"><i class="fa fa-google"></i></a>
                                <?php } ?>  
                             </div>                           
                        </div>  
                        <div class="image text-center">
                           <a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" > <?php the_post_thumbnail('full'); ?> </a>
                        </div>
                    </div>  
                </div>
                <?php if($i%$column==0 || $i==($query->found_posts)) echo '</div>'; ?>
                <?php endwhile; 
                    wp_reset_postdata();
                    
                ?>    

            <?php elseif($layout == 'horizontal-v2'): ?>
            <?php 
                while ( $query->have_posts() ) : $query->the_post();
                    global $post; $teacher = Training_WPO_Teacher::load( $post ); 
                    $i = $query->current_post + 1;
                ?>
                <?php if($i%$column==1) echo '<div class="row space-30">'; ?>
                <div class="<?php echo esc_attr($class_col); ?>">
                    <?php get_template_part( 'templates/content/content', 'teacher' ) ?> 
                </div>   
                <?php if($i%$column==0 || $i==($query->found_posts)) echo '</div>'; ?>
                <?php endwhile; 
                wp_reset_postdata();  
            ?> 

            <?php elseif($layout == 'carousel'): ?>
                <div id="carousel-<?php echo esc_attr($_id); ?>" class="space-margin-0 text-center owl-carousel-play" data-ride="owlcarousel">
                    <div class="owl-carousel " data-slide="<?php echo esc_attr($column); ?>" data-pagination="false" data-navigation="true">              
                        <?php 
                        while ( $query->have_posts() ) : $query->the_post();
                            global $post; $teacher = Training_WPO_Teacher::load( $post ); 
                            $i = $query->current_post + 1;
                        ?>
                         <div class="team-v1 <?php echo esc_attr($style); ?>">
                            <div class="team-header text-center">
                               <a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" > <?php the_post_thumbnail('thumbnail'); ?> </a>
                            </div>     
                            <div class="team-body">
                                <div class="team-body-content">
                                    <h3 class="team-name"><a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" ><?php the_title(); ?></a></h3>
                                    <p class="job"><?php echo trim($teacher->meta('job')) ?></p>
                                    <?php if( $showinfo ) : ?>
                                    <div class="teacher-info">
                                       <?php echo training_wpo_excerpt(18, '...'); ?>
                                    </div> 
                                    <?php endif; ?>
                                    <div class="read-more"><a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'View profile', 'training' ); ?>" ><?php esc_html_e( 'View profile', 'training' ); ?></a></div>
                                </div> 

                            </div>                                  
                        </div>
                        <?php endwhile; 
                            wp_reset_postdata();
                        ?>
                    </div>   
                    <?php if( $number  > $column) { ?>
                        <div class="owl-control">
                            <a class="left carousel-control carousel-md radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
                                    <span class="zmdi zmdi-arrow-back zmd-fw"></span>
                            </a>
                            <a class="right carousel-control carousel-md radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
                                    <span class="zmdi zmdi-arrow-forward zmd-fw"></span>
                            </a>
                        </div>  
                    <?php } ?> 
                 </div>      
            <?php else : ?>
                <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                        global $post; $teacher = Training_WPO_Teacher::load( $post ); 
                        $i = $query->current_post + 1;
                ?>
                <?php if($i%$column==1) echo '<div class="row space-30">'; ?>
                
                <div class="<?php echo esc_attr($class_col); ?>">
                     <div class="team-v1 <?php echo esc_attr($style); ?>">
                        <div class="team-header text-center">
                           <a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" > <?php the_post_thumbnail('full'); ?> </a>
                        </div>     
                        <div class="team-body">
                            <div class="team-body-content">
                                <h3 class="team-name"><a href="<?php the_permalink() ?>" title="<?php esc_html_e( 'History', 'training' ); ?>" ><?php the_title(); ?></a></h3>
                                <p class="team-job"><?php echo trim($teacher->meta('job')) ?></p>
                                <?php if( $showinfo ) : ?>
                                <div class="teacher-info">
                                   <?php echo training_wpo_excerpt(18, '...'); ?>
                                </div> 
                                <?php endif; ?>
                            </div>                            
                        </div>  
                        <div class="bo-social-icons text-center">
                            <?php if( $teacher->meta( 'facebook' ) ){ ?>
                            <a href="<?php echo esc_url($teacher->meta('facebook')); ?>" class="bo-social-facebook"><i class="fa fa-facebook"></i></a>
                            <?php } ?>
                            <?php if( $teacher->meta( 'twitter' ) ){ ?>
                            <a href="<?php echo esc_url($teacher->meta('twitter')); ?>" class="bo-social-twitter"><i class="fa fa-twitter"></i></a>
                            <?php } ?>
                            <?php if( $teacher->meta( 'linkedin' ) ){ ?>
                            <a href="<?php echo esc_url($teacher->meta('linkedin')); ?>" class="bo-social-linkedin"><i class="fa fa-linkedin"></i></a>
                            <?php } ?>
                            <?php if( $teacher->meta( 'google' ) ){ ?>
                            <a href="<?php echo esc_url($teacher->meta('google')); ?>" class="bo-social-google"><i class="fa fa-google"></i></a>
                            <?php } ?>  
                         </div>                                    
                    </div>
                </div>  
                <?php if($i%$column==0 || $i==($query->found_posts)) echo '</div>'; ?>
                <?php endwhile; 
                    wp_reset_postdata();
                ?>
            <?php endif; ?>
      <?php endif; ?>
	</div>
</div>