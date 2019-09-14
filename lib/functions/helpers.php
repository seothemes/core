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

namespace SeoThemes\Core\Functions;

/**
 * Returns the child theme directory.
 *
 * @since 3.5.0
 *
 * @return string
 */
function get_plugin_dir() {
	static $dir = null;

	if ( is_null( $dir ) ) {
		$dir = \trailingslashit( dirname( dirname( __DIR__ ) ) );
	}

	return $dir;
}

/**
 * Returns the child theme URL.
 *
 * @since 3.5.0
 *
 * @return string
 */
function get_plugin_url() {
	static $url = null;

	if ( \is_null( $url ) ) {
		$url = \trailingslashit( \plugins_url( get_plugin_dir() ) );
	}

	return $url;
}

/**
 * Returns a config.
 *
 * @since 1.0.0
 *
 * @param string $config Name of config to get.
 *
 * @return array
 */
function get_config( $config ) {
	$data = require get_plugin_dir() . "config/$config.php";

	return apply_filters( 'child_theme_config', $data );
}

/**
 * Check if were on any type of singular page.
 *
 * @since 3.5.0
 *
 * @return bool
 */
function is_type_single() {
	return \is_front_page() || \is_single() || \is_page() || \is_404() || \is_attachment() || \is_singular();
}

/**
 * Check if were on any type of archive page.
 *
 * @since 3.5.0
 *
 * @return bool
 */
function is_type_archive() {
	return \is_home() || \is_post_type_archive() || \is_category() || \is_tag() || \is_tax() || \is_author() || \is_date() || \is_year() || \is_month() || \is_day() || \is_time() || \is_archive() || \is_search();
}

/**
 * Checks if current page has the hero section enabled.
 *
 * @since 3.5.0
 *
 * @return bool
 */
function has_hero_section() {
	return \in_array( 'has-hero-section', \get_body_class(), true );
}
