<?php 


function cptui_register_my_cpts_bioderma() {

/**
 * Post Type: Bioderma.
 */

$labels = [
  "name" => __( "Bioderma", "custom-post-type-ui" ),
  "singular_name" => __( "Bioderma", "custom-post-type-ui" ),
  "menu_name" => __( "My Bioderma", "custom-post-type-ui" ),
  "all_items" => __( "All Bioderma", "custom-post-type-ui" ),
  "add_new" => __( "Add new", "custom-post-type-ui" ),
  "add_new_item" => __( "Add new Bioderma", "custom-post-type-ui" ),
  "edit_item" => __( "Edit Bioderma", "custom-post-type-ui" ),
  "new_item" => __( "New Bioderma", "custom-post-type-ui" ),
  "view_item" => __( "View Bioderma", "custom-post-type-ui" ),
  "view_items" => __( "View Bioderma", "custom-post-type-ui" ),
  "search_items" => __( "Search Bioderma", "custom-post-type-ui" ),
  "not_found" => __( "No Bioderma found", "custom-post-type-ui" ),
  "not_found_in_trash" => __( "No Bioderma found in trash", "custom-post-type-ui" ),
  "parent" => __( "Parent Bioderma:", "custom-post-type-ui" ),
  "featured_image" => __( "Featured image for this Bioderma", "custom-post-type-ui" ),
  "set_featured_image" => __( "Set featured image for this Bioderma", "custom-post-type-ui" ),
  "remove_featured_image" => __( "Remove featured image for this Bioderma", "custom-post-type-ui" ),
  "use_featured_image" => __( "Use as featured image for this Bioderma", "custom-post-type-ui" ),
  "archives" => __( "Bioderma archives", "custom-post-type-ui" ),
  "insert_into_item" => __( "Insert into Bioderma", "custom-post-type-ui" ),
  "uploaded_to_this_item" => __( "Upload to this Bioderma", "custom-post-type-ui" ),
  "filter_items_list" => __( "Filter Bioderma list", "custom-post-type-ui" ),
  "items_list_navigation" => __( "Bioderma list navigation", "custom-post-type-ui" ),
  "items_list" => __( "Bioderma list", "custom-post-type-ui" ),
  "attributes" => __( "Bioderma attributes", "custom-post-type-ui" ),
  "name_admin_bar" => __( "Bioderma", "custom-post-type-ui" ),
  "item_published" => __( "Bioderma published", "custom-post-type-ui" ),
  "item_published_privately" => __( "Bioderma published privately.", "custom-post-type-ui" ),
  "item_reverted_to_draft" => __( "Bioderma reverted to draft.", "custom-post-type-ui" ),
  "item_scheduled" => __( "Bioderma scheduled", "custom-post-type-ui" ),
  "item_updated" => __( "Bioderma updated.", "custom-post-type-ui" ),
  "parent_item_colon" => __( "Parent Bioderma:", "custom-post-type-ui" ),
];

$args = [
  "label" => __( "Bioderma", "custom-post-type-ui" ),
  "labels" => $labels,
  "description" => "",
  "public" => true,
  "publicly_queryable" => true,
  "show_ui" => true,
  "show_in_rest" => true,
  "rest_base" => "",
  "rest_controller_class" => "WP_REST_Posts_Controller",
  "has_archive" => true,
  "show_in_menu" => true,
  "show_in_nav_menus" => true,
  "delete_with_user" => false,
  "exclude_from_search" => false,
  "capability_type" => "post",
  "map_meta_cap" => true,
  "hierarchical" => true,
  "rewrite" => [ "slug" => "bioderma", "with_front" => true ],
  "query_var" => true,
  "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
  "show_in_graphql" => false,
];

register_post_type( "bioderma", $args );
}

add_action( 'init', 'cptui_register_my_cpts_bioderma' );
