<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

        <div id="content">
            <div class="post">
                <div class="entry">
            
                    <h3><?php _e('Pages',woothemes); ?></h3>
        
                    <ul>
                        <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
                    </ul>				

                    <h3><?php _e('Categories',woothemes); ?></h3>
        
                    <ul>
                        <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
                    </ul>	

					<?php
                
                        $cats = get_categories();
                        foreach ($cats as $cat) {
                
                        query_posts('cat='.$cat->cat_ID);
            
                    ?>
                    
                    <h3 style="margin-top:10px !important; padding:0px;"><?php echo $cat->cat_name; ?></h3>
        
                    <ul>	
                            <?php while (have_posts()) : the_post(); ?>
                            <li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php _e('Comments',woothemes); ?> (<?php echo $post->comment_count ?>)</li>
                            <?php endwhile;  ?>
                    </ul>
                
					<?php } ?>					

                </div>
            </div>
        </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
