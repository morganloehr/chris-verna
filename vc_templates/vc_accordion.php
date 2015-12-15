<?php
wp_enqueue_script('jquery-ui-accordion');
$output = $title = $interval = $el_class = $collapsible = $disable_keyboard = $active_tab = '';
//
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion wpb_content_element widget ' . $el_class . ' not-column-inherit', $this->settings['base'], $atts );
$css_class .= ' ' . $style;
$output .= "\n\t".'<div class="'.$css_class.'" data-collapsible="'.$collapsible.'" data-vc-disable-keydown="' . ( esc_attr( ( 'yes' == $disable_keyboard ? 'true' : 'false' ) ) ) . '" data-active-tab="'.$active_tab.'">'; //data-interval="'.$interval.'"
$output .= "\n\t\t".'<div class="wpb_wrapper wpb_accordion_wrapper ui-accordion">';
$output .= '<h3 class="wpb_accordion_heading widget-title visual-title font-size-md separator_align_left"><span>'.esc_html($title).'</span></h3>'; 

$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_accordion');

echo trim($output);