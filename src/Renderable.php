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
 * Interface Renderable.
 *
 * An object that can be `render()`ed.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface Renderable {

	/**
	 * Render the current Renderable.
	 *
	 * @param array $context Context in which to render.
	 *
	 * @return string Rendered HTML.
	 */
	public function render( array $context = [] );
}
