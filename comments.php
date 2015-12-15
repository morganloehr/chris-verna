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

if ( post_password_required() ){
    return;
}
?>
<div id="comments" class="comments">
    <?php if ( have_comments() ) { ?>
        <header class="header-title">
            <h5 class="comments-title title"><?php comments_number( esc_html__('0 Comment', 'training'), esc_html__('1 Comment', 'training'), esc_html__('% Comments', 'training') ); ?></h5>
        </header><!-- /header -->

        <div class="wpo-commentlists">
    	    <ol class="commentlists">
    	        <?php wp_list_comments('callback=training_wpo_theme_comment'); ?>
    	    </ol>
    	    <?php
    	    	// Are there comments to navigate through?
    	    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    	    ?>
    	    <footer class="navigation comment-navigation" role="navigation">
    	        <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'training' ) ); ?></div>
    	        <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'training' ) ); ?></div>
    	    </footer><!-- .comment-navigation -->
    	    <?php endif; // Check for comment navigation ?>

    	    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    	        <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'training' ); ?></p>
    	    <?php endif; ?>
        </div>
    <?php } ?> 

	<?php
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'title_reply'=> '<h4 class="title">'.esc_html__('Send a Comment','training').'</h4>',

            'comment_field' => '<div class="form-group">
                                    <textarea placeholder="'.esc_html__('Your Message', 'training').'" rows="5" id="comment" class="form-control"  name="comment"'.$aria_req.'></textarea>
                                </div>',
            'fields' => apply_filters(
            	'comment_form_default_fields',
        		array(
                    'author' => '<div class="row"><div class="form-group col-sm-6 col-xs-12">
                                <input type="text" name="author" placeholder="'.esc_html__('Your Name *', 'training').'" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                                </div>',
                    'email' => ' <div class="form-group col-sm-6 col-xs-12">
                                <input id="email" name="email" placeholder="'.esc_html__('Email *', 'training').'" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                                </div></div>',
                    'url' => '<div class="form-group">
                                <input id="url" placeholder="'.esc_html__('Website', 'training').'" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
                                </div>',
                                
                )),
            'label_submit' => esc_html__('Send', 'training'),
			'comment_notes_before' => '<div class="form-group h-info">'.esc_html__('Your email address will not be published.','training').'</div>',
			'comment_notes_after' => '',
        );
    ?>
	<?php global $post; ?>
	<?php if('open' == $post->comment_status){ ?>
	<div class="commentform row reset-button-default">
    	<div class="col-sm-12">
			<?php training_wpo_comment_form($comment_args); ?>
    	</div>
    </div><!-- end commentform -->
	<?php } ?>
</div><!-- end comments -->