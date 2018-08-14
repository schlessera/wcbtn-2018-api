<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use DateTimeImmutable;

/**
 * Class Reminder.
 *
 * @package schlessera/wcbtn-2018-api
 */
class Idea extends CustomPostTypeEntity {

	/**
	 * Contains a map of custom (meta) properties and their corresponding
	 * sanitization filters.
	 */
	const SANITIZATION = [
		ReminderMeta::CONTENT => FILTER_SANITIZE_STRING,
		ReminderMeta::DATE    => FILTER_SANITIZE_NUMBER_INT,
	];

	/**
	 * Get the content of the reminder.
	 *
	 * @return string Content of the reminder.
	 */
	public function get_content() {
		return $this->content;
	}

	/**
	 * Set the content of the reminder.
	 *
	 * @param string $content Content of the reminder.
	 */
	public function set_content( $content ) {
		$this->content = filter_var(
			$content,
			static::SANITIZATION[ ReminderMeta::CONTENT ]
		);
	}

	/**
	 * Get the date of the reminder.
	 *
	 * @return int When to remind.
	 */
	public function get_date() {
		return $this->date;
	}

	/**
	 * Set the date of the reminder.
	 *
	 * @param int $date When to remind.
	 */
	public function set_date( $date ) {
		$this->date = filter_var(
			$date,
			static::SANITIZATION[ ReminderMeta::DATE ]
		);
	}

	/**
	 * Parse the data from the superglobal $_POST.
	 *
	 * @param array $post $_POST superglobal.
	 */
	public function parse_post_data( array $post ) {
		foreach ( $this->get_lazy_properties() as $key => $default ) {
			$this->$key = filter_var(
				$post[ ReminderMeta::FORM_FIELD_PREFIX . $key ],
				array_key_exists( $key, static::SANITIZATION )
					? static::SANITIZATION[ $key ]
					: FILTER_SANITIZE_STRING
			);
		}

		$aa = filter_var(
			$post[ ReminderMeta::FORM_FIELD_DATE_AA ],
			FILTER_SANITIZE_NUMBER_INT
		);

		$mm = filter_var(
			$post[ ReminderMeta::FORM_FIELD_DATE_MM ],
			FILTER_SANITIZE_NUMBER_INT
		);

		$jj = filter_var(
			$post[ ReminderMeta::FORM_FIELD_DATE_JJ ],
			FILTER_SANITIZE_NUMBER_INT
		);

		$hh = filter_var(
			$post[ ReminderMeta::FORM_FIELD_DATE_HH ],
			FILTER_SANITIZE_NUMBER_INT
		);

		$mn = filter_var(
			$post[ ReminderMeta::FORM_FIELD_DATE_MN ],
			FILTER_SANITIZE_NUMBER_INT
		);

		$date = new DateTimeImmutable( "$aa-$mm-$jj $hh:$mn" );
		$this->set_date( $date->getTimestamp() );
	}

	/**
	 * Return the list of lazily-loaded properties and their default values.
	 *
	 * @return array
	 */
	protected function get_lazy_properties() {
		return [
			ReminderMeta::DATE    => 0,
			ReminderMeta::CONTENT => '',
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
