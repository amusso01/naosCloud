<?php
/**
 * HOME subNav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */



if ( has_nav_menu( 'home' ) ) :
  wp_nav_menu([
      'theme_location'    => 'home',
      'menu_id'           => 'menu_home',
      'container'         => 'nav',
      'container_class'   => 'main-subNav__nav',
      'depth'             => 1
  ]);
endif;


?>



<article class="main-subNav__footer">
  <img class="lozad" data-src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/desk_image.jpg" alt="Woman Skin">
  <p><strong>Naos</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit esse molestiae quasi.</p>
</article>