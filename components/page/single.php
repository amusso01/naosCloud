<?php
/**
 * Template part for displaying the single download
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
?>
<?php 

$date = get_the_date( 'd M Y', $post->ID );
$download = get_field('download');
$downloadID = $download->ID;

// DOWNLOAD OBJECT access the object throught the methods finded in the template folder plugin. All the entry are private and no accessible directly 
$downloadObj = download_monitor()->service( 'download_repository' )->retrieve_single($downloadID);

$rangeCat = get_the_terms( $post->ID, 'range_institut_esthederm' );
$productsCat = get_the_terms( $post->ID, 'product_'.$post->post_type );


?>


<div class="single-content__navigation">
  <a class="back-link" href="##" onClick="history.go(-1); return false;"><span><i><?php get_template_part( 'svg-template/svg', 'arrow_dropdown' ) ?></i></span>BACK TO ALL FILES</a>
  <a class="download-link" href="<?php esc_url( $downloadObj->the_download_link() ); ?>"><span><i><?php get_template_part( 'svg-template/svg', 'icon_btn_dwnld' ) ?></i></span>DOWNLOAD</a>
</div>

<div class="single-content__main">
  <div class="single-content__img-wrapper">
    <figure class="single-content__img-container">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="download image">
    </figure>
    <a class="download-link" href="<?php esc_url( $downloadObj->the_download_link() ); ?>"><span><i><?php get_template_part( 'svg-template/svg', 'icon_btn_dwnld' ) ?></i></span>DOWNLOAD</a>
  </div>

  <div class="single-content__info">
    <h1><?php echo $post->post_title ?></h1>
    <div class="download-editor">
      <?php the_content() ?>
    </div>
    <div class="download-info">
      <ul>

        <li>Date added: </li>

        <?php if($rangeCat && $post->post_type !== 'naos_download'): ?>
        <li>Range: </li>
        <?php endif; ?>
        <?php if($productsCat && $post->post_type !== 'naos_download'): ?>
        <li>Product: </li>
        <?php endif; ?>
      </ul>
      <ul>

        <li><?php echo $date; ?></li>

        <?php if($rangeCat && $post->post_type !== 'naos_download'): ?>
        <li><?php echo $rangeCat[0]->name ?></li>
        <?php endif; ?>
        <?php if($productsCat && $post->post_type !== 'naos_download'): ?>
        <li class="products-item" >
          <?php foreach($productsCat as $product) :?>
            <span><?php echo $product->name ?></span>
          <?php endforeach; ?>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
