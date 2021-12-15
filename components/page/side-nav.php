<?php
/**
 * Side Nav
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>

<aside id="mainNav" class="main-nav">
  <div class="topNav">
    <nav>
      <ul>
        <li><span>Naos Cloud</span><a title="Naos" class="active" href="<?php echo site_url('/')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_home' ) ?></a></li>
        <li><span>Bioderma</span><a title="Bioderma" href=""><?php get_template_part( 'svg-template/svg', 'desk_bioderma' ) ?></a></li>
        <li><span>Institut Esthederm</span><a title="Institut Esthederm" href=""><?php get_template_part( 'svg-template/svg', 'desk_institut' ) ?></a></li>
        <li><span>Etat Pur</span><a title="Etat Pur" href=""><?php get_template_part( 'svg-template/svg', 'desk_etatpur' ) ?></a></li>
      </ul>
    </nav>
  </div>
  <div class="bottomNav">
    <ul>
      <li title="Help" > <span>Help</span> <?php get_template_part( 'svg-template/svg', 'icon_help' ) ?></li>
      <li title="My Account" > <span>My Account</span> <?php get_template_part( 'svg-template/svg', 'icon_user' ) ?></li>
    </ul>
  </div>
</aside>

<!-- SUBNAVIGATION -->
<aside id="mainNavSub" class="main-subNav">
  <nav class="main-subNav__nav">
    <ul>
      <li><a href="">Homepage</a></li>
      <li><a href="">Corporate</a></li>
      <li><a href="">NAOS talks</a></li>
    </ul>
  </nav>

  <div class="main-subNav__icon">
    <?php get_template_part( 'svg-template/svg', 'arrow_secondmenu' ) ?>
  </div>

  <article class="main-subNav__footer">
    <img class="lozad" data-src="<?php echo get_stylesheet_directory_uri() ?>/dist/images/desk_image.jpg" alt="Woman Skin">
    <p><strong>Naos</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit esse molestiae quasi.</p>
  </article>
</aside>


