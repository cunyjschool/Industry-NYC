<div id="tabbed">

    <ul class="idTabs">
        <li><a href="#pop"><?php _e('Popular',woothemes); ?></a></li>
        <li><a href="#comm"><?php _e('Latest Comments',woothemes); ?></a></li>
        <li><a href="#feat"><?php _e('Featured',woothemes); ?></a></li>
        <li><a href="#tags"><?php _e('Tags',woothemes); ?></a></li>
    </ul><!--idTabs-->
    
    <div class="content">

        <ul id="pop">
            <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
        </ul><!--pop-->

        <ul id="comm">
            <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
        </ul><!--comm-->

        <ul id="feat">
            <?php 
                $the_query = new WP_Query('tag=featured&offset=1&showposts=10&orderby=post_date&order=desc');	
                while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
            ?>
            <li><a title="<?php _e('Permanent Link to',woothemes); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php endwhile; ?>		
        </ul><!--feat-->
        
        <div id="tags">
            <?php wp_tag_cloud('smallest=12&largest=20'); ?>
        </div>
    </div><!--content-->

</div><!--tabbed-->