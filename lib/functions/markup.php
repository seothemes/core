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

namespace SeoThemes\Engine\Functions;

\add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since  3.5.0
 *
 * @param  array $classes Body classes.
 *
 * @return array
 */
function body_classes( $classes ) {

	// Remove unnecessary page template classes.
	$template  = \get_page_template_slug();
	$basename  = \basename( $template, '.php' );
	$directory = \str_replace( [ '/', \basename( $template ) ], '', $template );
	$classes   = \array_diff(
		$classes,
		[
			'page-template',
			'page-template-' . $basename,
			'page-template-' . $directory,
			'page-template-' . $directory . $basename . '-php',
		]
	);

	// Add simple template name.
	if ( $basename ) {
		$classes[] = 'template-' . $basename;
	}

	// Add transparent header class.
	if ( \current_theme_supports( 'transparent-header' ) ) {
		$classes[] = 'transparent-header';
	}

	// Add sticky header class.
	if ( \current_theme_supports( 'sticky-header' ) ) {
		$classes[] = 'sticky-header';
	}

	// Add single type class.
	if ( is_type_single() ) {
		$classes[] = 'is-single';
	}

	// Add archive type class.
	if ( is_type_archive() ) {
		$classes[] = 'is-archive';
	}

	// Add no hero section class.
	$classes[] = 'no-hero-section';

	// Add front page 1 slider class.
	$classes[] = sidebar_has_widget( 'front-page-1', 'seo_slider' ) ? 'has-home-slider' : '';

	return $classes;
}

add_filter( 'genesis_attr_site-container', __NAMESPACE__ . '\back_to_top_anchor' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function back_to_top_anchor( $attr ) {
	$attr['id'] = 'top';

	return $attr;
}
