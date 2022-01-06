<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

get_header();
?>

<div class="site-container">

<?php get_template_part( 'components/page/side-nav' ); ?>

<main class="main single-main"  role="main">

  <section class="site-hero">
    
    <?php get_template_part( 'components/hero/hero-tax' ); ?>

  </section>


  <section class="single-content content-block">

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>

       <?php get_template_part( 'components/page/single' ); ?>

      <?php endwhile; ?>

    <?php else :?>

      <?php get_template_part( 'template-parts/content', 'none' );?>

    <?php endif; ?>
    
  </section>

</main>



</div>

<?php
get_footer();
