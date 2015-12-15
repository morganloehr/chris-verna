<?php
/**
 * Defined function to render contents or process logic related with rendering.
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


if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
  /**
  * Filters wp_title to print a neat <title> tag based on what is being viewed.
  *
  * @param string $title Default title text for current view.
  * @param string $sep Optional separator.
  * @return string The filtered title.
  */
  function training_wpo_wp_title( $title, $sep ) {
    if ( is_feed() ) {
      return $title;
    }
    
    global $page, $paged;
    
    // Add the blog name
    $title .= get_stylesheet_directory_uri( 'name', 'display' );
    
    // Add the blog description for the home/front page.
    $site_description = get_stylesheet_directory_uri( 'description', 'display' );
    
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " $sep $site_description";
    }
    
    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
      $title .= " $sep " . sprintf( esc_html__( 'Page %s', '_s' ), max( $paged, $page ) );
    }
    
    return $title;
    
  }
    
  add_filter( 'wp_title', 'training_wpo_wp_title', 10, 2 );
  
  /**
  * Title shim for sites older than WordPress 4.1.
  *
  * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
  * @todo Remove this function when WordPress 4.3 is released.
  */
  function training_wpo_render_title() {
  ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php
  }
  add_action( 'wp_head', 'training_wpo_render_title' );
endif;


/** 
 * Configure columns with width via bootstrap classes for each layou type
 */
function training_wpo_config_layout($layout,$config=array()){
    switch ($layout) {
    // Two Sidebar
    case 'leftmainright':
        $config['left-sidebar']['show']   = true;
        $config['left-sidebar']['class']  ='col-md-3';
        $config['right-sidebar']['class'] ='col-md-3';
        $config['right-sidebar']['show']  = true;
        $config['main']['class']    ='col-xs-12 col-md-6';
    break;
    //One Sidebar Right
    case 'mainright':
        $config['left-sidebar']['show']   = false;
        $config['right-sidebar']['show']  = true;
        $config['main']['class']      ='col-xs-12 col-md-9 no-sidebar-left';
        $config['right-sidebar']['class']   ='col-xs-12 col-md-3';
    break;
    // One Sidebar Left
    case 'leftmain':
        $config['left-sidebar']['show']   = true;
        $config['right-sidebar']['show']  = false;
        $config['left-sidebar']['class']  ='col-xs-12 col-md-3';
        $config['main']['class']    ='col-xs-12 col-md-9 no-sidebar-right';
    break;

    // Fullwidth
    default:
        $config['left-sidebar']['show']   = false;
        $config['right-sidebar']['show']  = false;
        $config['main']['class']      ='col-xs-12 no-sidebar';
        break;
    }

    return $config;
}

/**
 * include breadcrumb layout
 */
function training_wpo_breadcrumb(){
    if(is_file(WPO_THEME_TEMPLATE_DIR.'elements/breadcrumb.php')){
        require (WPO_THEME_TEMPLATE_DIR.'elements/breadcrumb.php');
    }
}
 
/**
 * get list of menu group
 */
function training_wpo_get_menugroups(){
    $menus = wp_get_nav_menus( );
    $option_menu = array(''=>'---Select Menu---');
    foreach ($menus as $menu) {
        $option_menu[$menu->term_id]=$menu->name;
    }

    return $option_menu;
}

/**
 * Search With Category
 */
if(!function_exists('training_wpo_categories_searchform')){
    function training_wpo_categories_searchform(){
        if(class_exists('training')){
          global $wpdb;
      $dropdown_args = array(
                'show_counts'        => false,
                'hierarchical'       => true,
                'show_uncategorized' => 0
            );
        ?>
    <form role="search" method="get" class="input-group search-category" action="<?php echo esc_url( home_url('/') ); ?>">
            <div class="input-group-addon search-category-container">
              <label class="select">
                <?php wc_product_dropdown_categories( $dropdown_args ); ?>
              </label>
            </div>
            <input name="s" id="s" maxlength="60" class="form-control search-category-input" type="text" size="20" placeholder="<?php esc_html_e('Enter search...', 'training'); ?>">
            <div class="input-group-btn">
                <label class="btn btn-link btn-search">
                  <span id="wpo-title-search" class="title-search hidden"><?php esc_html_e('Search', 'training') ?></span>
                  <input type="submit" id="searchsubmit" class="fa searchsubmit" value="&#xf002;"/>
                </label>
                <input type="hidden" name="post_type" value="product"/>
            </div>
        </form>
        <?php
        }else{
          get_search_form();
        }
    }
}

/**
 * Pagination Navigation
 */
if(!function_exists('training_wpo_pagination_nav')){
    function training_wpo_pagination_nav($per_page,$total,$max_num_pages=''){
        ?>
        <section class="wpo-pagination">
            <?php global  $wp_query; ?>
            <?php training_wpo_pagination($prev = esc_html__('Previous','training'), $next = esc_html__('Next','training'), $pages=$max_num_pages ,array('class'=>'pull-left')); ?>
            <div class="result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                if ( 1 == $total ) {
                    esc_html_e( 'Showing the single result', 'training' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( esc_html__( 'Showing all %d results', 'training' ), $total );
                } else {
                    printf( _x( 'Showing %1$d to %2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'training' ), $first, $last, $total );
                }
                ?>
            </div>
        </section>
    <?php
    }
}

/**
 * Gener paginations
 */
if(!function_exists('training_wpo_pagination')){
    //page navegation
    function training_wpo_pagination($prev = 'Prev', $next = 'Next', $pages='' ,$args=array('class'=>'')) {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if($pages==''){
            global $wp_query;
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
        }
        $pagination = array(
            'base' => @add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        
        if(isset( $_GET['s'])){
            $cq = $_GET['s'];
            $sq = str_replace(" ", "+", $cq);
        }
        
        if( !empty($wp_query->query_vars['s']) ){
            $pagination['add_args'] = array( 's' => $sq);
        }
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            echo '<ul class="pagination '.esc_attr( $args["class"] ).'">';
                foreach ($paginations as $key => $pg) {
                    echo '<li>'. $pg .'</li>';
                }
            echo '</ul>';
        }
    }
}

if(!function_exists('training_wpo_getcontent')){
    function training_wpo_getcontent( $config ){
        $postconfig = get_post_meta(get_the_ID(),$config['type'],true);
        if( isset($postconfig[$config['format']]) && !empty( $postconfig[$config['format']] ) ) 
            return $postconfig[ $config['format'] ];
        return false;
    }
}

if(!function_exists('training_wpo_share_box')){
    function training_wpo_share_box( $layout='',$args=array() ){
      $default = array(
        'position' => 'top',
        'animation' => 'true'
        );
      $args = wp_parse_args( (array) $args, $default );
      
      $path = WPO_THEME_TEMPLATE_DIR.'elements/sharebox';
      if( $layout!='' ){
        $path = $path.'-'.$layout;
      }
      $path .= '.php';

      if( is_file($path) ){
        require($path);
      }
 
    }
}
 
if(!function_exists('training_wpo_theme_comment')){
    function training_wpo_theme_comment($comment, $args, $depth){
      if(is_file(WPO_THEME_TEMPLATE_DIR.'elements/list_comments.php')){
        require (WPO_THEME_TEMPLATE_DIR.'elements/list_comments.php');
      }
    }
}
 
if(!function_exists('training_wpo_render_togglebutton')){
    function training_wpo_render_togglebutton($class='btn-inverse-danger', $toggle='offcanvas'){
    ?>
        <button data-toggle="<?php echo esc_attr($toggle); ?>" class="btn btn-offcanvas btn-toggle-canvas <?php echo esc_attr( $class ); ?>" type="button">
           <i class="fa fa-bars"></i>
        </button>
    <?php
    }
}

if(!function_exists("wpo_render_breadcrumbs") ){
  function wpo_render_breadcrumbs( $showheading=false, $tag='h2' ){
      
      global $pagenow; 

      $tag = apply_filters( 'training_wpo_render_breadcrumbs_heading_tag', $tag );
      
      $delimiter = '&nbsp/&nbsp';
      $home = esc_html__('Home', 'training');
      $before = '<span class="active">';
      $after = '</span>';

      $html = '';
      $heading = get_the_title();
      if (!is_home() && !is_front_page() || is_paged()) {

       $html .= '<ol class="list-unstyled breadcrumb-links">';

        global $post;
        $homeLink = home_url();
         $html .=  '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

        if (is_category()) {
          global $wp_query;
          $cat_obj = $wp_query->get_queried_object();
          $thisCat = $cat_obj->term_id;
          $thisCat = get_category($thisCat);
          $parentCat = get_category($thisCat->parent);
          if ($thisCat->parent != 0) $html .= (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
         //  $html .=  $before . single_cat_title('', false) . $after;
           $heading = $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
           $html .=  '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
           $html .=  '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
         //  $html .=  $before . get_the_time('d') . $after;
           $heading = $before . get_the_time('d') . $after;
        } elseif (is_month()) {
           $html .=  '<a href="' . get_year_link(get_the_time('Y')) . '" >' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
         //  $html .=  $before . get_the_time('F') . $after;
           $heading = $before . get_the_time('F') . $after;
        } elseif (is_year()) {
         //  $html .=  $before . get_the_time('Y') . $after;
           $heading = $before . get_the_time('Y') . $after;
        }elseif ( is_search() ) {
          //$html .= $before . 'Search results for "' . get_search_query() . '"' . $after;
           $heading =  $before . 'Search results for "' . get_search_query() . '"' . $after;
        }elseif (is_single() && !is_attachment()) { 
          if ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
             $html .=  '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
          //   $html .=  $before . get_the_title() . $after;
             $heading =  $before . get_the_title() . $after;
          } else {
            $cat = get_the_category(); $cat = $cat[0];
            $html .=  get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          //  $html .=  $before . get_the_title() . $after;
            $heading =  $before . get_the_title() . $after;
          }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_tag()) {
          $post_type = get_post_type_object(get_post_type());
          if(  $post_type  )
          // $html .=  $before . $post_type->labels->singular_name . $after;
           $heading =  $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
          $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID); 
          if( isset( $cat[0] ) ){
            $cat = $cat[0]; 
            $html .=  get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          }
           $html .=  '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
          // $html .=  $before . get_the_title() . $after;

           $heading =  $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
         //   $html .=  $before . get_the_title() . $after;
           $heading = $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) { 
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) $html .= $crumb . ' ' . $delimiter . ' ';
        //  $html .= $before . get_the_title() . $after;
          $heading = $before . get_the_title() . $after;

        }elseif ( is_tag() ) {
        //  $html .= $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
          $heading = $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif ( is_author() ) {
          global $author;
          $userdata = get_userdata($author);
         // $html .= $before . 'Articles posted by ' . $userdata->display_name . $after;
           $heading = $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif ( is_404() ) {
          //$html .= $before . 'Error 404' . $after;
          $heading = $before . 'Error 404' . $after;
        }

       /* if ( get_query_var('paged') ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
         // echo ': ' . esc_html__('Page') . ' ' . get_query_var('paged');
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }*/

        $html .= '</ol>';
    
          echo '<'.$tag.' class="breadcrumb-heading">'.$heading.'</'.$tag.'>';
       
        echo trim($html); 
      }
  }
}

if ( !function_exists( 'training_wpo_print_style_footer' ) ) {
  function training_wpo_print_style_footer(){
    $footer = training_wpo_theme_options('footer-style','default');
    global $trainingconfig;
    if('page' == get_post_type()){
      if($trainingconfig['footer_skin'] && $trainingconfig['footer_skin']!='global'){
        $footer = $trainingconfig['footer_skin'];
      }
    }
    if($footer!='default'){
    $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
              '.$shortcodes_custom_css.'
            </style>
          ';
      }
    }
  }
  add_action('wp_head','training_wpo_print_style_footer', 18);
}


if ( !function_exists( 'training_wpo_ratings_fix' ) ) {
  function training_wpo_ratings_fix($html) {
    $search = array(plugins_url( '/wp-postratings/images/stars_crystal/' ), '.gif');
    $replace = array(get_stylesheet_directory_uri('stylesheet_directory') . '/images/ratings/images/stars_crystal/', '.png');
    $html = str_replace($search, $replace, $html);
    return $html;
  }
add_filter( 'expand_ratings_template', 'training_wpo_ratings_fix', 999, 1 );
}

if(WPO_POST_RATINGS){
  function training_wpo_ratings_deregister_script() {
      $postratings_max = intval(get_option('postratings_max'));
      $postratings_ajax_style = get_option('postratings_ajax_style');
      $postratings_custom = intval(get_option('postratings_customrating'));
      if($postratings_custom) {
        for($i = 1; $i <= $postratings_max; $i++) {
          $postratings_javascript .= 'var ratings_'.$i.'_mouseover_image=new Image();ratings_'.$i.'_mouseover_image.src="' . get_stylesheet_directory_uri('stylesheet_directory') . '/images/ratings/images/stars_crystal/rating_over.png"';
        }
      } else {
        $postratings_javascript = 'var ratings_mouseover_image=new Image();ratings_mouseover_image.src="' . get_stylesheet_directory_uri('stylesheet_directory') . '/images/ratings/images/stars_crystal/rating_over.png"';
      }
      wp_deregister_script( 'wp-postratings' );
      wp_enqueue_script('wp-postratings', plugins_url('wp-postratings/postratings-js.js'), array('jquery'), WP_POSTRATINGS_VERSION, true);
      wp_localize_script('wp-postratings', 'ratingsL10n', array(
        'plugin_url' => get_stylesheet_directory_uri('stylesheet_directory') . '/images/ratings',
        'ajax_url' => admin_url('admin-ajax.php'),
        'text_wait' => esc_html__('Please rate only 1 post at a time.', 'wp-postratings'),
        'image' => get_option('postratings_image'),
        'image_ext' => 'png',
        'max' => $postratings_max,
        'show_loading' => intval($postratings_ajax_style['loading']),
        'show_fading' => intval($postratings_ajax_style['fading']),
        'custom' => $postratings_custom,
        'l10n_print_after' => $postratings_javascript
      ));
    }
    add_action( 'wp_print_scripts', 'training_wpo_ratings_deregister_script', 100 );
}


// Save extra taxonomy fields callback function.
 function training_wpo_save_extra_taxonomy_fields( $term_id ) {
   if ( isset( $_POST['term_meta'] ) ) {
     $t_id = $term_id;
     $term_meta = get_option( "taxonomy_$t_id" );
     $cat_keys = array_keys( $_POST['term_meta'] );
     foreach ( $cat_keys as $key ) {
       if ( isset ( $_POST['term_meta'][$key] ) ) {
         $term_meta[$key] = $_POST['term_meta'][$key];
       }
     }
     update_option( "taxonomy_$t_id", $term_meta );
   }
   return $term_id;
}

 function training_wpo_extra_edit_tax_fields($term_obj) {
    $term_id = is_object($term_obj)? $term_obj->term_id:0;
    $default = array(
      'icon'  => '',
      'icon_color' => ''
    );

    if( is_object($term_obj) ){
      $term_meta = get_option( "taxonomy_{$term_id}" );  
      $term_meta = $term_meta? array_merge( $default, $term_meta ):$default;
    }else {
      $term_meta = $default; 
    }
  ?>
    <tr class="form-field">
      <th scope="row" valign="top"><label><?php echo esc_html__( 'Icon', 'training' ); ?></label></th>
      <td>
        <input name="term_meta[icon]" type="text" value="<?php echo esc_attr($term_meta['icon']) ?>"/>
        <p class="description"><?php echo esc_html__( 'This support display icon from material design iconic, Please click <a href="//zavoloklom.github.io/material-design-iconic-font/icons.html">here to see</a> the listand', 'training' ); ?></p>
      </td>
    </tr>
    <tr class="form-field">
      <th scope="row" valign="top"><label><?php echo esc_html__( 'Icon color', 'training' ); ?></label></th>
      <td>
        <input name="term_meta[icon_color]" type="text" value="<?php echo esc_attr($term_meta['icon_color']) ?>"/>
        <p class="description"><?php echo esc_html__( 'example: #FF618E', 'training' ); ?></p>
      </td>
    </tr>
   <?php
  }

add_action( 'edited_ib_educator_category', 'training_wpo_save_extra_taxonomy_fields', 10, 2 );
add_action( 'create_ib_educator_category', 'training_wpo_save_extra_taxonomy_fields', 10, 2 );
add_action( 'ib_educator_category_edit_form_fields', 'training_wpo_extra_edit_tax_fields', 10, 2 );
add_action( 'ib_educator_category_add_form_fields', 'training_wpo_extra_edit_tax_fields', 10, 2 );

function training_wpo_format_chat_content( $content ) {
    global $_post_format_chat_ids;

    /* If this is not a 'chat' post, return the content. */
    if ( !has_post_format( 'chat' ) )
        return $content;

    /* Set the global variable of speaker IDs to a new, empty array for this chat. */
    $_post_format_chat_ids = array();

    /* Allow the separator (separator for speaker/text) to be filtered. */
    $separator = apply_filters( 'my_post_format_chat_separator', ':' );

    /* Open the chat transcript div and give it a unique ID based on the post ID. */
    $chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

    /* Split the content to get individual chat rows. */
    $chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

    /* Loop through each row and format the output. */
    foreach ( $chat_rows as $chat_row ) {

        /* If a speaker is found, create a new chat row with speaker and text. */
        if ( strpos( $chat_row, $separator ) ) {

            /* Split the chat row into author/text. */
            $chat_row_split = explode( $separator, trim( $chat_row ), 2 );

            /* Get the chat author and strip tags. */
            $chat_author = strip_tags( trim( $chat_row_split[0] ) );

            /* Get the chat text. */
            $chat_text = trim( $chat_row_split[1] );

            /* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
            $speaker_id = wpo_format_chat_row_id( $chat_author );

            /* Open the chat row. */
            $chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

            /* Add the chat row author. */
            $chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator;

            /* Add the chat row text. */
            $chat_output .= "\n\t\t\t\t\t" . '<span class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</span></div>';

            /* Close the chat row. */
            $chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
        }

        /**
         * If no author is found, assume this is a separate paragraph of text that belongs to the
         * previous speaker and label it as such, but let's still create a new row.
         */
        else {

            /* Make sure we have text. */
            if ( !empty( $chat_row ) ) {

                /* Open the chat row. */
                $chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

                /* Don't add a chat row author.  The label for the previous row should suffice. */

                /* Add the chat row text. */
                $chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

                /* Close the chat row. */
                $chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
            }
        }
    }

    /* Close the chat transcript div. */
    $chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

    /* Return the chat content and apply filters for developers. */
    return $chat_output;
}