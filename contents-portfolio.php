<?php
    
    global $portfolio, $trainingconfig, $column;

    if(is_front_page()) {
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    } else {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }

    if( is_page()) {

        $options = array(
            'portfolio_number' => 8,
            'portfolio_style' => '',
            'portfolio_columns' => 2,
        );

        $trainingconfig     = array_merge( $options, $trainingconfig );       
        $style          = $trainingconfig['portfolio_style'] ;
        $post_per_page  = $trainingconfig['portfolio_number'];
        $column         = $trainingconfig['portfolio_columns'];

        $args = array(
            'post_type' => 'portfolio',
            'paged' => $paged,
            'posts_per_page'=>$post_per_page
        );
        $portfolio = new WP_Query($args);
    }else{

        $style = training_wpo_theme_options('portfolio-style', 'style-1');
        $column = (int)training_wpo_theme_options('portfolio-items-show', 4);
        
        $post_per_page = get_option('posts_per_page');

        $args = array(
            'post_type' => 'portfolio',
            'paged' => $paged,
            'posts_per_page'=>$post_per_page
        );

        $portfolio = new WP_Query($args);
    }

if ( have_posts() ) :
    get_template_part( 'templates/portfolio/portfolio', $style);
    training_wpo_pagination_nav( $post_per_page, $portfolio->found_posts, $portfolio->max_num_pages );
else :
    get_template_part( 'templates/elements/none' );
endif;
