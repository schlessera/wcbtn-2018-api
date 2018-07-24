<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomPostType;

/**
 * Class Reminder.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class Reminder extends BaseCustomPostType {

	const SLUG = 'reminder';

	/**
	 * Get the slug to use for the custom post type.
	 *
	 * @return string Custom post type slug.
	 */
	protected function get_slug() {
		return self::SLUG;
	}

	/**
	 * Get the arguments that configure the custom post type.
	 *
	 * @return array Array of arguments.
	 */
	protected function get_arguments() {
		return [
			'label'               => __( 'Reminder', 'wcbtn-2018-api' ),
			'description'         => __( 'Reminders to follow-up', 'wcbtn-2018-api' ),
			'labels'              => $this->get_labels(),
			'supports'            => array(
				'title',
				'author',
			),
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-calendar-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		];
	}

	/**
	 * Get the localized labels for the custom post type UI.
	 *
	 * @return array Associative array of localized strings.
	 */
	private function get_labels() {
		return [
			'name'                  => _x( 'Reminders', 'Post Type General Name', 'wcbtn-2018-api' ),
			'singular_name'         => _x( 'Reminder', 'Post Type Singular Name', 'wcbtn-2018-api' ),
			'menu_name'             => __( 'Follow-up Reminders', 'wcbtn-2018-api' ),
			'name_admin_bar'        => __( 'Reminder', 'wcbtn-2018-api' ),
			'archives'              => __( 'Item Archives', 'wcbtn-2018-api' ),
			'attributes'            => __( 'Item Attributes', 'wcbtn-2018-api' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wcbtn-2018-api' ),
			'all_items'             => __( 'All Items', 'wcbtn-2018-api' ),
			'add_new_item'          => __( 'Add New Item', 'wcbtn-2018-api' ),
			'add_new'               => __( 'Add New', 'wcbtn-2018-api' ),
			'new_item'              => __( 'New Item', 'wcbtn-2018-api' ),
			'edit_item'             => __( 'Edit Item', 'wcbtn-2018-api' ),
			'update_item'           => __( 'Update Item', 'wcbtn-2018-api' ),
			'view_item'             => __( 'View Item', 'wcbtn-2018-api' ),
			'view_items'            => __( 'View Items', 'wcbtn-2018-api' ),
			'search_items'          => __( 'Search Item', 'wcbtn-2018-api' ),
			'not_found'             => __( 'Not found', 'wcbtn-2018-api' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wcbtn-2018-api' ),
			'featured_image'        => __( 'Featured Image', 'wcbtn-2018-api' ),
			'set_featured_image'    => __( 'Set featured image', 'wcbtn-2018-api' ),
			'remove_featured_image' => __( 'Remove featured image', 'wcbtn-2018-api' ),
			'use_featured_image'    => __( 'Use as featured image', 'wcbtn-2018-api' ),
			'insert_into_item'      => __( 'Insert into item', 'wcbtn-2018-api' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wcbtn-2018-api' ),
			'items_list'            => __( 'Items list', 'wcbtn-2018-api' ),
			'items_list_navigation' => __( 'Items list navigation', 'wcbtn-2018-api' ),
			'filter_items_list'     => __( 'Filter items list', 'wcbtn-2018-api' ),
		];
	}
}
