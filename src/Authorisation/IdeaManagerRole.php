<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Authorisation;

use WordCampBrighton\API\HasActivation;
use WordCampBrighton\API\HasDeactivation;
use WordCampBrighton\API\Service;

final class IdeaManagerRole implements Service, HasActivation, HasDeactivation {

	/**
	 * Register the current Registerable.
	 *
	 * @return void
	 */
	public function register() {
		// Nothing to do here, we're after the (de)activation hook.
	}

	/**
	 * Activate the service.
	 *
	 * @return void
	 */
	public function activate() {
		add_role(
			'idea_manager',
			__( 'Idea Manager', 'wcbtn-2018-api' ),
			array(
				'edit_ideas'             => true,
				'edit_others_ideas'      => true,
				'publish_ideas'          => true,
				'read_private_ideas'     => true,
				'create_ideas'           => true,
				'edit_private_ideas'     => true,
				'edit_published_ideas'   => true,
				'delete_ideas'           => true,
				'delete_others_ideas'    => true,
				'delete_private_ideas'   => true,
				'delete_published_ideas' => true,
				'read_ideas'             => true,
			)
		);
	}

	/**
	 * Activate the service.
	 *
	 * @return void
	 */
	public function deactivate() {
		remove_role( 'idea_manager' );
	}
}
