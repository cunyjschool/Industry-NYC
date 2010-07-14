            <div id="news-pics">
                <h2>More News</h2>
                <ul>
                     <?php $count=1; query_posts('showposts=30&exclude='); ?>
					 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <?php if (in_array($post->ID,$GLOBALS['exclude'])) continue; $GLOBALS['exclude'][$GLOBALS[ex_count]] = $post->ID; $GLOBALS[ex_count]++; ?>
                     
                     	<li<?php if($count==1) echo ' class="first"'; if($count==7) echo ' class="last"'; ?>>
							<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),''); ?>
                            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                       	    <p><?php the_content_rss('', TRUE, '', 10); ?></p>
                        </li>
                     <?php $count++; if ($count == 7) break; endwhile; endif; ?>
                </ul>
            </div><!--news-pics-->

            <div id="bottom">
                <div id="widgets">
                    <div id="one">
						<?php dynamic_sidebar('Footer 1'); ?>                    
                    </div>
                    
                    <div id="two">
						<?php dynamic_sidebar('Footer 2'); ?>                    
                    </div>
                    
                    <div id="three">
						<?php dynamic_sidebar('Footer 3'); ?>                    
                    </div>
                </div>
                
                <div id="bottom-right">		

                    <!-- MPU 300x300 ad -->
                    <?php if (get_option('woo_ad_300')  == 'true' && get_option('woo_ad_300_bot') == 'true') { if (get_option('woo_ad_300_adsense') <> "") echo stripslashes(get_option('woo_ad_300_adsense')); else { ?>
                        <div id="advert_300x250">
                            <a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" width="300" height="250" alt="advert" /></a>
                        </div>
                    <?php } }?>	                

					<?php if (!get_option('woo_cat_list_footer') == 0) : ?>
					<?php if (!get_option('woo_ex_cat_footer')) { $GLOBALS['exclude'] = array(); $GLOBALS[ex_count] = 0; } ?>
                    <?php $getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_box_footer_")); ?>
                    <?php foreach ( $getcats as $cat ) { ?>		
                    
                    <?php $count=0; query_posts("cat=".$cat->cat_ID."&showposts=30"); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php if (in_array($post->ID,$GLOBALS['exclude'])) continue; $GLOBALS['exclude'][$GLOBALS[ex_count]] = $post->ID; $GLOBALS[ex_count]++; ?>
                    <div class="news">		
                        <?php if($count==0) : ?>
                     
                        <h2><?php echo $cat->cat_name; ?></h2>
                        <?php woo_get_image('image',get_option('woo_home_thumb_width'),get_option('woo_home_thumb_height'),''); ?> 
                        
                        <?php endif; $count++; ?>
                     
                        <h3<?php if($count==2) echo ' class="second"'; ?>><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <p><?php the_content_rss('', TRUE, '', 10); ?></p>

                    </div><!--news-->
					<?php if (get_option('woo_cat_list_footer') == $count) break; endwhile; endif; ?>
                    
                    <?php } endif; ?>	
            	</div><!--bottom right-->
                                
            </div><!--bottom-->
            
            <div id="footer">
                <ul>
                    <li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>"><?php _e("Home",woothemes); ?></a></li>
                    <?php wp_list_pages('sort_column=menu_order&title_li=&depth=1'); ?>
                </ul>
                
                <p>
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <?php _e("All rights reserved.",woothemes); ?>
                    <?php _e("Powered by",woothemes); ?> <a href="http://www.wordpress.org">Wordpress</a>. 
                    <?php _e("Designed by",woothemes); ?> <a href="http://www.woothemes.com"><img src="<?php bloginfo('template_url'); ?>/images/woo-themes.png" alt="Woo Themes" title="" /></a>
                </p>
            </div><!--footer-->
        </div><!--main-->
        <div id="main-bot"></div>
	</div><!--page-->
<?php wp_footer(); ?>
<?php if ( get_option('woo_google_analytics') <> "" ) { echo stripslashes(get_option('woo_google_analytics')); } ?>
</body>
</html>