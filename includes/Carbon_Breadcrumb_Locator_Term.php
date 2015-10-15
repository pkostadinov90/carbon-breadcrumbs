<?php
/**
 * Taxonomy term breadcrumb item locator class.
 * 
 * Used to locate the breadcrumb items for taxonomy terms.
 */
class Carbon_Breadcrumb_Locator_Term extends Carbon_Breadcrumb_Locator {

	/**
	 * Whether this the items of this locator should be included in the trail.
	 *
	 * @access public
	 *
	 * @return bool $is_included Whether the found items should be included.
	 */
	public function is_included() {
		if ( is_tax() || is_category() || is_tag() ) {
			$queried_object = get_queried_object();
			if ( $queried_object->taxonomy == $this->get_subtype() ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Retrieve the items, found by this locator.
	 *
	 * @access public
	 *
	 * @param int $priority The priority of the located items.
	 * @param int $term_id The term ID, used to go up the taxonomy term tree.
	 * @return array $items The items, found by this locator.
	 */
	public function get_items( $priority = 1000, $term_id = 0 ) {
		$items = array();

		// get the current term ID, if not specified
		if ( ! $term_id ) {
			$term_id = get_queried_object_id();
		}

		// walk the tree of ancestors of the taxonomy term up to the top
		do {

			$item = Carbon_Breadcrumb_Item::factory( $this->get_type(), $priority );
			$item->set_id( $term_id );
			$item->set_subtype( $this->get_subtype() );
			$item->setup();

			$items[] = $item;

			$term = get_term_by( 'id', $term_id, $this->get_subtype() );
			$term_id = $term->parent;

		} while ( $term_id );

		return array_reverse( $items );
	}

	/**
	 * Generate a set of breadcrumb items that found by this locator type and any subtype.
	 * Will generate all necessary breadcrumb items of all taxonomies.
	 *
	 * @access public
	 *
	 * @return array $items The items, generated by this locator.
	 */
	public function generate_items() {
		$taxonomies = get_taxonomies( array(
			'public' => true,
		) );
		
		return $this->generate_items_for_subtypes( $taxonomies );
	}
	
}