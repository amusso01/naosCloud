<?php
/**
 * Template part for displaying the assets grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
?>
<?php 

$excerpt = get_the_excerpt( $post->ID );
$date = get_the_date( 'd M Y', $post->ID )
?>

<article class="asset-grid__item">
  <a href="<?php the_permalink( $post->ID ) ?>">
    <header class="asset-grid__header">
      <figure class="asset-grid__item-image" >
        <img src="<?php echo get_the_post_thumbnail_url($post) ?>" alt="asset preview">
      </figure>
    </header>

    <div class="asset-grid__item-info">
      <p class="date"><?php echo $date ?></p>
      <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
      <p class="excerpt"><?php echo shorten($excerpt, 230) ?></p>
    </div>
  </a>
</article><!-- .asset-grid__item -->
