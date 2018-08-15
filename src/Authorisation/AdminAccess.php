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
use WP_Role;

final class AdminAccess implements Service, HasActivation, HasDeactivation {

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
		$role = get_role( 'administrator' );

		if ( ! $role instanceof WP_Role ) {
			return;
		}

		$role->add_cap( 'edit_ideas', true );
		$role->add_cap( 'edit_others_ideas', true );
		$role->add_cap( 'publish_ideas', true );
		$role->add_cap( 'read_private_ideas', true );
		$role->add_cap( 'create_ideas', true );
		$role->add_cap( 'edit_private_ideas', true );
		$role->add_cap( 'edit_published_ideas', true );
		$role->add_cap( 'delete_ideas', true );
		$role->add_cap( 'delete_others_ideas', true );
		$role->add_cap( 'delete_private_ideas', true );
		$role->add_cap( 'delete_published_ideas', true );
		$role->add_cap( 'read_ideas', true );
	}

	/**
	 * Activate the service.
	 *
	 * @return void
	 */
	public function deactivate() {
		$role = get_role( 'administrator' );

		if ( ! $role instanceof WP_Role ) {
			return;
		}

		$role->remove_cap( 'edit_ideas' );
		$role->remove_cap( 'edit_others_ideas' );
		$role->remove_cap( 'publish_ideas' );
		$role->remove_cap( 'read_private_ideas' );
		$role->remove_cap( 'create_ideas' );
		$role->remove_cap( 'edit_private_ideas' );
		$role->remove_cap( 'edit_published_ideas' );
		$role->remove_cap( 'delete_ideas' );
		$role->remove_cap( 'delete_others_ideas' );
		$role->remove_cap( 'delete_private_ideas' );
		$role->remove_cap( 'delete_published_ideas' );
		$role->remove_cap( 'read_ideas' );
	}
}
