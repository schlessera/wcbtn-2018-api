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
 * Interface ReminderMeta.
 *
 * @package schlessera/wcbtn-2018-api
 */
interface ReminderMeta {

	const DATE    = 'date';
	const CONTENT = 'content';

	const PROPERTIES = [
		self::DATE,
		self::CONTENT,
	];

	const FORM_FIELD_PREFIX  = 'idea_cpt_reminder_';
	const FORM_FIELD_DATE_AA = self::FORM_FIELD_PREFIX . 'aa';
	const FORM_FIELD_DATE_MM = self::FORM_FIELD_PREFIX . 'mm';
	const FORM_FIELD_DATE_JJ = self::FORM_FIELD_PREFIX . 'jj';
	const FORM_FIELD_DATE_HH = self::FORM_FIELD_PREFIX . 'hh';
	const FORM_FIELD_DATE_MN = self::FORM_FIELD_PREFIX . 'mn';

	const META_PREFIX = 'reminder_';
}
