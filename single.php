<?php get_header(); ?>

        	<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if ( get_option( 'woo_breadcrumbs' ) == 'true') { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
    
            <div class="post" id="post-<?php the_ID(); ?>">
                <h1><?php the_title(); ?></h1>
                <p class="meta"><?php _e('Posted on',woothemes); ?> <?php the_time('F jS, Y') ?> <?php _e('by',woothemes); ?> <?php the_author() ?> <?php _e('in',woothemes); ?> <?php the_category(', ') ?></p>
    
                <div class="entry">
					<?php if (get_option('woo_image_single') == 'true' ) woo_get_image('image',get_option('woo_single_width'),get_option('woo_single_height'),'thumbnail alignleft'); ?>
                    <?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>',woothemes)); ?>
                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    
                    <!--
                    <?php trackback_rdf(); ?>
                    -->
    
                    <?php edit_post_link('Edit this entry','','.'); ?>
    
                </div>
                <div class="fix"></div>
                
            </div>

			<!-- MPU 300x300 ad -->
			<div id="advert_content">
			<?php if (get_option('woo_ad_content') == 'true') { if (get_option('woo_ad_content_adsense') <> "") echo stripslashes(get_option('woo_ad_content_adsense')); else { ?>
			        <a href="<?php echo get_option('woo_ad_content_url'); ?>"><img src="<?php echo get_option('woo_ad_content_image'); ?>" width="468" height="60" alt="advert" /></a>
			
			<?php } }?>
			</div>               
    
        <?php comments_template(); ?>
    
        <?php endwhile; else: ?>
    
                <p><?php _e('Sorry, no posts matched your criteria.',woothemes); ?></p>
    
        <?php endif; ?>
        
            </div><!--content-->		
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>