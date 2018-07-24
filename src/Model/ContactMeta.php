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
 * Class ReminderMeta.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface ContactMeta {

	const INTRO_WHERE = 'intro_where';
	const INTRO_WHEN  = 'intro_when';
	const NOTES       = 'notes';

	const PROPERTIES = [
		self::INTRO_WHERE,
		self::INTRO_WHEN,
		self::NOTES,
	];

	const META_PREFIX = 'contact_cpt_meta_';
}
