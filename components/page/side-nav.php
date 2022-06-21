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

$pageObjID = get_queried_object_id();

// The function return true if current page id is in certain menu | see cms_is_in_menu in function-dev
$isInBioMenu = cms_is_in_menu(8, $pageObjID);
$isInstitutMenu = cms_is_in_menu(18, $pageObjID);
$isInHomeMenu = cms_is_in_menu( 7, $pageObjID);
$isInEtatMenu = cms_is_in_menu(19, $pageObjID);

// Retrive user menu link. N.B. in this menu there must be only the help and my account page in this order
$userMenu = wp_get_nav_menu_items( 'user' );
$helpLink = $userMenu[0]->url;
$accountLink = $userMenu[1]->url;

$adminUrl = get_admin_url();

// debug($isInstitutMenu);
// dd($isInHomeMenu);
// debug($isInBioMenu);
// debug($pageObjID);

?>

<?php 
// Check in which page we are and update variables accordingly
?>
<?php if(is_page('bioderma-home') || is_tax('bioderma_categories') || is_singular( 'bioderma') || $isInBioMenu) : ?>
  <?php $isBio = true; ?>
<?php elseif(is_front_page() || $isInHomeMenu && !is_tax('institut_esthederm_categories') ) : ?>
  <?php $isHome = true; ?>
<?php elseif(is_page('institut-of-esthederm-home') || is_tax('institut_esthederm_categories') || is_singular( 'institut_esthederm') || $isInstitutMenu)  : ?>
  <?php $isInsti = true; ?>
<?php elseif(is_page('etat-pur-home') || is_tax('etat_pur_categories') || is_singular( 'etat_pur') || $isInEtatMenu)  : ?>
  <?php $isEtat = true; ?>
<?php elseif(is_page('help') ) : ?>
  <?php $isHelp = true; ?>
<?php elseif( is_page('my-account') ) : ?>
  <?php $isAccount = true; ?>
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
      <?php  echo current_user_can( 'manage_options' )  ? '<li title="Admin" class="admin_link" > <span class="no-show"  >Admin</span><a title="Admin"  href="' . $adminUrl. '"> <svg data-name="Group 1276" xmlns="http://www.w3.org/2000/svg" width="29.496" height="29.314" viewBox="0 0 29.496 29.314"><defs><clipPath id="prefix__a"><path data-name="Rectangle 398" fill="#fff" d="M0 0h29.496v29.314H0z"/></clipPath></defs><g data-name="Group 1275" clip-path="url(#prefix__a)" fill="#fff"><path data-name="Path 2563" d="M29.307 14.226l.189-.014h-.189v-.589a2.59 2.59 0 00-2.62-2.642 1.285 1.285 0 01-1.257-.779 1.251 1.251 0 01.329-1.444A2.6 2.6 0 0025.729 5c-.44-.449-.9-.908-1.407-1.405a2.6 2.6 0 00-3.755-.047 1.266 1.266 0 01-1.473.33 1.305 1.305 0 01-.767-1.3A2.588 2.588 0 0015.738 0h-2.116a2.607 2.607 0 00-2.642 2.626 1.279 1.279 0 01-.786 1.255 1.248 1.248 0 01-1.448-.338 2.609 2.609 0 00-1.889-.763 2.581 2.581 0 00-1.836.788C4.437 4.143 4 4.583 3.589 5a2.6 2.6 0 00-.036 3.754 1.259 1.259 0 01.332 1.441 1.28 1.28 0 01-1.284.791 2.6 2.6 0 00-2.6 2.6v2.116a2.615 2.615 0 002.608 2.628 1.279 1.279 0 011.264.763 1.261 1.261 0 01-.332 1.474 2.606 2.606 0 00.007 3.709c.467.482.962.977 1.47 1.47a2.614 2.614 0 003.711.025 1.42 1.42 0 01.97-.45 1.259 1.259 0 01.5.106 1.285 1.285 0 01.784 1.287 2.6 2.6 0 002.606 2.6c.786.005 1.489 0 2.146 0a2.59 2.59 0 002.6-2.576 1.3 1.3 0 01.77-1.295 1.267 1.267 0 011.473.332 2.609 2.609 0 003.711-.017c.445-.431.913-.9 1.47-1.471a2.89 2.89 0 00.367-.461 2.621 2.621 0 00-.348-3.252 1.253 1.253 0 01-.284-1.577 1.3 1.3 0 011.238-.664 2.52 2.52 0 002.516-2.135 14.522 14.522 0 00.07-1.969m-1.37 1.411a1.265 1.265 0 01-1.313 1.33 2.639 2.639 0 00-1.909 4.481 1.279 1.279 0 01-.024 1.961c-.443.445-.886.89-1.328 1.323a1.255 1.255 0 01-1.891.011 2.642 2.642 0 00-4.509 1.906 1.261 1.261 0 01-1.32 1.292H13.72a1.259 1.259 0 01-1.365-1.349 2.668 2.668 0 00-.805-1.909 2.64 2.64 0 00-1.915-.729 2.511 2.511 0 00-1.7.708 1.294 1.294 0 01-2.073-.027l-.127-.126q-.568-.565-1.132-1.132a1.26 1.26 0 01-.03-1.893 2.552 2.552 0 00.647-2.724 2.555 2.555 0 00-2.138-1.774 2.1 2.1 0 00-.307-.02h-.113a1.264 1.264 0 01-1.279-1.3v-2A1.256 1.256 0 012.7 12.346a2.609 2.609 0 002.57-2 2.523 2.523 0 00-.6-2.406 1.314 1.314 0 01.049-2.137l.469-.47q.382-.385.767-.766a1.257 1.257 0 011.865-.014 2.545 2.545 0 002.722.652 2.548 2.548 0 001.776-2.135 2.29 2.29 0 00.023-.329v-.124a1.242 1.242 0 011.269-1.246c.676-.008 1.367 0 1.979 0h.052a1.256 1.256 0 011.322 1.324 2.614 2.614 0 001.991 2.573 2.538 2.538 0 002.429-.619 1.3 1.3 0 012.117.061l.315.312.063.061c.3.291.589.578.861.878a2.318 2.318 0 01.331.517c.041.08.074.143.11.2l.033.055.014.1a1.818 1.818 0 01-.551 1.072 2.636 2.636 0 001.909 4.436 1.255 1.255 0 011.353 1.359v1.936"/><path data-name="Path 2565" d="M20.604 14.682a5.976 5.976 0 00-5.96-5.976 5.947 5.947 0 105.962 5.976m-5.942 4.7h-.022a4.74 4.74 0 01-4.717-4.748 4.691 4.691 0 011.409-3.342 4.744 4.744 0 013.35-1.367 4.646 4.646 0 013.319 1.4 4.727 4.727 0 01-3.341 8.065"/></g></svg>  </a></li>' : ''  ?>
      <!-- <li title="Help" > <span class='no-show' data-i18n-key="help" >Help</span><a title="Help" class="<?php echo $isHelp ? 'active' : '' ?>" href="<?php echo $helpLink  ?>"> <?php get_template_part( 'svg-template/svg', 'icon_help' ) ?></a></li> -->
      <li title="My Account" > <span class='no-show' data-i18n-key="my-account" >My Account</span> <a title="My Account" class="<?php echo $isAccount ? 'active' : '' ?>" href="<?php echo $accountLink ?>"><?php get_template_part( 'svg-template/svg', 'icon_user' ) ?></a></li>
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