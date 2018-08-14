<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use WordCampBrighton\API\Exception\InvalidPostID;
use WP_Query;
use WP_Post;

/**
 * Abstract class CustomPostTypeRepository.
 *
 * @package schlessera/wcbtn-2018-api
 */
abstract class CustomPostTypeRepository {

	/**
	 * Find the element with a given post ID.
	 *
	 * @param int $id Post ID to retrieve.
	 *
	 * @return CustomPostTypeEntity
	 * @throws InvalidPostID If the post for the requested ID was not found.
	 */
	public function find( $id ) {
		$post = get_post( $id );
		if ( null === $post ) {
			throw InvalidPostID::from_id( $id );
		}

		return $this->from_post_object( $post );
	}

	/**
	 * Find the latest published elements.
	 *
	 * @param int $limit Maximum number of results to fetch. Defaults to 3.
	 *
	 * @return array<CustomPostTypeEntity>
	 */
	public function find_latest( $limit = 3 ) {
		$query = new WP_Query( $this->get_find_latest_query_args( $limit ) );

		$elements = [];
		foreach ( $query->posts as $post ) {
			$elements[ $post->ID ] = $this->from_post_object( $post );
		}

		return $elements;
	}

	/**
	 * Find all the published elements.
	 *
	 * @return array<CustomPostTypeEntity>
	 */
	public function find_all() {
		return $this->find_latest( - 1 );
	}

	/**
	 * Persist a modified entity to the storage.
	 *
	 * @param CustomPostTypeEntity $entity Entity instance to persist.
	 */
	public function persist( CustomPostTypeEntity $entity ) {
		wp_insert_post( $entity->get_post_object()->to_array() );
		$entity->persist_properties();
	}

	/**
	 * Create Reminder instance from WP_Post object.
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return CustomPostTypeEntity
	 */
	abstract public function from_post_object( $post );

	/**
	 * Get query arguments for the "find latest" query.
	 *
	 * @param int $limit Maximum number of results to fetch. Defaults to 3.
	 *
	 * @return array<string>
	 */
	abstract public function get_find_latest_query_args( $limit = 3 );
}
