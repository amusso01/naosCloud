<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

get_header();
?>

<div class="site-container">

<?php get_template_part( 'components/page/side-nav' ); ?>

<main class="main page-main" role="main">

  <section class="site-hero">
    
    <?php get_template_part( 'components/front/hero' ); ?>

  </section>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>

      <?php get_template_part( 'template-parts/content', 'page' ) ?>

    <?php endwhile; ?>

  <?php else :?>

    <?php get_template_part( 'template-parts/content', 'none' );?>

  <?php endif; ?>

</main>



</div>


<?php
get_footer();
