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

// Enable shortcodes in widgets.
\add_filter( 'widget_text', 'do_shortcode' );

\add_action( 'child_theme_setup', __NAMESPACE__ . '\widget_area_options' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function widget_area_options() {
	$config                  = get_config( 'theme-support' )['add'];
	$footer_widget_areas     = \intval( \get_theme_mod( 'footer_widget_areas', $config['genesis-footer-widgets'] ) );
	$front_page_widget_areas = \intval( \get_theme_mod( 'front_page_widget_areas', $config['front-page-widgets'] ) );

	\add_theme_support( 'genesis-footer-widgets', $footer_widget_areas );
	\add_theme_support( 'front-page-widgets', $front_page_widget_areas );

	for ( $i = 1; $i <= $front_page_widget_areas; $i++ ) {
		\genesis_register_widget_area( [
			'id'          => 'front-page-' . $i,
			'name'        => __( 'Front Page ', 'seothemes-engine' ) . $i,
			/* translators: The front page widget area number. */
			'description' => \sprintf( __( 'The Front Page %s widget area.', 'seothemes-engine' ), $i ),
		] );
	}
}

\add_filter( 'genesis_register_widget_area_defaults', __NAMESPACE__ . '\front_page_1_heading', 10, 2 );
/**
 * Change Front Page 1 title to H1.
 *
 * @since 3.5.0
 *
 * @param array $defaults Default settings.
 * @param array $args     Other args.
 *
 * @return array
 */
function front_page_1_heading( $defaults, $args ) {
	if ( 'front-page-1' === $args['id'] ) {
		$defaults['before_title'] = '<h1 class="hero-title" itemprop="headline">';
		$defaults['after_title']  = "</h1>\n";
	}

	return $defaults;
}

\add_filter( 'genesis_widget_area_defaults', __NAMESPACE__ . '\widget_area_defaults', 10, 3 );
/**
 * Set default values for widget area output.
 *
 * @since 3.5.0
 *
 * @param array  $defaults Widget area defaults.
 * @param string $id       Widget area ID.
 *
 * @return array
 */
function widget_area_defaults( $defaults, $id ) {

	// Remove wrap if widget area has slider.
	$slider     = sidebar_has_widget( 'front-page-1', 'seo_slider' );
	$wrap_open  = $slider && 'front-page-1' === $id ? '' : '<div class="wrap">';
	$wrap_close = $slider && 'front-page-1' === $id ? '' : '</div>';

	// Add hero section markup to Front Page 1.
	$hero = 'front-page-1' === $id ? ' hero-section" role="banner' : '';

	// Get custom header markup.
	ob_start();
	the_custom_header_markup();
	$custom_header = ob_get_clean();

	$custom_header = 'front-page-1' === $id && ! $slider ? $custom_header : '';

	if ( false !== strpos( $id, 'front-page-' ) ) {
		$defaults['before'] = \genesis_markup(
			[
				'open'    => '<div class="' . $id . $hero . '">' . $custom_header . $wrap_open,
				'context' => 'widget-area-wrap',
				'echo'    => false,
				'params'  => [
					'id' => $id,
				],
			]
		);
		$defaults['after']  = \genesis_markup(
			[
				'close'   => $wrap_close . '</div>',
				'context' => 'widget-area-wrap',
				'echo'    => false,
			]
		);
	}

	return $defaults;
}

\add_filter( 'genesis_widget_column_classes', __NAMESPACE__ . '\extra_widget_columns' );
/**
 * Add additional column class to plugin.
 *
 * @since 3.5.0
 *
 * @param array $column_classes Array of column classes.
 *
 * @return array Modified column classes.
 */
function extra_widget_columns( $column_classes ) {
	$column_classes[] = 'one-fifth';
	$column_classes[] = 'two-fifths';
	$column_classes[] = 'three-fifths';
	$column_classes[] = 'four-fifths';
	$column_classes[] = 'full-width';

	return $column_classes;
}
