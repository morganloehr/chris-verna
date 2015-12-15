 <?php 
    global $woocommerce; 
    $style = '';
 ?>
 <div id="xcart" class="minibasket dropdown light border-cart">
    <span class="text-skin cart-icon radius-6x bg-none">
        <i class="fa fa-shopping-cart bg-none"></i>
    </span>
    <a class="dropdown-toggle mini-cart-button" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php esc_html_e('View your shopping cart', 'training'); ?>">
        <span class="cart-title"><?php esc_html_e('Cart ','training'); ?>:</span>
        <?php echo sprintf(_n(' <span class="mini-cart-items"> %d item </span> ', ' <span class="mini-cart-items"> %d items - </span> ', $woocommerce->cart->cart_contents_count, 'training'), $woocommerce->cart->cart_contents_count);?> <?php echo trim($woocommerce->cart->get_cart_total()); ?>
    </a>
    <div class="dropdown-menu">
        <?php woocommerce_mini_cart(); ?>
    </div>
</div>