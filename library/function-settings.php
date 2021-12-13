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
      background-image: url("data:image/svg+xml,%3Csvg id='Group_1059' data-name='Group 1059' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='224.171' height='68.344' viewBox='0 0 224.171 68.344'%3E%3Cdefs%3E%3CclipPath id='clip-path'%3E%3Crect id='Rectangle_334' data-name='Rectangle 334' width='224.171' height='61.803' fill='none'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-3'%3E%3Crect id='Rectangle_330' data-name='Rectangle 330' width='46.739' height='46.746' fill='none'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-4'%3E%3Crect id='Rectangle_329' data-name='Rectangle 329' width='46.727' height='46.727' fill='none'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-5'%3E%3Crect id='Rectangle_332' data-name='Rectangle 332' width='29.621' height='29.619' fill='none'/%3E%3C/clipPath%3E%3CclipPath id='clip-path-6'%3E%3Crect id='Rectangle_331' data-name='Rectangle 331' width='29.618' height='29.618' fill='none'/%3E%3C/clipPath%3E%3C/defs%3E%3Cg id='Group_1058' data-name='Group 1058' clip-path='url(%23clip-path)'%3E%3Cg id='Group_1057' data-name='Group 1057'%3E%3Cg id='Group_1056' data-name='Group 1056' clip-path='url(%23clip-path)'%3E%3Cg id='Group_1050' data-name='Group 1050' opacity='0.55'%3E%3Cg id='Group_1049' data-name='Group 1049'%3E%3Cg id='Group_1048' data-name='Group 1048' clip-path='url(%23clip-path-3)'%3E%3Cg id='Group_1047' data-name='Group 1047' transform='translate(0.006 0.009)'%3E%3Cg id='Group_1046' data-name='Group 1046' clip-path='url(%23clip-path-4)'%3E%3Cpath id='Path_2480' data-name='Path 2480' d='M23.37,38.181A23.263,23.263,0,0,0,46.229,46.23,23.278,23.278,0,0,0,38.18,23.367,23.264,23.264,0,0,0,46.229.508,23.265,23.265,0,0,0,23.37,8.557,23.279,23.279,0,0,0,.51.513,23.253,23.253,0,0,0,6.813,21.8q.844.842,1.746,1.578-.894.738-1.746,1.579A23.254,23.254,0,0,0,.51,46.239,23.278,23.278,0,0,0,23.37,38.19' transform='translate(-0.006 -0.009)' fill='%23ffb400'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cg id='Group_1055' data-name='Group 1055' transform='translate(8.559 8.564)' opacity='0.6'%3E%3Cg id='Group_1054' data-name='Group 1054'%3E%3Cg id='Group_1053' data-name='Group 1053' clip-path='url(%23clip-path-5)'%3E%3Cg id='Group_1052' data-name='Group 1052' transform='translate(0.004)'%3E%3Cg id='Group_1051' data-name='Group 1051' clip-path='url(%23clip-path-6)'%3E%3Cpath id='Path_2481' data-name='Path 2481' d='M48,33.2a23.106,23.106,0,0,0-10.048-4.76,23.127,23.127,0,0,0-4.761-10.05,23.111,23.111,0,0,0-4.76,10.05,23.106,23.106,0,0,0-10.05,4.76,23.106,23.106,0,0,0,10.05,4.76,23.106,23.106,0,0,0,4.76,10.05A23.119,23.119,0,0,0,37.95,37.96,23.106,23.106,0,0,0,48,33.2' transform='translate(-18.383 -18.391)' fill='%23ffb400'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Cpath id='Path_2482' data-name='Path 2482' d='M48.95,39.439a24.57,24.57,0,0,0-9.521,0,24.615,24.615,0,0,0,0,9.519,24.57,24.57,0,0,0,9.521,0,24.56,24.56,0,0,0,0-9.519' transform='translate(-20.82 -20.825)' fill='%23ffb400'/%3E%3Cpath id='Path_2483' data-name='Path 2483' d='M162.558,44.886v-.581q0-9.814,0-19.628a1.561,1.561,0,0,1,1.163-1.577,1.532,1.532,0,0,1,1.715.776,1.867,1.867,0,0,1,.17.961q0,11.842,0,23.685c0,.173-.008.346,0,.519a1.523,1.523,0,0,1-2.347,1.364,4.838,4.838,0,0,1-1.432-1.478q-7.367-9.41-14.723-18.828c-.461-.589-.928-1.173-1.4-1.772-.173.185-.1.366-.1.527q-.006,10.1,0,20.194a1.476,1.476,0,0,1-1.6,1.615,1.519,1.519,0,0,1-1.44-1.467c-.008-.125,0-.251,0-.377q0-11.914-.007-23.827a1.67,1.67,0,0,1,.968-1.724,2.085,2.085,0,0,1,2.307.442c.545.607,1.032,1.266,1.537,1.909q7.35,9.363,14.7,18.726a1.644,1.644,0,0,0,.5.541' transform='translate(-76.169 -12.318)' fill='%230b242e'/%3E%3Cpath id='Path_2484' data-name='Path 2484' d='M348.732,50.614a13.4,13.4,0,0,1-9.645-3.786,13.545,13.545,0,0,1-3.94-7.4,14.343,14.343,0,0,1,1.026-8.876,13.142,13.142,0,0,1,9.893-7.814,13.735,13.735,0,0,1,9.909,1.622,13.307,13.307,0,0,1,6.369,9.034,14.233,14.233,0,0,1-1.091,9.451,13.228,13.228,0,0,1-9.711,7.512,12.237,12.237,0,0,1-2.812.26M359.444,36.75a17.558,17.558,0,0,0-.234-2.45,10.618,10.618,0,0,0-9.056-8.831,10.2,10.2,0,0,0-8.415,2.555,10.633,10.633,0,0,0-3.5,7,11.326,11.326,0,0,0,3.484,9.956,10.551,10.551,0,0,0,12.54,1.258,10.976,10.976,0,0,0,5.179-9.484' transform='translate(-178.929 -11.993)' fill='%230b242e'/%3E%3Cpath id='Path_2485' data-name='Path 2485' d='M250.962,43.2c-2.328,0-4.657.007-6.985-.008a.571.571,0,0,0-.622.415c-.86,1.966-1.748,3.92-2.625,5.878a1.535,1.535,0,0,1-1.282,1.044,1.464,1.464,0,0,1-1.491-2.192q1.14-2.529,2.3-5.049,4.363-9.531,8.727-19.062a2.092,2.092,0,0,1,1.878-1.414,2.022,2.022,0,0,1,2.179,1.3c.719,1.548,1.422,3.1,2.133,4.657q3.406,7.437,6.813,14.874,1.009,2.2,2.026,4.4a1.715,1.715,0,0,1-.028,1.91,1.547,1.547,0,0,1-2.643-.346c-.375-.722-.685-1.478-1.023-2.219-.577-1.269-1.164-2.535-1.723-3.813a.555.555,0,0,0-.6-.385c-2.344.013-4.688.007-7.032.007m.075-16.519c-.178.024-.181.154-.224.25Q247.869,33.466,244.92,40c-.146.322-.036.324.224.324q5.807-.006,11.612,0c.332,0,.411-.045.256-.384q-1.8-3.935-3.561-7.884c-.809-1.8-1.614-3.6-2.414-5.381' transform='translate(-127.053 -12.186)' fill='%230b242e'/%3E%3Cpath id='Path_2486' data-name='Path 2486' d='M448.821,50.644a16,16,0,0,1-10.334-3.7,1.53,1.53,0,0,1-.188-2.151,1.5,1.5,0,0,1,2.109-.2,13.074,13.074,0,0,0,4.085,2.47,11.152,11.152,0,0,0,7.122.344,4.323,4.323,0,0,0,3.173-2.948,3.862,3.862,0,0,0-2.212-4.99,21.44,21.44,0,0,0-4.707-1.454,18.877,18.877,0,0,1-6.114-2.218,6.261,6.261,0,0,1-2.944-5.932A7.376,7.376,0,0,1,444.894,23a13.944,13.944,0,0,1,11.278,2.118,1.645,1.645,0,0,1,.913,1.8,1.523,1.523,0,0,1-2.385.9,12.542,12.542,0,0,0-3.715-1.886,9.862,9.862,0,0,0-5.937-.043,4.232,4.232,0,0,0-2.826,5.609,4.157,4.157,0,0,0,2.311,2.166,22.078,22.078,0,0,0,4.8,1.472,17.993,17.993,0,0,1,5.8,2.137,6.248,6.248,0,0,1,2.986,6.448c-.387,3.469-2.544,5.423-5.722,6.433a12.123,12.123,0,0,1-3.579.493' transform='translate(-234.007 -12.083)' fill='%230b242e'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3Ctext id='CLOUD' transform='translate(119.086 62.344)' fill='%23848484' font-size='23' font-family='Quicksand' font-weight='600' letter-spacing='0.3em'%3E%3Ctspan x='0' y='0'%3ECLOUD%3C/tspan%3E%3C/text%3E%3C/svg%3E%0A");
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
		body.login div#login .message{
			border: 2px solid <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform p.submit input#wp-submit:hover{
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
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'we_login_logo' );




// Redirect users who arent logged in...
function members_only() {
    global $pagenow;
    // Check to see if user in not logged in and not on the login page
    if( !is_user_logged_in() && $pagenow != 'wp-login.php' )
          auth_redirect();
}
add_action( 'wp', 'members_only' ); 


// REDIRECT USER AFTEER LOGIN

function custom_login_redirect( $redirect_to, $request, $user ) {
  if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    if ( in_array( 'administrator', $user->roles ) || in_array( 'editor', $user->roles ) || in_array( 'author', $user->roles ) ) {
      $redirect_to = home_url('/');
    } else {
      $redirect_to = home_url('/');
    }
  }
  return $redirect_to;
  }
  add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );


// HIDE WORDPRESS BAR
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!is_super_admin()) {
    show_admin_bar(false);
  }
}

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
