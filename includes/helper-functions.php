<?php

/**
 * Insert a widget in a sidebar.
 *
 * @param string $widget_id   ID of the widget (search, recent-posts, etc.)
 * @param array  $widget_data Widget settings.
 * @param string $sidebar     ID of the sidebar.
 */
function insert_widget_in_sidebar( $widget_id, $widget_data, $sidebar ) {

	// Retrieve sidebars, widgets and their instances
	$sidebars_widgets = get_option( 'sidebars_widgets', array() );
	$widget_instances = get_option( 'widget_' . $widget_id, array() );

	// Retrieve the key of the next widget instance
	$numeric_keys = array_filter( array_keys( $widget_instances ), 'is_int' );

	$next_key = $numeric_keys ? max( $numeric_keys ) + 1 : 2;
	// Add this widget to the sidebar
	if ( ! isset( $sidebars_widgets[ $sidebar ] ) ) {
		$sidebars_widgets[ $sidebar ] = array();
	}
	$sidebars_widgets[ $sidebar ][] = $widget_id . '-' . $next_key;

	// Add the new widget instance
	$widget_instances[ $next_key ] = $widget_data;

	// Store updated sidebars, widgets and their instances
	update_option( 'sidebars_widgets', $sidebars_widgets );
	update_option( 'widget_' . $widget_id, $widget_instances );
}
