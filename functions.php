<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//  Rustico Additions

require_once('inc/menu_cpt_setup.php');
require_once('inc/menu_acf_setup.php');
require_once('inc/menu_func.php');


/**
 * Disable all colors within Gutenberg.
 */
add_theme_support( 'disable-custom-colors' );


/**
 * Wrap menu items in a span
 */
add_filter('nav_menu_item_args', function ($args, $item, $depth) {
    if ($args->theme_location == 'primary') {
        $title             = apply_filters('the_title', $item->title, $item->ID);
        $args->link_before = '<span>';
        $args->link_after  = '</span>';
    }
    return $args;
}, 10, 3);


/**
 * Creat menu shortcode
 */
function rustico_menu_output() { 
    $output = include('inc/menu-output.php');
    return $output;
} 
// register shortcode
add_shortcode('rustico-menu', 'rustico_menu_output');

/**
 * Hide menu options from anyone who is not admin
 */

if ( !current_user_can('manage_options') ) {
  
    add_action( 'admin_menu', 'notadmin_remove_menus', 999 ); 
  
} 
function notadmin_remove_menus() {
    remove_menu_page( 'index.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'profile.php' );
    remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
    remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
    remove_submenu_page( 'themes.php', 'background.php');

    // Remove Customize from the Appearance submenu
    global $submenu;
    unset($submenu['themes.php'][6]); //remove appearance / customize
    unset($submenu['themes.php'][20]); //remove appearance / background
}



// add_action( 'admin_init', function () {
//     echo "add_action( 'admin_init', function () {<br>";
 
//     foreach ( $GLOBALS['menu'] as $menu ) {
//         echo "&nbsp;&nbsp;&nbsp;&nbsp;remove_menu_page( '$menu[2]' );<br>";
//     }
 
//     echo "}, PHP_INT_MAX );";
//     exit();
// } );
