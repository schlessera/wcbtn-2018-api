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
 * Interface Registerable.
 *
 * An object that can be `register()`ed.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface Registerable {

	/**
	 * Register the current Registerable.
	 *
	 * @return void
	 */
	public function register();
}
