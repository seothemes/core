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

// Reposition singular image.
\remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
\add_action( 'genesis_entry_header', 'genesis_do_singular_image' );

// Disables the post edit link.
\add_filter( 'edit_post_link', '__return_empty_string' );
