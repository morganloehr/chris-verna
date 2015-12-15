<?php

 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if( !isset($icon) ){ $icon = ''; }
$class = "";  

$link = ( $link == '||' ) ? '' : $link;

$class .= ( $position != '' ) ? ' vc_cta_btn_pos_' . $position : '';
$class .= ( $el_width != '' ) ? ' vc_el_width_' . $el_width : '';
$class .= ( $color != '' ) ? ' vc_cta_' . $color : '';
$class .= ( $style != '' ) ? ' vc_cta_' . $style : '';

$class_heading = ( $txt_align != '' ) ? ' vc_txt_align_' . $txt_align : '';

$inline_css = ( $accent_color != '' ) ? ' style="' . vc_get_css_color( 'background-color', $accent_color ) . vc_get_css_color( 'border-color', $accent_color ) . '"' : '';

$class .= $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation( $css_animation );
?>
	<div<?php echo trim($inline_css); ?> class="call-to-action <?php echo esc_attr($el_class); ?> call-to-action-v<?php echo esc_attr($style); ?> button-align-<?php echo esc_attr($position); ?>">
		<div class="cta-wrapper">
			<?php if ( $link != '' && $position != 'bottom' ) { ?>
			<div class="call-to-action-inner cta-button">
				<?php echo do_shortcode( '[vc_button2 link="' . $link . '" title="' . $title . '" color="' . $color . '" icon="' . $icon . '" size="' . $size . '" style="' . $btn_style . '" el_class="vc_cta_btn"]' ); ?>
			</div>	
			<?php } ?>
			
			<div class="call-to-action-inner cta-content <?php echo esc_attr($class_heading); ?>">
				<?php if ( trim($h2) != '' || trim($h4) != '' ): ?>
					<div class="heading<?php echo esc_attr($class_heading); ?> heading-<?php echo esc_attr($heading_style); ?>">
						<?php if ( $h4 != '' ): ?><small class="subheading"><?php echo trim($h4); ?></small><?php endif; ?>
						<?php if ( trim($h2) != '' ): ?><h2><?php echo trim($h2); ?></h2><?php endif; ?>
						
					</div>
				<?php endif; ?>
				<?php echo wpb_js_remove_wpautop( $content, true ); ?>
			</div>

			<?php if ( $link != '' && $position == 'bottom' ) { ?>
			<div class="clearfix"></div>
			<div class="call-to-action-inner action-button cta-button <?php echo esc_attr($class_heading) ?>">
				<?php echo do_shortcode( '[vc_button2 link="' . $link . '" title="' . $title . '" color="' . $color . '" icon="' . $icon . '" size="' . $size . '" style="' . $btn_style . '" el_class="vc_cta_btn"]' ); ?>
			</div>	
			<?php } ?>
		</div>	
	</div>
<?php echo esc_html( $this->endBlockComment( '.vc_call_to_action' ) ) . "\n";