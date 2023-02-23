<?php

function dan_dragon_theme_scripts() {
    // Enqueue the style.css file
    wp_enqueue_style( 'dan-dragon-theme-style', get_template_directory_uri() . '/build/index.css' );

    // Enqueue the index.js file
    wp_enqueue_script( 'dan-dragon-theme-script', get_template_directory_uri() . '/build/index.js', array( 'jquery' ), false, true );

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'dan_dragon_theme_scripts' );

function mytheme_register_menus() {
	register_nav_menus(array(
		'primary' => esc_html__('Primary Menu', 'mytheme'),
	));
}
add_action('after_setup_theme', 'mytheme_register_menus');

function mytheme_add_menu_item_class($classes, $item, $args) {
	$classes[] = 'nav-item';
	return $classes;
}
add_filter('nav_menu_css_class', 'mytheme_add_menu_item_class', 10, 3);

function mytheme_add_menu_link_class($atts, $item, $args) {
	$atts['class'] = 'nav-link';
    if ($atts['aria-current'] === 'page') {
        $atts['class'] .= ' active';
    }
	return $atts;
}
add_filter('nav_menu_link_attributes', 'mytheme_add_menu_link_class', 10, 3);