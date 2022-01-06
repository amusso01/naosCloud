<?php
/**
 * Bioderma Hero
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

 ?>

 <?php

// get the current taxonomy term
$term = get_queried_object();

$image = get_field('featured_image', 'term_' . $term->term_id);
// debug($term);
?>

 <section class="tax-hero">
   <div class="tax-hero__bg-image content-block" style="background-image:url(<?php echo  $image  ?>)">
   <div class="tax-hero__title">
      <h1><?php echo $term->name ?></h1>
      <p class="description"><?php echo $term->description ?></p>
    </div>
   </div>
 </section>