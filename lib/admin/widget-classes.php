<?php

namespace SeoThemes\Core\Admin;

add_action( 'in_widget_form', __NAMESPACE__ . '\in_widget_form', 5, 3 );
/**
 * Fires at the end of the widget control form.
 *
 * @since 1.0.0
 *
 * @param \WP_Widget $widget   The widget instance (passed by reference).
 * @param null       $return   Return null if new fields are added.
 * @param array      $instance An array of the widget's settings.
 *
 * @return array
 */
function in_widget_form( $widget, $return, $instance ) {
	$instance   = \wp_parse_args( (array) $instance, [ 'classes' => null ] );
	$field_name = $widget->get_field_name( 'classes' );

	if ( ! isset( $instance['classes'] ) ) {
		$instance['classes'] = null;
	}

	?>
	<p style="border: 1px solid #eee; padding: 5px 10px; background-color: #f5f5f5;">
		<label for="<?php echo $field_name; ?>"><?php esc_html_e( 'Additional Classes:', 'seothemes-core' ); ?>
			&nbsp;</label>
		<input type="text" name="<?php echo $field_name; ?>" id="<?php echo $widget->get_field_id( 'classes' ); ?>" value="<?php echo $instance['classes']; ?>"/>
	</p>
	<?php

	return [ $widget, $return, $instance ];
}

add_filter( 'widget_update_callback', __NAMESPACE__ . '\in_widget_form_update', 5, 3 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $instance
 * @param $new_instance
 *
 * @return mixed
 */
function in_widget_form_update( $instance, $new_instance ) {
	$instance['classes'] = strip_tags( $new_instance['classes'] );

	return $instance;
}

add_filter( 'dynamic_sidebar_params', __NAMESPACE__ . '\dynamic_sidebar_params' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $params
 *
 * @return mixed
 */
function dynamic_sidebar_params( $params ) {
	global $wp_registered_widgets;

	$widget_id  = $params[0]['widget_id'];
	$widget_obj = $wp_registered_widgets[ $widget_id ];
	$widget_opt = \get_option( $widget_obj['callback'][0]->option_name );
	$widget_num = $widget_obj['params'][0]['number'];

	$classes = isset( $widget_opt[ $widget_num ]['classes'] ) ? $widget_opt[ $widget_num ]['classes'] : false;

	if ( $classes ) {
		$params[0]['before_widget'] = str_replace( 'class="widget ', 'class="widget ' . $classes . ' ', $params[0]['before_widget'] );
	}

	return $params;
}
