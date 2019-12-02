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

namespace SeoThemes\Engine\Structure;

\add_action( 'child_theme_setup', __NAMESPACE__ . '\site_header_options' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function site_header_options() {
	if ( \get_theme_mod( 'transparent_header', 0 ) ) {
		\add_theme_support( 'transparent-header' );
	}

	if ( \get_theme_mod( 'sticky_header', 0 ) ) {
		\add_theme_support( 'sticky-header' );
	}
}

\add_filter( 'genesis_markup_title-area_close', __NAMESPACE__ . '\title_area_hook', 10, 1 );
/**
 * Add custom hook after the title area.
 *
 * @since 3.5.0
 *
 * @param string $close_html Closing html markup.
 *
 * @return string
 */
function title_area_hook( $close_html ) {
	if ( $close_html ) {
		\ob_start();
		\do_action( 'genesis_after_title_area' );
		$close_html = $close_html . ob_get_clean();
	}

	return $close_html;
}

\add_action( 'genesis_before_header_wrap', __NAMESPACE__ . '\before_header_widget' );
/**
 * Displays the before header widget area.
 *
 * @since 3.5.0
 *
 * @return void
 */
function before_header_widget() {
	\genesis_widget_area(
		'before-header',
		[
			'before' => '<div class="before-header"><div class="wrap">',
			'after'  => '</div></div>',
		]
	);
}

\add_filter( 'get_custom_logo', __NAMESPACE__ . '\custom_logo_size' );
/**
 * Add max-width style to custom logo.
 *
 * @since 3.5.0
 *
 * @param string $html Custom logo HTML output.
 *
 * @return string
 */
function custom_logo_size( $html ) {
	$width  = \get_theme_support( 'custom-logo' )[0]['width'];
	$height = \get_theme_support( 'custom-logo' )[0]['height'];

	return \str_replace( '<img ', '<img style="max-width:' . $width . 'px;max-height:' . $height . 'px"', $html );
}

