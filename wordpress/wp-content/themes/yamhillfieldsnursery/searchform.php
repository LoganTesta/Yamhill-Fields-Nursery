<?php

?>

<form role="search" class="search-form" id="searchForm" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-container">
        <label class="search-form__label" for=""></label>
        <input type="search" class="search-form__input" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
    </div> 
    <div class="input-container">
        <button type="submit" class="search-form__button">Search</button>
    </div>
</form>
