<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use WordCampBrighton\API\CustomPostType\Contact as ContactCPT;
use WP_Query;
use WP_Post;

/**
 * Class ContactRepository.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class ContactRepository extends CustomPostTypeRepository {

	/**
	 * Create Reminder instance from WP_Post object.
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return Contact
	 */
	public function from_post_object( $post ) {
		return new Contact( $post );
	}

	/**
	 * Get query arguments for the "find latest" query.
	 *
	 * @param int $limit Maximum number of results to fetch. Defaults to 3.
	 *
	 * @return array<string>
	 */
	public function get_find_latest_query_args( $limit = 3 ) {
		return [
			'post_type'      => ContactCPT::SLUG,
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'meta_key'       => ContactMeta::META_PREFIX . ContactMeta::INTRO_WHEN,
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
		];
	}
}
