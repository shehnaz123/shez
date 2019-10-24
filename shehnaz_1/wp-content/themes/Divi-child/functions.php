<?php

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyseventeen-style' for the Twenty Seventeen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'slick-min', get_stylesheet_directory_uri() . '/slick/slick/slick.css' ); 
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/slick/slick/slick-theme.css' );
    wp_enqueue_script('jquerymigrate-js', get_stylesheet_directory_uri() . '/jquery-migrate-1.4.1.min.js');
    wp_enqueue_script('jquery-js', get_stylesheet_directory_uri() . '/jquery-3.3.1.min.js');
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/slick/slick/slick.min.js');
    wp_enqueue_script('slick-new-js', get_stylesheet_directory_uri() . '/slicknew.js');
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ),
    wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


    

//lookbook

    add_shortcode( 'show_latest_look_book', 'display_custom_post_type' );

    function display_custom_post_type(){
        $args = array(
            'post_type' => 'look_book',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish'
        );

        $string = '';
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
            $string .= '<div class="row">';
            while( $query->have_posts() ){
                $query->the_post();
            $string .='<div class="inner">';
                $string .= '<div class="image-wraper">'.get_the_post_thumbnail(the_id(), 'full') . '</div>';
                $string .= '<div class="details">';
                    $string .='<h3 class="title">' . get_the_title() . '</h3>';
                    $string .= '<p class="details-txt">' . get_the_excerpt() . '</p>';
                    $string .= '<a class="view-more" href="'.get_the_permalink().'"> <input type="button" value="View More" class="button-more"> </a>';
                $string .='</div>';
            $string .='</div>';
            }
            $string .= '</div>';
        }
        wp_reset_postdata();
        return $string;
    }
?>
