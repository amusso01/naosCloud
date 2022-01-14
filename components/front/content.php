<?php
/**
 * HomePage content
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>

<?php 

the_content();

?>

<div class="front-usp-bar">
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg', 'access' ) ?>
    <p>Exclusive access</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'help') ?>
    <p>Help & support</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'social') ?>
    <p>Social media content</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'training') ?>
    <p>Training</p>
  </div>
</div>

<?php 
 $videoArgs = array(
  'post_type'      => 'how_to_video',
  'post_status'    => 'publish',
  'posts_per_page' => -1
);

$the_video_query = new WP_Query( $videoArgs );
?>

<div class="how-to-section">
  <h2 class="h1">How to use NAOS Cloud?</h2>
  <?php  
 if ( $the_video_query->have_posts() ) :?>
 <div class="glide-carousel">
    <!-- <div class="glide__track" data-glide-el="track">
      <div class="glide__slides"> -->
        <?php
        while ( $the_video_query->have_posts() ) : $the_video_query->the_post();
        ?>


        <article class="how-to-video__item glide__slide">
          <a href="<?php the_permalink(  ) ?>">
            <div class="image">
              <figure>
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="video still image">
              </figure>
            </div>
            <div class="event-info">
              <h4><?php echo get_the_title() ?></h4>
              <p class="excerpt"><?php echo  wp_trim_words(get_the_excerpt(), 13) ?></p>
            </div>
          </a>
        </article> 

  
        <?php
        endwhile;?>
      <!-- </div>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
    </div> -->
  </div>
    <?php
  endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>
</div>


<?php 
 $uploadsArgs = array(
  'post_type'      => array('bioderma', 'institut_esthederm', 'etat_pur'),
  'post_status'    => 'publish',
  'posts_per_page' => 3
);

$the_upload_query = new WP_Query( $uploadsArgs );
?>


<div class="download-section" style="margin-top:50px">
  <h2 class="h1">New Uploads</h2>
  <?php  
 if ( $the_upload_query->have_posts() ) :?>
 <div class="glide-carousel">
    <!-- <div class="glide__track" data-glide-el="track">
      <div class="glide__slides"> -->
        <?php
        while ( $the_upload_query->have_posts() ) : $the_upload_query->the_post();
        ?>


        <article class="download__item glide__slide">
          <a href="<?php the_permalink(  ) ?>">
            <div class="image-uploads">
              <figure>
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="video still image">
              </figure>
            </div>
            <div class="event-info">
              <h4><?php echo get_the_title() ?></h4>
              <p class="excerpt"><?php echo  wp_trim_words(get_the_excerpt(), 13) ?></p>
            </div>
          </a>
        </article> 

  
        <?php
        endwhile;?>
      <!-- </div>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
    </div> -->
  </div>
    <?php
  endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>
</div>
