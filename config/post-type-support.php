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
		'excerpt'                    => [ 'page' ],
		'genesis-layouts'            => [ 'product' ],
		'genesis-seo'                => [ 'product' ],
		'genesis-singular-images'    => [ 'page', 'post' ],
		'genesis-title-toggle'       => [ 'post', 'product' ],
		'genesis-adjacent-entry-nav' => [ 'post', 'product', 'portfolio' ],
		'hero-section'               => [ 'page', 'post', 'portfolio' ],
		'terms-filter'               => [ 'post', 'portfolio' ],
	],
	'remove' => [],
];
