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

return [
	'add'    => [
		[
			'id'          => 'before-header',
			'name'        => __( 'Before Header', 'genesis-starter-theme' ),
			'description' => __( 'The Before Header widget area.', 'genesis-starter-theme' ),
		],
		[
			'id'          => 'before-footer',
			'name'        => __( 'Before Footer', 'genesis-starter-theme' ),
			'description' => __( 'The Before Footer widget area.', 'genesis-starter-theme' ),
		],
	],
	'remove' => [
		'sidebar-alt',
	],
];
