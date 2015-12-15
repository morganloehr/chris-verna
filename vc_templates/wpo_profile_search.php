<?php 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 
	$template = 'members/'.$template;
	bps_display_form ( $form, $template, 'widget' ); 
?>