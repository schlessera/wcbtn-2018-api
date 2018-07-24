<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Assets;

use Closure;

/**
 * Class StyleAsset.
 *
 * @package schlessera/wcbtn-2018-api
 */
class StyleAsset extends BaseAsset {

	const MEDIA_ALL    = 'all';
	const MEDIA_PRINT  = 'print';
	const MEDIA_SCREEN = 'screen';

	const DEFAULT_EXTENSION = 'css';

	/**
	 * Source location of the asset.
	 *
	 * @var string
	 */
	protected $source;

	/**
	 * Dependencies of the asset.
	 *
	 * @var array<string>
	 */
	protected $dependencies;

	/**
	 * Version of the asset.
	 *
	 * @var string|bool|null
	 */
	protected $version;

	/**
	 * Media for which the asset is defined.
	 *
	 * @var string
	 */
	protected $media;

	/**
	 * Instantiate a StyleAsset object.
	 *
	 * @param string           $handle       Handle of the asset.
	 * @param string           $source       Source location of the asset.
	 * @param array            $dependencies Optional. Dependencies of the
	 *                                       asset.
	 * @param string|bool|null $version      Optional. Version of the asset.
	 * @param string           $media        Media for which the asset is
	 *                                       defined.
	 */
	public function __construct(
		$handle,
		$source,
		$dependencies = [],
		$version = false,
		$media = self::MEDIA_ALL
	) {
		$this->handle       = $handle;
		$this->source       = $this->normalize_source(
			$source,
			static::DEFAULT_EXTENSION
		);
		$this->dependencies = (array) $dependencies;
		$this->version      = $version;
		$this->media        = $media;
	}

	/**
	 * Get the enqueue closure to use.
	 *
	 * @return Closure
	 */
	protected function get_register_closure() {
		return function () {
			if ( wp_script_is( $this->handle, 'registered' ) ) {
				return;
			}

			wp_register_style(
				$this->handle,
				$this->source,
				$this->dependencies,
				$this->version,
				$this->media
			);
		};
	}

	/**
	 * Get the enqueue closure to use.
	 *
	 * @return Closure
	 */
	protected function get_enqueue_closure() {
		return function () {
			wp_enqueue_style( $this->handle );
		};
	}

	/**
	 * Get the dequeue closure to use.
	 *
	 * @return Closure
	 */
	protected function get_dequeue_closure() {
		return function () {
			wp_dequeue_style( $this->handle );
		};
	}
}
