<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 *
 * @wordpress-plugin
 * Plugin Name:  wcbtn-2018-api
 * Plugin URI:   https://schlessera.github.io/wcbtn-2018
 * Description:  Serverside API for the workshop "Using the REST API for WordPress-driven Apps" at WordCamp Brighton 2018.
 * Version:      0.1.0
 * Requires PHP: 5.6
 * Author:       Sean Blakeley & Alain Schlesser
 * Text Domain:  wcbtn-2018-api
 * Domain Path:  /languages
 * License:      MIT
 * License URI:  https://opensource.org/licenses/MIT
 */

namespace WordCampBrighton\API;

// Make sure this file is only run from within WordPress.
defined( 'ABSPATH' ) or die();

// Load Autoloader class and register plugin namespace.
require_once __DIR__ . '/src/Autoloader.php';
( new Autoloader() )
	->add_namespace( __NAMESPACE__, __DIR__ . '/src' )
	->register();

// Register activation and deactivation hooks.
register_activation_hook( __FILE__, function () {
	PluginFactory::create()
             ->activate();
} );
register_deactivation_hook( __FILE__, function () {
	PluginFactory::create()
             ->deactivate();
} );

// Hook plugin into WordPress request lifecycle.
PluginFactory::create()
             ->register();
