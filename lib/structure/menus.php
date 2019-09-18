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

// Reposition primary and secondary navigation menus.
\remove_action( 'genesis_after_header', 'genesis_do_nav' );
\add_action( 'genesis_after_title_area', 'genesis_do_nav' );
\remove_action( 'genesis_after_header', 'genesis_do_subnav' );
\add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

\add_filter( 'walker_nav_menu_start_el', __NAMESPACE__ . '\replace_hash_with_void', 999 );
/**
 * Replace # links with JavaScript void.
 *
 * @since 3.5.0
 *
 * @param string $menu_item item HTML.
 *
 * @return string
 */
function replace_hash_with_void( $menu_item ) {
	if ( \strpos( $menu_item, 'href="#"' ) !== false ) {
		$menu_item = \str_replace( 'href="#"', 'href="javascript:void(0);"', $menu_item );
	}

	return $menu_item;
}
