<?php

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");
	$id = $settings['id'];
	$number = $settings['number'];

?>
<div id="flickr" class="block">
	<h2 class="widget_title"><?php _e("Photos on <span>flick<span>r</span></span>",woothemes); ?></h2>
	<div class="wrap">
		<div class="fix"></div>
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>        
		<div class="fix"></div>
	</div>
</div>
<?php
}
function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}
register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);



// =============================== Quote widget ======================================

function quoteWidget() {

	$settings = get_option("widget_quotewidget");

	$title = $settings['title'];
	if ($title == "") $title = "Quote of the Day";
	$text = $settings['text'];
	$by = $settings['by'];

?>
	<div id="qotd">
    
        <h2><?php echo $title; ?></h2>
        <p><?php echo $text; ?><cite><?php echo $by; ?></cite></p>
	</div>
<?php
}
// quote widget
function quotewidgetAdmin() {

	$settings = get_option("widget_quotewidget");

	// check if anything's been sent
	if (isset($_POST['update_quote'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['quote_title']));
		$settings['text'] = strip_tags(stripslashes($_POST['quote_text']));
		$settings['by'] = strip_tags(stripslashes($_POST['quote_by']));

		update_option("widget_quotewidget",$settings);
	}

	echo '<p>
			<label for="quote_title">Title:
			<input id="quote_title" name="quote_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="quote_text">Text:
			<input id="quote_text" name="quote_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';
	echo '<p>
			<label for="quote_by">Citation:
			<input id="quote_by" name="quote_by" type="text" class="widefat" value="'.$settings['by'].'" /></label></p>';
	echo '<input type="hidden" id="update_quote" name="update_quote" value="1" />';

}

register_sidebar_widget('Woo - Quote', 'quotewidget');
register_widget_control('Woo - Quote', 'quotewidgetAdmin', 400, 200);

                        
// =============================== Feeds widget ======================================

function feedsWidget() {
	$settings = get_option("widget_feedswidget");
	$title = $settings['title'];
	if ($title == "") $title = "Get Updated";
?>
    <div class="widget quote">
        <h2><?php echo $title; ?></h2>
        <ul>
            <li><a href="<?php bloginfo('rss_url'); ?>"><?php _e("All Categories",woothemes); ?></a></li>
			<?php
                $categories = wp_list_categories('title_li=&show_count=0&echo=0&hierarchical=false');
                $categories = str_replace('" t', '/feed/" t', $categories);
                echo $categories;
            ?>
        </ul>
    </div>
<?php
}
// feeds widget
function feedswidgetAdmin() {
	$settings = get_option("widget_feedswidget");
	// check if anything's been sent
	if (isset($_POST['update_feeds'])) {
		$settings['title'] = strip_tags(stripslashes($_POST['feeds_title']));
		update_option("widget_feedswidget",$settings);
	}
	echo '<p>
			<label for="feeds_title">Title:
			<input id="feeds_title" name="feeds_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<input type="hidden" id="update_feeds" name="update_feeds" value="1" />';
}
register_sidebar_widget('Woo - Feeds', 'feedswidget');
register_widget_control('Woo - Feeds', 'feedswidgetAdmin', 400, 200);
                        
// =============================== Ad 125x125 widget ======================================
function adsWidget()
{
$settings = get_option("widget_adswidget");
$number = $settings['number'];
$title = $settings['title'];
if ($number == 0) $number = 4;
$img_url = array();
$dest_url = array();

$numbers = range(1,$number); 
$counter = 0;

if (get_option('woo_ads_rotate') == 'true') {
	shuffle($numbers);
}
?>
<h2><?php echo $title; ?></h2>
<div id="advert_125x125" class="block wrap">
<?php
	foreach ($numbers as $number) {	
		$counter++;
		$img_url[$counter] = get_option('woo_ad_image_'.$number);
		$dest_url[$counter] = get_option('woo_ad_url_'.$number);
?>
        <a href="<?php echo "$dest_url[$counter]"; ?>"><img src="<?php echo "$img_url[$counter]"; ?>" alt="Ad" /></a>
<?php } ?>
</div>
<!--/ads -->
<?php

}
register_sidebar_widget('Woo - Ads 125x125', 'adsWidget');

function adsWidgetAdmin() {

	$settings = get_option("widget_adswidget");

	// check if anything's been sent
	if (isset($_POST['update_ads'])) {
		$settings['number'] = strip_tags(stripslashes($_POST['ads_number']));
		$settings['title'] = strip_tags(stripslashes($_POST['ads_title']));

		update_option("widget_adswidget",$settings);
	}

	echo '<p>
			<label for="ads_title">Title:
			<input id="ads_title" name="ads_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';
	echo '<p>
			<label for="ads_number">Number of ads (1-4):
			<input id="ads_number" name="ads_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_ads" name="update_ads" value="1" />';

}
register_widget_control('Woo - Ads 125x125', 'adsWidgetAdmin', 200, 200);


// =============================== Search widget ======================================
function searchWidget()
{
include(TEMPLATEPATH . '/searchform.php');
}
register_sidebar_widget('Woo - Search', 'SearchWidget');

?>