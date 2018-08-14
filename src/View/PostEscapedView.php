<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\View;

use WordCampBrighton\API\Exception\FailedToLoadView;
use WordCampBrighton\API\Exception\InvalidURI;

/**
 * Class PostEscapedView.
 *
 * This is a Decorator that decorates a given View with escaping meant for
 * standard HTML post output.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class PostEscapedView implements View {

	/**
	 * View instance to decorate.
	 *
	 * @var View
	 */
	private $view;

	/**
	 * Instantiate a PostEscapedView object.
	 *
	 * @param View $view View instance to decorate.
	 */
	public function __construct( View $view ) {
		$this->view = $view;
	}

	/**
	 * Render a given URI.
	 *
	 * @param array $context Context in which to render.
	 *
	 * @return string Rendered HTML.
	 * @throws FailedToLoadView If the View URI could not be loaded.
	 */
	public function render( array $context = [] ) {
		return wp_kses_post( $this->view->render( $context ) );
	}

	/**
	 * Render a partial view.
	 *
	 * This can be used from within a currently rendered view, to include
	 * nested partials.
	 *
	 * The passed-in context is optional, and will fall back to the parent's
	 * context if omitted.
	 *
	 * @param string     $uri     URI of the partial to render.
	 * @param array|null $context Context in which to render the partial.
	 *
	 * @return string Rendered HTML.
	 * @throws InvalidURI If the provided URI was not valid.
	 * @throws FailedToLoadView If the view could not be loaded.
	 */
	public function render_partial( $uri, array $context = null ) {
		return wp_kses_post( $this->view->render_partial( $uri, $context ) );
	}
}
