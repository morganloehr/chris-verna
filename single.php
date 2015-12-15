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

global $trainingconfig;
$trainingconfig = $wpoEngine->getPostConfig();


?>

<?php get_header( training_wpo_theme_options('headerlayout', '') );  ?>
      
<?php do_action( 'training_wpo_layout_breadcrumbs_render' ); ?>  

<?php do_action( 'training_wpo_layout_template_before' ) ; ?>
    
        <div class="post-area single-blog">
            <?php  while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
                <div class="row">
                    <div class="entry-thumb col-md-6">
                        <?php get_template_part( 'templates/content/content', get_post_format() ); ?> 
                    </div>  
                    <div class="post-container col-md-6">
                        <header class="entry-header">
                         
                        <?php if( training_wpo_theme_options('blog_show-title', true) ){ ?>   
                            <div class="entry-name">
                                <h1 class="entry-title"> <?php the_title(); ?> </h1>
                            </div>    
                        <?php } ?>
                            
                            <div class="entry-meta">
                                <?php training_wpo_posted_on(); ?>
                                
                            </div><!-- .entry-meta -->
                        </header><!-- .entry-header -->

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
                        </div><!-- .entry-content -->
                        
                     </div>

    
                <?php the_tags( '<footer class="entry-meta"><span class="tag-links"><span>'.esc_html__('Tags:', 'training').' </span>', ', ', '</span></footer>' ); ?>
                    
                </div> <!-- END ROW -->
            </article>    
           <?php endwhile; ?>
        </div>
  
             
<?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>