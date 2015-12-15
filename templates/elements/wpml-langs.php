  <?php 
    // WPML - Custom Languages Menu
    if( function_exists( 'icl_get_languages' ) ){
        $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
        if( is_array( $languages ) ){
            
            foreach( $languages as $lang_k=>$lang ){
                if( $lang['active'] ){
                    $active_lang = $lang;
                    unset( $languages[$lang_k] );
                }
            }

            // disabled
            if( count( $languages ) ){
                $lang_status = 'enabled';
            } else {
                $lang_status = 'disabled';
            }
            
            echo '<div class="pull-left"><div class="language wpml-languages btn-group '. esc_attr( $lang_status ).'">';
            
                echo '<div class="btn btn-link dropdown-toggle" href="'. esc_url( $active_lang['url'] ) .'" ontouchstart="this.classList.toggle(\'hover\');">';
                    echo '<img src="'. esc_url( $active_lang['country_flag_url'] ) .'" alt="'. esc_attr( $active_lang['translated_name'] ) .'"/>';
                    echo esc_attr( $active_lang['translated_name'] );
                    if( count( $languages ) ) echo '<i class="icon-down-open-mini"></i>';
                echo '</div>';
                
                if( count( $languages ) ){
                    echo '<ul class="wpml-lang-dropdown dropdown-menu">';
                        foreach( $languages as $lang ){
                            echo '<li><a href="'. esc_url( $lang['url'] ) .'"><img src="'. esc_url( $lang['country_flag_url'] ).'" alt="'. esc_attr( $lang['translated_name'] ).'"/>'. esc_attr( $lang['translated_name'] ).'</a></li>';
                        }
                    echo '</ul>';
                }
                
            echo '</div></div>';
        }
    }
   ?>
