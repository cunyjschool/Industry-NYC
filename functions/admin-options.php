<?php

// CATEGORY NEWS BOXES (homepage)
function category_boxes($options) {		
	$cats = get_categories('hide_empty=0');
	foreach ($cats as $cat) {
		$options[] = array(	"name" =>  $cat->cat_name,
					"desc" => "Check this box if you wish to include this category in the right-hand panel on the homepage.",
					"id" => "woo_cat_box_".$cat->cat_ID,
					"std" => "",
					"type" => "checkbox");					
	}
	return $options;
}
// CATEGORY NEWS BOXES (footer)
function category_boxes_footer($options) {		
	$cats = get_categories('hide_empty=0');
	foreach ($cats as $cat) {
		$options[] = array(	"name" =>  $cat->cat_name,
					"desc" => "Check this box if you wish to include this category in the right-hand panel on the homepage.",
					"id" => "woo_cat_box_footer_".$cat->cat_ID,
					"std" => "",
					"type" => "checkbox");					
	}
	return $options;
}

// THIS IS THE DIFFERENT FIELDS
$options[] = array(	"name" => "General Settings",
					"type" => "heading");
						
$options[] = array(	"name" => "Theme Stylesheet",
					"desc" => "Please select your colour scheme here.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array(	"name" => "Custom Logo",
					"desc" => "Paste the full URL of your custom logo image, should you wish to replace our default logo e.g. 'http://www.yoursite.com/logo.png'.",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text");					 							    

$options[] = array(	"name" => "Align Logo left",
					"desc" => "Align the logo to the left instead of center align.",
					"id" => $shortname."_logo_left",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Google Analytics",
					"desc" => "Please paste your Google Analytics (or other) tracking code here. (Optional) ",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");		

$options[] = array(	"name" => "Feedburner ID",
					"desc" => "Enter your Feedburner URL here. (Optional) ",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Feedburner RSS ID",
					"desc" => "Enter your Feedburner ID here so that users can subscribe by E-mail. (Optional) ",
					"id" => $shortname."_feedburner_id",
					"std" => "",
					"type" => "text");			

$options[] = array(	"name" => "Layout Settings",
					"type" => "heading");	

$options[] = array(	"name" => "Show Breadcrumbs",
					"desc" => "Show breadcrumbs on archive and posts pages.",
					"id" => $shortname."_breadcrumbs",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Categories Top Menu",
					"desc" => "Show categories in the menu instead of pages.",
					"id" => $shortname."_cat_nav",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Exclude from menu",
					"desc" => "Enter a comma-separated list of the <a href='http://support.wordpress.com/pages/8/'>Page/Cat ID's</a> that you'd like to exclude from the main main menu navigation. (e.g. 1,2,3,4)",
					"id" => $shortname."_nav_exclude",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Archive Content",
					"desc" => "If checked, archive pages will display the full post content. If unchecked it will display the excerpt only.",
					"id" => $shortname."_content_archives",
					"std" => "false",
					"type" => "checkbox");											

$options[] = array(	"name" => "Popular Posts Sidebar Tabs",
					"desc" => "Select the number of popular posts (most commented posts) you'd like to display in the sidebar tabs. Default = 5.",
					"id" => $shortname."_popular_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					

$options[] = array(	"name" => "Recent Comments Sidebar Tabs",
					"desc" => "Select the number of recent comments you'd like to display in the sidebar tabs. Default = 5.",
					"id" => $shortname."_comment_posts",
					"std" => "Select a number:",
					"type" => "select",
					"options" => $other_entries);					

$options[] = array(	"name" =>  "Category News Boxes (Homepage right side)",
					"type" => "heading");

$options[] = array(	"name" => "Posts per category",
					"desc" => "Select the number of posts you'd like to display from each category listed.",
					"id" => $shortname."_cat_list",
					"std" => "Select a Number:",
					"type" => "select",
					"options" => $other_entries);

$options = category_boxes($options);	

$options[] = array(	"name" =>  "Category News Boxes (Footer right side)",
					"type" => "heading");

$options[] = array(	"name" => "Exclude posts",
					"desc" => "Check this if you want to exclude posts already shown on the page (e.g. Featured, Top Cat boxes, More News)",
					"id" => $shortname."_ex_cat_footer",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Posts per category",
					"desc" => "Select the number of posts you'd like to display from each category listed.",
					"id" => $shortname."_cat_list_footer",
					"std" => "Select a Number:",
					"type" => "select",
					"options" => $other_entries);

$options = category_boxes_footer($options);	

$options[] = array(	"name" => "Image Resizer",
					"type" => "heading");

$options[] = array(	"name" => "Featured Image Width",
					"desc" => "<strong>Default: 458px</strong>. Enter an integer value i.e. 250 for the desired width which will be used when dynamically creating the images.",
					"id" => $shortname."_feat_image_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Featured Image Height",
					"desc" => "<strong>Default: 230px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images.",
					"id" => $shortname."_feat_image_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Categories Thumbnail Width",
					"desc" => "<strong>Default: 110px</strong>. Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_home_thumb_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Categories Thumbnail Height",
					"desc" => "<strong>Default: 75px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_home_thumb_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Footer Thumbnail Width",
					"desc" => "<strong>Default: 140px</strong>. Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Footer Thumbnail Height",
					"desc" => "<strong>Default: 90px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_thumb_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Enable Archives",
					"desc" => "Check this if you want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_archives",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Archive Width",
					"desc" => "<strong>Default: 140px</strong>. Enter an integer value i.e. 150 for the desired width which will be used when dynamically creating the images. ",
					"id" => $shortname."_archive_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Archive Height",
					"desc" => "<strong>Default: 90px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_archive_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Enable Single Post",
					"desc" => "Check this if you want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array(	"name" => "Single Width",
					"desc" => "<strong>Default: 180px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_width",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Single Height",
					"desc" => "<strong>Default: 120px</strong>. Enter an integer value i.e. 150 for the desired height which will be used when dynamically creating the images. ",
					"id" => $shortname."_single_height",
					"std" => "",
					"type" => "text");																			    								

$options[] = array(	"name" => "Banner Ad Top (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Enable Ad",
					"desc" => "Enable the ad space to the right of the logo. The logo will be aligned to the left.",
					"id" => $shortname."_ad_top",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Top - Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Top - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad Content (468x60px)",
					"type" => "heading");

$options[] = array(	"name" => "Enable Ad",
					"desc" => "Enable the ad space that will show in single post pages above comments section.",
					"id" => $shortname."_ad_content",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_content_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_content_image",
					"std" => "http://www.woothemes.com/ads/woothemes-468x60-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_content_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						


$options[] = array(	"name" => "Banner Ad MPU (300x250px)",
					"type" => "heading");

$options[] = array(	"name" => "Enable Ad",
					"desc" => "Enable the 300x250 ad in top right homepage",
					"id" => $shortname."_ad_300",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Show in footer",
					"desc" => "Show the ad in the right hand side footer area instead of at the top.",
					"id" => $shortname."_ad_300_bot",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array(	"name" => "Adsense code",
					"desc" => "Enter your adsense code here.",
					"id" => $shortname."_ad_300_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array(	"name" => "Banner Ad Content - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_300_image",
					"std" => "http://www.woothemes.com/ads/woothemes-300x250-2.gif",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad Content - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_300_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ads Sidebar - Widget (125x125)",
					"type" => "heading");

$options[] = array(	"name" => "Rotate banners?",
					"desc" => "Check this to randomly rotate the banner ads.",
					"id" => $shortname."_ads_rotate",
					"std" => "true",
					"type" => "checkbox");	

$options[] = array(	"name" => "Banner Ad #1 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-1.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #1 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.woothemes.com",
					"type" => "text");						

$options[] = array(	"name" => "Banner Ad #2 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-2.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #2 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #3 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-3.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #3 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.woothemes.com",
					"type" => "text");

$options[] = array(	"name" => "Banner Ad #4 - Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.woothemes.com/ads/woothemes-125x125-4.gif",
					"type" => "text");
						
$options[] = array(	"name" => "Banner Ad #4 - Destination",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.woothemes.com",
					"type" => "text");
?>