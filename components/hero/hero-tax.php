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
$name = $term->name;
$description = $term->description;


if ( is_singular( array( 'etat_pur', 'bioderma', 'institut_esthederm' ) ) ) {
  $terms = get_the_terms( $post->ID , $post->post_type ); 
  $image = get_field('image', 'option');
  $name = $post->post_title;
  $description = get_the_excerpt();
}

?>

 <section class="tax-hero">
   <div class="tax-hero__bg-image content-block" style="background-image:url(<?php echo  $image  ?>)">
   <div class="tax-hero__title">
      <h1><?php echo $name ?></h1>
      <p class="description"><?php echo $description ?></p>
    </div>
   </div>
 </section>