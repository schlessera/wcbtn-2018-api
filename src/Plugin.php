<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API;

use WordCampBrighton\API\Assets\AssetsAware;
use WordCampBrighton\API\Assets\AssetsHandler;

/**
 * Class Plugin.
 *
 * Main plugin controller class that hooks the plugin's functionality into the
 * WordPress request lifecycle.
 *
 * @package schlessera/wcbtn-2018-api
 */
final class Plugin implements Registerable, HasActivation, HasDeactivation {

	/**
	 * Assets handler instance.
	 *
	 * @var AssetsHandler
	 */
	private $assets_handler;

	/**
	 * Array of instantiated services.
	 *
	 * @var Service[]
	 */
	private $services = [];

	/**
	 * Instantiate a Plugin object.
	 *
	 * @param AssetsHandler|null $assets_handler Optional. Instance of the
	 *                                           assets handler to use.
	 */
	public function __construct( AssetsHandler $assets_handler = null ) {
		$this->assets_handler = $assets_handler ?: new AssetsHandler();
	}

	/**
	 * Activate the plugin.
	 */
	public function activate() {
		$this->register_services();

		// Activate that which can be activated.
		foreach ( $this->services as $service ) {
			if ( $service instanceof HasActivation ) {
				$service->activate();
			}
		}

		flush_rewrite_rules();
	}

	/**
	 * Deactivate the plugin.
	 */
	public function deactivate() {
		$this->register_services();

		// Deactivate that which can be deactivated.
		foreach ( $this->services as $service ) {
			if ( $service instanceof HasDeactivation ) {
				$service->deactivate();
			}
		}

		flush_rewrite_rules();
	}

	/**
	 * Register the plugin with the WordPress system.
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register() {
		add_action( 'plugins_loaded', [ $this, 'register_services' ] );
		add_action( 'init', [ $this, 'register_assets_handler' ] );
	}

	/**
	 * Register the individual services of this plugin.
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register_services() {
		// Bail early so we don't instantiate services twice.
		if ( ! empty( $this->services ) ) {
			return;
		}

		$classes = $this->get_service_classes();

		$this->services = array_map(
			[ $this, 'instantiate_service' ],
			$classes
		);

		array_walk( $this->services, function ( Service $service ) {
			$service->register();
		} );
	}

	/**
	 * Register the assets handler.
	 */
	public function register_assets_handler() {
		$this->assets_handler->register();
	}

	/**
	 * Return the instance of the assets handler in use.
	 *
	 * @return AssetsHandler
	 */
	public function get_assets_handler() {
		return $this->assets_handler;
	}

	/**
	 * Instantiate a single service.
	 *
	 * @param string $class Service class to instantiate.
	 *
	 * @return Service
	 * @throws Exception\InvalidService If the service is not valid.
	 */
	private function instantiate_service( $class ) {
		if ( ! class_exists( $class ) ) {
			throw Exception\InvalidService::from_service( $class );
		}

		$service = new $class();

		if ( ! $service instanceof Service ) {
			throw Exception\InvalidService::from_service( $service );
		}

		if ( $service instanceof AssetsAware ) {
			$service->with_assets_handler( $this->assets_handler );
		}

		return $service;
	}

	/**
	 * Get the list of services to register.
	 *
	 * @return array<string> Array of fully qualified class names.
	 */
	private function get_service_classes() {
		return [
			Authentication\JavaScriptWebToken::class,
			Authorisation\IdeaManagerRole::class,
			Authorisation\AdminAccess::class,
			CustomPostType\Idea::class,
			Metabox\Reminder::class,
		];
	}
}
