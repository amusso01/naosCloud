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
   <form method="GET" >
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