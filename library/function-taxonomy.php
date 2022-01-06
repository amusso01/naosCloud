<?php 

		



function cptui_register_my_cpts() {

	/**
	 * Post Type: Bioderma.
	 */

	$labels = [
		"name" => __( "Bioderma", "custom-post-type-ui" ),
		"singular_name" => __( "Bioderma", "custom-post-type-ui" ),
		"menu_name" => __( "Bioderma", "custom-post-type-ui" ),
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
    'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg data-name="brand 3" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path xmlns="http://www.w3.org/2000/svg" data-name="svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NjciIGhlaWdodD0iMTE1IiB2aWV3Qm94PSIwIDAgMTg5IDM4IiBjbGFzcz0iYnJhbmQtaW1" d="M22.337 16.265c1.622-.72 3.054-1.932 3.054-3.743A4.125 4.125 0 0022.429 8.4a16 16 0 00-5.189-.679h-6.55a4.8 4.8 0 01.611 2.67v15.1a4.488 4.488 0 01-.631 2.789h7.086a17.328 17.328 0 006.02-.961 5.346 5.346 0 003.274-5.165c0-3.5-2.788-5.109-4.712-5.888zM15.003 9.08c.347-.02.872-.02 1.566-.02a11.747 11.747 0 012.117.181 3.3 3.3 0 012.908 3.294 2.857 2.857 0 01-2.663 2.91c-.355.05-1.35.128-1.711.128a82.91 82.91 0 01-2.217-.026V9.08zm4.415 17.691a15.636 15.636 0 01-1.846.171c-.32 0-2.145-.008-2.567-.021v-9.98c.306 0 1.573-.02 1.975-.02a13.924 13.924 0 012.063.178 4.7 4.7 0 014.069 5.122 4.342 4.342 0 01-3.694 4.55z" fill="#a7aaad"/></svg>'),
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies" => [ "bioderma_categories", "range", "product" ],
		"show_in_graphql" => false,
	];

	register_post_type( "bioderma", $args );

	/**
	 * Post Type: Institut Esthederm.
	 */

	$labels = [
		"name" => __( "Institut Esthederm", "custom-post-type-ui" ),
		"singular_name" => __( "Institut Esthederm", "custom-post-type-ui" ),
		"menu_name" => __( "Institut Esthederm", "custom-post-type-ui" ),
		"all_items" => __( "All Institut Esthederm", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Institut Esthederm", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Institut Esthederm", "custom-post-type-ui" ),
		"new_item" => __( "New Institut Esthederm", "custom-post-type-ui" ),
		"view_item" => __( "View Institut Esthederm", "custom-post-type-ui" ),
		"view_items" => __( "View Institut Esthederm", "custom-post-type-ui" ),
		"search_items" => __( "Search Institut Esthederm", "custom-post-type-ui" ),
		"not_found" => __( "No Institut Esthederm found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Institut Esthederm found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Institut Esthederm:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Institut Esthederm", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Institut Esthederm", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Institut Esthederm", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Institut Esthederm", "custom-post-type-ui" ),
		"archives" => __( "Institut Esthederm archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Institut Esthederm", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Institut Esthederm", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Institut Esthederm list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Institut Esthederm list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Institut Esthederm list", "custom-post-type-ui" ),
		"attributes" => __( "Institut Esthederm attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Institut Esthederm", "custom-post-type-ui" ),
		"item_published" => __( "Institut Esthederm published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Institut Esthederm published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Institut Esthederm reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Institut Esthederm scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Institut Esthederm updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Institut Esthederm:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Institut Esthederm", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "institut_esthederm", "with_front" => true ],
		"query_var" => true,
		'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg data-name="brand 2" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path class="rect" data-name="Path 2542" d="M5 0h26a5 5 0 015 5v26a5 5 0 01-5 5H5a5 5 0 01-5-5V5a5 5 0 015-5z" fill="none"/><g data-name="Group 889"><g data-name="Group 888" transform="translate(5.018 5.631)" clip-path="url(#clip-path)"><path data-name="Path 2402" d="M11.167.066a18.636 18.636 0 00-2.7.44C8.209.564 7.344.813 7.04.919a9.148 9.148 0 00-.891.328l-.677.283a3.361 3.361 0 00-.347.165c-.063.037-.206.1-.318.163-.292.137-.369.183-1.107.6a8.364 8.364 0 00-.871.546A14.7 14.7 0 00.463 4.972c-.422.438-.508.557-.444.591a.114.114 0 00.106-.057 2.232 2.232 0 01.275-.23c.118-.09.241-.188.275-.22s.131-.1.216-.165l.309-.223a28.758 28.758 0 011.721-1.052c.467-.251.758-.393 1.3-.632l.371-.163c.073-.033.247-.1.389-.165s.32-.124.4-.163a3.345 3.345 0 01.341-.126l.389-.128c.5-.163.962-.31 1.154-.351.09-.02.265-.063.389-.1a19.01 19.01 0 012.265-.446 25.176 25.176 0 016.337 0c.807.13 1.5.253 1.743.316l.646.163c.22.057.495.126.614.165l.422.128c.4.122.8.255.942.314.079.033.263.1.408.163s.326.128.4.165.243.1.379.163a4.788 4.788 0 01.624.287c.063.033.212.106.328.165s.261.126.318.163l.224.122c.343.181 1.311.771 1.67 1.021l.263.183c.106.075.228.165.265.2s.169.135.287.226a2.294 2.294 0 01.269.232.1.1 0 00.1.039c.075-.037-.09-.236-.73-.875a13.16 13.16 0 00-.726-.656c-.029-.018-.143-.11-.257-.2a13.947 13.947 0 00-1.345-.987l-.359-.224a21.506 21.506 0 00-.942-.546c-.13-.073-.451-.236-.614-.312a31.423 31.423 0 00-.716-.32c-.084-.033-.218-.09-.3-.126s-.228-.092-.328-.126-.253-.088-.338-.124a17.369 17.369 0 00-1.948-.575 27.297 27.297 0 00-1.464-.281 21.1 21.1 0 00-3.136-.206c-.536 0-1.223.022-1.79.079M6.443 14.887v6.895l6.645-.02 6.645-.02v-2.288l-5.142-.039c-2.828-.022-5.15-.047-5.16-.057a33.383 33.383 0 01.053-3.489c.039-.024 2.1-.045 4.583-.043a45.191 45.191 0 004.612-.084 5.871 5.871 0 00.01-2.182A38.078 38.078 0 0014 13.466H9.412v-1.567c0-.86 0-1.57.02-1.57s2.247-.035 4.969-.057l4.952-.039v-2.2L12.9 8.01l-6.455-.02z" fill-rule="evenodd"/></g></g></svg>'),
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies" => [ "institut_esthederm", "range", "product" ],
		"show_in_graphql" => false,
	];

	register_post_type( "institut_esthederm", $args );

	/**
	 * Post Type: Etat Pur.
	 */

	$labels = [
		"name" => __( "Etat Pur", "custom-post-type-ui" ),
		"singular_name" => __( "Etat Pur", "custom-post-type-ui" ),
		"menu_name" => __( "Etat Pur", "custom-post-type-ui" ),
		"all_items" => __( "All Etat Pur", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Etat Pur", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Etat Pur", "custom-post-type-ui" ),
		"new_item" => __( "New Etat Pur", "custom-post-type-ui" ),
		"view_item" => __( "View Etat Pur", "custom-post-type-ui" ),
		"view_items" => __( "View Etat Pur", "custom-post-type-ui" ),
		"search_items" => __( "Search Etat Pur", "custom-post-type-ui" ),
		"not_found" => __( "No Etat Pur found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Etat Pur found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Etat Pur:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Etat Pur", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Etat Pur", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Etat Pur", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Etat Pur", "custom-post-type-ui" ),
		"archives" => __( "Etat Pur archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Etat Pur", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Etat Pur", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Etat Pur list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Etat Pur list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Etat Pur list", "custom-post-type-ui" ),
		"attributes" => __( "Etat Pur attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Etat Pur", "custom-post-type-ui" ),
		"item_published" => __( "Etat Pur published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Etat Pur published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Etat Pur reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Etat Pur scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Etat Pur updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Etat Pur:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Etat Pur", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "etat_pur", "with_front" => true ],
		"query_var" => true,
		'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg data-name="brand 3" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g data-name="Group 914"><g data-name="Group 913" clip-path="url(#clip-path)" fill="#00417a" transform="translate(9.665 7.033)"><path data-name="Path 2431" d="M5.685 0a2.566 2.566 0 002.573 2.75c1.585.1 2.682-.905 2.991-2.75h1.113A3.408 3.408 0 019.23 3.676C6.681 3.976 4.988 3 4.484.945 4.407.633 4.356.315 4.293 0z"/><path data-name="Path 2432" d="M16.661 13.971H1.337a7.1 7.1 0 004.85 7.377 7.209 7.209 0 008.419-2.862c.351-.541.525-1.433 1.507-.81-.965 3.645-5.155 5.794-9.5 4.869C2.085 21.58-.6 17.386.116 12.414A8.7 8.7 0 019.46 5.29c4.352.384 7.4 3.964 7.2 8.681m-1.283-.958c.248-3.437-2.765-6.507-6.431-6.623C4.8 6.259 1.31 9.296 1.391 13.014z"/></g></g></svg>'),
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"taxonomies" => [ "etat_pur_categories", "range", "product" ],
		"show_in_graphql" => false,
	];

	register_post_type( "etat_pur", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Bioderma Categories.
	 */

	$labels = [
		"name" => __( "Bioderma Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Category", "custom-post-type-ui" ),
		"menu_name" => __( "Bioderma Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Bioderma Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Category", "custom-post-type-ui" ),
		"view_item" => __( "View Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Bioderma Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Bioderma Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Bioderma Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Bioderma Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Bioderma Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Bioderma Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Bioderma Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Bioderma Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Bioderma Categories list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Bioderma Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Bioderma Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'bioderma_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "bioderma_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bioderma_categories", [ "bioderma" ], $args );

	/**
	 * Taxonomy: Institut Esthederm Categories.
	 */

	$labels = [
		"name" => __( "Institut Esthederm Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Institut Esthederm Category", "custom-post-type-ui" ),
		"menu_name" => __( "Institut Esthederm Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Institut Esthederm Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Institut Esthederm Category", "custom-post-type-ui" ),
		"view_item" => __( "View Institut Esthederm Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Institut Esthederm Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Institut Esthederm Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Institut Esthederm Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Institut Esthederm Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Institut Esthederm Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Institut Esthederm Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Institut Esthederm Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Institut Esthederm Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Institut Esthederm Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Institut Esthederm Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Institut Esthederm Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Institut Esthederm Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Institut Esthederm Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Institut Esthederm Categories list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Institut Esthederm Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Institut Esthederm Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'institut_esthederm', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "institut_esthederm",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "institut_esthederm", [ "institut_esthederm" ], $args );

	/**
	 * Taxonomy: Etat Pur Categories.
	 */

	$labels = [
		"name" => __( "Etat Pur Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Etat Pur Category", "custom-post-type-ui" ),
		"menu_name" => __( "Etat Pur Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Etat Pur Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Etat Pur Category", "custom-post-type-ui" ),
		"view_item" => __( "View Etat Pur Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Etat Pur Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Etat Pur Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Etat Pur Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Etat Pur Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Etat Pur Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Etat Pur Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Etat Pur Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Etat Pur Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Etat Pur Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Etat Pur Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Etat Pur Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Etat Pur Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Etat Pur Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Etat Pur Categories list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Etat Pur Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Etat Pur Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'etat_pur_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "etat_pur_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "etat_pur_categories", [ "etat_pur" ], $args );

	/**
	 * Taxonomy: Range.
	 */

	$labels = [
		"name" => __( "Range", "custom-post-type-ui" ),
		"singular_name" => __( "Range", "custom-post-type-ui" ),
		"menu_name" => __( "Range", "custom-post-type-ui" ),
		"all_items" => __( "All Range", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Range", "custom-post-type-ui" ),
		"view_item" => __( "View Range", "custom-post-type-ui" ),
		"update_item" => __( "Update Range name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Range", "custom-post-type-ui" ),
		"new_item_name" => __( "New Range name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Range", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Range:", "custom-post-type-ui" ),
		"search_items" => __( "Search Range", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Range", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Range with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Range", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Range", "custom-post-type-ui" ),
		"not_found" => __( "No Range found", "custom-post-type-ui" ),
		"no_terms" => __( "No Range", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Range list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Range list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Range", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Range", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => range,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'range', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "range",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "range", [ "bioderma", "institut_esthederm", "etat_pur" ], $args );

	/**
	 * Taxonomy: Products.
	 */

	$labels = [
		"name" => __( "Products", "custom-post-type-ui" ),
		"singular_name" => __( "Product", "custom-post-type-ui" ),
		"menu_name" => __( "Products", "custom-post-type-ui" ),
		"all_items" => __( "All Products", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Product", "custom-post-type-ui" ),
		"view_item" => __( "View Product", "custom-post-type-ui" ),
		"update_item" => __( "Update Product name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Product", "custom-post-type-ui" ),
		"new_item_name" => __( "New Product name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Product", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Product:", "custom-post-type-ui" ),
		"search_items" => __( "Search Products", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Products", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Products with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Products", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Products", "custom-post-type-ui" ),
		"not_found" => __( "No Products found", "custom-post-type-ui" ),
		"no_terms" => __( "No Products", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Products list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Products list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Products", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Products", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product", [ "bioderma", "institut_esthederm", "etat_pur" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


