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
$trainingconfig = $wpoEngine->getPageConfig( );   
 
  get_header( $wpoEngine->getHeaderLayout() );

  if( isset($trainingconfig['breadcrumb']) && $trainingconfig['breadcrumb'] ){
    do_action( 'wpo_layout_breadcrumbs_buddy_render' ); 
  } 
?>  
 
  <?php do_action( 'training_wpo_layout_template_before' ) ; ?>
      <?php if($trainingconfig['showtitle']){ ?>
      <header class="header-title">
        <div class="container">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </div>  
      </header><!-- /header -->
      <?php } ?>
      <?php /* The loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
          <?php the_content(); ?>
        </article><!-- #post -->
        <?php //comments_template(); ?>
      <?php endwhile; ?>
  <?php do_action( 'training_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>
