<?php
/**
 * Add your own custom functions here
 * For example, your shortcodes...
 *
 */


/*==================================================================================
 SHORTCODES
==================================================================================*/


/* Copyright
/––––––––––––––––––––––––*/
function copyright() {
    return '&copy; ' . date('Y') . ' <span class="copyright-site-name">' . get_bloginfo('name') . '</span>.';
  }
  add_shortcode('copyright', 'copyright');


  /**
 * Get the user's roles
 * @since 1.0.0
 */
function fd_get_current_user_role() {
  if( is_user_logged_in() ) {
  $user = wp_get_current_user();
  $roles = ( array ) $user->roles;
  return $roles; // This returns an array
  // Use this to return a single value
  // return $roles[0];
  } else {
  return array();
  }
 }
