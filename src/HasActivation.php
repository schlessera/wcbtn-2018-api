<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API;

/**
 * Interface HasActivation.
 *
 * An object that can be activated.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface HasActivation {

	/**
	 * Activate the service.
	 *
	 * @return void
	 */
	public function activate();
}
