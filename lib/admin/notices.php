<?php

namespace SeoThemes\Core\Admin;

use function SeoThemes\Core\Functions\get_active_theme;
use function SeoThemes\Core\Functions\get_child_themes;

add_action( 'admin_notices', __NAMESPACE__ . '\invalid_child_theme' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function invalid_child_theme() {

	if ( ! in_array( get_active_theme(), get_child_themes() ) ) {
		$class   = 'notice notice-error';
		$message = __( 'Please install a valid SEO Themes child theme when using SEO Themes core.', 'seothemes-core' );

		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
	}
}
