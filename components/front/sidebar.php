<?php
/**
 * HomePage sidebar
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>



<?php 
  $args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3
  );

  $the_query = new WP_Query( $args );
?>

<sidebar class="front__events-sidebar">
  <h2>Events</h2>
  <?php
  
  if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
    
    $dates = get_field('date', $post->ID);
    $startDate = $dates['start_date'];
    $endDate = $dates['end_date'];
    
    ?>
  
  <article class="front__event">
    <div class="start-end">
      <p><?php echo $startDate ?><?php echo $endDate ? ' - '.$endDate : '' ?></p>
    </div>
    <div class="event-info">
      <h4><?php echo get_the_title() ?></h4>
      <p class="excerpt"><?php echo get_the_excerpt() ?></p>
    </div>
  </article>  

  <?php
    endwhile;
  endif;
    
    // Reset Post Data
    wp_reset_postdata();
  
  ?>
</sidebar>