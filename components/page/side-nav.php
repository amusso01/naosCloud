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

// Page Variables
$isHome = false;
$isBio = false;
$isInsti = false;
$isEtat = false;
$isHelp = false;
$isAccount= false;

// The function return true if current page id is in certain menu
$isInBioMenu = cms_is_in_menu('bioderma', get_queried_object_id());
$isInstitutMenu = cms_is_in_menu('institut', get_queried_object_id());
$isInHomeMenu = cms_is_in_menu('home', get_queried_object_id());
$isInEtatMenu = cms_is_in_menu('etat', get_queried_object_id());

// Retrive user menu link. N.B. in this menu there must be only the help and my account page in this order
$userMenu = wp_get_nav_menu_items( 'user' );
$helpLink = $userMenu[0]->url;
$accountLink = $userMenu[1]->url;

// debug($isInHomeMenu);
// debug($isInstitutMenu);
// debug($isInBioMenu);
// debug(is_front_page());

?>

<?php 
// Check in which page we are and update variables accordingly
?>
<?php if(is_page('bioderma-home') || is_tax('bioderma_categories') || is_singular( 'bioderma') || $isInBioMenu) : ?>
  <?php $isBio = true; ?>
<?php elseif(is_page('institut-of-esthederm-home') || is_tax('institut_esthederm_categories') || is_singular( 'institut_esthederm') || $isInstitutMenu)  : ?>
  <?php $isInsti = true; ?>
<?php elseif(is_page('etat-pur-home') || is_tax('etat_pur_categories') || is_singular( 'etat_pur') || $isInEtatMenu)  : ?>
  <?php $isEtat = true; ?>
<?php elseif(is_page('help') ) : ?>
  <?php $isHelp = true; ?>
<?php elseif( is_page('my-account') ) : ?>
  <?php $isAccount = true; ?>
<?php elseif(is_front_page() || $isInHomeMenu ) : ?>
  <?php $isHome = true; ?>
<?php endif; ?>

<aside id="mainNav" class="main-nav">
  <div class="topNav">
    <nav>
      <ul>
        <li><span class='no-show' >Naos Cloud</span><a title="Naos" class="<?php echo $isHome ? 'active' : '' ?>" href="<?php echo site_url('/')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_home' ) ?></a></li>
        <li><span class='no-show' >Bioderma</span><a title="Bioderma" class="<?php echo $isBio ? 'active' : '' ?>" href="<?php echo site_url('/bioderma-home')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_bioderma' ) ?></a></li>
        <li><span class='no-show' >Institut Esthederm</span><a title="Institut Esthederm" class="<?php echo $isInsti ? 'active' : '' ?>" href="<?php echo site_url('/institut-of-esthederm-home')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_institut' ) ?></a></li>
        <li><span class='no-show' >Etat Pur</span><a title="Etat Pur" class="<?php echo $isEtat ? 'active' : '' ?>" href="<?php echo site_url('/etat-pur-home')  ?>"><?php get_template_part( 'svg-template/svg', 'desk_etatpur' ) ?></a></li>
      </ul>
    </nav>
  </div>
  <div class="bottomNav">
    <ul>
      <li title="Help" > <span class='no-show' >Help</span><a title="Help" class="<?php echo $isHelp ? 'active' : '' ?>" href="<?php echo $helpLink  ?>"> <?php get_template_part( 'svg-template/svg', 'icon_help' ) ?></a></li>
      <li title="My Account" > <span class='no-show' >My Account</span> <a title="My Account" class="<?php echo $isAccount ? 'active' : '' ?>" href="<?php echo $accountLink ?>"><?php get_template_part( 'svg-template/svg', 'icon_user' ) ?></a></li>
    </ul>
  </div>
</aside>

<?php if ($isHome) : ?>
  <?php get_template_part( 'components/navigation/home-sub' ); ?>
<?php elseif($isBio) : ?>
  <?php get_template_part( 'components/navigation/bio-sub' ); ?>
<?php elseif($isInsti) : ?>
  <?php get_template_part( 'components/navigation/insti-sub' ); ?>
<?php elseif($isEtat) : ?>
  <?php get_template_part( 'components/navigation/etat-sub' ); ?>
<?php endif; ?>