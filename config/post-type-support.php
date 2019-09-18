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

return [
	'add'    => [
		'excerpt'                    => [ 'page' ],
		'genesis-layouts'            => [ 'product' ],
		'genesis-seo'                => [ 'product' ],
		'genesis-singular-images'    => [ 'page', 'post' ],
		'genesis-title-toggle'       => [ 'post', 'product' ],
		'genesis-adjacent-entry-nav' => [ 'post', 'product' ],
		'hero-section'               => [ 'page', 'post', 'portfolio' ],
	],
	'remove' => [],
];
