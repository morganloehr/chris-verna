 <?php 
    global $woocommerce; 
 ?>
 <div id="xcart" class="minibasket mini-basket-v2 dropdown">
 
    <a class="dropdown-toggle mini-cart-button" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php esc_html_e('View your shopping cart', 'training'); ?>">
        <span class="text-skin cart-icon radius-6x">
            <i class="fa fa-shopping-cart"></i>
        </span>
    </a>
    <div class="dropdown-menu">
        <?php woocommerce_mini_cart(); ?>
    </div>
</div>