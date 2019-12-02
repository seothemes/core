<?php
/**
 * SEO Themes Engine.
 *
 * @package   SeoThemes\Engine
 * @link      https://seothemes.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\Engine;

add_shortcode( 'footer_backtotop', __NAMESPACE__ . '\backtotop_shortcode' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return mixed
 */
function backtotop_shortcode( $atts ) {

	$defaults = [
		'before'   => '',
		'href'     => '#top',
		'class'    => '',
		'nofollow' => true,
		'text'     => __( 'Return to top', 'seothemes-engine' ),
		'after'    => '',
	];

	$atts = shortcode_atts( $defaults, $atts, 'footer_backtotop' );

	$nofollow = $atts['nofollow'] ? 'rel="nofollow"' : '';

	$output = sprintf(
		'%s<a href="%s" %s%s>%s</a>%s',
		$atts['before'],
		esc_url( $atts['href'] ),
		$atts['class'] ? ' class="' . $atts['class'] . '"' : '',
		$nofollow,
		$atts['text'],
		$atts['after']
	);

	return apply_filters( 'genesis_footer_backtotop_shortcode', $output, $atts );
}
