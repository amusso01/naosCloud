<?php
/**
 * Template part for displaying the account
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
?>

<?php $user =wp_get_current_user(); ?>
<?php $registered = date( "d M Y", strtotime( $user->user_registered ) ) ?>

<?php 
global $wpdb;


$userId = $user -> ID;
$table = $wpdb->prefix . 'download_log';

$downloadIDs = $wpdb->get_results( "SELECT download_id FROM {$table} WHERE  user_id = {$userId} " , OBJECT );

// COLLECT ALL THE DOWNLOAD ID INTO $IDS ARRAY
$IDs = [];
foreach($downloadIDs as $downloadID ){
  if(!in_array($downloadID->download_id, $IDs , true)){
    array_push($IDs , $downloadID->download_id);
  }
}

// CREATE AN ARRAY OF DOWNLOAD OBJECTS FROM $IDS
$downloadObjs = [];
foreach($IDs as $ID ){
  array_push($downloadObjs , download_monitor()->service( 'download_repository' )->retrieve_single($ID) );
}



// dd($downloadObjs);

?>


<div class="user-main-info">
  <div class="user-main-info__item">
    <p>Email:</p>
    <p><?php echo $user->user_email ?></p>
  </div>
  <!-- <div class="user-main-info__item">
    <p>Role: </p>
    <p><?php  debug($role); ?></p>
  </div> -->
  <div class="user-main-info__item">
    <p>Created on:</p>
    <p><?php echo $registered ?></p>
  </div>
</div>
<section class="user-download">
  <h2>My downloads</h2>
  <ul>
    <?php foreach($downloadObjs as $key => $downloadObj) :?>
      <li class="user-download__file" >
        <span class="user-download__title"><?php echo  $downloadObj->post->post_title ?></span>
        <a class="download-link" href="<?php esc_url( $downloadObj->the_download_link() ); ?>"><span><i><?php get_template_part( 'svg-template/svg', 'icon_btn_dwnld' ) ?></i></span>DOWNLOAD</a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

