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

namespace SeoThemes\Core\Themes;

add_filter( 'child_theme_google-fonts_config', __NAMESPACE__ . '\google_fonts_config' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function google_fonts_config() {
	return [
		'Montserrat:400,600',
		'Hind:400',
	];
}

add_filter( 'child_theme_theme-support_config', __NAMESPACE__ . '\theme_support_config' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $config
 *
 * @return array
 */
function theme_support_config( $config ) {
	$config['add'][] = 'transparent-header';

	return $config;
}
