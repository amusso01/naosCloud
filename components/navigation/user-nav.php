<?php
/**
 * User Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

//  TODO: IMPLEMENT FOR OTHER LANGUAGES SITE 


if ( has_nav_menu( 'user' ) ) :
    wp_nav_menu([
        'theme_location'    => 'user',
        'menu_id'           => 'menu_user',
        'container'         => 'nav',
        'depth'             => 1
    ]);
endif;