<?php

function wpdevs_load_scripts() {
    wp_enqueue_style( 'wpdevs-style', get_stylesheet_uri(), array(), uniqid(), 'all' );
    wp_enqueue_style( 'ubuntu-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), null, 'all' );
    wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'wpdevs_load_scripts' );

function wpdevs_config() {
    register_nav_menus(
        array(
            'wp_devs_main_menu' => 'Main Menu',
            'wp_devs_footer_menu' => 'Footer Menu',
        )
    );

    add_theme_support(
        'custom-header',
        array(
            'width' => 1920,
            'height' => 225,
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'width' => 200,
        'height' => 110,
        'flex-height' => true,
        'flex-width' => true,
    ));
}

add_action('after_setup_theme', 'wpdevs_config', 0);

add_action('widgets_init', 'wpdevs_sidebars');
function wpdevs_sidebars() {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-blog',
        'description' => 'Blog Sidebar widget description...',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Service 1',
        'id' => 'service-1',
        'description' => 'Some random service description....',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Service 2',
        'id' => 'service-2',
        'description' => 'Some random service description....',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Service 3',
        'id' => 'service-3',
        'description' => 'Some random service description....',
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}