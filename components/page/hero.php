<?php
/**
 * Page Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>


<section class="tax-hero">
<div class="tax-hero__bg-image content-block" style="background-image:url(<?php echo  get_the_post_thumbnail_url() ?>)">
<div class="tax-hero__title">
   <h1><?php echo get_the_title() ?></h1>
 </div>
</div>
</section>