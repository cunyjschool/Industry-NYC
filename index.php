<?php get_header(); ?>
       
        	<div id="content">
            
                <div id="left">
            
            		<!-- Featured post -->
                    <?php query_posts('tag=featured&showposts=1'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php $GLOBALS['exclude'][$GLOBALS[ex_count]] = $post->ID; $GLOBALS[ex_count]++; ?>
                    <div class="featured post" id="post-<?php the_ID(); ?>">

						<?php woo_get_image('image',get_option('woo_feat_image_width'),get_option('woo_feat_image_height'),''); ?>
                        <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                        <?php the_excerpt(); ?>
                        
                    </div>
                    <?php endwhile; endif; ?>
            		<!-- /Featured post -->
                    
                    <!-- Tabs -->
                    <?php include( TEMPLATEPATH . '/includes/tabber.php' ); ?>
                    <!-- /Tabs -->
                
                </div><!--left-->
                
                <div id="right">
                
                <!-- MPU 300x300 ad -->
				<?php if (get_option('woo_ad_300')  == 'true' && get_option('woo_ad_300_bot')  == 'false' ) { if (get_option('woo_ad_300_adsense') <> "") echo stripslashes(get_option('woo_ad_300_adsense')); else { ?>
                    <div id="advert_300x250">
                    	<a href="<?php echo get_option('woo_ad_300_url'); ?>"><img src="<?php echo get_option('woo_ad_300_image'); ?>" width="300" height="250" alt="advert" /></a>
                    </div>
                <?php } }?>	                
            
				<?php if (!get_option('woo_cat_list') == 0) : ?>
				<?php $getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_box_")); ?>
                <?php foreach ( $getcats as $cat ) { ?>		
            
                    <div class="news">		
                    
                        <?php $count=0; query_posts("cat=".$cat->cat_ID."&showposts=100"); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if (in_array($post->ID,$GLOBALS['exclude'])) continue; $GLOBALS['exclude'][$GLOBALS[ex_count]] = $post->ID; $GLOBALS[ex_count]++; ?>
                       
                        <?php if($count==0) : ?>
                     
                        <h2><?php echo $cat->cat_name; ?></h2>
						<?php woo_get_image('image',get_option('woo_home_thumb_width'),get_option('woo_home_thumb_height'),''); ?> 
                        
                        <?php endif; $count++; ?>
                     
                        <h3<?php if($count==2) echo ' class="second"'; ?>><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <p><?php the_content_rss('', TRUE, '', 10); ?></p>
                     
                     <?php if (get_option('woo_cat_list') == $count) break; endwhile; endif; ?>
                    
                   </div><!--news-->
                    
                    <?php } endif;?>	
                
                </div><!--right-->
			
            </div><!--content-->		
                
<?php get_sidebar(); ?>
<?php get_footer(); ?>