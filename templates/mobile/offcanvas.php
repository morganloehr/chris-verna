<!-- OFF-CANVAS MENU SIDEBAR -->
<section id="wpo-off-canvas" class="wpo-off-canvas hidden-lg hidden-md hidden-sm">
    <div class="wpo-off-canvas-body">
        <div class="wpo-off-canvas-header">
            <?php get_search_form(); ?>
            <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-times"></i>
            </button>
            <div class="mobile-menu-header">
                <?php esc_html_e('Menu','training'); ?>
            </div>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
            <?php
            $args = array(
                'theme_location'  => 'mainmenu',
                'container_class' => 'navbar-collapse',
                'menu_class'      => 'wpo-menu-top nav navbar-nav',
                'fallback_cb'     => '',
                'menu_id'         => 'main-menu-offcanvas',
                'walker'          => new Training_Wpo_Megamenu_Offcanvas()
            );
            wp_nav_menu($args);
            ?>
        </nav>
    </div>
</section>
<!-- //OFF-CANVAS MENU SIDEBAR -->