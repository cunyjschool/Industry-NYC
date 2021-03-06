<?php

function woo_options(){
// VARIABLES
$themename = "Newsport";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/newsport/';
$shortname = "woo";

$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

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
						
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    

$options[] = array(	"name" => "Align Logo left",
					"desc" => "Align the logo to the left instead of center align.",
					"id" => $shortname."_logo_left",
					"std" => "false",
					"type" => "checkbox");						
                                                                                     
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feedburner_url",
					"std" => "",
					"type" => "text");

$options[] = array(	"name" => "Feedburner RSS ID",
					"desc" => "Enter your preferred subscribe to E-mail URL. (Feedburner or other) ",
					"id" => $shortname."_feedburner_id",
					"std" => "",
					"type" => "text");							
                    
$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");	

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

$options[] = array( "name" => "Dynamic Images",
				    "type" => "heading");    

$options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
                    
$options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Featured Images",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_feat_image_width',
											'type' => 'text',
											'std' => 458,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_feat_image_height',
											'type' => 'text',
											'std' => 230,
											'meta' => 'Height')
								  ));								  

$options[] = array( "name" => "Category Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_home_thumb_width',
											'type' => 'text',
											'std' => 110,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_home_thumb_height',
											'type' => 'text',
											'std' => 75,
											'meta' => 'Height')
								  ));		
																		    								
$options[] = array( "name" => "Footer Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_width',
											'type' => 'text',
											'std' => 140,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_height',
											'type' => 'text',
											'std' => 90,
											'meta' => 'Height')
								  ));																			    								

$options[] = array(	"name" => "Enable Archives",
					"desc" => "Check this if you want to display the thumbnail on the archive pages.",
					"id" => $shortname."_image_archives",
					"std" => "false",
					"type" => "checkbox");	

$options[] = array( "name" => "Archive Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_archive_width',
											'type' => 'text',
											'std' => 140,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_archive_height',
											'type' => 'text',
											'std' => 90,
											'meta' => 'Height')
								  ));																																					    								

$options[] = array(	"name" => "Enable Single Post",
					"desc" => "Check this if you want to display the thumbnail on the single posts.",
					"id" => $shortname."_image_single",
					"std" => "false",
					"type" => "checkbox");																

$options[] = array( "name" => "Single Post Thumbnails",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_single_width',
											'type' => 'text',
											'std' => 180,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_single_height',
											'type' => 'text',
											'std' => 120,
											'meta' => 'Height')
								  ));																	    								

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

update_option('woo_template',$options);      
update_option('woo_themename',$themename);   
update_option('woo_shortname',$shortname);
update_option('woo_manual',$manualurl);

                                     
// Woo Metabox Options
                    

$woo_metaboxes = array(

		"image" => array (
			"name"		=> "image",
			"default" 	=> "",
			"label" 	=> "Image",
			"type" 		=> "upload",
			"desc"      => "Enter the URL for image to be used by the Dynamic Image resizer."
		)
		
    );
        
update_option('woo_custom_template',$woo_metaboxes);      

/*
function woo_update_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}

function woo_add_options(){
        $options = get_option('woo_template',$options);  
        foreach ($options as $option){
            update_option($option['id'],$option['std']);
        }   
}


//add_action('switch_theme', 'woo_update_options'); 
if(get_option('template') == 'wooframework'){       
    woo_add_options();
} // end function 
*/


}

add_action('init','woo_options');  

?>