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
        <li><a href="<?php echo site_url('/')  ?>">N</a></li>
        <li><a href="">B</a></li>
        <li><a href="">Es</a></li>
        <li><a href="">Et</a></li>
      </ul>
    </nav>
  </div>
  <div class="bottomNav">
    <ul>
      <li><?php get_template_part( 'svg-template/svg', 'icon_help' ) ?></li>
      <li><?php get_template_part( 'svg-template/svg', 'icon_user' ) ?></li>
    </ul>
  </div>
</aside>

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
    <img src="" alt="">
    <p><strong>Naos</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, cum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit esse molestiae quasi.</p>
  </article>
</aside>


