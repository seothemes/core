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

use function SeoThemes\Engine\Functions\get_plugin_handle;
use function SeoThemes\Engine\Functions\get_plugin_url;

class RGBA_Color_Control extends \WP_Customize_Control {

	/**
	 * Official control name.
	 *
	 * @var string $type Control name.
	 */
	public $type = 'rgba-color';

	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false,
	 * or an array of RGBa and Hex colors.
	 *
	 * @var array $palette Color palettes.
	 */
	public $palette;

	/**
	 * Add support for showing the opacity value on the slider handle.
	 *
	 * @var bool $show_opacity Show opacity.
	 */
	public $show_opacity;

	/**
	 * Enqueue scripts and styles.
	 *
	 * Ideally these would get registered and given proper paths before this
	 * control object gets initialized, then we could simply enqueue them
	 * here, but for completeness as a stand alone class we'll register
	 * and enqueue them here.
	 */
	public function enqueue() {
		wp_enqueue_script(
			get_plugin_handle() . '-rgba-color-picker',
			get_plugin_url() . 'assets/js/rgba-color-control.js',
			[ 'jquery', 'wp-color-picker' ],
			'1.0.0',
			true
		);

		wp_enqueue_style(
			get_plugin_handle() . '-rgba-color-picker',
			get_plugin_url() . 'assets/css/rgba-color-control.css',
			[ 'wp-color-picker' ],
			'1.0.0'
		);
	}

	/**
	 * Render the control.
	 */
	public function render_content() {

		// Process the palette.
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );

		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';

		}

		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

		// Begin the output.
		if ( isset( $this->label ) && '' !== $this->label ) {

			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';

		}

		?>
		<label>
			<?php
			if ( isset( $this->description ) && '' !== $this->description ) {

				echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';

			}
			?>
			<input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_html( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?> />
		</label>
		<?php
	}
}
