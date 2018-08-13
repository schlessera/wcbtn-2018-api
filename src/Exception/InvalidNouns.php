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
 * Class InvalidNouns.
 *
 * @package schlessera/wcbtn-2018-api
 */
class InvalidNouns extends \InvalidArgumentException implements WordCampBrightonException {

	/**
	 * Create a new instance of the exception for an array of nouns that is
	 * missing a required key.
	 *
	 * @param int $key Asset handle that is not valid.
	 *
	 * @return static
	 */
	public static function from_key( $key ) {
		$message = sprintf(
			'The array of nouns passed into the LabelGenerator is imssing the "%s" noun.',
			$key
		);

		return new static( $message );
	}
}
