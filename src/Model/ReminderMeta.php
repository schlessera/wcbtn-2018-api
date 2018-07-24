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
interface ReminderMeta {

	const CONTACT = 'contact';
	const WHEN    = 'when';
	const HOW     = 'how';

	const PROPERTIES = [
		self::CONTACT,
		self::WHEN,
		self::HOW,
	];

	const META_PREFIX = 'reminder_cpt_meta_';
}
