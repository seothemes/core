<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\Core
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\Core\Structure;

\add_filter( 'genesis_before', __NAMESPACE__ . '\structural_wrap_hooks' );
/**
 * Add hooks before and after structural wraps.
 *
 * @since 3.5.0
 *
 * @return void
 */
function structural_wrap_hooks() {
	$wraps = \get_theme_support( 'genesis-structural-wraps' );

	foreach ( $wraps[0] as $context ) {
		\add_filter(
			"genesis_structural_wrap-{$context}",
			function ( $output, $original ) use ( $context ) {
				$position = ( 'open' === $original ) ? 'before' : 'after';
				\ob_start();
				\do_action( "genesis_{$position}_{$context}_wrap" );
				if ( 'open' === $original ) {
					return \ob_get_clean() . $output;
				} else {
					return $output . \ob_get_clean();
				}
			},
			10,
			2
		);
	}
}

\add_filter( 'genesis_attr_content-sidebar-wrap', __NAMESPACE__ . '\content_sidebar_wrap', 10, 1 );
/**
 * Change content-sidebar-wrap class to wrap.
 *
 * @since 3.5.0
 *
 * @param array $atts Default element attributes.
 *
 * @return mixed
 */
function content_sidebar_wrap( $atts ) {
	$atts['class'] = 'wrap';

	return $atts;
}
