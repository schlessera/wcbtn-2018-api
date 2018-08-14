<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API;

use DateTime;

global $wp_locale;

$reminder_date    = $this->idea->get_date();
$reminder_content = $this->idea->get_content();

$reminder_date_time = new DateTime();
$reminder_date_time->setTimestamp( $reminder_date );

$jj = $reminder_date_time->format( 'd' );
$mm = $reminder_date_time->format( 'm' );
$aa = $reminder_date_time->format( 'Y' );
$hh = $reminder_date_time->format( 'H' );
$mn = $reminder_date_time->format( 'i' );

// Reuse format translation from Core "Publish" metabox.
$date_format = __( '%1$s %2$s, %3$s @ %4$s:%5$s', 'default' );
$mm_label = $reminder_date_time->format( 'M' );
$reminder_display = sprintf(
	$date_format,
	$mm_label,
	$jj,
	$aa,
	$hh,
	$mn
);

$month = '<label><span class="screen-reader-text">' . __( 'Month' ) . '</span><select id="idea_cpt_reminder_mm" name="idea_cpt_reminder_mm">';
for ( $i = 1; $i < 13; $i++ ) {
	$monthnum = zeroise($i, 2);
	$monthtext = $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) );
	$month .= "\t\t\t" . '<option value="' . $monthnum . '" data-text="' . $monthtext . '" ' . selected( $monthnum, $mm, false ) . '>';
	/* translators: 1: month number (01, 02, etc.), 2: month abbreviation */
	$month .= sprintf( __( '%1$s-%2$s' ), $monthnum, $monthtext ) . '</option>';
}
$month .= '</select></label>';

$day = '<label><span class="screen-reader-text">' . __( 'Day' ) . '</span><input type="text" id="idea_cpt_reminder_jj" name="idea_cpt_reminder_jj" value="' . $jj . '" size="2" maxlength="2" autocomplete="off" /></label>';

$year = '<label><span class="screen-reader-text">' . __( 'Year' ) . '</span><input type="text" id="idea_cpt_reminder_aa" name="idea_cpt_reminder_aa" value="' . $aa . '" size="4" maxlength="4" autocomplete="off" /></label>';

$hour = '<label><span class="screen-reader-text">' . __( 'Hour' ) . '</span><input type="text" id="idea_cpt_reminder_hh" name="idea_cpt_reminder_hh" value="' . $hh . '" size="2" maxlength="2" autocomplete="off" /></label>';

$minute = '<label><span class="screen-reader-text">' . __( 'Minute' ) . '</span><input type="text" id="idea_cpt_reminder_mn" name="idea_cpt_reminder_mn" value="' . $mn . '" size="2" maxlength="2" autocomplete="off" /></label>';

$reminders_date_fields = '<div id="idea_cpt_reminder_date" class="idea_cpt_reminder_date-wrap">';
$reminders_date_fields .= sprintf(
	$date_format,
	$month,
	$day,
	$year,
	$hour,
	$minute
);

$map = array(
	'idea_cpt_reminder_mm' => $mm,
	'idea_cpt_reminder_jj' => $jj,
	'idea_cpt_reminder_aa' => $aa,
	'idea_cpt_reminder_hh' => $hh,
	'idea_cpt_reminder_mn' => $mn,
);

foreach ( $map as $timeunit => $value ) {
	$reminders_date_fields .= '<input type="hidden" id="hidden_' . $timeunit . '" name="hidden_' . $timeunit . '" value="' . $value . '" />';
}
$reminders_date_fields .= '</div>';

?>
<div id="idea_cpt_no_reminder" class="hide-if-no-js <?= $reminder_date !== 0 ? 'hidden' : '' ?>">
	<div class="idea-cpt-metabox-section idea-cpt-metabox-section-no-reminder">
		<p class="idea_cpt_no_reminder_notice">No reminder set.</p>
	</div>

	<div id="idea-cpt-no-reminder-actions" class="idea-cpt-reminder-actions hide-if-no-js">
		<a href="#idea_cpt_reminder" class="add-idea-cpt-reminder"><span class="button-add"><?= __('Add', 'wcbtn-2018-api' ) ?></span> <span class="screen-reader-text">Add reminder</span></a>
	</div>
</div>
<div id="idea_cpt_with_reminder" class="<?= $reminder_date === 0 ? 'hidden' : '' ?>">

	<div class="idea-cpt-metabox-section idea-cpt-metabox-section-reminder-date"><?= __('Date:', 'wcbtn-2018-api' ) ?> <span id="idea-cpt-reminder-date-display"><?= $reminder_display ?></span>
		<fieldset id="idea-cpt-reminder-date-fields" class="hide-if-js" style="display: none;">
			<input type="hidden" name="hidden_idea_cpt_reminder_date" id="hidden_idea_cpt_reminder_date" value="<?= $reminder_date ?>">
			<?= $reminders_date_fields ?>
		</fieldset>
	</div>

	<div class="idea-cpt-metabox-section idea-cpt-metabox-section-reminder-content"><?= __('Content:', 'wcbtn-2018-api' ) ?> <span id="idea-cpt-reminder-content-display"><?= $reminder_content ?></span>
		<div id="idea-cpt-reminder-content-fields" class="hide-if-js" style="display: none;">
			<input type="hidden" name="hidden_idea_cpt_reminder_content" id="hidden_idea_cpt_reminder_content" value="<?= $reminder_content ?>">
			<textarea id="idea_cpt_reminder_content" name="idea_cpt_reminder_content"><?= $reminder_content ?></textarea>
		</div>
	</div>

	<div id="idea-cpt-with-reminder-actions-edit" class="idea-cpt-reminder-actions hide-if-no-js hidden">
		<a href="#idea_cpt_reminder" class="save-idea-cpt-reminder hide-if-no-js button">OK</a>
		<a href="#idea_cpt_reminder" class="cancel-idea-cpt-reminder hide-if-no-js button-cancel">Cancel</a>
	</div>

	<div id="idea-cpt-with-reminder-actions-display" class="idea-cpt-reminder-actions hide-if-no-js">
		<a href="#idea_cpt_reminder" class="edit-idea-cpt-reminder hide-if-no-js button">Edit</a>
	</div>
</div>
