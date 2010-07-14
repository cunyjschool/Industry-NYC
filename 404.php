<?php get_header(); ?>

        	<div id="content">

                <div class="post">
                    <h1><?php _e('Error 404: Page Not Found',woothemes); ?></h1>
                
                    <p><?php _e("Sorry, but the page or file couldn't be found.",woothemes); ?></p>
                    <h2><?php _e("You can search for what you&#8217;re looking for",woothemes); ?></h2>
                    <?php include(TEMPLATEPATH . "/searchform.php"); ?>
                    </div>

            </div><!--content-->		
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>