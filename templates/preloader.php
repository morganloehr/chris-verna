<?php if(training_wpo_theme_options('preloader', 0) == '1'): ?>
  <div id="jpreContent" >
            <div id="jprecontent-inner">
                <div class="site-logo">
                    <?php 
                       $preloader_logo = training_wpo_theme_options('image-preloader', get_template_directory_uri() . '/images/logo-preloader.png')
                    ?>
                    <?php if ( ! empty( $preloader_logo ) ) { ?>
                        <img src="<?php echo esc_url($preloader_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                    <?php } ?>
                </div>
                <div class="preloader-wrapper big active">
                  <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>  
            </div>
    </div>
<?php endif; ?>   