<?php
/**
 * HomePage Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>

<?php 



?>
 

<div class="front-hero__bg-image content-block" style="background-image:url(<?php echo  get_the_post_thumbnail_url() ?>)">
  <div class="front-hero__info">
    <div class="svg">
      <?php get_template_part( 'svg-template/svg', 'naos_logo' ) ?>
    </div>
    <div class="name">
      <h1><?php echo is_front_page() ? 'Home' : get_the_title().' Home' ?></h1>
    </div>
  </div>
</div>