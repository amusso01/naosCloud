<?php
/**
 * The starting point for setting up a new theme.
 * Go through this file to setup your preferences
 *
 * @author      Andrea Musso
 *
 *
 */

/*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 LOCALE SETTING
  2.0 DEFAULT BLOCK STYLES
  3.0 GOOGLE TAG MANAGER
  4.0 SETUP WP-MENUS
  5.0 SETUP LOGIN PAGE 
=======================================================*/

/*==================================================================================
  1.0 LOCALE SETTING
==================================================================================*/
// Define local time, date and language-location (PHP-only, does not affect WordPress)
// => http://php.net/manual/function.setlocale.php
setlocale(LC_ALL, 'en_US.UTF-8');

/*==================================================================================
  2.0 DEFAULT GUTENBERG BLOCK STYLES
==================================================================================*/
// Gutenberg comes with default styles for all blocks
// by default these styles are disabled. Change this to `true` to enqueue them
$load_default_block_styles = true;



/*==================================================================================
  3.0 GOOGLE TAG MANAGER
==================================================================================*/
// embed the GTM-scripts into head and body => WPSeed_gtm()
// add your GTM_id (for example 'GTM-ABC1234') or leave empty to not enqueue any GTM-script
$GTM_id = '';


/*==================================================================================
  4.0 SETUP WP-MENUS
==================================================================================*/
// loads wordpress-menus, add your custom menus here or remove if not needed
// by default, only 'mainmenu' is shown
// => https://codex.wordpress.org/Function_Reference/register_nav_menus
function wpseed_register_theme_menus() {
  register_nav_menus([
    'home' => __('Home menu'),
    'institut-menu' => __('Institut Esthederm menu'),
    'etat-menu' => __('Etat Pur menu'),
    'bioderma-menu' => __('Bioderma menu'),
    'user' => __('User menu')
  ]);
}
add_action( 'init', 'wpseed_register_theme_menus');


/*==================================================================================
  5.0 SETUP LOGIN PAGE 
==================================================================================*/

$gFontUrl = "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap";
$fontFamily = "'Quicksand', sans-serif";
$customLogo = get_stylesheet_directory_uri()."/dist/images/foundry-logo.svg";
$mainColor = "#00455E";


/*==================================================================================
  6.0 SETUP ACF OPTION PAGE
==================================================================================*/

if( function_exists('acf_add_options_page') ) {

  // acf_add_options_page();
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> '',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}