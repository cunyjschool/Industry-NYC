<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Search Results',woothemes); ?><?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Author Archives',woothemes); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive',woothemes); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive',woothemes); ?>&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Tag Archive',woothemes); ?>&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="robots" content="noodp" />

<!-- Styles -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection,tv" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" type="text/css" media="print" />

<!-- RSS & Pingback -->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/menu.js"></script>	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>	
<![endif]-->

<!-- WP Head -->
<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>
	
</head>

<?php $GLOBALS['exclude'] = array(); $GLOBALS[ex_count] = 0; ?>

<body id="<?php if(is_home()) echo 'home'; else echo 'sub'; ?>" class="custom">
	
	<div id="page">
        <div id="header">
        
            <div id="logo" <?php if (get_option('woo_ad_top') == 'true' || (get_option('woo_logo_left') == 'true')) echo 'class="fl"'; ?>>
                <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
            </div>
        
            <!-- Top Ad 468x60 -->
            <?php if (get_option('woo_ad_top') == 'true' ) { if (get_option('woo_ad_top_adsense') <> "") echo stripslashes(get_option('woo_ad_top_adsense')); else { ?>
            <div id="advert_top">
                <a href="<?php echo get_option('woo_ad_top_url'); ?>"><img src="<?php echo get_option('woo_ad_top_image'); ?>" width="468" height="60" alt="advert" /></a>
            </div>
			<?php } }?>	                

		</div><!--header-->
                
        <ul id="nav" class="sf-menu">
            <li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home',woothemes); ?></a></li>
			<?php 
            if (get_option('woo_cat_nav') == 'true') 
                wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
            else
                wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); 
            ?>
			<li class="rss" style="float:right"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /></li>
            <li style="float:right"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) echo get_option('woo_feedburner_url'); else echo get_bloginfo_rss('rss2_url'); ?>"><?php _e('RSS',woothemes); ?></a></li>
            <?php if (get_option('woo_feedburner_id')) : ?>
            <li style="float:right"><a href="<?php echo get_option('woo_feedburner_id'); ?>" target="_blank"><?php _e('Email',woothemes); ?></a></li>
            <?php endif; ?>
        </ul>
		
		<div id="main">
