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

namespace SeoThemes\Engine\Structure;

use function SeoThemes\Engine\Functions\get_config;

\add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\\setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @since 3.5.0
 *
 * @param array $args Genesis comment list arguments.
 *
 * @return mixed
 */
function setup_comments_gravatar( array $args ) {
	$args['avatar_size'] = get_config( 'genesis-settings' )['avatar_size'];

	return $args;
}
