<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Metabox;

use WordCampBrighton\API\Assets\ScriptAsset;
use WordCampBrighton\API\Assets\StyleAsset;
use WordCampBrighton\API\CustomPostType\Idea as IdeaCPT;
use WordCampBrighton\API\Model;

/**
 * Reminder metabox class.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class Reminder extends BaseMetabox {

	const ID       = 'idea_cpt_reminder_metabox';
	const VIEW_URI = 'views/reminder-metabox';

	const CSS_HANDLE = 'idea-backend-css';
	const CSS_URI    = 'assets/styles/idea-backend';

	const JS_HANDLE = 'idea-backend-js';
	const JS_URI    = 'assets/scripts/idea-backend';

	/**
	 * Get the ID to use for the metabox.
	 *
	 * @return string ID to use for the metabox.
	 */
	protected function get_id() {
		return self::ID;
	}

	/**
	 * Get the title to use for the metabox.
	 *
	 * @return string Title to use for the metabox.
	 */
	protected function get_title() {
		return __( 'Reminder', 'wcbtn-2018-api' );
	}

	/**
	 * Get the array of known assets.
	 *
	 * @return array<Asset>
	 */
	protected function get_assets() {

		$metabox_style = new StyleAsset(
			self::CSS_HANDLE,
			self::CSS_URI
		);

		$metabox_script = new ScriptAsset(
			self::JS_HANDLE,
			self::JS_URI,
			[ 'jquery' ],
			false,
			ScriptAsset::ENQUEUE_FOOTER
		);

		return [
			$metabox_script,
			$metabox_style,
		];
	}

	/**
	 * Get the screen on which to show the metabox.
	 *
	 * @return string|array|\WP_Screen Screen on which to show the metabox.
	 */
	protected function get_screen() {
		return IdeaCPT::SLUG;
	}

	/**
	 * Get the context in which to show the metabox.
	 *
	 * @return string Context to use.
	 */
	protected function get_context() {
		return static::CONTEXT_SIDE;
	}

	/**
	 * Get the priority within the context where the boxes should show.
	 *
	 * @return string Priority within context.
	 */
	protected function get_priority() {
		return static::PRIORITY_HIGH;
	}

	/**
	 * Get the View URI to use for rendering the metabox.
	 *
	 * @return string View URI.
	 */
	protected function get_view_uri() {
		return self::VIEW_URI;
	}

	/**
	 * Process the metabox attributes.
	 *
	 * @param array|string $atts Raw metabox attributes passed into the
	 *                           metabox function.
	 *
	 * @return array Processed metabox attributes.
	 */
	protected function process_attributes( $atts ) {
		$idea_repository = new Model\IdeaRepository();
		$atts            = (array) $atts;
		$atts['idea']    = $idea_repository->find( get_the_ID() );

		return $atts;
	}

	/**
	 * Do the actual persistence of the changed data.
	 *
	 * @param int $post_id ID of the post to persist.
	 *
	 * @return void
	 */
	protected function persist( $post_id ) {
		$idea_repository = new Model\IdeaRepository();

		/** @var Model\Idea $idea */
		$idea = $idea_repository->find( $post_id );

		$idea->parse_post_data( $_POST );
		$idea->persist_properties();
	}
}
