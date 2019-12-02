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

add_action( 'customize_register', __NAMESPACE__ . '\customizer_header_settings' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customizer_header_settings( $wp_customize ) {
	$wp_customize->add_section( 'header_settings', [
		'title' => __( 'Header Settings', 'seothemes-engine' ),
		'panel' => 'child_theme_settings',
	] );

	$wp_customize->add_setting( 'transparent_header', [
		'default' => 0,
	] );

	$wp_customize->add_control( 'transparent_header', [
		'label'   => __( 'Transparent Header', 'seothemes-engine' ),
		'section' => 'header_settings',
		'type'    => 'checkbox',
	] );

	$wp_customize->add_setting( 'sticky_header', [
		'default' => 0,
	] );

	$wp_customize->add_control( 'sticky_header', [
		'label'   => __( 'Sticky Header', 'seothemes-engine' ),
		'section' => 'header_settings',
		'type'    => 'checkbox',
	] );
}
