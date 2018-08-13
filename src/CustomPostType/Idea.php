<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomPostType;

use WordCampBrighton\API\CustomField;

/**
 * Class Idea.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class Idea extends BaseCustomPostType {

	/**
	 * Get the slug to use for the custom post type.
	 *
	 * @return string Custom post type slug.
	 */
	protected function get_slug() {
		return 'idea';
	}

	/**
	 * Get the arguments that configure the custom post type.
	 *
	 * @return array Array of arguments.
	 */
	protected function get_arguments() {
		$nouns = [
			LabelGenerator::SINGULAR_NAME_UC => _x( 'Idea', 'post type upper case singular name', 'wcbtn-2018-api' ),
			LabelGenerator::SINGULAR_NAME_LC => _x( 'idea', 'post type lower case singular name', 'wcbtn-2018-api' ),
			LabelGenerator::PLURAL_NAME_UC   => _x( 'Ideas', 'post type upper case plural name', 'wcbtn-2018-api' ),
			LabelGenerator::PLURAL_NAME_LC   => _x( 'ideas', 'post type lower case plural name', 'wcbtn-2018-api' ),
		];

		return [
			'label'               => $nouns[ LabelGenerator::SINGULAR_NAME_UC ],
			'description'         => __( 'Collected ideas and their next actions', 'wcbtn-2018-api' ),
			'labels'              => ( new LabelGenerator() )->get_generated_labels( $nouns ),
			'supports'            => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
			),
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-lightbulb',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
			'rest_base'           => $this->get_slug() . 's',
		];
	}

	/**
	 * Get the custom fields to add to a response.
	 *
	 * @return array Array of custom field schema.
	 */
	protected function get_custom_fields() {
		return [
			new CustomField\ReminderContent(),
			new CustomField\ReminderDate(),
		];
	}
}
