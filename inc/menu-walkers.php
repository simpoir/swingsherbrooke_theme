<?php
/**
 * swingsherbrooke menu functions and definitions
 *
 * @package swingsherbrooke
 */

// XXX simpoir: I set the limitation of menus having only 2 levels.
// Deeper menus are not deemed friendly to navigate and would be slightly
// messier to manage from here. +3 levels may or may not work, but I would
// advice against them.

class MobileNavPanelWalker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output .= '<li>';

		if (in_array('menu-item-has-children', $item->classes)) {
			// parent
			// collapsible + links is shitty UI for touch
			// thus, we drop the links for parents.
			$item_output .= '<a class="collapsible-header">';
			$item_output .= '<i class="right material-icons">expand_more</i>';
			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			$item_output .= '</a>';

			$item_output .= '<div class="collapsible-body"><ul>';
		} else {
			// child menu item
			$item_output .= '<a class="collapsible-header" '. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if (in_array('menu-item-has-children', $item->classes)) {
			$output .= '</ul></div>';
		}
		$output .= '</li>';
	}
}


class NavMenuWalker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output .= '<li>';

		if (in_array('menu-item-has-children', $item->classes)) {
			// parent
			// collapsible + links is shitty UI for touch
			// thus, we drop the links for parents.
			$dropdown_id = esc_attr( 'nav-' . $item->ID . '-dropdown' );
			$item_output .= '<a class="dropdown-button" data-activates="'. $dropdown_id .'" data-belowOrigin="true" data-hover="true" data-constrainWidth="false">';
			$item_output .= '<i class="right material-icons">expand_more</i>';
			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			$item_output .= '</a>';

			$item_output .= '<div class="dropdown-content" id="'.$dropdown_id.'"><ul>';
		} else {
			// child menu item
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if (in_array('menu-item-has-children', $item->classes)) {
			$output .= '</ul></div>';
		}
		$output .= '</li>';
	}
}
