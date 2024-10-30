<?php
/**
 * @package Ytube Channel Subscribe Button
 * @version 1.0
 */
/*
Plugin Name: Ytube channle subscribe button
Plugin URI: ''
Description: Support multiple youtube channel with short code
Author: Ajay Gadhavana
Version: 1.0
Author URI: http://www.websdevelopers.com
*/

// create custom plugin settings menu
add_action('admin_menu', 'youtube_subscribe_setting_page');

function youtube_subscribe_setting_page() {

	//create new top-level menu
	add_menu_page('Youtube channel settings', 'Ytube Settings', 'administrator', __FILE__, 'youtube_setting_page' , '' );

}

function youtube_setting_page() {
	?>
<div class="wrap">
<p>
	<h1>Youtube subscribe button shortcode</h1>
	<hr>
	<ul>
		<li>[youtube_subscribe]</li>
		<li>[youtube_subscribe channel=subarumydrug]</li>
		<li>[youtube_subscribe channel_id=subarumydrug]</li>
		<li>Find your youtube channel id from <a href="https://www.youtube.com/account_advanced" target="_blank"> here </a></li>
	</ul>
</p>  

</div>
<?php } ?>


<?php 
function youtube_subscribe($atts, $content = null, $channelData = ''){
	extract( shortcode_atts(array('channel'  => '','channel_id' => ''), $atts));
	if($channel != "" ){
		$channelData = 'data-channel="'.sanitize_text_field($channel).'"';
	} else if( $channel_id != ""){
		$channelData = 'data-channelid="'.sanitize_text_field($channel_id).'"';
	} else {
		echo "please provide channelor channel_id in shortcode";
		return ;
	}
	
	return '<script src="https://apis.google.com/js/platform.js"></script>
<div class="g-ytsubscribe" '.$channelData.' data-layout="default" data-count="default"></div>';
}
add_shortcode( 'youtube_subscribe', 'youtube_subscribe');
?>
