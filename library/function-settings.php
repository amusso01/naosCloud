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

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );


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
     background-image: url("data:image/svg+xml,%3Csvg version='1.1' id='prefix__prefix__Layer_1' xmlns='http://www.w3.org/2000/svg' x='0' y='0' viewBox='0 0 269.4 81.3' xml:space='preserve'%3E%3Cstyle%3E.prefix__prefix__st5%7Bfill:%230b242e%7D%3C/style%3E%3Cpath d='M45.8 28c8.1-6.6 11.8-17.2 9.7-27.4C45.2-1.6 34.6 2.2 28 10.3 21.4 2.2 10.8-1.6.6.6-1.6 10.8 2.2 21.5 10.3 28 2.2 34.6-1.6 45.3.6 55.5c10.2 2.2 20.8-1.6 27.4-9.7 6.6 8.1 17.2 11.8 27.4 9.7 2.2-10.3-1.5-20.9-9.6-27.5zm-12.1 5.7c-.9 4.4-2.9 8.6-5.7 12.1-2.9-3.5-4.8-7.6-5.7-12.1-4.4-.9-8.6-2.8-12-5.7 3.5-2.9 7.6-4.8 12-5.7.9-4.4 2.9-8.6 5.7-12.1 2.9 3.5 4.8 7.6 5.7 12.1 4.4.9 8.6 2.9 12 5.7-3.4 2.9-7.5 4.8-12 5.7z' fill='%23ffe573'/%3E%3Cpath d='M45.8 28c-3.5-2.9-7.6-4.8-12-5.7.7 3.8.7 7.6 0 11.4 4.4-.9 8.5-2.8 12-5.7zm-12.1-5.7c-.9-4.4-2.9-8.6-5.7-12.1-2.9 3.5-4.8 7.6-5.7 12.1-4.4.9-8.6 2.8-12 5.7 3.5 2.9 7.6 4.8 12 5.7.9 4.4 2.9 8.6 5.7 12.1 2.9-3.5 4.8-7.6 5.7-12.1-3.8.7-7.6.7-11.4 0-.7-3.8-.7-7.6 0-11.4 3.8-.7 7.7-.7 11.4 0z' fill='%23ffd635'/%3E%3Cpath d='M33.7 33.7zm0-11.4z' fill='%23ffb300'/%3E%3Cpath d='M33.7 33.7c.7-3.8.7-7.6 0-11.4-3.8-.7-7.6-.7-11.4 0-.7 3.8-.7 7.6 0 11.4 3.8.8 7.7.8 11.4 0z' fill='%23fecd03'/%3E%3Cpath id='prefix__prefix__Path_2483' class='prefix__prefix__st5' d='M103.6 39.1V14.9c0-.9.5-1.7 1.4-1.9.8-.2 1.7.2 2.1.9.2.4.2.8.2 1.2v29c.1 1-.7 1.9-1.7 1.9-.4 0-.8-.1-1.1-.3-.7-.5-1.3-1.1-1.7-1.8-5.9-7.5-11.8-15-17.7-22.6-.6-.7-1.1-1.4-1.7-2.1-.2.2-.1.4-.1.6V44c.1 1-.6 1.8-1.6 1.9h-.3c-.9 0-1.7-.8-1.7-1.8V15c-.1-.9.4-1.7 1.2-2.1.9-.4 2-.2 2.8.5.7.7 1.2 1.5 1.8 2.3 5.9 7.5 11.8 15 17.6 22.5.1.5.3.7.5.9'/%3E%3Cpath id='prefix__prefix__Path_2484' class='prefix__prefix__st5' d='M203.7 46.3c-4.3.1-8.5-1.5-11.6-4.5-2.5-2.4-4.1-5.5-4.7-8.9-.7-3.6-.3-7.3 1.2-10.6 2.1-4.9 6.6-8.5 11.9-9.4 4.1-.9 8.3-.2 11.9 1.9 4 2.3 6.8 6.3 7.6 10.8.9 3.8.4 7.8-1.3 11.3-2.2 4.7-6.5 8.1-11.6 9-1.2.3-2.3.5-3.4.4m12.8-16.6c0-1-.1-2-.3-2.9-.9-5.5-5.3-9.8-10.9-10.6-3.7-.6-7.4.6-10.1 3.1-2.4 2.2-3.9 5.2-4.2 8.4-.7 4.4.9 8.9 4.2 11.9 4.1 3.8 10.2 4.4 15 1.5 4.4-2.7 6.1-6.7 6.3-11.4'/%3E%3Cpath id='prefix__prefix__Path_2485' class='prefix__prefix__st5' d='M148.6 37.2h-8.4c-.3 0-.7.2-.7.5-1 2.4-2.1 4.7-3.1 7-.2.7-.8 1.2-1.5 1.3-1 .2-1.9-.5-2-1.5-.1-.4 0-.8.2-1.2.9-2 1.8-4 2.8-6.1 3.5-7.6 7-15.2 10.5-22.9.3-1 1.2-1.6 2.3-1.7 1.1-.2 2.2.5 2.6 1.6.9 1.9 1.7 3.7 2.6 5.6 2.7 5.9 5.4 11.9 8.2 17.8.8 1.8 1.6 3.5 2.4 5.3.5.7.4 1.6 0 2.3-.6.8-1.8 1-2.6.3-.2-.2-.4-.4-.6-.7-.5-.9-.8-1.8-1.2-2.7-.7-1.5-1.4-3-2.1-4.6-.1-.3-.4-.5-.7-.5-3.1.2-5.9.2-8.7.2m.1-19.8c-.2 0-.2.2-.3.3-2.4 5.2-4.7 10.5-7.1 15.7-.2.4 0 .4.3.4h13.9c.4 0 .5-.1.3-.5-1.4-3.1-2.9-6.3-4.3-9.5-.9-2.1-1.8-4.3-2.8-6.4'/%3E%3Cpath id='prefix__prefix__Path_2486' class='prefix__prefix__st5' d='M257.7 46.3c-4.5 0-8.9-1.5-12.4-4.4-.8-.7-.9-1.8-.2-2.6.6-.8 1.8-.9 2.5-.2 1.4 1.3 3.1 2.3 4.9 3 2.7 1.1 5.7 1.2 8.5.4 1.8-.4 3.3-1.8 3.8-3.5.7-2.6 0-4.7-2.7-6-1.8-.8-3.7-1.4-5.6-1.7-2.6-.5-5.1-1.4-7.3-2.7-2.4-1.5-3.8-4.3-3.5-7.1.1-4.3 3.4-7.4 7.3-8.2 4.7-1.1 9.6-.2 13.5 2.5.8.4 1.3 1.3 1.1 2.2-.2 1-1.2 1.6-2.2 1.4-.2-.1-.5-.2-.7-.3-1.3-1-2.9-1.8-4.5-2.3-2.3-.7-4.8-.8-7.1-.1-2.7.7-4.3 3.5-3.6 6.2 0 .2.1.3.2.5.5 1.2 1.5 2.1 2.8 2.6 1.8.8 3.8 1.4 5.8 1.8 2.4.4 4.8 1.3 7 2.6 2.7 1.6 4.1 4.7 3.6 7.7-.5 4.2-3.1 6.5-6.9 7.7-1.4.3-2.9.5-4.3.5'/%3E%3Cpath d='M148.2 60.7c.5.2.7.6.8 1 .1.5-.1.9-.4 1.3-.2.3-.5.5-.9.5-.3 0-.7 0-1.1-.2-.6-.3-1.2-.6-1.9-.7-.7-.2-1.4-.3-2.1-.3-1.2 0-2.2.2-3.2.6-.9.4-1.7.9-2.4 1.6-.7.7-1.2 1.5-1.6 2.5-.4 1-.5 2-.5 3.2 0 1.3.2 2.4.6 3.4.4 1 .9 1.8 1.6 2.5.7.7 1.5 1.2 2.4 1.5.9.3 1.9.5 3 .5.7 0 1.4-.1 2-.2.7-.2 1.3-.4 1.9-.7.4-.2.7-.3 1.1-.2.3.1.6.2.9.5.3.4.5.9.4 1.3-.1.5-.3.8-.8 1-.5.3-1.1.5-1.7.8-.6.2-1.2.4-1.9.5-.6.1-1.3.2-1.9.2-1.5 0-2.9-.2-4.2-.7-1.3-.5-2.5-1.2-3.5-2.2-1-.9-1.8-2.1-2.4-3.5-.6-1.4-.9-2.9-.9-4.7 0-1.6.3-3 .8-4.4.6-1.3 1.3-2.5 2.3-3.5 1-1 2.2-1.7 3.5-2.3 1.3-.5 2.8-.8 4.4-.8 1 0 1.9.1 2.9.4 1.1.3 2 .7 2.8 1.1zM173.5 78c.5 0 .8.1 1.1.4.3.3.4.6.4 1.1 0 .4-.1.8-.4 1.1-.3.3-.7.4-1.1.4h-10.3c-.5 0-.8-.1-1.1-.4-.3-.3-.4-.7-.4-1.1V61.1c0-.5.2-.8.5-1.1s.7-.4 1.2-.4c.4 0 .8.1 1.1.4s.5.7.5 1.1v17.5l-.6-.5h9.1zm33.7-7.7c0 1.6-.3 3-.8 4.4-.5 1.3-1.2 2.5-2.2 3.5-.9 1-2 1.8-3.3 2.4-1.3.6-2.7.8-4.2.8s-2.9-.3-4.2-.8c-1.3-.6-2.4-1.3-3.3-2.4-.9-1-1.7-2.2-2.2-3.5-.5-1.3-.8-2.8-.8-4.4 0-1.6.3-3 .8-4.4.5-1.3 1.2-2.5 2.2-3.5.9-1 2-1.8 3.3-2.4 1.3-.6 2.7-.8 4.2-.8s2.9.3 4.2.8c1.3.6 2.4 1.3 3.3 2.4.9 1 1.7 2.2 2.2 3.5.5 1.4.8 2.8.8 4.4zm-3.3 0c0-1.5-.3-2.9-.9-4.1-.6-1.2-1.5-2.2-2.5-2.9-1.1-.7-2.3-1-3.7-1-1.4 0-2.6.3-3.7 1s-1.9 1.6-2.5 2.8-.9 2.6-.9 4.1c0 1.5.3 2.9.9 4.1.6 1.2 1.4 2.2 2.5 2.9 1.1.7 2.3 1 3.7 1 1.4 0 2.6-.3 3.7-1s1.9-1.7 2.5-2.9c.6-1.1.9-2.5.9-4zm31.6-10.8c.4 0 .8.2 1.1.5.3.3.4.7.4 1.1v11.7c0 1.6-.4 3.1-1.1 4.4-.7 1.3-1.7 2.3-3 3-1.3.7-2.7 1.1-4.3 1.1-1.6 0-3.1-.4-4.3-1.1-1.3-.7-2.3-1.7-3-3-.7-1.3-1.1-2.8-1.1-4.4V61c0-.4.2-.8.5-1.1.3-.3.7-.5 1.2-.5.4 0 .7.2 1.1.5.3.3.5.7.5 1.1v11.7c0 1.1.2 2 .7 2.8.5.8 1.1 1.4 1.9 1.9.8.5 1.7.7 2.6.7 1 0 1.9-.2 2.7-.7.8-.5 1.5-1.1 2-1.9.5-.8.8-1.8.8-2.8V61c0-.4.1-.8.4-1.1.1-.3.4-.4.9-.4zm24.8 0c1.5 0 2.8.3 4 .8 1.1.6 2.1 1.3 2.9 2.3.8 1 1.4 2.1 1.8 3.4.4 1.3.6 2.7.6 4.1 0 2-.3 3.8-1 5.4s-1.7 2.9-3.1 3.9c-1.4 1-3 1.4-5 1.4H253c-.5 0-.8-.1-1.1-.4-.3-.3-.4-.7-.4-1.1V61.1c0-.5.1-.8.4-1.1.3-.3.7-.4 1.1-.4h7.3zm-.4 18.6c1.4 0 2.6-.4 3.5-1.1.9-.7 1.6-1.7 2-2.8.4-1.2.6-2.5.6-3.9 0-1-.1-2-.4-3-.2-.9-.6-1.8-1.1-2.5-.5-.7-1.1-1.3-1.9-1.7-.8-.4-1.7-.6-2.8-.6H254l.3-.2v16.2l-.2-.3h5.8z' fill='%23838383'/%3E%3C/svg%3E");
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
<?php $bgImage = get_template_directory_uri().'/dist/images/login-new.jpeg' ?>
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
      flex-direction: column;
    }
    body.login .language-switcher{display:none;}
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

// TODO
//  =================  ******** IMPORTANT  START ******  ===============
// those email are global for all the site, so remember to create a function that detect URL, language .... of the site
// when we realse a new Site. Or just kill those function, probably they won't be required anymore and the client has forgot about this for sure
// 

// EMAIL
//* Password reset

function reset_pass_subject($subject) {
  $title = __( 'NAOS Cloud I Alteração de Senha' );
  return $title;
}
add_filter('retrieve_password_title', 'reset_pass_subject');



function reset_pass_email($message, $reset_key, $user_login, $user_data) {
  $link = get_bloginfo('url') . '/wp-login.php?action=rp&key=' . $reset_key . '&login=' . rawurlencode($user_login);
  ob_start();
  ?>

  Caro Praceiro,
  recebemos o seu pedido de redefinição de senha.
  <?= $user_data->user_login ?>:
  Para redefinir a sua senha clique no link abaixo
  <?= $link;?>
  
  Se não tiver efetuado este pedido ignore este email.

  Os melhores cumprimentos
  Equipa NAOS Portugal
  <?php
  $message = ob_get_contents();
  ob_end_clean();
  return $message;
}
add_filter('retrieve_password_message', 'reset_pass_email', 10, 4);


// welcome

function user_new_subject($subject) {
  $title = __( 'Bem-vindo ao NAOS Cloud' );
  return $title;
}
add_filter('wpmu_signup_user_notification_subject', 'user_new_subject');

//  =================   IMPORTANT END   ===============