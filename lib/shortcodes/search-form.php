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

namespace SeoThemes\Engine\Shortcodes;

\add_shortcode( 'search_form', __NAMESPACE__ . '\search_form_shortcode' );
/**
 * Displays a search form.
 *
 * @since 3.5.0
 *
 * @return string
 */
function search_form_shortcode() {
	if ( \is_admin() ) {
		return false;
	}

	return \get_search_form( false );
}
