<?php
/**
 * Template Name: Page full width
 * Template Post Type:  page, post, how_to_video, publications
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
  <?php if(is_singular('publications')) : ?>
      <h1 style="text-align: center; padding: 50px 0px; margin-bottom:30px"><?php echo get_the_title() ?></h1>
  <?php else : ?>
    <?php get_template_part( 'components/page/hero' ); ?>
  <?php endif ?>
  </section>

  
  
  <section class="full-width__content content-block">
    <?php if(is_singular('how_to_video')) : ?>
      <div class="single-content__navigation">
        <a class="back-link" href="##" onClick="history.go(-1); return false;"><span><i><?php get_template_part( 'svg-template/svg', 'arrow_dropdown' ) ?></i></span>BACK TO VIDEOS</a>
      </div>
    <?php elseif(is_singular('post')) : ?>
      <div class="single-content__navigation">
        <a class="back-link" href="##" onClick="history.go(-1); return false;"><span><i><?php get_template_part( 'svg-template/svg', 'arrow_dropdown' ) ?></i></span>BACK TO EVENTS</a>
      </div>
    <?php endif; ?>
    <?php get_template_part( 'components/page/content' ); ?>
  </section>

</main>



</div>


<?php
get_footer();
