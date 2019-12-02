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

use function SeoThemes\Engine\Functions\get_default_color;

return [
	'alignment'              => 'alignleft',
	'background_color'       => '',
	'background_color_hover' => '',
	'border_radius'          => 3,
	'border_width'           => 0,
	'icon_color'             => get_default_color( 'heading' ),
	'icon_color_hover'       => get_default_color( 'primary' ),
	'size'                   => 40,
];
