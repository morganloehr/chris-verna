<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $breadcrumb ) {

	echo trim( $wrap_before );
	$heading = '';
	$links = '';
	foreach ( $breadcrumb as $key => $crumb ) {
		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			$links .= '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
			if ( sizeof( $breadcrumb ) !== $key + 2 ) {
				$links .= $delimiter;
			}
		} else {
			$heading .= '<div class="breadcrumb-heading">' . esc_html( $crumb[0] ) .'</div>';
		}
	}
	echo trim( $before ); 
		echo trim( $heading );
		echo trim( $links );
	echo trim( $after );
	echo trim( $wrap_after );

}