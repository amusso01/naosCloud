<?php
/**
 * HomePage Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>
 

<div class="front-hero__bg-image content-block" style="background-image:url(<?php echo  get_the_post_thumbnail_url() ?>)">
  <div class="front-hero__info">
    <!-- <div class="svg">
      <?php get_template_part( 'svg-template/svg', 'icon_user' ) ?>
    </div> -->
    <div class="name">
      <h1>Home</h1>
      <p>News and updates about the company.</p>
    </div>
  </div>
</div>