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
		$url = \trailingslashit( \plugins_url( basename( get_plugin_dir() ) ) );
	}

	return $url;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $header
 *
 * @return array|string|null
 */
function get_plugin_data( $header = '' ) {
	static $data = null;

	if ( is_null( $data ) ) {
		$data = get_file_data( get_plugin_dir() . 'seothemes-core.php', [
			'name'        => 'Plugin Name',
			'version'     => 'Version',
			'plugin-uri'  => 'Plugin URI',
			'text-domain' => 'Text Domain',
			'description' => 'Description',
			'author'      => 'Author',
			'author-uri'  => 'Author URI',
			'domain-path' => 'Domain Path',
			'network'     => 'Network',
		], 'plugin' );
	}

	if ( array_key_exists( $header, $data ) ) {
		return $data[ $header ];
	}

	return $data;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array|null|string
 */
function get_plugin_name() {
	return get_plugin_data( 'name' );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array|null|string
 */
function get_plugin_handle() {
	return get_plugin_data( 'text-domain' );
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

	return apply_filters( "child_theme_{$config}_config", $data );
}

/**
 * Returns the active theme key.
 *
 * Checks multiple places to find a match.
 *
 * @since 1.0.0
 *
 * @return string
 */
function get_active_theme() {
	static $theme = null;

	if ( is_null( $theme ) ) {

		$theme_support = \get_theme_support( 'seothemes-core' )[0];

		if ( $theme_support ) {
			$theme = $theme_support;
		}

		if ( ! $theme_support ) {

			$text_domain = \wp_get_theme()->get( 'TextDomain' );

			if ( $text_domain ) {
				$theme = $text_domain;
			}
		}
	}

	return $theme;
}

/**
 * Returns an array of all SEO Themes child themes.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_child_themes() {
	return [
		'startup-pro',
		'display-pro',
		'newspaper-pro',
		'corporate-pro',
		'studio-pro',
		'business-pro',
		'store-pro',
		'limitless-pro',
		'restaurant-pro',
		'architect-pro',
		'fitness-pro',
		'legal-pro',
	];
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

/**
 * Checks if given sidebar contains a certain widget.
 *
 * @since  1.0.0
 *
 * @uses   $sidebars_widgets
 *
 * @param  string $sidebar Name of sidebar, e.g `primary`.
 * @param  string $widget  Widget ID to check, e.g `custom_html`.
 *
 * @return bool
 */
function sidebar_has_widget( $sidebar, $widget ) {
	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $sidebar ][0] ) && strpos( $sidebars_widgets[ $sidebar ][0], $widget ) !== false && is_active_sidebar( $sidebar ) ) {
		return true;
	}

	return false;
}
