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

add_action( 'genesis_setup', __NAMESPACE__ . '\init', 100 );
/**
 * Initialize plugin files.
 *
 * Loads between Genesis and child theme functions.php.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init() {

	if ( ! function_exists( 'genesis' ) ) {
		return;
	}

	$files = [

		// Composer.
		'../vendor/autoload',

		// Functions.
		'functions/helpers',
		'functions/autoload',
		'functions/setup',
		'functions/enqueue',
		'functions/markup',
		'functions/header',
		'functions/widgets',
		'functions/defaults',
		'functions/onboarding',

		// Structure.
		'structure/archive',
		'structure/comments',
		'structure/footer',
		'structure/header',
		'structure/hero',
		'structure/home',
		'structure/menus',
		'structure/pagination',
		'structure/single',
		'structure/wrap',

		// Shortcodes.
		'shortcodes/hook',
		'shortcodes/search-form',
		'shortcodes/widget-area',

		// Plugins.
		'plugins/gravity-forms',
		'plugins/woocommerce',

		// Admin.
		'admin/notices',
	];

	foreach ( $files as $file ) {
		$filename = __DIR__ . "/$file.php";

		if ( \is_readable( $filename ) ) {
			require_once $filename;
		}
	}

	// Load specific functionality for active theme.
	$active_theme = \SeoThemes\Core\Functions\get_active_theme();

	require_once __DIR__ . "/themes/$active_theme.php";
}
