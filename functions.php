<?php
/**
 * @version 6.4.3
 */
function child_theme_style() {
    wp_dequeue_style('wpforge');
    wp_enqueue_style('parent',get_template_directory_uri() . '/style.css', '','WP-Forge');
    wp_enqueue_style('child',get_stylesheet_uri(), array('parent'),'WP-Starter');
}
add_action('wp_enqueue_scripts','child_theme_style',999);

?>