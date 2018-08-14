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
 * Interface HasDeactivation.
 *
 * An object that can be deactivated.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface HasDeactivation {

	/**
	 * Activate the service.
	 *
	 * @return void
	 */
	public function deactivate();
}
