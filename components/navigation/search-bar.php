<?php
/**
 * SEARCH BAR
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

 $rangeTerms = get_terms([
   'taxonomy' => 'range',
   'hide_empty' => 'false'
 ]);

 $productTerms = get_terms([
   'taxonomy' => 'product',
   'hide_empty' => 'false'
 ]);

 ?>

 <div class="search-bar__container">
  <div class="mobile-filter " id="filterIcon">
     <div class="mobile-filter__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="17.7" height="17.7" viewBox="0 0 17.7 17.7">
          <path id="Path_2523" data-name="Path 2523" d="M12,6V4m0,2a2,2,0,0,0,0,4m0-4a2,2,0,0,1,0,4M6,18a2,2,0,0,0,0-4m0,4a2,2,0,0,1,0-4m0,4v2m0-6V4m6,6V20m6-2a2,2,0,0,0,0-4m0,4a2,2,0,0,1,0-4m0,4v2m0-6V4" transform="translate(-3.15 -3.15)" fill="none" stroke="#6d7780" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"/>
        </svg>
     </div>
   </div>
   <form method="GET" id="sortForm" >
    <select name="orderby" id="orderby">
      <option value="">Order by</option>
      <option value="title" <?php echo selected( $_GET['orderby'], 'title' ) ?>>Alphabetical</option>
      <option value="date" <?php echo selected( $_GET['orderby'], 'date' ) ?>>Newst to oldest</option>
    </select>

    <input 
    id="order"
    type="hidden"
    name="order"
    value="<?php echo (isset($_GET['order']) && $_GET['order'] == 'ASC') ? 'ASC' : 'DESC'; ?>"
    >

    <select name="range" id="range">
      <option value="">Search by Range</option>
      <?php foreach($rangeTerms as $range) : ?>
        <option value="<?php echo $range->slug ?>" <?php echo selected( $_GET['range'], $range->slug ) ?>><?php echo $range->name ?></option>
      <?php endforeach; ?>
    </select>

    <select name="product" id="product">
      <option value="">Search by Product</option>
      <?php foreach($productTerms as $product) : ?>
        <option value="<?php echo $product->slug ?>" <?php echo selected( $_GET['product'], $product->slug ) ?>><?php echo $product->name ?></option>
      <?php endforeach; ?>
    </select>

    <button type="submit" >Apply</button>
   </form>

 
 </div>