<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Exception;

/**
 * Class InvalidPostID.
 *
 * @package schlessera/wcbtn-2018-api
 */
class InvalidPostID extends \InvalidArgumentException implements WordCampBrightonException {

	/**
	 * Create a new instance of the exception for a post ID that is not valid.
	 *
	 * @param int $id Post ID that is not valid.
	 *
	 * @return static
	 */
	public static function from_id( $id ) {
		$message = sprintf(
			'The post ID "%d" is not valid.',
			$id
		);

		return new static( $message );
	}
}
