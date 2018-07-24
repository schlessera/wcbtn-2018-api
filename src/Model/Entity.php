<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

/**
 * Interface Entity.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface Entity {

	/**
	 * Return the entity ID.
	 *
	 * @return int Entity ID.
	 */
	public function get_ID();
}
