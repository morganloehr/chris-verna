<?php
/**
 * Single Product tabs Accordions
 *
 * @author 		WPOPal
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$_count=0;
$id = 'wpo-acc'.time();

if ( ! empty( $tabs ) ) : ?>


<div class="accordion  <?php echo  apply_filters( 'training_wpo_woocommerce_single_product_accordion_class', ' accordion-v3 noborder collapse-right ' ); ?> woocommerce-tab-product-info">
	<div class="panel-group" id="<?php echo esc_attr($id) ; ?>">
		<?php $i = 0; foreach ( $tabs as $key => $tab ) : ?>
		<div class="panel panel-default">
		    <div class="panel-heading">
		        <h4 class="panel-title">
		            <a data-toggle="collapse" <?php if( $i != 0 ) { ?>class="collapsed"<?php } ?> data-parent="#<?php echo esc_attr($id) ; ?>" href="#<?php echo esc_attr($id) ; ?>-<?php echo esc_attr($key); ?>">
		              	 <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
		            </a>
		        </h4>
		    </div>
		    <div id="<?php echo esc_attr($id) ; ?>-<?php echo esc_attr($key); ?>" class="panel-collapse collapse <?php if( $i++ == 0 ) { ?>active in<?php } else { ?> out <?php } ?>">
		        <div class="panel-body">
		            <?php call_user_func( $tab['callback'], $key, $tab ) ?>
		        </div>
		    </div>
		</div>
		<?php endforeach; ?>
	</div>	
</div>

<?php endif; ?>
