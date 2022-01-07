<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */



 /*==================================================================================
   accordion, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/
 if( function_exists('acf_register_block') ) {

 	$result = acf_register_block(array(
 		'name'				     => 'fd_accordion',
 		'title'				     => __('Accordion'),
 		'description'		   => __('Accordion block'),
 		'render_callback'	 => 'foundry_gutenblock_accordion',
 		'category'		     => 'fd-category', // common, formatting, layout, widgets, embed
 		'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#fff ',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#22D761',
            // Specifying a dashicon for the block
            'src' => 'media-spreadsheet',
            'mode'              => 'edit',
            'align'             => 'full',
            ),
 		'keywords'		     => ['fd', 'accordion', 'image']
 	));
 }

 /* Render Block
 /––––––––––––––––––––––––*/
 function foundry_gutenblock_accordion() {
    
   
    // Get Vars
    $accordion = get_field('accordion');

    // Return HTML

    ?>

    <section  class="block-accordion">
      <div class="accordion-container">

        <dl id="js-badger-accordion" class="js-badger-accordion badger-accordion">
    
          <?php foreach($accordion as $item) : ?>
            <dt class="badger-accordion__header">
              <button class=" badger-accordion__trigger js-badger-accordion-header">
                  <div class="badger-accordion__trigger-title">
                    <?php echo $item['accordion_title'] ?>
                  </div>
                  <div class="badger-accordion__trigger-icon">
                    <div class="close">
                    <?php get_template_part( 'svg-template/svg','plus' ) ?>
                    </div>
                    <div class="open">
                      <?php get_template_part( 'svg-template/svg','minus' ) ?>
                    </div>
                  </div>
              </button>
          </dt>
          <dd class="badger-accordion__panel-inner text-module badger-accordion__panel js-badger-accordion-panel">
              <div class="js-badger-accordion-panel-inner">
                  <?php echo $item['accordion_body'] ?>
              </div>
          </dd>
          <?php endforeach; ?>
    
        </dl>

      </div>


    </section>


<?php
}

   
 