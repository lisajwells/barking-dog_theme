<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Barking
* Skin Slug: tg-barking
* Date: 12/20/16 - 07:02:55PM
*
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Init The Grid Elements instance
$tg_el = The_Grid_Elements();

// Prepare main data for futur conditions
$image  = $tg_el->get_attachment_url();
$format = $tg_el->get_item_format();

$output = null;

$media = $tg_el->get_media();

$item_ID = $tg_el->get_item_ID();
$content = get_post_field('post_content', $item_ID);

// if there is a media
if ($media) {

	// Media wrapper start
	$output .= $tg_el->get_media_wrapper_start();

	// Media content (image, gallery, audio, video)
	$output .= $media;

	// if there is an image
	if ($image || in_array($format, array('gallery', 'video'))) {

		// Overlay
		// $output .= $tg_el->get_overlay();

		// Center wrapper start
		$output .= $tg_el->get_center_wrapper_start();
			// $output .= $tg_el->get_icon_element(array('icon' => 'tg-icon-link', 'action' => array('type' => 'link', 'link_target' => '_blank', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-1');
		$output .= $tg_el->get_center_wrapper_end();
		// Center wrapper end

	}

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end

}

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $tg_el->get_the_title(array('link' => false, 'html_tag' => 'h2', 'action' => array('type' => 'link', 'link_target' => '_blank', 'link_url' => 'custom_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-3');
	$output .= $content;
	// $output .= $tg_el->get_the_excerpt(array('length' => '-1', 'suffix' => ''), 'tg-element-5');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;
