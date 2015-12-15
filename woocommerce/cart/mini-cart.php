<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<ul class="cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">

	<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
					<li>
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><i class="fa fa-remove"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'training' ) ), $cart_item_key ); ?>

						<div class="media">
							<div class="pull-left">
									<?php if ( ! $_product->is_visible() ) : ?>
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
									<?php else : ?>
										<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										</a>
									<?php endif; ?>
							</div>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo trim($product_name); ?></a></h4>
								<div class="media-info">
									<?php  echo WC()->cart->get_item_data( $cart_item ); ?>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</div>
							</div>
						</div>	
					
					</li>
					<?php
				}
			}
		?>

	<?php else : ?>

		<li class="empty"><?php esc_html_e( 'No products in the cart.', 'training' ); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->
<hr>
<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

	<p class="total clearfix"><strong class="pull-left"><?php esc_html_e( 'Subtotal', 'training' ); ?>:</strong> <span class="pull-right"><?php echo WC()->cart->get_cart_subtotal(); ?></span></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons clearfix">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="btn btn-outline btn-primary wc-forward"><?php esc_html_e( 'View Cart', 'training' ); ?></a>
		<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="btn btn-inverse btn-primary checkout wc-forward"><?php esc_html_e( 'Checkout', 'training' ); ?></a>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
