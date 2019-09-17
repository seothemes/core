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
use function SeoThemes\Core\Functions\get_active_theme;
use function SeoThemes\Core\Functions\get_plugin_handle;

$asset_url    = \trailingslashit( get_plugin_url() . 'assets' );
$google_fonts = \implode( '|', get_config( 'google-fonts' ) );
$active_theme = get_active_theme();

return [
	'add'    => [
		[
			'handle' => get_plugin_handle() . '-editor',
			'src'    => $asset_url . 'js/editor.js',
			'deps'   => [ 'wp-blocks' ],
			'editor' => true,
		],
		[
			'handle'    => get_plugin_handle(),
			'src'       => $asset_url . 'js/min/core.min.js',
			'condition' => function () {
				return ! \genesis_is_amp();
			},
		],
		[
			'handle' => get_plugin_handle(),
			'src'    => "{$asset_url}css/{$active_theme}/{$active_theme}-main.css",
		],
		[
			'handle' => get_plugin_handle() . '-google-fonts',
			'src'    => "//fonts.googleapis.com/css?family=$google_fonts&display=swap",
			'editor' => 'both',
		],
	],
	'remove' => [
		'superfish',
	],
];
