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

  <main class="main front-main" role="main">

    <section class="front-hero">
      
      <?php get_template_part( 'components/front/hero' ); ?>

    </section>

    <section class="front-content">
      <div class="front-content__main" id="caraouselSection" >
        <?php get_template_part( 'components/front/content' ); ?>
      </div>
      <div class="front-content__sidebar">
        <?php get_template_part( 'components/front/sidebar' ); ?>
      </div>
    </section>

  </main>

  

</div>





<?php get_footer(); ?>
