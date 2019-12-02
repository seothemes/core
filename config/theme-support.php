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

		// Genesis defaults.
		'menus',
		'post-thumbnails',
		'title-tag',
		'automatic-feed-links',
		'body-open',
		'genesis-inpost-layouts',
		'genesis-archive-layouts',
		'genesis-admin-menu',
		'genesis-seo-settings-menu',
		'genesis-import-export-menu',
		'genesis-readme-menu',
		'genesis-customizer-theme-settings',
		'genesis-customizer-seo-settings',
		'genesis-auto-updates',

		// Custom.
		'align-wide',
		'automatic-feed-links',
		'custom-header'            => [
			'header-selector'  => '.hero-section',
			'default_image'    => get_plugin_url() . 'assets/img/hero.jpg',
			'header-text'      => false,
			'width'            => 1280,
			'height'           => 720,
			'flex-height'      => true,
			'flex-width'       => true,
			'uploads'          => true,
			'video'            => true,
			'wp-head-callback' => __NAMESPACE__ . '\Functions\header',
		],
		'editor-styles',
		'front-page-widgets'       => 5,
		'genesis-accessibility'    => [
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		],
		'genesis-after-entry-widget-area',
		'genesis-custom-logo'      => [
			'height'      => 60,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [
				'.site-title',
				'.site-description',
			],
		],
		'genesis-footer-widgets'   => 3,
		'genesis-menus'            => [
			'primary'   => __( 'Header Menu', 'genesis-starter-theme' ),
			'secondary' => __( 'After Header Menu', 'genesis-starter-theme' ),
		],
		'genesis-structural-wraps' => [
			'header',
			'menu-secondary',
			'hero-section',
			'footer-widgets',
			'front-page-widgets',
		],
		'gutenberg'                => [
			'wide-images' => true,
		],
		'hero-section',
		'html5'                    => [
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		],
		'post-thumbnails',
		'responsive-embeds',
		'woocommerce',
		'wc-product-gallery-zoom',
		'wc-product-gallery-lightbox',
		'wc-product-gallery-slider',
		'wp-block-styles',
	],
	'remove' => [],
];
