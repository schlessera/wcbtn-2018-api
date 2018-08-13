<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomField;

final class ReminderDate extends BaseCustomField {

	use PostMetaStorage;

	/**
	 * Get the name of the custom field.
	 *
	 * @return string Name of the custom field.
	 */
	protected function get_name() {
		return 'reminder_date';
	}

	/**
	 * Get the object type for which to register the custom field.
	 *
	 * @return string|array Object type to register the custom field for.
	 */
	protected function get_object_type() {
		return 'idea';
	}

	/**
	 * Get the schema for the custom field.
	 *
	 * @return array Array of schema information.
	 */
	protected function get_schema() {
		return [
			'description' => __( 'Date of the reminder.' ),
			'type'        => Type::INTEGER,
		];
	}
}
