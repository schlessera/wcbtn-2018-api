<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomField;

use WordCampBrighton\API\Registerable;
use WP_Post;

interface CustomField extends Registerable {

	/**
	 * Read the custom field value.
	 *
	 * @param array $post_array Array of custom post type data.
	 *
	 * @return mixed Custom field value.
	 */
	public function read( $post_array );

	/**
	 * Write the custom field value.
	 *
	 * @param mixed   $value Value to write.
	 * @param WP_Post $post  Custom post type to write the value for.
	 *
	 * @return mixed Custom field value.
	 */
	public function write( $value, $post );
}
