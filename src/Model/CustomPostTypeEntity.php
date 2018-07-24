<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\Model;

use WP_Post;

/**
 * Abstract class CustomPostTypeEntity.
 *
 * @package schlessera/wcbtn-2018-api
 */
abstract class CustomPostTypeEntity implements Entity {

	/**
	 * WordPress post data representing the post.
	 *
	 * @var WP_Post
	 */
	protected $post;

	/**
	 * Instantiate a CustomPostTypeEntity object.
	 *
	 * @param WP_Post $post Post object to instantiate a CustomPostTypeEntity model from.
	 */
	public function __construct( WP_Post $post ) {
		$this->post = $post;
	}

	/**
	 * Return the entity ID.
	 *
	 * @return int Entity ID.
	 */
	public function get_ID() {
		return $this->post->ID;
	}

	/**
	 * Return the WP_Post object that represents this model.
	 *
	 * @return WP_Post WP_Post object representing this model.
	 */
	public function get_post_object() {
		return $this->post;
	}

	/**
	 * Get the post's title.
	 *
	 * @return string Title of the post.
	 */
	public function get_title() {
		return $this->post->post_title;
	}

	/**
	 * Set the post's title.
	 *
	 * @param string $title New title of the post.
	 */
	public function set_title( $title ) {
		$this->post->post_title = $title;
	}

	/**
	 * Get the post's content.
	 *
	 * @return string Content of the post.
	 */
	public function get_content() {
		return $this->post->post_content;
	}

	/**
	 * Set the post's content.
	 *
	 * @param string $content New content of the post.
	 */
	public function set_content( $content ) {
		$this->post->post_content = $content;
	}

	/**
	 * Magic getter method to fetch meta properties only when requested.
	 *
	 * @param string $property Property that was requested.
	 *
	 * @return mixed
	 */
	public function __get( $property ) {
		if ( array_key_exists( $property, $this->get_lazy_properties() ) ) {
			$this->load_lazy_property( $property );

			return $this->$property;
		}

		$message = sprintf(
			'Undefined property: %s::$%s',
			static::class,
			$property
		);

		trigger_error( $message, E_USER_NOTICE );

		return null;
	}

	/**
	 * Persist the additional properties of the entity.
	 *
	 * @return void
	 */
	abstract public function persist_properties();

	/**
	 * Return the list of lazily-loaded properties and their default values.
	 *
	 * @return array
	 */
	abstract protected function get_lazy_properties();

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
	abstract protected function load_lazy_property( $property );
}
