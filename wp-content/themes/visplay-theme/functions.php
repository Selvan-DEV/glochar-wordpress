<?php
/**
 * Theme Functions
 * 
 * @package Glochar_Theme
 */

// Theme Setup
function glochar_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('responsive-embeds');
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'glochar-theme'),
        'footer' => __('Footer Menu', 'glochar-theme'),
    ));
    
    // Add image sizes
    add_image_size('hero-large', 1920, 1080, true);
    add_image_size('project-card', 600, 400, true);
    add_image_size('story-card', 400, 500, true);
}
add_action('after_setup_theme', 'glochar_theme_setup');

// Enqueue Scripts and Styles
function glochar_enqueue_scripts() {
    // Styles
    wp_enqueue_style('glochar-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('glochar-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    
    // Scripts
    wp_enqueue_script('glochar-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);

    // Localize script for AJAX
    wp_localize_script('glochar-main', 'glochar_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('glochar_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'glochar_enqueue_scripts');

// Register Widget Areas
function glochar_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'glochar-theme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'glochar-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'glochar_widgets_init');

// Register Custom Post Types
function glochar_custom_post_types() {
    // Projects Post Type
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects', 'glochar-theme'),
            'singular_name' => __('Project', 'glochar-theme'),
            'add_new' => __('Add New Project', 'glochar-theme'),
            'add_new_item' => __('Add New Project', 'glochar-theme'),
            'edit_item' => __('Edit Project', 'glochar-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'projects'),
    ));
    
    // Stories Post Type
    register_post_type('story', array(
        'labels' => array(
            'name' => __('Stories', 'glochar-theme'),
            'singular_name' => __('Story', 'glochar-theme'),
            'add_new' => __('Add New Story', 'glochar-theme'),
            'add_new_item' => __('Add New Story', 'glochar-theme'),
            'edit_item' => __('Edit Story', 'glochar-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'stories'),
    ));
    
    // Systems Post Type
    register_post_type('system', array(
        'labels' => array(
            'name' => __('Systems', 'glochar-theme'),
            'singular_name' => __('System', 'glochar-theme'),
            'add_new' => __('Add New System', 'glochar-theme'),
            'add_new_item' => __('Add New System', 'glochar-theme'),
            'edit_item' => __('Edit System', 'glochar-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-grid-view',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'systems'),
    ));
}
add_action('init', 'glochar_custom_post_types');

// Excerpt Length
function glochar_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'glochar_excerpt_length');

// Custom Excerpt More
function glochar_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'glochar_excerpt_more');
