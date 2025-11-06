<?php
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => 'Menu Principal'
    ]);
});

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('eazyshop-main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_script('eazyshop-main', get_template_directory_uri() . '/assets/js/main.js', [], false, true);
});
