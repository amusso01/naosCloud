<?php
/**
 * Template Name: Home category
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

  <main class="main front-main" role="main">

    <section class="front-hero">
      
      <?php get_template_part( 'components/front/hero' ); ?>

    </section>

    <section class="front-content">
      <div class="front-content__main">
        <?php get_template_part( 'components/front/content' ); ?>
      </div>
      <div class="front-content__sidebar">
        <?php get_template_part( 'components/front/sidebar' ); ?>
      </div>
    </section>

  </main>

  

</div>





<?php get_footer(); ?>
