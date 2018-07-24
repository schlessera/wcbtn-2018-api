<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use DateTimeInterface;
use DateTimeImmutable;
use Exception;

/**
 * Class Reminder.
 *
 * @package schlessera/wcbtn-2018-api
 */
class Reminder extends CustomPostTypeEntity {

	/**
	 * Contains a map of custom (meta) properties and their corresponding
	 * sanitization filters.
	 */
	const SANITIZATION = [
		ReminderMeta::CONTACT => FILTER_SANITIZE_NUMBER_INT,
		ReminderMeta::WHEN    => FILTER_SANITIZE_NUMBER_INT,
		ReminderMeta::HOW     => FILTER_SANITIZE_STRING,
	];

	/**
	 * Get the contact to follow up with.
	 *
	 * @return Contact Contact to follow up with.
	 */
	public function get_contact() {
		return $this->contact;
	}

	/**
	 * Set the contact to follow up with.
	 *
	 * @param Contact|int $contact Contact to follow up with.
	 */
	public function set_contact( $contact ) {
		if ( $contact instanceof Contact ) {
			$contact = $contact->get_ID();
		}

		$this->contact = filter_var(
			$contact,
			static::SANITIZATION[ ReminderMeta::CONTACT ]
		);
	}

	/**
	 * Get the time of introduction.
	 *
	 * @return DateTimeInterface When you were introduced.
	 * @throws Exception If the DateTimeImmutable object cannot be instantiated.
	 */
	public function get_when() {
		return new DateTimeImmutable( "@{$this->when}" );
	}

	/**
	 * Set the time of when to follow up.
	 *
	 * @param DateTimeInterface|int $when When to follow up.
	 */
	public function set_when( $when ) {
		if ( $when instanceof DateTimeInterface ) {
			$when = $when->getTimestamp();
		}

		$this->when = filter_var(
			$when,
			static::SANITIZATION[ ReminderMeta::WHEN ]
		);
	}

	/**
	 * Get the time of how to follow up.
	 *
	 * @return string When to follow up.
	 */
	public function get_how() {
		return $this->how;
	}

	/**
	 * Set the means of how to follow up.
	 *
	 * @param string $how How to follow up.
	 */
	public function set_how( $how ) {
		$this->how = filter_var(
			$how,
			static::SANITIZATION[ ReminderMeta::HOW ]
		);
	}

	/**
	 * Return the list of lazily-loaded properties and their default values.
	 *
	 * @return array
	 */
	protected function get_lazy_properties() {
		return [
			ReminderMeta::CONTACT => '',
			ReminderMeta::WHEN    => '',
			ReminderMeta::HOW     => '',
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
				ReminderMeta::META_PREFIX . $key,
				$meta
			)
				? $meta[ ReminderMeta::META_PREFIX . $key ][0]
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
					ReminderMeta::META_PREFIX . $key
				);
				continue;
			}

			update_post_meta(
				$this->post->ID,
				ReminderMeta::META_PREFIX . $key,
				$this->$key
			);
		}
	}
}
