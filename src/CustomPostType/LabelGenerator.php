<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomPostType;

use WordCampBrighton\API\Exception\InvalidNouns;

final class LabelGenerator {

	const SINGULAR_NAME_UC = 'singular_name_uc';
	const SINGULAR_NAME_LC = 'singular_name_lc';
	const PLURAL_NAME_UC = 'plural_name_uc';
	const PLURAL_NAME_LC = 'plural_name_lc';

	const REQUIRED_NOUNS = [
		self::SINGULAR_NAME_UC,
		self::SINGULAR_NAME_LC,
		self::PLURAL_NAME_UC,
		self::PLURAL_NAME_LC,
	];

	/**
	 * Get automatically generated labels from a singular and an optional
	 * plural noun.
	 *
	 * Note: These cannot properly be translated into all languages. Only use
	 * for client projects where you control the languages needed.
	 *
	 * @param array $nouns Array of nouns to use for the labels.
	 *
	 * @return string[]
	 */
	public function get_generated_labels( $nouns ) {

		foreach( self::REQUIRED_NOUNS as $noun_key ) {
			if ( ! array_key_exists( $noun_key, $nouns ) ) {
				throw InvalidNouns::from_key( $noun_key );
			}
		}

		$label_templates = [
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'name'                  => _x( '%3$s', 'Post Type General Name', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'singular_name'         => _x( '%1$s', 'Post Type Singular Name', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'menu_name'             => __( '%3$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'name_admin_bar'        => __( '%1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'archives'              => __( '%1$s Archives', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'attributes'            => __( '%1$s Attributes', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'parent_item_colon'     => __( 'Parent %1$s:', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'all_items'             => __( 'All %3$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'add_new_item'          => __( 'Add New %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'add_new'               => __( 'Add New', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'new_item'              => __( 'New %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'edit_item'             => __( 'Edit %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'update_item'           => __( 'Update %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'view_item'             => __( 'View %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'view_items'            => __( 'View %3$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'search_items'          => __( 'Search %1$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'not_found'             => __( 'Not found', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'not_found_in_trash'    => __( 'Not found in Trash', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'featured_image'        => __( 'Featured Image', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'set_featured_image'    => __( 'Set featured image', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'remove_featured_image' => __( 'Remove featured image', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'use_featured_image'    => __( 'Use as featured image', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'insert_into_item'      => __( 'Insert into %2$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'uploaded_to_this_item' => __( 'Uploaded to this %2$s', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'items_list'            => __( '%3$s list', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'items_list_navigation' => __( '%3$s list navigation', 'wcbtn-2018-api' ),
			/* Translators: %1$s uc singular, %2$s lc singular, %3$s uc plural, %4$s lc plural. */
			'filter_items_list'     => __( 'Filter %4$s list', 'wcbtn-2018-api' ),
		];

		return array_map( function ( $label ) use ( $nouns ) {
			return sprintf(
				$label,
				$nouns[ self::SINGULAR_NAME_UC ],
				$nouns[ self::SINGULAR_NAME_LC ],
				$nouns[ self::PLURAL_NAME_UC ],
				$nouns[ self::PLURAL_NAME_LC ]
			);
		}, $label_templates );
	}
}
