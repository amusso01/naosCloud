<?php
/**
 * The template for displaying frontpage by default
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

get_header();
?>

<div class="site-container">

  <?php get_template_part( 'components/page/side-nav' ); ?>

  <main class="main homepage-main" role="main">

    <section class="site-hero">
      
      <?php get_template_part( 'components/front/hero' ); ?>

    </section>

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); // @codingStandardsIgnoreLine ?>

        <?php get_template_part( 'template-parts/content', 'front' ) ?>

      <?php endwhile; ?>

    <?php else :?>

      <?php get_template_part( 'template-parts/content', 'none' );?>

    <?php endif; ?>

  </main>

  

</div>





<?php get_footer(); ?>
