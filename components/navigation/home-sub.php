<?php
/**
 * HOME subNav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

 // get the current taxonomy term
$term = get_queried_object();

$image = get_field('navigation_image', 'option');
$text = get_field('navigation_text', 'option');

 ?>

<!-- SUBNAVIGATION -->
<aside id="mainNavSub" class="main-subNav">

  <?php 
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
    <img class="lozad" data-src="<?php echo  $image?>" alt="Woman Skin">
    <p><?php echo $text ?></p>
  </article>

  <div class="main-subNav__icon">
    <?php get_template_part( 'svg-template/svg', 'arrow_secondmenu' ) ?>
  </div>
</aside>