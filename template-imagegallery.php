<?php
/*
Template Name: Image Gallery
*/
?>
<?php get_header(); ?>

        <div id="content">
            <div class="post">
                <div class="entry">
						           
                    <h2><?php the_title(); ?></h2>			

                    <?php query_posts('showposts=50'); ?>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
                        <?php $wp_query->is_home = false; ?>

                        <?php woo_get_image('image','thumbnail','','','thumbnail alignleft'); ?>
                    
                    <?php endwhile; endif; ?>	

                </div>
            </div>
        </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
