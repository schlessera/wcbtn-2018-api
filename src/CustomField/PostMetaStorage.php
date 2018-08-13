<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomField;

use WP_Post;

trait PostMetaStorage {

	/**
	 * Get the name of the custom field.
	 *
	 * @return string Name of the custom field.
	 */
	abstract protected function get_name();

	/**
	 * Read the custom field value.
	 *
	 * @param array $post_array Array of custom post type data.
	 *
	 * @return mixed Custom field value.
	 */
	public function read( $post_array ) {
		return get_post_meta( $post_array['id'], $this->get_name(), true );
	}

	/**
	 * Write the custom field value.
	 *
	 * @param mixed   $value Value to write.
	 * @param WP_Post $post  Custom post type to write the value for.
	 *
	 * @return mixed Custom field value.
	 */
	public function write( $value, $post ) {
		return update_post_meta( $post->ID, $this->get_name(), $value );
	}
}
