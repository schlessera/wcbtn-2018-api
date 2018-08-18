<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use WordCampBrighton\API\CustomPostType\Idea as IdeaCPT;
use WP_Post;

/**
 * Class IdeaRepository.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class IdeaRepository extends CustomPostTypeRepository {

	/**
	 * Create Idea instance from WP_Post object.
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return Idea
	 */
	public function from_post_object( $post ) {
		return new Idea( $post );
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
			'post_type'      => IdeaCPT::SLUG,
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'meta_key'       => ReminderMeta::META_PREFIX . ReminderMeta::DATE,
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
		];
	}
}
