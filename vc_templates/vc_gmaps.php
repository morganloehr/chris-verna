<?php
$output = $title = $link = $size = $zoom = $type = $bubble = $el_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( $link == '' ) {
	return null;
}

$link = trim( vc_value_from_safe( $link ) );
$bubble = ( $bubble != '' && $bubble != '0' ) ? '&amp;iwloc=near' : '';
$size = str_replace( array( 'px', ' ' ), array( '', '' ), $size );

$el_class = $this->getExtraClass( $el_class );
$el_class .= ( $size == '' ) ? ' vc_map_responsive' : '';

if ( is_numeric( $size ) ) $link = preg_replace( '/height="[0-9]*"/', 'height="' . $size . '"', $link );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gmaps_widget wpb_content_element' . $el_class, $this->settings['base'], $atts );
$_id = training_wpo_makeid();

?>
<div class="gmap-popup <?php echo esc_attr($css_class); ?>">
	<?php echo wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_map_heading' ) ); ?>
	<?php if($display_style=='popup'){ ?>
		<a href="#" data-toggle="modal" data-target="#gmap-model-<?php echo esc_attr($_id); ?>">
			<img src="<?php echo wp_get_attachment_url( $image ) ?>" alt=""/>
		</a>
	<?php } ?>

	<div class="wpb_wrapper space-padding-0">
		<div class="wpb_map_wraper">
			<?php if($display_style == 'popup'){  ?>
				<div id="gmap-model-<?php echo esc_attr($_id); ?>" class="modal fade" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
    					<div class="modal-content">
	    					<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h5 class="modal-title" id="myModalLabel"><?php echo esc_html__('View map', 'training'); ?></h5>
						    </div>
    						<div class="modal-body">
								
							</div>
						</div>
					</div>			
				</div>
			<?php	
			}else{
				if ( preg_match( '/^\<iframe/', $link ) ) echo trim($link); 
				else echo '<iframe width="100%" height="' . $size . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $link . '&amp;t=' . $type . '&amp;z=' . $zoom . '&amp;output=embed' . $bubble . '"></iframe>';
			}
			?>
		</div>
	</div><?php echo trim($this->endBlockComment( '.wpb_wrapper' )); ?>
</div><?php echo trim($this->endBlockComment( '.wpb_gmaps_widget' )); ?>

<?php if($display_style=='popup'){ 
	$iframe = "";
	if ( preg_match( '/^\<iframe/', $link ) ) $iframe =  $link; 
	else $iframe = '<iframe style="width: 100%;" width="100%" height="' . $size . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $link . '&amp;t=' . $type . '&amp;z=' . $zoom . '&amp;output=embed' . $bubble . '"></iframe>';
								
	?>
	<script type="text/javascript">
		jQuery('#gmap-model-<?php echo esc_attr($_id); ?>').on('shown.bs.modal', (function() {
		  var mapIsAdded = false;
		  return function() {
		    if (!mapIsAdded) {
		      jQuery('.modal-body').html('<?php echo trim($iframe); ?>');
		      mapIsAdded = true;
		    }    
		  };
		})());
	</script>
<?php } ?>