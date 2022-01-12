<?php
/**
 * Page Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>

<?php 

$user =wp_get_current_user();

?>



<div class="account-hero__bg-image content-block" style="background-image:url(<?php echo  get_the_post_thumbnail_url() ?>)">
  <div class="account-hero__info">
    <div class="svg">
      <?php get_template_part( 'svg-template/svg', 'icon_user' ) ?>
    </div>
    <div class="name">
      <h2 class="h1"><?php echo $user->display_name ?></h2>
    </div>
  </div>
</div>
