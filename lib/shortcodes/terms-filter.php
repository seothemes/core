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

add_shortcode( 'terms_filter', __NAMESPACE__ . '\terms_filter_shortcode' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param array $atts
 *
 * @return array|bool
 */
function terms_filter_shortcode( $atts ) {

	if ( \is_admin() ) {
		return false;
	}

	$type = [
		'post'      => 'category',
		'portfolio' => 'portfolio-type',
	];

	$atts = \shortcode_atts(
		[
			'terms' => $type[ get_post_type() ],
		],
		$atts,
		'terms_filter'
	);

	ob_start();
	$terms = get_terms( $atts['terms'] );

	if ( $terms ) :

		?>
		<div class="terms-filter">
			<a href="javascript:void(0)" class="active"
			   data-filter="*"><?php esc_html_e( 'All', 'seothemes-engine' ); ?></a>
			<?php foreach ( $terms as $term ) : ?>
				<a href='javascript:void(0)'
				   data-filter='.<?php echo esc_attr( $atts['terms'] ); ?>-<?php echo esc_attr( $term->slug ); ?>'><?php echo esc_html( $term->name ); ?></a>
			<?php endforeach; ?>
		</div>
	<?php

	endif;

	return ob_get_clean();
}
