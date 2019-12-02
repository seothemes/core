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

add_action( 'customize_register', __NAMESPACE__ . '\customize_register' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'child_theme_settings', [
		'title'    => __( 'Child Theme Settings', 'seothemes-engine' ),
		'priority' => 160,
	] );
}
