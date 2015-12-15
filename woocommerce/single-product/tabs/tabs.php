<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$_count=0;

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs clearfix <?php echo  apply_filters( 'training_wpo_woocommerce_single_product_tab_class', 'tab-v5' ); ?> tabs-left">
		<ul class="woocommerce-tab-product-info nav nav-tabs clear-list">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr($key); ?>_tab<?php echo ($_count==0)?' active':''; ?>">
					<a data-toggle="tab" href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>
			<?php $_count++; endforeach; ?>
		</ul>
		<?php $_count=0; ?>
		<div class="tab-content col-xs-12">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="tab-pane<?php echo ($_count==0)?' active':''; ?>" id="tab-<?php echo esc_attr($key); ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ) ?>
				</div>
			<?php $_count++; endforeach; ?>
		</div>
	</div>

<?php endif; ?>