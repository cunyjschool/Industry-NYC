<?php get_header(); ?>

        	<div id="content">

			<?php if (have_posts()) : ?>
                <h1><?php _e('Search Results',woothemes); ?></h1>
                <p>
                    <?php _e('Your search topic',woothemes); ?> <strong><?php echo wp_specialchars($s); ?></strong> <?php _e('returned the following articles:',woothemes); ?>
                </p>
                <?php while (have_posts()) : the_post(); ?>
        
                    <div class="post">
                        <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',woothemes); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <small><?php the_time('l, F jS, Y') ?></small>
        
                        <?php the_excerpt() ?>
                        
                        <p class="postmetadata"><?php the_tags(__('Tags: ',woothemes), ', ', '<br />'); ?> <?php _e('Posted in',woothemes); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;',woothemes), __('1 Comment &#187;',woothemes), __('% Comments &#187;',woothemes)); ?></p>
                    </div>
        
                <?php endwhile; ?>
        
                <ul id="prev-next">
                    <li><?php posts_nav_link('','',__('&laquo; Previous Entries',woothemes)) ?></li>
                    <li><?php posts_nav_link('',__('Next Entries &raquo;',woothemes),'') ?></li>
                </ul>
        
            <?php else : ?>
        
                <h1><?php _e('Search Results',woothemes); ?></h1>
                <p>
                    <?php _e('Sorry, but your search term',woothemes); ?> <strong><?php echo wp_specialchars($s); ?></strong> <?php _e('returned <strong>0</strong> results.',woothemes); ?>
                </p>
        
            <?php endif; ?>
    
            </div><!--content-->		
    

<?php get_sidebar(); ?>
<?php get_footer(); ?>