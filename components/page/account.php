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

