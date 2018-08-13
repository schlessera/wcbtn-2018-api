<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Controller;

interface PermissionCheck {

	/**
	 * Run the permission check and test whether it passes.
	 *
	 * @return bool Whether the permission check passes or not.
	 */
	public function passes();
}
