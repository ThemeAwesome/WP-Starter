<?php
/**
 * WP-Starter functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 2.0
 */

/**
 * Setup WP-Starter's textdomain.
 *
 * Declare a textdomain for WP-Starter.
 * Translations can be filed in the /languages/ directory.
 */
function wpstarter_theme_setup() {
	load_child_theme_textdomain( 'wpstarter', get_stylesheet_directory() . '/language' );
}
add_action( 'after_setup_theme', 'wpstarter_theme_setup' );

/**
 *	Dequeue the fucntions.js file of WP-Forge so we can use the one in WP-Starter. This way only one functions file is loaded instead of
 *  two.
 *
 *	Hooked to the wp_print_scripts action, with a late priority (100),
 *	so that it is after the script was enqueued.
 *
 *	@see http://codex.wordpress.org/Function_Reference/wp_dequeue_script
 */
function wpstarter_dequeue_script() {

   wp_dequeue_script( 'functions-js' );
}
add_action( 'wp_print_scripts', 'wpstarter_dequeue_script', 100 );

/**
 *	Register our scripts or styles exclusive to WP-Starter..
 */
function wpstarter_scripts_styles() {

	// Let's go ahead and register WP-Starter's function.js file wpstarter-functions.js first. You will notice that the wpstarter-functions.js files is exactly the same as the function.js file in WP-Forge.
    wp_enqueue_script( 'wpstarter-js', get_stylesheet_directory_uri() . '/js/wpstarter-functions.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'wpstarter_scripts_styles', 100 );

?>