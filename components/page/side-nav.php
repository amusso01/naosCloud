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


$isHome = false;
$isBio = false;
$isInsti = false;
$isEtat = false;

// Tefunction return true if current page id is in certain menu
$isInBioMenu = cms_is_in_menu('bioderma');

?>

<?php if (is_front_page()) : ?>
  <?php $isHome = true; ?>
<?php elseif(is_page('44') || is_page('bioderma-home') || is_tax('bioderma_categories') || is_singular( 'bioderma') || $isInBioMenu) : ?>
  <?php $isBio = true; ?>

<?php endif; ?>

<aside id="mainNav" class="main-nav">
  <div class="topNav">
    <nav>
      <ul>
        <li><span class='no-show' >Naos Cloud</span><a title="Naos" class="<?php echo $isHome ? 'active' : '' ?>" href="<?php echo site_url('/')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_home' ) ?></a></li>
        <li><span class='no-show' >Bioderma</span><a title="Bioderma" class="<?php echo $isBio ? 'active' : '' ?>" href="<?php echo site_url('/bioderma-home')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_bioderma' ) ?></a></li>
        <li><span class='no-show' >Institut Esthederm</span><a title="Institut Esthederm" class="<?php echo $isInsti ? 'active' : '' ?>" href=""><?php get_template_part( 'svg-template/svg', 'desk_institut' ) ?></a></li>
        <li><span class='no-show' >Etat Pur</span><a title="Etat Pur" class="<?php echo $isEtat ? 'active' : '' ?>" href=""><?php get_template_part( 'svg-template/svg', 'desk_etatpur' ) ?></a></li>
      </ul>
    </nav>
  </div>
  <div class="bottomNav">
    <ul>
      <li title="Help" > <span class='no-show' >Help</span> <?php get_template_part( 'svg-template/svg', 'icon_help' ) ?></li>
      <li title="My Account" > <span class='no-show' >My Account</span> <?php get_template_part( 'svg-template/svg', 'icon_user' ) ?></li>
    </ul>
  </div>
</aside>

<?php if ($isHome) : ?>
  <?php get_template_part( 'components/navigation/home-sub' ); ?>
<?php elseif($isBio) : ?>
  <?php get_template_part( 'components/navigation/bio-sub' ); ?>

<?php endif; ?>