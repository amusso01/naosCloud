<?php
/**
 * SORT BAR
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

 ?>


<div id="sortBar" class="sort-bar__view">
  <div id="column" class="sort sort-column active">
    <?php get_template_part( 'svg-template/svg', 'view_grid' ) ?>
  </div>
  <div id="list" class="sort sort-row">
    <?php get_template_part( 'svg-template/svg', 'view_list' ) ?>
  </div>
</div>