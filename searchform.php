<form role="search" method="get" class="search-form" action="/">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:') ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this site', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s">
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><?php _e( 'Search' ) ?> <span class="fa fa-search"></span></button>
</form>
