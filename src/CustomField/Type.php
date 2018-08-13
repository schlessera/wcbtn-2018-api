<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API\CustomField;

interface Type {

	// We cannot use a reserved keyword as a constant.
	// const ARRAY   = 'array';
	const COLLECTION = 'array';
	const BOOLEAN    = 'boolean';
	const INTEGER    = 'integer';
	const NULL       = 'null';
	const NUMBER     = 'number';
	const OBJECT     = 'object';
	const STRING     = 'string';
}
