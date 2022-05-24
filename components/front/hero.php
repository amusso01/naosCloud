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
      <?php 

      if(is_page('institut-of-esthederm-home')) {
        get_template_part( 'svg-template/svg', 'institut-logo' ) ;
      }
      elseif(is_page('bioderma-home')) {
        get_template_part( 'svg-template/svg', 'bioderma-logo' ) ;
      }
      elseif(is_page('etat-pur-home')) {
        get_template_part( 'svg-template/svg', 'etat-logo' ) ;
      }else{
        get_template_part( 'svg-template/svg', 'naos_logo' ) ;
      }
      ?>
    </div>
    <div class="name">

      <h1><?php echo is_front_page() ? '' : get_the_title() ?></h1>

    </div>
  </div> 
</div>