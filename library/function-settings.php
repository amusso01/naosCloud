<?php
/**
 * Setup
 * @author Andrea Musso
 *
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

 /*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 hide core-updates for non-admins
    2.3 reset inline image dimensions (for css-scaling of images)
    2.4 disable backend-theme-editor
	2.5 Add Page Slug to Body
	2.6 Login page customization
==================================================================================*/


if ( ! function_exists( 'foundry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	/*==================================================================================
	1.0 THEME SETTINGS
	==================================================================================*/


	/* 1.1 ENQUEUE SCRIPTS/STYLES
	/––––––––––––––––---––––––––*/
	if ( ! function_exists( 'foundry_asset_path' ) ) :
		function foundry_asset_path( $filename ) {
	
			$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/manifest.json';
	
			if ( file_exists( $manifest_path ) ) {
				$manifest = json_decode( file_get_contents( $manifest_path ), true );
			} else {
				$manifest = [];
			}
	
			if ( array_key_exists( $filename, $manifest ) ) {
				return $manifest[ $filename ];
			}
			return $filename;
		}
	endif;
	function foundry_scripts() {
		
		// Deregister guttenberg style
		global $load_default_block_styles;
		if (!$load_default_block_styles) :
		wp_dequeue_style( 'wp-block-library' );
		endif;

		// STYLE

		wp_register_style( 'root-styles', get_template_directory_uri() . '/dist/styles/root.css', array(), '1.0', 'all'  );
	
		wp_register_style( 'foundry-styles', get_template_directory_uri() . '/dist/styles/' . foundry_asset_path( 'main.css' ), array('root-styles'), '1.0', 'all' );
		wp_enqueue_style( 'foundry-styles' );
		
		// SCRIPT
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'foundry-js', get_template_directory_uri() . '/dist/scripts/' . foundry_asset_path( 'main.js' ), array(), '1.0', true );
		wp_enqueue_script( 'foundry-js' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'foundry_scripts' );

	/* 1.2 THEME SUPPORT
	/––––––––––––––––––––––––*/
	function foundry_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on foundry, use a find and replace
			* to change 'foundry' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'foundry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/* Gutenberg -> enable wide images
		/––––––––––––––––––––––––*/
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'foundry_setup' );



/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/

/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function wpseed_wphead_cleanup () {
	// remove the generator meta tag
	remove_action('wp_head', 'wp_generator');
	// remove wlwmanifest link
	remove_action('wp_head', 'wlwmanifest_link');
	// remove RSD API connection
	remove_action('wp_head', 'rsd_link');
	// remove wp shortlink support
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// remove next/previous links (this is not affecting blog-posts)
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	// remove generator name from RSS
	add_filter('the_generator', '__return_false');
	// disable emoji support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	// disable automatic feeds
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 2);
	// remove rest API link
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
	// remove oEmbed link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('wp_head', 'wp_oembed_add_host_js');
  }
  add_action('after_setup_theme', 'wpseed_wphead_cleanup');

  /* 2.2 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
	if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );

/* 2.3 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.4 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/* 2.5 ADD PAGE SLUG TO BODY CLASS
/–––––––––––––––––––––––––––––––––*/
// Add Page Slug to Body Class to make router.js work
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	  $classes[] =  $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' ); 



/* 2.6 LOGIN PAGE
/–––––––––––––––––––––––––––––––––*/
// Customize Logo URL.
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
    return site_url( '/' );
}

// Style login page
function we_login_logo() { 
	GLOBAL $gFontUrl;
	GLOBAL $fontFamily;
	GLOBAL $customLogo;
	GLOBAL $mainColor;
    ?>
	<style type="text/css">
	<?php if($gFontUrl): ?>
		@import url('<?php echo $gFontUrl ?>');
	<?php endif; ?>

		body{
		<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
		<?php endif; ?>
		}
	
    #login h1 a, .login h1 a {
      background-image: url("data:image/svg+xml,%3Csvg id='Layer_1' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 224.2 63.57'%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:none;%7D.cls-2%7Bopacity:0.55;%7D.cls-3%7Bclip-path:url(%23clip-path);%7D.cls-4%7Bclip-path:url(%23clip-path-2);%7D.cls-5%7Bfill:%23ffb400;%7D.cls-6%7Bopacity:0.6;%7D.cls-7%7Bclip-path:url(%23clip-path-3);%7D.cls-8%7Bclip-path:url(%23clip-path-4);%7D.cls-9%7Bfill:%230b242e;%7D.cls-10%7Bisolation:isolate;%7D.cls-11%7Bfill:%23848484;%7D%3C/style%3E%3CclipPath id='clip-path'%3E%3Crect class='cls-1' width='46.74' height='46.75'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-2'%3E%3Crect class='cls-1' x='0.01' y='0.01' width='46.73' height='46.73'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-3'%3E%3Crect class='cls-1' x='8.56' y='8.56' width='29.62' height='29.62'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-4'%3E%3Crect class='cls-1' x='8.56' y='8.56' width='29.62' height='29.62'/%3E%3C/clipPath%3E%3C/defs%3E%3Cg id='Group_1056' data-name='Group 1056'%3E%3Cg id='Group_1050' data-name='Group 1050' class='cls-2'%3E%3Cg id='Group_1049' data-name='Group 1049'%3E%3Cg class='cls-3'%3E%3Cg id='Group_1048' data-name='Group 1048'%3E%3Cg id='Group_1047' data-name='Group 1047'%3E%3Cg class='cls-4'%3E%3Cg id='Group_1046' data-name='Group 1046'%3E%3Cpath id='Path_2480' data-name='Path 2480' class='cls-5' d='M23.37,38.18a23.27,23.27,0,0,0,22.86,8,23.27,23.27,0,0,0-8-22.86,23.28,23.28,0,0,0,8-22.86A23.25,23.25,0,0,0,23.37,8.56,23.28,23.28,0,0,0,.51.51,23.26,23.26,0,0,0,6.81,21.8c.57.56,1.15,1.09,1.75,1.58-.6.49-1.18,1-1.75,1.58A23.25,23.25,0,0,0,.51,46.24a23.27,23.27,0,0,0,22.86-8.05'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cg id='Group_1055' data-name='Group 1055' class='cls-6'%3E%3Cg id='Group_1054' data-name='Group 1054'%3E%3Cg class='cls-7'%3E%3Cg id='Group_1053' data-name='Group 1053'%3E%3Cg id='Group_1052' data-name='Group 1052'%3E%3Cg class='cls-8'%3E%3Cg id='Group_1051' data-name='Group 1051'%3E%3Cpath id='Path_2481' data-name='Path 2481' class='cls-5' d='M38.18,23.37a23.15,23.15,0,0,0-10-4.76,23.14,23.14,0,0,0-4.76-10,23.26,23.26,0,0,0-4.76,10,23.15,23.15,0,0,0-10,4.76,23,23,0,0,0,10,4.76,23.15,23.15,0,0,0,4.76,10.05,23.15,23.15,0,0,0,4.76-10,23,23,0,0,0,10.05-4.76'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cpath id='Path_2482' data-name='Path 2482' class='cls-5' d='M28.13,18.61a24.6,24.6,0,0,0-9.52,0,24.6,24.6,0,0,0,0,9.52,24.6,24.6,0,0,0,9.52,0,24.6,24.6,0,0,0,0-9.52'/%3E%3Cpath id='Path_2483' data-name='Path 2483' class='cls-9' d='M86.39,32.57V12.36a1.57,1.57,0,0,1,1.16-1.58,1.55,1.55,0,0,1,1.72.78,1.87,1.87,0,0,1,.17,1V36.2c0,.18,0,.35,0,.52a1.53,1.53,0,0,1-2.35,1.37,4.81,4.81,0,0,1-1.43-1.48L70.93,17.78,69.53,16c-.17.18-.1.36-.1.53V36.73a1.47,1.47,0,0,1-1.32,1.61h-.28a1.54,1.54,0,0,1-1.44-1.47V12.67a1.66,1.66,0,0,1,1-1.72,2.07,2.07,0,0,1,2.3.44c.55.61,1,1.27,1.54,1.91L85.9,32a1.61,1.61,0,0,0,.5.54'/%3E%3Cpath id='Path_2484' data-name='Path 2484' class='cls-9' d='M169.8,38.62a13.39,13.39,0,0,1-9.64-3.79,13.52,13.52,0,0,1-3.94-7.4,14.39,14.39,0,0,1,1-8.87,13.16,13.16,0,0,1,9.9-7.82,13.8,13.8,0,0,1,9.91,1.63,13.28,13.28,0,0,1,6.36,9,14.16,14.16,0,0,1-1.09,9.45,13.19,13.19,0,0,1-9.71,7.51,11.5,11.5,0,0,1-2.81.26m10.71-13.86a16.79,16.79,0,0,0-.23-2.45,10.6,10.6,0,0,0-9.06-8.83A10.16,10.16,0,0,0,162.81,16a10.63,10.63,0,0,0-3.5,7,11.34,11.34,0,0,0,3.48,10,10.55,10.55,0,0,0,12.54,1.25,11,11,0,0,0,5.18-9.48'/%3E%3Cpath id='Path_2485' data-name='Path 2485' class='cls-9' d='M123.91,31h-7a.57.57,0,0,0-.62.41c-.86,2-1.75,3.92-2.62,5.88a1.54,1.54,0,0,1-1.28,1,1.47,1.47,0,0,1-1.5-2.19c.76-1.68,1.53-3.37,2.3-5L121.93,12a2.09,2.09,0,0,1,1.88-1.41,2,2,0,0,1,2.18,1.3c.72,1.54,1.42,3.1,2.13,4.65l6.81,14.88c.68,1.46,1.35,2.93,2,4.4a1.71,1.71,0,0,1,0,1.91,1.54,1.54,0,0,1-2.17.26,1.48,1.48,0,0,1-.47-.61c-.38-.72-.69-1.48-1-2.22-.58-1.27-1.17-2.53-1.73-3.81a.56.56,0,0,0-.6-.39c-2.34,0-4.69,0-7,0M124,14.49c-.18,0-.18.16-.23.25q-2.94,6.54-5.89,13.07c-.15.33,0,.33.22.33q5.8,0,11.61,0c.34,0,.41-.05.26-.39q-1.8-3.93-3.56-7.88L124,14.49'/%3E%3Cpath id='Path_2486' data-name='Path 2486' class='cls-9' d='M214.81,38.56a16,16,0,0,1-10.33-3.7,1.53,1.53,0,0,1-.19-2.15,1.49,1.49,0,0,1,2.11-.2A13,13,0,0,0,210.49,35a11.14,11.14,0,0,0,7.12.34,4.29,4.29,0,0,0,3.17-2.94,3.85,3.85,0,0,0-2.21-5,21.07,21.07,0,0,0-4.71-1.46,18.77,18.77,0,0,1-6.11-2.22,6.26,6.26,0,0,1-2.95-5.93,7.38,7.38,0,0,1,6.09-6.86A13.91,13.91,0,0,1,222.16,13a1.66,1.66,0,0,1,.92,1.8A1.52,1.52,0,0,1,221.26,16a1.4,1.4,0,0,1-.57-.26A12.6,12.6,0,0,0,217,13.85a9.87,9.87,0,0,0-5.94,0,4.23,4.23,0,0,0-3,5.2c0,.14.08.27.13.41a4.2,4.2,0,0,0,2.32,2.16,21.67,21.67,0,0,0,4.8,1.47,18.27,18.27,0,0,1,5.8,2.14,6.25,6.25,0,0,1,3,6.45c-.39,3.47-2.54,5.42-5.72,6.43a12,12,0,0,1-3.58.49'/%3E%3C/g%3E%3Cg id='CLOUD' class='cls-10'%3E%3Cg class='cls-10'%3E%3Cpath class='cls-11' d='M132.38,48.16A1,1,0,0,1,133,49a1.19,1.19,0,0,1-.29,1,.83.83,0,0,1-.64.4,1.42,1.42,0,0,1-.81-.17,6.82,6.82,0,0,0-1.39-.55,5.74,5.74,0,0,0-1.55-.21,6.09,6.09,0,0,0-2.36.44,5.25,5.25,0,0,0-3,3.08,6.77,6.77,0,0,0-.4,2.39,6.86,6.86,0,0,0,.44,2.57,5.42,5.42,0,0,0,1.2,1.88A5,5,0,0,0,126,60.9a6.67,6.67,0,0,0,2.27.37,6.53,6.53,0,0,0,1.53-.18,5.9,5.9,0,0,0,1.41-.55,1.32,1.32,0,0,1,.81-.15,1,1,0,0,1,.66.4,1.22,1.22,0,0,1,.28,1,1,1,0,0,1-.58.74,8.11,8.11,0,0,1-1.26.56,9.75,9.75,0,0,1-1.41.37,8.57,8.57,0,0,1-1.44.12,8.87,8.87,0,0,1-3.14-.55,7.81,7.81,0,0,1-2.63-1.61,7.61,7.61,0,0,1-1.8-2.6,8.67,8.67,0,0,1-.67-3.52,8.45,8.45,0,0,1,.62-3.26,8,8,0,0,1,1.74-2.6A7.68,7.68,0,0,1,125,47.72a8.5,8.5,0,0,1,3.27-.61,8.62,8.62,0,0,1,2.15.27A8.94,8.94,0,0,1,132.38,48.16Z'/%3E%3Cpath class='cls-11' d='M151.35,61.09a1.17,1.17,0,0,1,.84.32,1.07,1.07,0,0,1,.34.81,1,1,0,0,1-.34.8,1.13,1.13,0,0,1-.84.32h-7.7a1.13,1.13,0,0,1-1.17-1.17V48.42a1.11,1.11,0,0,1,.34-.84,1.25,1.25,0,0,1,.9-.34,1.18,1.18,0,0,1,.82.34,1.12,1.12,0,0,1,.35.84V61.48l-.48-.39Z'/%3E%3Cpath class='cls-11' d='M176.52,55.29a9.16,9.16,0,0,1-.58,3.26,8,8,0,0,1-1.62,2.63,7.49,7.49,0,0,1-2.47,1.76,7.68,7.68,0,0,1-3.13.63,7.41,7.41,0,0,1-5.58-2.39,8,8,0,0,1-1.62-2.63,9.58,9.58,0,0,1,0-6.51,8,8,0,0,1,1.62-2.63,7.41,7.41,0,0,1,2.46-1.76,7.6,7.6,0,0,1,3.12-.64,7.68,7.68,0,0,1,3.13.64,7.35,7.35,0,0,1,2.47,1.76A8,8,0,0,1,175.94,52,9.1,9.1,0,0,1,176.52,55.29Zm-2.49,0a6.69,6.69,0,0,0-.69-3.06,5.46,5.46,0,0,0-1.87-2.13,5.16,5.16,0,0,0-5.49,0,5.25,5.25,0,0,0-1.86,2.12,7.35,7.35,0,0,0,0,6.13A5.18,5.18,0,0,0,166,60.49a5.22,5.22,0,0,0,5.49,0,5.42,5.42,0,0,0,1.87-2.14A6.63,6.63,0,0,0,174,55.29Z'/%3E%3Cpath class='cls-11' d='M197.68,47.22a1,1,0,0,1,.79.35,1.16,1.16,0,0,1,.31.82v8.72A6.63,6.63,0,0,1,198,60.4a5.86,5.86,0,0,1-2.2,2.27,6.88,6.88,0,0,1-6.48,0,6,6,0,0,1-2.23-2.27,6.63,6.63,0,0,1-.81-3.29V48.39a1.11,1.11,0,0,1,.34-.82,1.22,1.22,0,0,1,.9-.35,1.12,1.12,0,0,1,.79.35,1.09,1.09,0,0,1,.36.82v8.72a4.11,4.11,0,0,0,.54,2.13,3.92,3.92,0,0,0,1.44,1.42,3.67,3.67,0,0,0,1.9.52,4,4,0,0,0,2-.52A4.14,4.14,0,0,0,196,59.24a4,4,0,0,0,.58-2.13V48.39a1.24,1.24,0,0,1,.28-.82A1,1,0,0,1,197.68,47.22Z'/%3E%3Cpath class='cls-11' d='M216.19,47.24a6.61,6.61,0,0,1,3,.64,6.26,6.26,0,0,1,2.15,1.74,7.86,7.86,0,0,1,1.31,2.58,10.78,10.78,0,0,1,.43,3.09,10.24,10.24,0,0,1-.78,4.06,6.73,6.73,0,0,1-2.3,2.91,6.34,6.34,0,0,1-3.77,1.08h-5.61a1.13,1.13,0,0,1-1.17-1.17V48.42a1.15,1.15,0,0,1,1.17-1.18ZM216,61.14a4.11,4.11,0,0,0,2.63-.81,4.58,4.58,0,0,0,1.5-2.13,8.71,8.71,0,0,0,.47-2.91,9.33,9.33,0,0,0-.26-2.2,6,6,0,0,0-.83-1.88A4.21,4.21,0,0,0,218,49.92a4.32,4.32,0,0,0-2.08-.47h-4.35l.21-.18v12.1l-.14-.23Z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-size: 180px;
      width:100%;
      height:54px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
        }
    body.login div#login form#loginform p.submit input#wp-submit {
		
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
      display: block;
      width: 100%;
      margin-top: 10px;
      border-radius: 3px;
      border:none;
      height: 40px;
      background-color: #00455E;
      text-transform: uppercase;
      color: white;
      font-weight: 600;
      font-size: 15px;
      letter-spacing:1.5px
		}
    body.login div#login form#lostpasswordform p.submit input#wp-submit {
		
      <?php if($fontFamily): ?>
      font-family: <?php echo $fontFamily ?>!important;
      <?php endif; ?>
      display: block;
      width: 100%;
      margin-top: 10px;
      border-radius: 3px;
      border:none;
      height: 40px;
      background-color: #00455E;
      text-transform: uppercase;
      color: white;
      font-weight: 600;
      font-size: 15px;
      letter-spacing:1.5px
    }
    body.login p {
      color:#00455E;
    }
		body.login div#login .message{
			border: 2px solid <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform p.submit input#wp-submit:hover{
			background-color: #FFCC00;
      color:#00455E;
		}
    body.login div#login form#lostpasswordform p.submit input#wp-submit:hover{
			background-color: #FFCC00;
      color:#00455E;
		}
    body.login div#login p#nav a:hover {
        color: <?php echo $mainColor ?>;
        text-decoration:underline;
    }
    body.login div#login p#backtoblog a:hover {
        color: <?php echo $mainColor ?>;
        text-decoration:underline;
    }
    body.login div#login form#loginform {
	
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
      margin-top:0px;
      padding:0px;
      border:none;
      box-shadow:none;
		}
		body.login div#login form#loginform input[type="text"]:focus, body.login div#login form#loginform input[type="password"]:focus {
			border-color: <?php echo $mainColor ?>;
			box-shadow: 0 0 0 1px <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform div.wp-pwd button.button .dashicons{
			color: <?php echo $mainColor ?>;
		}
		body.login div#login form#lostpasswordform input[type="text"]:focus, body.login div#login form#loginform input[type="password"]:focus {
			border-color: <?php echo $mainColor ?>;
			box-shadow: 0 0 0 1px <?php echo $mainColor ?>;
		}
		body.login div#login form#lostpasswordform div.wp-pwd button.button .dashicons{
			color: <?php echo $mainColor ?>;
		}
/* NAOS STYLE */
<?php $bgImage = get_template_directory_uri().'/dist/images/pexels.jpg' ?>
    body.login{
      background-image:url('<?php echo $bgImage ?>');
      background-position:center center;
      background-repeat:no-repeat;
      background-size:cover;
      padding: 0 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      position:relative;
    }
    body.login:after{

      background: #00455E46 0% 0% no-repeat padding-box;
      mix-blend-mode: multiply;
      content: '';
      width:100%;
      height:100vh;
      position: absolute;
      z-index:1
    }
    body.login div#login{
      width:400px;
      background-color: white;
      border-radius: 4px;
      border: 2px solid #E8E8E8;
      padding:30px 40px;
      margin:none;
      z-index: 10;
      padding-top:55px;
      position:relative;
    }
    .helper{
      position:fixed;
      top:20px;
      left: 1rem;
      z-index: 10;
      display: flex;
      align-items: center;
      color:#072939;
      font-size:15px;
      font-weight:600;
      height:50px;
    }
    .helper svg{
      display:inline-block;
      margin-right:10px;
      
    }
    .helper:hover{
      cursor:pointer;
      color: white;
    }
    .helper:hover .helper_tooltip{
      pointer-events:all;
      opacity: 1;
    }
    .helper:hover svg path{
      stroke:#FFCC00;
    }
    .helper .helper_tooltip{
      position: absolute;
      width: 330px;
      bottom: -55px;
      left: 20px;
      background: white;
      padding: 6px 10px;
      border: 1px solid #00455E;
      font-size:13px;
      font-weight:300;
      color:#00455E;
      opacity: 0;
      pointer-events:none;
      transition:.3s;
    }
    .helper .helper_tooltip:before{
      content:'';
      position:absolute; 
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 0 10px 14px 10px;
      border-color: transparent transparent white transparent;
      border-style: inset;
      top:-13px;
      left:23px;
    }
    .helper .helper_tooltip a{
      font-weight:600;
      color:#072939;
    } 
    .login_icon_top{
      position: absolute;
      top: -50px;
      left: 50%;
      transform: translateX(-50%);
    }
    .login form .forgetmenot{
      display:none;
    }
    .login #backtoblog{
      display:none;
    }
    .login #nav{
      text-align:center;
    }
    .login #nav a{
      font-size:13px;
      letter-spacing:1.3px;
      color:#00455E;
      font-weight:600;
    }
    #loginform label{
      letter-spacing:1.3px;
      color:#00455E;
    }
    #loginform.shake .login_icon_top{
      display:none;
    }
    #lostpasswordform label{
      letter-spacing:1.3px;
      color:#00455E;
    }

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'we_login_logo' );




// ADD div HELP to login page
	
add_filter("login_footer","add_login_div_name");
function add_login_div_name(){
  echo "<div class='helper'> <svg xmlns='http://www.w3.org/2000/svg' width='27.512' height='27.512' viewBox='0 0 27.512 27.512'>
  <path id='Path_2380' data-name='Path 2380' d='M24.776,6.736l-5.012,5.012m0,8.017,5.012,5.012M11.748,11.748,6.736,6.736m5.012,13.028L6.736,24.776m21.776-9.02A12.756,12.756,0,1,1,15.756,3,12.756,12.756,0,0,1,28.512,15.756Zm-7.087,0a5.669,5.669,0,1,1-5.669-5.669,5.669,5.669,0,0,1,5.669,5.669Z' transform='translate(-2 -2)' fill='none' stroke='#fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'/>
</svg>
 Help <div class='helper_tooltip'> <p>If you don’t have a username yet, please contact <a href='mailto:support@naos-store.co.uk' >support@naos-store.co.uk</a> to get one.</p> </div>   </div>";
}

// ADD ICON IN THE FORM LOGIN
add_filter("login_form","add_login_icon_form");
function add_login_icon_form(){
  echo "<div class='login_icon_top' > <svg xmlns='http://www.w3.org/2000/svg' width='90' height='90' viewBox='0 0 90 90'>
  <g id='Group_1011' data-name='Group 1011' transform='translate(-662 -158)'>
    <g id='Ellipse_6' data-name='Ellipse 6' transform='translate(662 158)' fill='#f7f6f9' stroke='#d1d1d1' stroke-width='3'>
      <circle cx='45' cy='45' r='45' stroke='none'/>
      <circle cx='45' cy='45' r='43.5' fill='none'/>
    </g>
    <g id='svg_xml_base64_PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJJY29uIEljb24tLWFjY291bnQiIHJvbGU9InByZXNlbnRhdGlvbiIgdmlld0JveD0iMCAwIDI' data-name='svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGNsYXNzPSJJY29uIEljb24tLWFjY291bnQiIHJvbGU9InByZXNlbnRhdGlvbiIgdmlld0JveD0iMCAwIDI' transform='translate(692.246 184.253)'>
      <path id='Path_277' data-name='Path 277' d='M0,23.789A13.971,13.971,0,0,1,13.971,9.818h2.794A13.971,13.971,0,0,1,30.737,23.789' transform='translate(0 6.947)' fill='none' stroke='#043f4d' stroke-linecap='round' stroke-width='3' fill-rule='evenodd'/>
      <circle id='Ellipse_24' data-name='Ellipse 24' cx='8.383' cy='8.383' r='8.383' transform='translate(6.986 0)' fill='none' stroke='#043f4d' stroke-linecap='round' stroke-width='3'/>
    </g>
  </g>
</svg>
</div>";
}

function custome_login_btn(){
  add_filter('gettext', 'custome_login_btn_text', 10, 2);
}

function custome_login_btn_text($translation, $text){
  if ('Log In' == $text) {
      return 'LOGIN';
  }
  return $translation;
}

add_action( 'login_form', 'custome_login_btn' );

function change_lost_your_password ($text) {

  if ($text == 'Lost your password?'){
      $text = 'Forgot Password?';

  }
         return $text;
  }
add_filter( 'gettext', 'change_lost_your_password' );



// Function to change "posts" to "Events" in the admin side menu
function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Events';
  $submenu['edit.php'][5][0] = 'Events';
  $submenu['edit.php'][10][0] = 'Add Event';
  $submenu['edit.php'][16][0] = 'Tags';
  echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
// Function to change post object labels to "Events"
function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Events';
  $labels->singular_name = 'Event';
  $labels->add_new = 'Add Event';
  $labels->add_new_item = 'Add Event';
  $labels->edit_item = 'Edit Event';
  $labels->new_item = 'Event';
  $labels->view_item = 'View Event';
  $labels->search_items = 'Search Events';
  $labels->not_found = 'No Events found';
  $labels->not_found_in_trash = 'No Events found in Trash';
}
add_action( 'init', 'change_post_object_label' );

// Removes Comments from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes Comments from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes Comments from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


// ADD .ZIP to MEDIA LIBRARY
function modify_upload_mimes ( $mimes_types ) {
  // add your extension to the mimes array as below
  $mimes_types['zip'] = 'application/zip';
  $mimes_types['gz'] = 'application/x-gzip';
  return $mimes_types;
}
add_filter( 'upload_mimes', 'modify_upload_mimes', 99 );

function add_allow_upload_extension_exception( $types, $file, $filename, $mimes ) {
  // Do basic extension validation and MIME mapping
  $wp_filetype = wp_check_filetype( $filename, $mimes );
  $ext         = $wp_filetype['ext'];
  $type        = $wp_filetype['type'];
  if( in_array( $ext, array( 'zip', 'gz' ) ) ) { // it allows zip files
      $types['ext'] = $ext;
      $types['type'] = $type;
  }
  return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'add_allow_upload_extension_exception', 99, 4 );