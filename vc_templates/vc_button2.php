<?php
$wrapper_start = $wrapper_end = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class = 'btn';
//parse link
$link = ( $link == '||' ) ? '' : $link;
$link = vc_build_link( $link );
$a_href = $link['url'];
$a_title = $link['title'];
$a_target = $link['target'];

$class .= ( $color != '' ) ? ( ' vc_btn-' .$color.' vc_btn_' . $color . ' '.  $color ) : '';
$class .= ( $size != '' ) ? ( ' btn-' . $size  ) : '';
$class .= ( $style != '' ) ? ' vc_btn_' . $style .' '.$style : '';

$el_class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class . $el_class, $this->settings['base'], $atts );
$wrapper_css_class = 'vc_button-2-wrapper';
if ( $align ) {
	$wrapper_css_class .= ' vc_button-2-align-'.$align;
}
?><div class="<?php echo esc_attr($wrapper_css_class) ?>"><a class="<?php echo esc_attr( trim( $css_class ) ); ?>" href="<?php echo esc_attr( $a_href ); ?>" <?php if($a_title){echo 'title="<?php esc_attr( $a_title ); ?> "'; }?> <?php if($a_target){echo 'title="<?php esc_attr( $a_target ); ?>"'; }?>><?php echo esc_html($title); ?></a></div><?php echo trim($this->endBlockComment( 'vc_button' )) . "\n";