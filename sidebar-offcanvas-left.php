<div id="wpo-off-canvas" class="wpo-off-canvas sidebar-offcanvas hidden-lg hidden-md"> 
    <div class="wpo-off-canvas-body">
        <div class="offcanvas-head bg-primary">
            <button type="button" class="btn btn-offcanvas btn-toggle-canvas btn-default" data-toggle="offcanvas">
                  <i class="fa fa-close"></i> 
             </button>
             <span><?php esc_html_e( 'Menu', 'training' ); ?></span>
        </div>
         <?php if( class_exists("Training_Wpo_Megamenu_Offcanvas") ){ ?>
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
        </nav> <?php } ?>   
        
        <?php dynamic_sidebar('offcanvas'); ?>

    </div>
</div>
