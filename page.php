<?php get_header(); ?>

        	<div id="content">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h1><?php the_title(); ?></h1>
                    <div class="entry">
                        <?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>',woothemes)); ?>
        
                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                        
                        <?php edit_post_link('Edit this page.', '<p>', '</p>'); ?>
                    </div>
                    <div class="fix"></div>
                    
                </div>
                <?php endwhile; else: ?>
              
                <p><?php _e('Sorry, no posts matched your criteria.',woothemes); ?></p>
                
                <?php endif; ?>

            </div><!--content-->		
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>