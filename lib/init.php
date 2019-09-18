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

add_action( 'setup_theme', __NAMESPACE__ . '\load_genesis', 100 );
/**
 * Starts the engine.
 *
 * Enables the use of `genesis_*` functions in the child theme functions.php file,
 * without the need for require_once get_template_directory() . '/lib/init.php'
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_genesis() {
	defined( 'TEMPLATEPATH' ) || define( 'TEMPLATEPATH', \get_template_directory() );
	defined( 'STYLESHEETPATH' ) || define( 'STYLESHEETPATH', \get_stylesheet_directory() );

	$init = TEMPLATEPATH . '/lib/init.php';

	if ( is_readable( $init ) ) {
		require_once $init;
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\child_theme_init', 100 );
/**
 * Initialize plugin files.
 *
 * Loads between Genesis and child theme functions.php.
 *
 * @since 1.0.0
 *
 * @return void
 */
function child_theme_init() {

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
		'shortcodes/terms-filter',

		// Plugins.
		'plugins/gravity-forms',
		'plugins/woocommerce',

		// Admin.
		'admin/notices',
		'admin/widget-classes',
	];

	foreach ( $files as $file ) {
		$filename = __DIR__ . "/$file.php";

		if ( \is_readable( $filename ) ) {
			require_once $filename;
		}
	}

	// Load specific functionality for active theme.
	$active_theme = __DIR__ . '/themes/' . Functions\get_active_theme() . '.php';

	if ( is_readable( $active_theme ) ) {
		require_once $active_theme;
	}

	/**
	 * Fires during child theme intialization.
	 *
	 * @since 1.0.0
	 */
	do_action( 'child_theme_init' );

	/**
	 * Fires after child theme initialization.
	 *
	 * @since 1.0.0
	 */
	do_action( 'child_theme_setup' );
}
