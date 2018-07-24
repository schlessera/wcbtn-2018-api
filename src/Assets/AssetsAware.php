<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Assets;

/**
 * Interface AssetsAware.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface AssetsAware {

	/**
	 * Set the assets handler to use within this object.
	 *
	 * @param AssetsHandler $assets Assets handler to use.
	 */
	public function with_assets_handler( AssetsHandler $assets );
}
