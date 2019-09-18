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

add_filter( 'child_theme_google-fonts_config', __NAMESPACE__ . '\business_pro_google_fonts_config' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function business_pro_google_fonts_config() {
	return [
		'Montserrat:400,600',
		'Hind:400',
	];
}

add_filter( 'child_theme_theme-support_config', __NAMESPACE__ . '\business_pro_theme_support_config' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $config
 *
 * @return array
 */
function business_pro_theme_support_config( $config ) {
	$config['add'][]                         = 'transparent-header';
	$config['add'][]                         = 'sticky-header';
	$config['add']['genesis-footer-widgets'] = 4;
	$config['add']['front-page-widgets']     = 6;

	return $config;
}

\add_filter( 'icon_widget_defaults', __NAMESPACE__ . '\business_pro_icon_widget_defaults' );
/**
 * Change Icon Widget plugin default settings.
 *
 * @since 3.5.0
 *
 * @param array $defaults Icon widget defaults.
 *
 * @return array
 */
function business_pro_icon_widget_defaults( $defaults ) {
	$defaults['color']   = '400';
	$defaults['weight']  = '400';
	$defaults['size']    = '3x';
	$defaults['align']   = 'center';
	$defaults['padding'] = 20;

	return $defaults;
}
