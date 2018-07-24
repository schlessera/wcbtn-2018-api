<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

/**
 * Class Reminder.
 *
 * @package schlessera/wcbtn-2018-api
 */
class Contact extends CustomPostTypeEntity {

	/**
	 * Contains a map of custom (meta) properties and their corresponding
	 * sanitization filters.
	 */
	const SANITIZATION = [
		ContactMeta::INTRO_WHERE => FILTER_SANITIZE_STRING,
		ContactMeta::INTRO_WHEN  => FILTER_SANITIZE_NUMBER_INT,
		ContactMeta::NOTES       => FILTER_SANITIZE_STRING,
	];

	/**
	 * Get the place of introduction.
	 *
	 * @return string Where you were introduced.
	 */
	public function get_intro_where() {
		return $this->intro_where;
	}

	/**
	 * Set the place of introduction.
	 *
	 * @param string $intro_where Where you were introduced.
	 */
	public function set_intro_where( $intro_where ) {
		$this->intro_where = filter_var(
			$intro_where,
			static::SANITIZATION[ ContactMeta::INTRO_WHERE ]
		);
	}

	/**
	 * Get the time of introduction.
	 *
	 * @return int When you were introduced.
	 */
	public function get_intro_when() {
		return $this->intro_when;
	}

	/**
	 * Set the time of introduction.
	 *
	 * @param int $intro_when When you were introduced.
	 */
	public function set_intro_when( $intro_when ) {
		$this->intro_when = filter_var(
			$intro_when,
			static::SANITIZATION[ ContactMeta::INTRO_WHEN ]
		);
	}

	/**
	 * Get the notes about the contact.
	 *
	 * @return string Notes about the contact.
	 */
	public function get_notes() {
		return $this->notes;
	}

	/**
	 * Set the notes about the contact
	 *
	 * @param string $notes Notes about the contact.
	 */
	public function set_notes( $notes ) {
		$this->notes = filter_var(
			$notes,
			static::SANITIZATION[ ContactMeta::NOTES ]
		);
	}

	/**
	 * Return the list of lazily-loaded properties and their default values.
	 *
	 * @return array
	 */
	protected function get_lazy_properties() {
		return [
			ContactMeta::INTRO_WHERE => '',
			ContactMeta::INTRO_WHEN  => '',
			ContactMeta::NOTES       => '',
		];
	}

	/**
	 * Load a lazily-loaded property.
	 *
	 * After this process, the loaded property should be set within the
	 * object's state, otherwise the load procedure might be triggered multiple
	 * times.
	 *
	 * @param string $property Name of the property to load.
	 *
	 * @return void
	 */
	protected function load_lazy_property( $property ) {
		$meta = get_post_meta( $this->post->ID );

		foreach ( $this->get_lazy_properties() as $key => $default ) {
			$this->$key = array_key_exists(
				ContactMeta::META_PREFIX . $key,
				$meta
			)
				? $meta[ ContactMeta::META_PREFIX . $key ][0]
				: $default;
		}
	}

	/**
	 * Persist the additional properties of the entity.
	 *
	 * @return void
	 */
	public function persist_properties() {
		foreach ( $this->get_lazy_properties() as $key => $default ) {
			if ( $this->$key === $default ) {
				delete_post_meta(
					$this->post->ID,
					ContactMeta::META_PREFIX . $key
				);
				continue;
			}

			update_post_meta(
				$this->post->ID,
				ContactMeta::META_PREFIX . $key,
				$this->$key
			);
		}
	}
}
