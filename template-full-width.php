<?php
/**
 * Template Name: Page full width
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

<main class="main full-width__main" role="main">

  <section class="full-width__hero">
    
    <?php get_template_part( 'components/page/hero' ); ?>

  </section>


  <section class="full-width__content content-block">
    <?php get_template_part( 'components/page/content' ); ?>
  </section>

</main>



</div>


<?php
get_footer();
