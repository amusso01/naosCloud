<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

get_header();
?>


<div class="site-container">

  <?php get_template_part( 'components/page/side-nav' ); ?>

  <main class="main tax-main bioderma-main__tax"  role="main">

    <section class="site-hero">
      
      <?php get_template_part( 'components/hero/hero-tax' ); ?>

    </section>

    <section class="sort-bar content-block">
      <?php get_template_part( 'components/navigation/search-bar-institut' ); ?>
      <?php get_template_part( 'components/navigation/sort-bar' ); ?>
    </section>


    <section id="assetGrid" class="asset-grid content-block">

      <?php if ( have_posts() ) : ?>
  
        <?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>
  
         <?php get_template_part( 'components/page/grid-item' ); ?>
  
        <?php endwhile; ?>
  
      <?php else :?>
  
        <?php get_template_part( 'template-parts/content', 'none' );?>
  
      <?php endif; ?>
      
    </section>

  </main>

  

</div>


<?php
get_footer();
