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
    "taxonomies" => [ "bioderma_categories", "range_bioderma", "product_bioderma" ],
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
		"taxonomies" => [ "institut_esthederm", "range_institut", "product_institut" ],
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
    "taxonomies" => [ "etat_pur_categories", "range_etat", "product_etat" ],
		"show_in_graphql" => false,
	];

	register_post_type( "etat_pur", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

// HOW TO VIDEO
function cptui_register_my_cpts_how_to_video() {

	/**
	 * Post Type: How to video.
	 */

	$labels = [
		"name" => __( "How to video", "custom-post-type-ui" ),
		"singular_name" => __( "How to video", "custom-post-type-ui" ),
		"menu_name" => __( "How to video", "custom-post-type-ui" ),
		"all_items" => __( "All How to video", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new How to video", "custom-post-type-ui" ),
		"edit_item" => __( "Edit How to video", "custom-post-type-ui" ),
		"new_item" => __( "New How to video", "custom-post-type-ui" ),
		"view_item" => __( "View How to video", "custom-post-type-ui" ),
		"view_items" => __( "View How to video", "custom-post-type-ui" ),
		"search_items" => __( "Search How to video", "custom-post-type-ui" ),
		"not_found" => __( "No How to video found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No How to video found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent How to video:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this How to video", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this How to video", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this How to video", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this How to video", "custom-post-type-ui" ),
		"archives" => __( "How to video archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into How to video", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this How to video", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter How to video list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "How to video list navigation", "custom-post-type-ui" ),
		"items_list" => __( "How to video list", "custom-post-type-ui" ),
		"attributes" => __( "How to video attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "How to video", "custom-post-type-ui" ),
		"item_published" => __( "How to video published", "custom-post-type-ui" ),
		"item_published_privately" => __( "How to video published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "How to video reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "How to video scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "How to video updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent How to video:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "How to video", "custom-post-type-ui" ),
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
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "how_to_video", "with_front" => true ],
		"query_var" => true,
    'menu_icon' => 'dashicons-editor-video',
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "how_to_video", $args );
}

add_action( 'init', 'cptui_register_my_cpts_how_to_video' );


// NAOS DOWNLOAD
function cptui_register_my_cpts_naos_download() {

	/**
	 * Post Type: Naos.
	 */

	$labels = [
		"name" => __( "Naos", "custom-post-type-ui" ),
		"singular_name" => __( "Naos", "custom-post-type-ui" ),
		"menu_name" => __( "Naos", "custom-post-type-ui" ),
		"all_items" => __( "All Naos", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Naos", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Naos", "custom-post-type-ui" ),
		"new_item" => __( "New Naos", "custom-post-type-ui" ),
		"view_item" => __( "View Naos", "custom-post-type-ui" ),
		"view_items" => __( "View Naos", "custom-post-type-ui" ),
		"search_items" => __( "Search Naos", "custom-post-type-ui" ),
		"not_found" => __( "No Naos found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Naos found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Naos:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Naos", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Naos", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Naos", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Naos", "custom-post-type-ui" ),
		"archives" => __( "Naos archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Naos", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Naos", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Naos list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Naos list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Naos list", "custom-post-type-ui" ),
		"attributes" => __( "Naos attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Naos", "custom-post-type-ui" ),
		"item_published" => __( "Naos published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Naos published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Naos reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Naos scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Naos updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Naos:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Naos", "custom-post-type-ui" ),
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
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "naos_download", "with_front" => true ],
		"query_var" => true,
    'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg data-name="Component 28 – 108" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path data-name="Path 2430" d="M25.169 8.658a.767.767 0 01.205.546v17.481a.82.82 0 01-.847.874.872.872 0 01-.369-.082.972.972 0 01-.287-.191L12.154 11.499v15.322a.69.69 0 01-.232.519.755.755 0 01-.533.218.739.739 0 01-.546-.218.708.708 0 01-.218-.519V9.259a.772.772 0 01.792-.819.758.758 0 01.656.3l11.771 15.869V9.205a.746.746 0 01.765-.765.732.732 0 01.56.218" fill="#2d2d2d"></path></svg>'),
		"menu_position" => 20,
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"taxonomies" => [ "naos_categories" ],
		"show_in_graphql" => false,
	];

	register_post_type( "naos_download", $args );
}

add_action( 'init', 'cptui_register_my_cpts_naos_download' );




// NAOS CATEGORIES TAXONOMY
function cptui_register_my_taxes_naos_categories() {

	/**
	 * Taxonomy: Naos Categories.
	 */

	$labels = [
		"name" => __( "Naos Categories", "custom-post-type-ui" ),
		"singular_name" => __( "Naos Category", "custom-post-type-ui" ),
		"menu_name" => __( "Naos Categories", "custom-post-type-ui" ),
		"all_items" => __( "All Naos Categories", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Naos Category", "custom-post-type-ui" ),
		"view_item" => __( "View Naos Category", "custom-post-type-ui" ),
		"update_item" => __( "Update Naos Category name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Naos Category", "custom-post-type-ui" ),
		"new_item_name" => __( "New Naos Category name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Naos Category", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Naos Category:", "custom-post-type-ui" ),
		"search_items" => __( "Search Naos Categories", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Naos Categories", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Naos Categories with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Naos Categories", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Naos Categories", "custom-post-type-ui" ),
		"not_found" => __( "No Naos Categories found", "custom-post-type-ui" ),
		"no_terms" => __( "No Naos Categories", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Naos Categories list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Naos Categories list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Naos Categories", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Naos Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'naos_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "naos_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "naos_categories", [ "naos_download" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_naos_categories' );




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
		"rewrite" => [ 'slug' => 'institut_esthederm_categories', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "institut_esthederm_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "institut_esthederm_categories", [ "institut_esthederm" ], $args );

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

}
add_action( 'init', 'cptui_register_my_taxes' );


function cptui_register_my_taxes_range_bioderma() {

	/**
	 * Taxonomy: Range Bioderma.
	 */

	$labels = [
		"name" => __( "Range Bioderma", "custom-post-type-ui" ),
		"singular_name" => __( "Range Bioderma", "custom-post-type-ui" ),
		"menu_name" => __( "Range Bioderma", "custom-post-type-ui" ),
		"all_items" => __( "All Range Bioderma", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Range Bioderma", "custom-post-type-ui" ),
		"view_item" => __( "View Range Bioderma", "custom-post-type-ui" ),
		"update_item" => __( "Update Range Bioderma name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Range Bioderma", "custom-post-type-ui" ),
		"new_item_name" => __( "New Range Bioderma name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Range Bioderma", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Range Bioderma:", "custom-post-type-ui" ),
		"search_items" => __( "Search Range Bioderma", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Range Bioderma", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Range Bioderma with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Range Bioderma", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Range Bioderma", "custom-post-type-ui" ),
		"not_found" => __( "No Range Bioderma found", "custom-post-type-ui" ),
		"no_terms" => __( "No Range Bioderma", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Range Bioderma list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Range Bioderma list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Range Bioderma", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Range Bioderma", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'range_bioderma', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "range_bioderma",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "range_bioderma", [ "bioderma" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_range_bioderma' );


function cptui_register_my_taxes_range_institut() {

	/**
	 * Taxonomy: Range Institut.
	 */

	$labels = [
		"name" => __( "Range Institut", "custom-post-type-ui" ),
		"singular_name" => __( "Range Institut", "custom-post-type-ui" ),
		"menu_name" => __( "Range Institut", "custom-post-type-ui" ),
		"all_items" => __( "All Range Institut", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Range Institut", "custom-post-type-ui" ),
		"view_item" => __( "View Range Institut", "custom-post-type-ui" ),
		"update_item" => __( "Update Range Institut name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Range Institut", "custom-post-type-ui" ),
		"new_item_name" => __( "New Range Institut name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Range Institut", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Range Institut:", "custom-post-type-ui" ),
		"search_items" => __( "Search Range Institut", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Range Institut", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Range Institut with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Range Institut", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Range Institut", "custom-post-type-ui" ),
		"not_found" => __( "No Range Institut found", "custom-post-type-ui" ),
		"no_terms" => __( "No Range Institut", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Range Institut list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Range Institut list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Range Institut", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Range Institut", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'range_institut', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "range_institut",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "range_institut", [ "institut_esthederm" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_range_institut' );


function cptui_register_my_taxes_range_etat() {

	/**
	 * Taxonomy: Range Etat Pur.
	 */

	$labels = [
		"name" => __( "Range Etat Pur", "custom-post-type-ui" ),
		"singular_name" => __( "Range Etat Pur", "custom-post-type-ui" ),
		"menu_name" => __( "Range Etat Pur", "custom-post-type-ui" ),
		"all_items" => __( "All Range Etat Pur", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Range Etat Pur", "custom-post-type-ui" ),
		"view_item" => __( "View Range Etat Pur", "custom-post-type-ui" ),
		"update_item" => __( "Update Range Etat Pur name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Range Etat Pur", "custom-post-type-ui" ),
		"new_item_name" => __( "New Range Etat Pur name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Range Etat Pur", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Range Etat Pur:", "custom-post-type-ui" ),
		"search_items" => __( "Search Range Etat Pur", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Range Etat Pur", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Range Etat Pur with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Range Etat Pur", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Range Etat Pur", "custom-post-type-ui" ),
		"not_found" => __( "No Range Etat Pur found", "custom-post-type-ui" ),
		"no_terms" => __( "No Range Etat Pur", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Range Etat Pur list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Range Etat Pur list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Range Etat Pur", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Range Etat Pur", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'range_etat', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "range_etat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "range_etat", [ "etat_pur" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_range_etat' );


function cptui_register_my_taxes_product_bioderma() {

	/**
	 * Taxonomy: Product Bioderma.
	 */

	$labels = [
		"name" => __( "Product Bioderma", "custom-post-type-ui" ),
		"singular_name" => __( "Product Bioderma", "custom-post-type-ui" ),
		"menu_name" => __( "Product Bioderma", "custom-post-type-ui" ),
		"all_items" => __( "All Product Bioderma", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Product Bioderma", "custom-post-type-ui" ),
		"view_item" => __( "View Product Bioderma", "custom-post-type-ui" ),
		"update_item" => __( "Update Product Bioderma name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Product Bioderma", "custom-post-type-ui" ),
		"new_item_name" => __( "New Product Bioderma name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Product Bioderma", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Product Bioderma:", "custom-post-type-ui" ),
		"search_items" => __( "Search Product Bioderma", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Product Bioderma", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Product Bioderma with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Product Bioderma", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Product Bioderma", "custom-post-type-ui" ),
		"not_found" => __( "No Product Bioderma found", "custom-post-type-ui" ),
		"no_terms" => __( "No Product Bioderma", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Product Bioderma list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Product Bioderma list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Product Bioderma", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Product Bioderma", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_bioderma', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_bioderma",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_bioderma", [ "bioderma" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_bioderma' );


function cptui_register_my_taxes_product_institut() {

	/**
	 * Taxonomy: Product Institut.
	 */

	$labels = [
		"name" => __( "Product Institut", "custom-post-type-ui" ),
		"singular_name" => __( "Product Institut", "custom-post-type-ui" ),
		"menu_name" => __( "Product Institut", "custom-post-type-ui" ),
		"all_items" => __( "All Product Institut", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Product Institut", "custom-post-type-ui" ),
		"view_item" => __( "View Product Institut", "custom-post-type-ui" ),
		"update_item" => __( "Update Product Institut name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Product Institut", "custom-post-type-ui" ),
		"new_item_name" => __( "New Product Institut name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Product Institut", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Product Institut:", "custom-post-type-ui" ),
		"search_items" => __( "Search Product Institut", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Product Institut", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Product Institut with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Product Institut", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Product Institut", "custom-post-type-ui" ),
		"not_found" => __( "No Product Institut found", "custom-post-type-ui" ),
		"no_terms" => __( "No Product Institut", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Product Institut list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Product Institut list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Product Institut", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Product Institut", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_institut', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_institut",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_institut", [ "institut_esthederm" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_institut' );


function cptui_register_my_taxes_product_etat() {

	/**
	 * Taxonomy: Product Etat Pur.
	 */

	$labels = [
		"name" => __( "Product Etat Pur", "custom-post-type-ui" ),
		"singular_name" => __( "Product Etat Pur", "custom-post-type-ui" ),
		"menu_name" => __( "Product Etat Pur", "custom-post-type-ui" ),
		"all_items" => __( "All Product Etat Pur", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Product Etat Pur", "custom-post-type-ui" ),
		"view_item" => __( "View Product Etat Pur", "custom-post-type-ui" ),
		"update_item" => __( "Update Product Etat Pur name", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Product Etat Pur", "custom-post-type-ui" ),
		"new_item_name" => __( "New Product Etat Pur name", "custom-post-type-ui" ),
		"parent_item" => __( "Parent Product Etat Pur", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Product Etat Pur:", "custom-post-type-ui" ),
		"search_items" => __( "Search Product Etat Pur", "custom-post-type-ui" ),
		"popular_items" => __( "Popular Product Etat Pur", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separate Product Etat Pur with commas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Add or remove Product Etat Pur", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Choose from the most used Product Etat Pur", "custom-post-type-ui" ),
		"not_found" => __( "No Product Etat Pur found", "custom-post-type-ui" ),
		"no_terms" => __( "No Product Etat Pur", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Product Etat Pur list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Product Etat Pur list", "custom-post-type-ui" ),
		"back_to_items" => __( "Back to Product Etat Pur", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Product Etat Pur", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_etat', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_etat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_etat", [ "etat_pur" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_etat' );
