<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: BarkingTestimonial
* Skin Slug: tg-barking-testimonial
* Date: 12/20/16 - 07:02:55PM
*
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Init The Grid Elements instance
$tg_el = The_Grid_Elements();

// Prepare main data for future conditions
$format = $tg_el->get_item_format();

$output = null;

$item_ID = $tg_el->get_item_ID();
$content = get_post_field('post_content', $item_ID);

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $content;
	$output .= $tg_el->get_the_title(array('link' => false, 'html_tag' => 'cite'), 'tg-element-3');
	// $output .= $tg_el->get_the_excerpt(array('length' => '-1', 'suffix' => ''), 'tg-element-5');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;
