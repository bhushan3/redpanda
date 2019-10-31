<?php
/**
 * BEM_Walker_Nav_Menu class
 */

/**
 * Core class used to implement an HTML list of nav menu items.
 */
class BEM_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		// Get block class name.
		$block = '';
		if ( isset( $args->menu_class ) && ! empty( $args->menu_class ) ) {
			$block = explode( ' ', $args->menu_class )[0];
			if ( strpos( $block, '__' ) === false ) {
				$block .= '__';
			} else {
				$block .= '-';
			}
		}

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		/**
		 * Default class.
		 */
		$classes = array( $block . 'sub' );

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul $class_names>{$n}";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Passed by reference. Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		// Get block class name.
		$block = '';
		if ( isset( $args->menu_class ) && ! empty( $args->menu_class ) ) {
			$block = explode( ' ', $args->menu_class )[0];
			if ( strpos( $block, '__' ) === false ) {
				$block .= '__';
			} else {
				$block .= '-';
			}
		}

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

		$bem_class_names = '';

		$sub = '';
		if ( $depth > 0 ) {
			$sub = 'sub-';
		}

		foreach ( $class_names as $class ) {
			if ( 'menu-item' === $class ) {
				$bem_class_names .= $block . $sub . 'item ';
			} elseif ( 'menu-item-has-children' === $class ) {
				$bem_class_names .= $block . $sub . 'item--has-children ';
			} elseif ( 'menu-item-home' === $class ) {
				$bem_class_names .= $block . $sub . 'item--home ';
			} elseif ( 'current-menu-item' === $class ) {
				$bem_class_names .= $block . $sub . 'item--current ';
			} elseif ( 'current-menu-parent' === $class ) {
				$bem_class_names .= $block . $sub . 'item--current-menu-parent ';
			} elseif ( 'current-menu-ancestor' === $class ) {
				$bem_class_names .= $block . $sub . 'item--current-menu-ancestor ';
			}

			/*
			// Extra
			elseif ( 'current-post-parent' === $class ) {
				$bem_class_names .= $block . $sub . 'item--current-post-parent ';
			} elseif ( 'current-post-ancestor' === $class ) {
				$bem_class_names .= $block . $sub . 'item--current-post-ancestor ';
			}
			*/
		}

		/*
		$bem_class_names .= $block . $sub . 'item--object-' . str_replace( '_', '-', $item->object ) . ' ';
		$bem_class_names .= $block . $sub . 'item--type-' . str_replace( '_', '-', $item->type ) . ' ';
		$bem_class_names .= $block . $sub . 'item--' . $item->ID . ' ';
		*/

		$bem_class_names = trim( $bem_class_names );

		$bem_class_names = $bem_class_names ? ' class="' . esc_attr( $bem_class_names ) . '"' : '';

		$output .= $indent . '<li' . $bem_class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';
		$atts['class']  = 0 < $depth ? $block . 'sub-link' : $block . 'link';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = ! empty( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= ! empty( $args->link_before ) ? $args->link_before : '';
		$item_output .= $title;
		$item_output .= ! empty( $args->link_after ) ? $args->link_after : '';
		$item_output .= '</a>';
		$item_output .= ! empty( $args->after ) ? $args->after : '';

		if ( isset( $args->depth ) && ( 0 === $args->depth || 1 < $args->depth ) ) {
			if ( in_array( 'menu-item-has-children', $class_names, true ) ) {
				$item_output .= '<button class="' . $block . 'toggle"><span class="screen-reader-text">' . esc_html__( 'Open sub menu', 'redpanda' ) . '</span></button>';
			}
		}

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
