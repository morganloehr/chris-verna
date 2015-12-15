<?php 
/**
 * Theme function
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */ 


/********************************************************************************************************
 * function as shortcode to show related posts
 ********************************************************************************************************/

function training_wpo_related_post(){
    $postformat = get_post_format();
    $icon = '';
    switch ($postformat) {
        case 'link':
            $icon = 'fa fa-link';
            break;
        case 'gallery':
            $icon = 'fa fa-th-large';
            break;
        case 'audio':
            $icon = 'fa fa-music';
            break;
        case 'video':
            $icon = 'fa fa-film';
            break;
        default:
            $icon = 'fa fa-picture-o';
            break;
    }
    return $icon; 
}


if(!function_exists('training_wpo_related_post')){
    function training_wpo_related_post( $relate_count = 4, $posttype = 'post', $taxonomy = 'category', $style = '' ){
      
        $terms = get_the_terms( get_the_ID(), $taxonomy );
        $termids =array();
       
        if(!empty($terms) && !is_wp_error($terms)){
            foreach($terms as $term){
                if( is_object($term) ){
                   $termids[] = $term->term_id;
                }
            }
        }

        $args = array(
            'post_type' => $posttype,
            'posts_per_page' => $relate_count,
            'post__not_in' => array( get_the_ID() ),
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $termids,
                    'operator' => 'IN'
                )
            )
        );
        $template_name = $style.'related-'.$posttype.'.php';

        $relates = new WP_Query( $args );

        if(is_file(WPO_THEME_TEMPLATE_DIR.'elements/'.$template_name)) {
            include(WPO_THEME_TEMPLATE_DIR.'elements/'.$template_name);
        }
    }
}

/**
 * Render content by id 
 */
function training_wpo_render_post_content( $footer ){
   $post = get_post($footer);
   if($post){
    echo do_shortcode( $post->post_content ); 
  }
}


if(!function_exists('training_wpo_excerpt')){
    //Custom Excerpt Function
    function training_wpo_excerpt($limit,$afterlimit='[...]') {
        $excerpt = get_the_excerpt();
        if( $excerpt != ''){
           $excerpt = explode(' ', strip_tags( $excerpt ), $limit);
        }else{
            $excerpt = explode(' ', strip_tags(get_the_content( )), $limit);
        }
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).' '.$afterlimit;
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return strip_shortcodes( $excerpt );
    }
}

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since Twenty Fourteen 1.0
 */
function training_wpo_post_thumbnail() {
  
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>
  <div class="post-thumbnail">
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'fullwidth' );
    } else {
      the_post_thumbnail();
    }
  ?>
  </div>
  <?php else : ?>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>">
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'fullwidth' );
    } else {
      the_post_thumbnail();
    }
  ?>
  </a>

  <?php endif; // End is_singular()
}




/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 */
function training_wpo_posted_on() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    echo '<span class="featured-post">' . esc_html__( 'Sticky', 'training' ) . '</span>';
  }

  // Set up and print post meta information.
  printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="" datetime="%2$s">%3$s</time></a></span><span class="meta-sep"> / </span><span class="byline"><span class="author vcard">'. esc_html__('By', 'training').' <a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
    esc_url( get_permalink() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    get_the_author()
  );
}
 



/**
 * Find out if blog has more than one category.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function training_wpo_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'wpo_category_count' ) ) ) {
    // Create an array of all the categories that are attached to posts
    $all_the_cool_cats = get_categories( array(
      'hide_empty' => 1,
    ) );

    // Count the number of categories that are attached to the posts
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'wpo_category_count', $all_the_cool_cats );
  }

  if ( 1 !== (int) $all_the_cool_cats ) {
    // This blog has more than 1 category so training_wpo_categorized_blog should return true
    return true;
  } else {
    // This blog has only 1 category so training_wpo_categorized_blog should return false
    return false;
  }
}


if(!function_exists('training_wpo_the_category')){
    function training_wpo_the_category($post_id=false,$separator='',$class=''){
        $categories = get_the_category($post_id);
        foreach ($categories as $key => $value) {
            $term_meta = get_option( 'taxonomy_'.$value->term_id ,array('skin'=>'skin-red') );
            if($class==''){
                $class = $term_meta['skin'];
            }else{
                $class .=' '.$term_meta['skin'];
            }
    ?>
        <a class="<?php echo esc_attr($class); ?>" href="<?php echo get_category_link( $value->term_id ); ?>">
            <?php echo esc_attr($value->name); ?>
        </a>
    <?php
            if($key<count($categories)-1){
                echo esc_html($separator);
            }
        }
    }
}

/**
 *
 */
function training_wpo_get_categories( $category ) {
    $categories = get_categories( array( 'taxonomy' => $category ));

    $output = array( '' => esc_html__( 'All', 'training' ) );
    foreach( $categories as $cat ){
        if( is_object($cat) ) $output[$cat->slug] = $cat->name;
    }
    return $output;
}

if(function_exists('PostRatings')){
  add_action( 'wpo_rating', 'training_wpo_vote_count' );
  function training_wpo_vote_count(){
    $options = PostRatings()->getRating(get_the_ID());
    $classRating = "vote-default";
    if(isset($options['bayesian_rating']) && $options['bayesian_rating']>0 ){
      if(85<$options['bayesian_rating'] && $options['bayesian_rating'] <=100){
        $classRating = "vote-perfect";
      }
      if(75<$options['bayesian_rating'] && $options['bayesian_rating'] <=85){
        $classRating = "vote-good";
      }
      if(65<$options['bayesian_rating'] && $options['bayesian_rating'] <=75){
        $classRating = "vote-average";
      }
      if(55<$options['bayesian_rating'] && $options['bayesian_rating'] <=65){
        $classRating = "vote-bad";
      }
      if(0<$options['bayesian_rating'] && $options['bayesian_rating'] <=55){
        $classRating = "vote-poor";
      }
  ?>
  <?php
    $result_ratings = number_format((float)$options['bayesian_rating']/10,1,'.','');

  ?>
      <div class="entry-vote <?php echo esc_attr($classRating); ?>"><span class="entry-vote-inner"><?php echo trim($result_ratings) ?></span></div>
  <?php
    }
  }
}


if(!function_exists('training_wpo_embed')){
    function training_wpo_embed( $config ) {
        $postconfig = get_post_meta(get_the_ID(),$config['type'],true);
        $content='';
        if(isset($postconfig[$config['format']]))
            $content = wp_oembed_get($postconfig[$config['format']]);
        return $content;
    }
}



if(!function_exists('training_wpo_comment_form')){
    function training_wpo_comment_form($arg,$class='btn btn-outline btn-success btn-md border-2'){
      ob_start();
      comment_form($arg);
      $form = ob_get_clean();
      echo str_replace('id="submit"','id="submit" class="btn '.$class.'"', $form);
    }
}

if(!function_exists('training_wpo_comment_reply_link')){
    function training_wpo_comment_reply_link($arg,$class='btn btn-default btn-xs'){
      ob_start();
      comment_reply_link($arg);
      $reply = ob_get_clean();
      echo str_replace('comment-reply-link','comment-reply-link '.$class, $reply);
    }
}


function training_wpo_modify_class_submit_form( $defaults){

    $defaults['class_submit'] =  $defaults['class_submit'].' btn btn-outline btn-success btn-md border-2'; 
   return $defaults ; 
}

add_filter( 'comment_form_defaults', 'training_wpo_modify_class_submit_form' );


function training_enqueue_script_perttyPhoto(){
  wp_enqueue_script( 'prettyPhoto_js', WPO_THEME_URI.'/js/jquery.prettyPhoto.js');
  wp_enqueue_style('perttyPhoto_css', WPO_THEME_URI.'/css/prettyPhoto.css');
}