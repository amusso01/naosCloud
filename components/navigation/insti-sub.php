<?php
/**
 * institut subNav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

 ?>

<!-- SUBNAVIGATION -->
<aside id="mainNavSub" class="main-subNav">
  <!-- <nav class="main-subNav__nav">
    <ul>
      <li><a href="">Homepage</a></li>
      <li><a href="">Corporate</a></li>
      <li><a href="">NAOS talks</a></li>
    </ul>
  </nav> -->

  <?php 
  if ( has_nav_menu( 'institut' ) ) :
    wp_nav_menu([
        'theme_location'    => 'institut',
        'menu_id'           => 'menu_bio',
        'container'         => 'nav',
        'container_class'   => 'main-subNav__nav',
        'depth'             => 2
    ]);
endif;

  
  ?>



  <!-- <article class="main-subNav__footer">
    <img class="lozad" data-src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/desk_image.jpg" alt="Woman Skin">
    <p><strong>Naos</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit esse molestiae quasi.</p>
  </article> -->

  <div class="main-subNav__icon">
    <?php get_template_part( 'svg-template/svg', 'arrow_secondmenu' ) ?>
  </div>
</aside>