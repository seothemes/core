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

use function SeoThemes\Engine\Functions\get_config;

add_action( 'customize_register', __NAMESPACE__ . '\customizer_widget_settings' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customizer_widget_settings( $wp_customize ) {
	$config = get_config( 'theme-support' )['add'];

	$wp_customize->add_section( 'widget_settings', [
		'title' => __( 'Widget Settings', 'seothemes-engine' ),
		'panel' => 'child_theme_settings',
	] );

	$wp_customize->add_setting( 'front_page_widget_areas', [
		'default' => 5,
	] );

	$wp_customize->add_control( 'front_page_widget_areas', [
		'label'       => __( 'Front Page Widget Areas', 'seothemes-engine' ),
		'description' => __( 'Default: ', 'seothemes-engine' ) . $config['front-page-widgets'],
		'section'     => 'widget_settings',
		'type'        => 'number',
	] );

	$wp_customize->add_setting( 'footer_widget_areas', [
		'default' => 3,
	] );

	$wp_customize->add_control( 'footer_widget_areas', [
		'label'       => __( 'Footer Widget Areas', 'seothemes-engine' ),
		'description' => __( 'Default: ', 'seothemes-engine' ) . $config['genesis-footer-widgets'],
		'section'     => 'widget_settings',
		'type'        => 'number',
	] );
}
