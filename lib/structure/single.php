<?php
/**
 * Genesis Starter Theme.
 *
 * @package   SeoThemes\Core
 * @link      https://genesisstartertheme.com
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-2.0-or-later
 */

namespace SeoThemes\Core\Structure;

// Reposition singular image.
\remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
\add_action( 'genesis_entry_header', 'genesis_do_singular_image' );

// Disables the post edit link.
\add_filter( 'edit_post_link', '__return_empty_string' );
