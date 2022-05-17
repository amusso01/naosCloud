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
$image = get_field('download_image_banner');

$terms = get_the_terms( $post->ID , $post->post_type ); 
$name = $post->post_title;
$description = get_the_excerpt();


?>

 <section class="tax-hero">
   <div class="tax-hero__bg-image content-block" style="background-image:url(<?php echo  $image  ?>)">
   <div class="tax-hero__title">
      <h1><?php echo $name ?></h1>
      <p class="description"><?php echo $description ?></p>
    </div>
   </div>
 </section>