<?php
/**
 * Template Name: Page my account
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

  <main class="main myAccount-main" role="main">

    <section class="account-hero">
      
      <?php get_template_part( 'components/page/hero-account' ); ?>

    </section>

    <section class="myAccount-content content-block">

      <?php get_template_part( 'components/page/account' ); ?>  
        
    </section>

  </main>

  

</div>


<?php
get_footer();
