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
$siteDetails = get_blog_details();
$siteId = $siteDetails->blog_id;




the_content();

?>

<div class="front-usp-bar">
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg', 'access' ) ?>
    <p data-i18n-key="icon-exclusive">Exclusive access</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'help') ?>
    <p data-i18n-key="icon-help">Help & support</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'social') ?>
    <p data-i18n-key="icon-social">Social media content</p>
  </div>
  <div class="icon-group">
    <?php get_template_part( 'svg-template/svg',  'training') ?>
    <p data-i18n-key="icon-training">Training</p>
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

<?php if(is_front_page()) : ?>
<div class="how-to-section">
  <h2 class="h1" data-i18n-key="how-to-use">How to use NAOS Cloud?</h2>
  <?php  
 if ( $the_video_query->have_posts() ) :?>

  <div class="glide-carousel">
      <div class="glide__arrows" data-glide-el="controls">
        <div class="glide__arrow glide__arrow--right" data-glide-dir=">">
          <svg data-name="Component 50 – 6" xmlns="http://www.w3.org/2000/svg" width="27.75" height="27.75" viewBox="0 0 27.75 27.75"><g data-name="Group 1086" transform="rotate(180 257 184)"><circle data-name="Ellipse 28" cx="13" cy="13" r="13" transform="translate(487 341.25)" fill="#fff"/><path d="M502.3 350.61l-3.515 3.515 3.515 3.515a1.067 1.067 0 11-1.509 1.51l-4.269-4.269a1.068 1.068 0 010-1.51l4.269-4.269a1.067 1.067 0 111.509 1.509zm11.7 3.515a13.875 13.875 0 11-13.875-13.875A13.891 13.891 0 01514 354.125zm-2.135 0a11.74 11.74 0 10-11.74 11.74 11.754 11.754 0 0011.74-11.74z" fill="#00455e"/></g></svg>
        </div>
      </div>
      <div class="glide__track" data-glide-el="track">
        <div class="glide__slides">

   
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
      </div>
    </div>
  </div>    

    <?php
  endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>
</div>
<?php endif; ?>


<?php 
$postType = '';

if(is_page('institut-of-esthederm-home')) {
  $postType = 'institut_esthederm';
}
elseif(is_page('bioderma-home')) {
  $postType = 'bioderma';
}
elseif(is_page('etat-pur-home')) {
  $postType = 'etat_pur';
}



 $uploadsArgs = array(
  'post_type'      => $postType,
  'post_status'    => 'publish',
  'posts_per_page' => -1
);

$the_upload_query = new WP_Query( $uploadsArgs );
?>


<div class="download-section" style="margin-top:50px">
  <h2 class="h1" data-i18n-key="new-uploads">New Uploads</h2>
  <?php  
 if ( $the_upload_query->have_posts() ) :?>
 <div class="glide-carousel">
    <div class="glide__arrows" data-glide-el="controls">
      <div class="glide__arrow glide__arrow--right" data-glide-dir=">">
        <svg data-name="Component 50 – 6" xmlns="http://www.w3.org/2000/svg" width="27.75" height="27.75" viewBox="0 0 27.75 27.75"><g data-name="Group 1086" transform="rotate(180 257 184)"><circle data-name="Ellipse 28" cx="13" cy="13" r="13" transform="translate(487 341.25)" fill="#fff"/><path d="M502.3 350.61l-3.515 3.515 3.515 3.515a1.067 1.067 0 11-1.509 1.51l-4.269-4.269a1.068 1.068 0 010-1.51l4.269-4.269a1.067 1.067 0 111.509 1.509zm11.7 3.515a13.875 13.875 0 11-13.875-13.875A13.891 13.891 0 01514 354.125zm-2.135 0a11.74 11.74 0 10-11.74 11.74 11.754 11.754 0 0011.74-11.74z" fill="#00455e"/></g></svg>
      </div>
    </div>
    <div class="glide__track" data-glide-el="track">
      <div class="glide__slides">
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
      </div>
    </div>

  
  </div>
    <?php
  endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>
</div>
