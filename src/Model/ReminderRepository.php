<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use WordCampBrighton\API\CustomPostType\Reminder as ReminderCPT;
use WP_Query;
use WP_Post;

/**
 * Class ReminderRepository.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class ReminderRepository extends CustomPostTypeRepository {

	/**
	 * Create Reminder instance from WP_Post object.
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return Reminder
	 */
	public function from_post_object( $post ) {
		return new Reminder( $post );
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
			'post_type'      => ReminderCPT::SLUG,
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'meta_key'       => ReminderMeta::META_PREFIX . ReminderMeta::INTRO_WHEN,
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
		];
	}
}
