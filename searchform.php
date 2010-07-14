<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<fieldset>
		<p><label for="s"><?php _e('Search for:'); ?></label></p>
		<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /></p>
		<p><input type="submit" id="searchsubmit" value="<?php _e('Search',woothemes); ?>" /></p>
	</fieldset>
</form>
