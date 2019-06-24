<?php

namespace Roots\Sage\Widgets;

class Friday_Five extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
    parent::__construct(
			'friday_five', // Base ID
			__( 'Friday@Five', 'sage' ), // Name
			array( 'description' => __( 'Displays today\'s news aggregation', 'sage' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$before_widget = $args['before_widget'];
		$after_widget = $args['after_widget'];

		echo $before_widget;
    include(locate_template('templates/widgets/friday-five.php'));
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {

	}
}
