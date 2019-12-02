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

use function SeoThemes\Engine\Functions\get_default_colors;

add_action( 'customize_register', __NAMESPACE__ . '\customizer_color_settings' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customizer_color_settings( $wp_customize ) {
	$colors = get_default_colors();

	foreach ( $colors as $color => $default ) {
		$wp_customize->add_setting( "color_{$color}", [
			'default' => $default,
		] );

		$wp_customize->add_control(
			new RGBA_Color_Control(
				$wp_customize,
				"color_{$color}",
				[
					'label'        => ucwords( $color ) . __( ' Color', 'seothemes-engine' ),
					'section'      => 'colors',
					'show_opacity' => true,
					'palette'      => [
						'#000000',
						'#ffffff',
						'#dd3333',
						'#dd9933',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					],
				]
			)
		);
	}
}
