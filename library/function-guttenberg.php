<?php 

/*==================================================================================
Register color paette for guttenberg
==================================================================================*/
function ea_setup() {
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Blue', 'ea-starter' ),
			'slug'  => 'blue',
			'color'	=> '#043f4d',
		),
		array(
			'name'  => __( 'Yellow', 'ea-starter' ),
			'slug'  => 'yellow',
			'color' => '#F8B41E',
		),
	) );
}
add_action( 'after_setup_theme', 'ea_setup' );


/*==================================================================================
Allow certain block on Guttenberg
==================================================================================*/
 
/* function misha_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'acf/fd-greybgtext',
		'acf/fd-sharetitle',
		'acf/fd-bluebg',
		'acf/fd-button',
		'acf/fd-teamcard',
		'acf/fd-imagetext',
		'acf/mediatextareablock',
		'core/image',
		'core/separator',
		'core/spacer',
		'core/paragraph',
		'core/heading',
		'core/list'
	);
 
}

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );*/


/*==================================================================================
Register new category in guttenberg block
==================================================================================*/

function my_foundry_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'fd-category',
				'title' => __( 'FD Category', 'fd-category' ),
			),
		)
	);
}
add_filter( 'block_categories', 'my_foundry_category', 10, 2);

/*==================================================================================
LOAD CUSTOM ACF-GUTENBERG-BLOCKS
==================================================================================*/

require get_template_directory().'/template-parts/blocks/block-accordion.php';