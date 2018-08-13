<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Controller;

use WordCampBrighton\API\Service;

/**
 * Abstract class BaseRestController.
 *
 * @package schlessera/wcbtn-2018-api
 */
abstract class BaseRestController implements Service {

	/**
	 * Namespace to use for this controller.
	 *
	 * @var string
	 */
	protected $namespace;

	/**
	 * Resource name to use for this controller.
	 *
	 * @var string
	 */
	protected $resource_name;

	/**
	 * Instantiate a BaseRestController object.
	 */
	public function __construct() {
		$this->namespace     = $this->get_namespace();
		$this->resource_name = $this->get_resource_name();
	}

    // Register our routes.
    public function register_routes() {
		new Route( $this->get_endpoint() )
		foreach ( $this->get_routes() as $route ) {
		    register_rest_route(
		    	$this->namespace,
			    '/' . $this->resource_name . $route->get_endpoint(),
			    array(
		        // Here we register the readable endpoint for collections.
		        array(
		            'methods'   => 'GET',
		            'callback'  => array( $this, 'get_items' ),
		            'permission_callback' => array( $this, 'get_items_permissions_check' ),
		        ),
		        // Register our schema callback.
		        'schema' => array( $this, 'get_item_schema' ),
		    ) );
		}
        register_rest_route( $this->namespace, '/' . $this->resource_name, array(
            // Here we register the readable endpoint for collections.
            array(
                'methods'   => 'GET',
                'callback'  => array( $this, 'get_items' ),
                'permission_callback' => array( $this, 'get_items_permissions_check' ),
            ),
            // Register our schema callback.
            'schema' => array( $this, 'get_item_schema' ),
        ) );
        register_rest_route( $this->namespace, '/' . $this->resource_name . '/(?P<id>[\d]+)', array(
            // Notice how we are registering multiple endpoints the 'schema' equates to an OPTIONS request.
            array(
                'methods'   => 'GET',
                'callback'  => array( $this, 'get_item' ),
                'permission_callback' => array( $this, 'get_item_permissions_check' ),
            ),
            // Register our schema callback.
            'schema' => array( $this, 'get_item_schema' ),
        ) );
    }

	/**
	 * Get the namespace to use for the controller.
	 *
	 * @return string Namespace.
	 */
	abstract protected function get_namespace();

	/**
	 * Get the resource name to use for the controller.
	 *
	 * @return string Resource name.
	 */
	abstract protected function get_resource_name();
}
