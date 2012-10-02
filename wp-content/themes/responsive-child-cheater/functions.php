<?php

/**
 * WordPress Widgets start right here.
 */
function responsive_widgets_init() {
  
    register_sidebar(array(
        'name' => __('Home Feature Post', 'responsive'),
        'description' => __('Home Feature - home.php', 'responsive'),
        'id' => 'home-feature-post',
        'before_title' => '<div class="widget-title-home"><h3>',
        'after_title' => '</h3></div>',
        'before_widget' => '<div id="cheater-featured-post" class="widget-wrapper %2$s">',
        'after_widget' => '</div>'
    ));
    
}

add_action('widgets_init', 'responsive_widgets_init');

function add_search_box($items, $args) {

        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li class="search-nav">' . $searchform . '</li>';

    return $items;
}

add_filter('wp_nav_menu_items','add_search_box', 10, 2);
?>
