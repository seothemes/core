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

\add_action( 'setup_theme', __NAMESPACE__ . '\load_genesis', 100 );
/**
 * Starts the engine.
 *
 * Enables the use of `genesis_*` functions in the child theme functions.php file,
 * without the need for require_once get_template_directory() . '/lib/init.php'.
 * This allows us to provide a truly blank child theme for users to work with.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_genesis() {
	$init = \get_template_directory() . '/lib/init.php';

	if ( \is_readable( $init ) ) {
		require_once $init;
	}
}

\add_action( 'genesis_init', __NAMESPACE__ . '\remove_genesis_theme_supports', 5 );
/**
 * Removes all Genesis functions that use the is_child_theme() function.
 *
 * Since we are loading Genesis on behalf of the child theme, functions won't
 * correctly. This little workaround fixes that issue by removing functions
 * that contain the check and adds theme support that is required early.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_genesis_theme_supports() {
	\remove_action( 'genesis_init', 'genesis_theme_support' );
	\add_theme_support( 'genesis-breadcrumbs' );
}

\add_action( 'genesis_setup', __NAMESPACE__ . '\child_theme_init', 100 );
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
		'structure/sidebar',
		'structure/single',
		'structure/wrap',

		// Shortcodes.
		'shortcodes/hook',
		'shortcodes/search-form',
		'shortcodes/widget-area',
		'shortcodes/terms-filter',
		'shortcodes/back-to-top',

		// Plugins.
		'plugins/gravity-forms',
		'plugins/woocommerce',

		// Admin.
		'admin/notices',
		'admin/widget-classes',

		// Customizer.
		'customize/register',
		'customize/header',
		'customize/widgets',
		'customize/colors',
	];

	foreach ( $files as $file ) {
		$filename = __DIR__ . "/$file.php";

		if ( \is_readable( $filename ) ) {
			require_once $filename;
		}
	}

	// Load specific functionality for active theme.
	$active_theme = __DIR__ . '/themes/' . Functions\get_active_theme() . '.php';

	if ( \is_readable( $active_theme ) ) {
		require_once $active_theme;
	}

	/**
	 * Fires after child theme setup.
	 *
	 * @since 1.0.0
	 */
	\do_action( 'child_theme_setup' );
}
