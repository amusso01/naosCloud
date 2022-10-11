<?php
/**
 * Template Name: training
 * Template Post Type:  page
 *
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

get_header();
?>

<div class="site-container">

  <?php get_template_part( 'components/page/side-nav' ); ?>

  <main class="main training-main" role="main">

    <section class="site-hero">
      
      <?php get_template_part( 'components/page/hero' ); ?>

    </section>

    <section class="training-content content-block">

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>

        <?php get_template_part( 'components/page/content' ); ?>

      <?php endwhile; ?>

    <?php else :?>

      <?php get_template_part( 'template-parts/content', 'none' );?>

    <?php endif; ?>
        
    </section>

  </main>

  

</div>


<?php
get_footer();
