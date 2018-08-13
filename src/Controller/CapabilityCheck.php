<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Controller;

final class CapabilityCheck implements PermissionCheck {

	/**
	 * Capability to check against.
	 *
	 * @var string
	 */
	private $capability;

	/**
	 * Instantiate a CapabilityCheck object.
	 *
	 * @param string $capability Capability to check against.
	 */
	public function __construct( $capability ) {
		$this->capability = $capability;
	}

	/**
	 * Run the permission check and test whether it passes.
	 *
	 * @return bool Whether the permission check passes or not.
	 */
	public function passes() {
		return current_user_can( $this->capability );
	}
}
