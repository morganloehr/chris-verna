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
global $footer_builder, $trainingconfig;
$training_footer = training_wpo_theme_options('footer-style','default');

if('page' == get_post_type()){
	if($trainingconfig['footer_skin'] && $trainingconfig['footer_skin']!='global'){
		$training_footer = $trainingconfig['footer_skin'];
	}
}
?>
	<?php if(is_active_sidebar('social')) dynamic_sidebar('social'); ?>

	<?php if( $training_footer !='default' ){
        echo do_shortcode($footer_builder['footer']);
        ?>
        	<footer id="wpo-footer" class="wpo-footer">
        		<div class="footer-innter <?php if( isset($trainingconfig['layout'])&&$trainingconfig['layout']=='fullwidth') { ?>-fuild<?php } ?>">
	            <?php 
	           	 	training_wpo_render_post_content( $training_footer );

	            ?>
	         </div>   
          	</footer>
	<?php }else{ ?>

		<script>
			jQuery( "div" ).removeClass( "vc_column_container" )
		</script>

	<footer id="wpo-footer" class="wpo-footer">
		<div class="container">
			<section class="container-inner">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-1'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-2'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-3'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-4'); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
	</footer>
	<?php } ?>


	<div class="wpo-copyright">
		<div class="container">
			<div class="copyright">
				<address>
					<?php 
						$copyright_text =  training_wpo_theme_options('copyright_text', '');
						if(!empty($copyright_text)){
							echo do_shortcode($copyright_text);
						}else{
							echo ('Copyright &#169; 2015 - <a>Chris Verna</a> - All rights reserved.<br>'); 
						}
					?>
				</address>

				<?php if(training_wpo_theme_options('image-payment', '')){ ?>
					<div class="payment">
						<img src="<?php echo esc_url( training_wpo_theme_options('image-payment', '') ); ?>" />
					</div>
				<?php } ?>

			</div>
			<div class="noted-tag">
				<p>Designed by <a href="https://www.notedcontent.com" target="_blank">NOTED.</a></p>
			</div>
		</div>
	</div>

</section>
<!-- END Wrapper -->
<?php get_sidebar( 'offcanvas-left' );  ?>
</section>
<?php wp_footer(); ?>

</body>
</html>