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

namespace SeoThemes\Engine;

use function SeoThemes\Engine\Functions\get_plugin_url;

return [
	'add'    => [
		[
			'id'    => 'narrow-content',
			'label' => __( 'Narrow Content', 'genesis-starter-theme' ),
			'img'   => get_plugin_url() . 'assets/img/narrow-content.gif',
		],
	],
	'remove' => [
		'content-sidebar-sidebar',
		'sidebar-sidebar-content',
		'sidebar-content-sidebar',
	],
];
