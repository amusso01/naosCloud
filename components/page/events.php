<?php
/**
 * Page Events loop for training page
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>


<?php 



$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1,
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) :
while ( $the_query->have_posts() ) : $the_query->the_post();

$dates = get_field('date', $post->ID);
$startDate = $dates['start_date'];
$endDate = $dates['end_date'];


?>
  
<a class="post-event__link" href="<?php the_permalink() ?>">
  <article class="post-event">
    <div class="start-end">
      <p class="start"><?php echo $startDate ?></p>
      <p class="end"><?php echo $endDate ? '- '.$endDate : '' ?></p>
    </div>
    <div class="event-info">
      <h4><?php echo get_the_title() ?></h4>
      <p class="excerpt"><?php echo get_the_excerpt() ?></p>
    </div>
  </article>
</a>


<?php
endwhile;
endif;

// Reset Post Data
wp_reset_postdata();


?>