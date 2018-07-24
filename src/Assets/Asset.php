<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Assets;

use WordCampBrighton\API\Registerable;

/**
 * Interface Asset.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface Asset extends Registerable {

	/**
	 * Enqueue the asset.
	 *
	 * @return void
	 */
	public function enqueue();

	/**
	 * Dequeue the asset.
	 *
	 * @return void
	 */
	public function dequeue();

	/**
	 * Get the handle of the asset.
	 *
	 * @return string
	 */
	public function get_handle();
}
