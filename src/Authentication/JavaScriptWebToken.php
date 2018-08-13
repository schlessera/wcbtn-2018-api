<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Authentication;

use WordCampBrighton\API\Service;

/**
 * Class JavaScriptWebToken.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class JavaScriptWebToken implements Service {

	const TOKEN_VARIABLE = 'JWT_AUTH_SECRET_KEY';

	/**
	 * Register the current Registerable.
	 *
	 * @return void
	 */
	public function register() {
		if ( defined( self::TOKEN_VARIABLE ) ) {
			return;
		}

		define(
			self::TOKEN_VARIABLE,
			getenv( self::TOKEN_VARIABLE )
		);
	}
}
