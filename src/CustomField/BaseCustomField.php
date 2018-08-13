<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomField;

abstract class BaseCustomField implements CustomField {

	/**
	 * Register the current Registerable.
	 *
	 * @return void
	 */
	public function register() {
		add_action(
			'rest_api_init',
			function () {
				register_rest_field(
					$this->get_object_type(),
					$this->get_name(),
					[
						'get_callback'    => $this->get_read_callback(),
						'update_callback' => $this->get_write_callback(),
						'schema'          => $this->get_schema(),
					]
				);
			},
			$priority = 20
		);
	}

	/**
	 * Get the read callback for the custom field.
	 *
	 * @return callable Callable to use for reading the custom field.
	 */
	protected function get_read_callback() {
		return [ $this, 'read' ];
	}

	/**
	 * Get the write callback for the custom field.
	 *
	 * @return callable Callable to use for writing the custom field.
	 */
	protected function get_write_callback() {
		return [ $this, 'write' ];
	}

	/**
	 * Get the name of the custom field.
	 *
	 * @return string Name of the custom field.
	 */
	abstract protected function get_name();

	/**
	 * Get the object type for which to register the custom field.
	 *
	 * @return string|array Object type to register the custom field for.
	 */
	abstract protected function get_object_type();

	/**
	 * Get the schema for the custom field.
	 *
	 * @return array Array of schema information.
	 */
	abstract protected function get_schema();
}
