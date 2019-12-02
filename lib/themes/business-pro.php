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

namespace SeoThemes\Engine\Themes;

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
	$config['add']['genesis-footer-widgets'] = 4;
	$config['add']['front-page-widgets']     = 6;

	return $config;
}
