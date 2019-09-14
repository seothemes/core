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

namespace SeoThemes\Core;

use function SeoThemes\Core\Functions\get_config;
use function SeoThemes\Core\Functions\get_plugin_url;

$asset_url    = \trailingslashit( get_plugin_url() . 'assets' );
$google_fonts = \implode( '|', get_config( 'google-fonts' ) );

return [
	'add'    => [
		[
			'handle' => \genesis_get_theme_handle() . '-editor',
			'src'    => $asset_url . 'js/editor.js',
			'deps'   => [ 'wp-blocks' ],
			'editor' => true,
		],
		[
			'handle'    => \genesis_get_theme_handle() . '-main',
			'src'       => $asset_url . 'js/min/main.min.js',
			'condition' => function () {
				return ! \genesis_is_amp();
			},
		],
		[
			'handle' => \genesis_get_theme_handle() . '-main',
			'src'    => $asset_url . 'css/main.css',
		],
		[
			'handle'    => \genesis_get_theme_handle() . '-woocommerce',
			'src'       => $asset_url . 'css/woocommerce.css',
			'condition' => function () {
				return \class_exists( 'WooCommerce' );
			},
		],
		[
			'handle' => \genesis_get_theme_handle() . '-google-fonts',
			'src'    => "//fonts.googleapis.com/css?family=$google_fonts&display=swap",
			'editor' => 'both',
		],
	],
	'remove' => [
		'superfish',
	],
];
