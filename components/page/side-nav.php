<?php
/**
 * Side Nav
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>

<?php






?>

<aside id="mainNav" class="main-nav">
  <div class="topNav">
    <nav>
      <ul>
        <li><span>Naos Cloud</span><a title="Naos"  href="<?php echo site_url('/')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_home' ) ?></a></li>
        <li><span>Bioderma</span><a title="Bioderma" class="active" href="<?php echo site_url('/bioderma-home')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_bioderma' ) ?></a></li>
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

<?php if (is_front_page()) : ?>
  <?php get_template_part( 'components/navigation/home-sub' ); ?>
<?php elseif(is_page('44') || is_page('bioderma-home')) : ?>
  <?php get_template_part( 'components/navigation/bio-sub' ); ?>

<?php endif; ?>