<form class="search header_search clearfix animated searchHelperFade" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<input class="col-md-12 search_text" id="appendedInputButton" placeholder="<?php _e( 'Hit enter to search', 'asalah' ); ?>" type="text" name="s">
	<input type="hidden" name="post_type" value="post" />
	<i class="fa fa-search"><input type="submit" id="searchsubmit" value="" /></i>
</form>
