<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Assets;

use WordCampBrighton\API\Exception\InvalidAssetHandle;

/**
 * Trait AssetsAwareness
 *
 * @package schlessera/wcbtn-2018-api
 */
trait AssetsAwareness {

	/**
	 * Assets handler instance to use.
	 *
	 * @var AssetsHandler
	 */
	protected $assets_handler;

	/**
	 * Get the array of known assets.
	 *
	 * @return array<Asset>
	 */
	protected function get_assets() {
		return [];
	}

	/**
	 * Register the known assets.
	 */
	protected function register_assets() {
		foreach ( $this->get_assets() as $asset ) {
			$this->assets_handler->add( $asset );
		}
	}

	/**
	 * Enqueue the known assets.
	 *
	 * @throws InvalidAssetHandle If the passed-in asset handle is not valid.
	 */
	protected function enqueue_assets() {
		foreach ( $this->get_assets() as $asset ) {
			$this->assets_handler->enqueue( $asset );
		}
	}

	/**
	 * Enqueue a single asset.
	 *
	 * @param string $handle Handle of the asset to enqueue.
	 *
	 * @throws InvalidAssetHandle If the passed-in asset handle is not valid.
	 */
	protected function enqueue_asset( $handle ) {
		$this->assets_handler->enqueue_handle( $handle );
	}

	/**
	 * Set the assets handler to use within this object.
	 *
	 * @param AssetsHandler $assets Assets handler to use.
	 */
	public function with_assets_handler( AssetsHandler $assets ) {
		$this->assets_handler = $assets;
	}
}
