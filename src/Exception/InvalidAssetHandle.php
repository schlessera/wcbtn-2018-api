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
 * Class InvalidAssetHandle.
 *
 * @package schlessera/wcbtn-2018-api
 */
class InvalidAssetHandle extends \InvalidArgumentException implements WordCampBrightonException {

	/**
	 * Create a new instance of the exception for a asset handle that is not
	 * valid.
	 *
	 * @param int $handle Asset handle that is not valid.
	 *
	 * @return static
	 */
	public static function from_handle( $handle ) {
		$message = sprintf(
			'The asset handle "%s" is not valid.',
			$handle
		);

		return new static( $message );
	}
}
