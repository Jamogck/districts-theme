<form role="search" id="searchForm" class="flex flex--stretch" action="<?php echo home_url( '/' ); ?>" method="get">
    <input type="search" class="input-search" name="s" value='<?php the_search_query(); ?>' size="20" maxlength="100" placeholder="Search">
    <input type="submit" class="btn btn_green icon_search" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
</form>