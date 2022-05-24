<?php 

/**
 * Functions used for development purposes.
 *
 * @author      Andrea Musso
 *
 */


 /*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 Return svg from ACF file field
    1.3 variables
    1.4 string shortener
    1.5 browser check
    1.6 environment check

  2.0 OUTPUT TOOLKIT
    2.1 google tag manager

  3.0 ACCESS TOOLKIT
    3.1 login page
    3.2 logged-in-only
=======================================================*/

/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 Return svg from ACF file field
/––––––––––––––––––––––––*/
function acfFile_toSvg($file){
	if($file)
    return str_replace('\'', '',  var_export(file_get_contents($file), true));
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
    $string = trim($string);
    if(strlen($string) > $length) {
      $string  = substr($string, 0, $length);
      $string .= $append;
    }
    return $string;
}


/* 1.5 BROWSER CHECK
/------------------------*/
function get_browser_name() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'InternetExplorer';
    return 'Other';
}


/*==================================================================================
  2.0 OUTPUT TOOLKIT
==================================================================================*/

/* 2.1 GOOGLE TAG MANAGER
/––––––––––––––––––––––––*/
// outputs one of the two parts of the Google Tag Manager scripts
// Usage: gtm('head', 'GTM-1234567) and gtm('body', 'GTM-1234567)
function WPSeed_gtm($type) {

    GLOBAL $GTM_id;
    if ($GTM_id) {
        if ($type == 'head') {
        echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',' $GTM_id ');</script>";

        }elseif ($type == 'body') {
    
        echo ' <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $GTM_id ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
        
        }
    }
    
}


/*==================================================================================
  3.0 ACCESS TOOLKIT
==================================================================================*/


/* 3.1 LOGIN PAGE
/––––––––––––––––––––––––*/
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
  }
  
  
/* 3.2 RESTRICT ACCES IF NOT LOGGEDIN
/––––––––––––––––––––––––––––––––––––*/
// redirect all users that are not logged-in to login
// remove `false && ` to activate
// if (false && !is_user_logged_in() && is_main_query() && !is_admin() && !is_login_page()){
//   wp_redirect('/admin'); die();
// }




// Redirect users who arent logged in...
function members_only() {
  global $pagenow;
  // Check to see if user in not logged in and not on the login page
  if( !is_user_logged_in() && $pagenow != 'wp-login.php' && $pagenow != 'wp-activate.php' )
        auth_redirect();
}
add_action( 'wp', 'members_only' ); 


// REDIRECT USER AFTEER LOGIN

// function custom_login_redirect( $redirect_to, $request, $user ) {
// if ( isset( $user->roles ) && is_array( $user->roles ) ) {
//   if ( in_array( 'administrator', $user->roles ) || in_array( 'editor', $user->roles ) || in_array( 'author', $user->roles ) ) {
//     $redirect_to = home_url('/');
//   } else {
//     $redirect_to = home_url('/');
//   }
// }
// return $redirect_to;
// }
// add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );


// HIDE WORDPRESS BAR
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
// if (!is_super_admin()) {
  show_admin_bar(false);
// }
}


/**
 * Check if post is in a menu
 *
 * @param $menu menu name, id, or slug
 * @param $object_id int post object id of page
 * @return bool true if object is in menu
 */
function cms_is_in_menu( $menu = null, $object_id = null ) {

  // get menu object
  $menu_object = wp_get_nav_menu_items( esc_attr( $menu ) );
 

  // stop if there isn't a menu
  if( ! $menu_object ){
    return false;
  }

  // get the object_id field out of the menu object
  $menu_items = wp_list_pluck( $menu_object, 'object_id' );


  // use the current post if object_id is not specified
  if( !$object_id ) {
      global $post;
      $object_id = get_queried_object_id();
  }

  // test if the specified page is in the menu or not. return true or false.
  return in_array( (int) $object_id, $menu_items );

}