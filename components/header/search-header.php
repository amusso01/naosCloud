<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s">Search Files:</label>
    <input type="hidden" name="post_type[]" value="bioderma" />
    <input type="hidden" name="post_type[]" value="institut_esthederm" />
    <input type="hidden" name="post_type[]" value="etat_pur" />
    <input type="text" class="search-field" name="s" placeholder="" value="<?php echo get_search_query(); ?>">
    <button type="submit" id="searchSubmit">
      <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414" viewBox="0 0 20.414 20.414">
        <g id="Search" transform="translate(1 1)">
          <g id="Search-2" data-name="Search">
            <path id="Path_2389" data-name="Path 2389" d="M21,21l-6-6m2-5a7,7,0,1,1-7-7,7,7,0,0,1,7,7Z" transform="translate(-3 -3)" fill="none" stroke="#00455e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          </g>
        </g>
      </svg>
    </button>
</form>

<div id="searchMobile" class="search-icon search-mobile">
  <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414" viewBox="0 0 20.414 20.414">
    <g id="Search" transform="translate(1 1)">
      <g id="Search-2" data-name="Search">
        <path id="Path_2389" data-name="Path 2389" d="M21,21l-6-6m2-5a7,7,0,1,1-7-7,7,7,0,0,1,7,7Z" transform="translate(-3 -3)" fill="none" stroke="#00455e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </g>
    </g>
  </svg>  
</div>