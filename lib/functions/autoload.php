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

namespace SeoThemes\Engine\Functions;

/* @noinspection PhpUnhandledExceptionInspection */
\spl_autoload_register( __NAMESPACE__ . '\autoload_register' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $class
 *
 * @return void
 */
function autoload_register( $class ) {
	$namespace = \str_replace( '\\Functions', '', __NAMESPACE__ );

	if ( strpos( $class, $namespace ) === false ) {
		return;
	}

	$class_dir  = get_plugin_dir() . 'lib/classes/';
	$class_name = str_replace( $namespace, '', $class );
	$class_file = strtolower( str_replace( [ '\\', '_' ], '-', $class_name ) );

	/* @noinspection PhpIncludeInspection */
	require_once "{$class_dir}class{$class_file}.php";
}
