<?php

function cptui_register_my_cpts_menu() {

/**
 * Post Type: Menus.
 */

$labels = [
    "name" => __( "Menus", "understrap" ),
    "singular_name" => __( "Menu", "understrap" ),
    "menu_name" => __( "Rustico Menus", "understrap" ),
    "all_items" => __( "All Menus", "understrap" ),
    "add_new" => __( "Add new", "understrap" ),
    "add_new_item" => __( "Add new Menu", "understrap" ),
    "edit_item" => __( "Edit Menu", "understrap" ),
    "new_item" => __( "New Menu", "understrap" ),
    "view_item" => __( "View Menu", "understrap" ),
    "view_items" => __( "View Menus", "understrap" ),
    "search_items" => __( "Search Menus", "understrap" ),
    "not_found" => __( "No Menus found", "understrap" ),
    "not_found_in_trash" => __( "No Menus found in trash", "understrap" ),
    "parent" => __( "Parent Menu:", "understrap" ),
    "featured_image" => __( "Featured image for this Menu", "understrap" ),
    "set_featured_image" => __( "Set featured image for this Menu", "understrap" ),
    "remove_featured_image" => __( "Remove featured image for this Menu", "understrap" ),
    "use_featured_image" => __( "Use as featured image for this Menu", "understrap" ),
    "archives" => __( "Menu archives", "understrap" ),
    "insert_into_item" => __( "Insert into Menu", "understrap" ),
    "uploaded_to_this_item" => __( "Upload to this Menu", "understrap" ),
    "filter_items_list" => __( "Filter Menus list", "understrap" ),
    "items_list_navigation" => __( "Menus list navigation", "understrap" ),
    "items_list" => __( "Menus list", "understrap" ),
    "attributes" => __( "Menus attributes", "understrap" ),
    "name_admin_bar" => __( "Menu", "understrap" ),
    "item_published" => __( "Menu published", "understrap" ),
    "item_published_privately" => __( "Menu published privately.", "understrap" ),
    "item_reverted_to_draft" => __( "Menu reverted to draft.", "understrap" ),
    "item_scheduled" => __( "Menu scheduled", "understrap" ),
    "item_updated" => __( "Menu updated.", "understrap" ),
    "parent_item_colon" => __( "Parent Menu:", "understrap" ),
];

$args = [
    "label" => __( "Menus", "understrap" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "delete_with_user" => false,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "menu", "with_front" => true ],
    "query_var" => true,
    "menu_position" => 2,
    "menu_icon" => "dashicons-welcome-widgets-menus",
    "supports" => [ "title", "editor", "thumbnail" ],
    "show_in_graphql" => false,
];

register_post_type( "menu", $args );
}

add_action( 'init', 'cptui_register_my_cpts_menu' );

?>
