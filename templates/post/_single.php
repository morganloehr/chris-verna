<?php $thumbsize = isset($thumbsize)? $thumbsize : 'post-thumbnail';?>
<?php
  $post_category = "";
  $categories = get_the_category();
  $separator = ' | ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'training' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }      
?>

<?php
if (has_post_thumbnail()) {
    $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'my-fun-size' );
    $thumbnail_url = $thumbnail_data[0];
}

?>
<article class="post" id="post-<?php the_ID(); ?>" style="background-image:url('<?php echo $thumbnail_url ?>'); background-size: cover" >


   
</article>
 <div class="entry-content">       
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                <div class="left">
                    <div class="entry-create">
                        <span class="date"><?php the_time( 'd' ); ?></span>
                        <span class="month"><?php the_time('M'); ?></span>
                    </div>
                </div>
                <div class="right">    
                    <span class="author">
                        <span class="icon zmdi zmdi-edit"></span><?php the_author(); ?>
                    </span>
                    <span class="entry-category">
                        <span class="icon zmdi zmdi-folder-outline"></span><?php echo trim($post_category) ?>
                    </span>
                    <span class="comment-link"><span class="icon zmdi zmdi-comments"></span><?php comments_popup_link(esc_html__(' 0', 'training'), esc_html__(' 1', 'training'), esc_html__(' %', 'training')); ?></span>
                </div>
            </div>
        </div>

        <div class="entry-info">
            <?php
                if (get_the_title()) {
                ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php
            }
            ?>
            <?php
                if (! has_excerpt()) {
                    echo "";
                } else {
                    ?>
                        <p class="entry-description"><?php echo training_wpo_excerpt(22,'...'); ?></p>
                    <?php
                }
            ?>
        </div>    
    </div>