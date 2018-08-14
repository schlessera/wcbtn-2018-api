/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

/* global postL10n */

// Most of this code was taken from how WordPress handles the "Publish" metabox,
// with adaptations where needed.

jQuery( document ).ready( function ( $ ) {
	var ideaCPTReminderStored = false;
	var $ideaCPTNoReminder = $( '#idea_cpt_no_reminder' );
	var $ideaCPTWithReminder = $( '#idea_cpt_with_reminder' );
	var $ideaCPTReminderDateDisplay = $( '#idea-cpt-reminder-date-display' );
	var $ideaCPTReminderContentDisplay = $( '#idea-cpt-reminder-content-display' );
	var $ideaCPTReminderDateFields = $( '#idea-cpt-reminder-date-fields' );
	var $ideaCPTReminderContentFields = $( '#idea-cpt-reminder-content-fields' );
	var $ideaCPTReminderActionsEdit = $( '#idea-cpt-with-reminder-actions-edit' );
	var $ideaCPTReminderActionsDisplay = $( '#idea-cpt-with-reminder-actions-display' );

	/**
	 * Enter editing mode, showing all relevant controls.
	 */
	var enterReminderEditMode = function () {
		$ideaCPTReminderDateDisplay.hide();
		$ideaCPTReminderDateFields.show();
		$ideaCPTReminderContentDisplay.hide();
		$ideaCPTReminderContentFields.show();
		$ideaCPTNoReminder.hide();
		$ideaCPTReminderActionsEdit.show();
		$ideaCPTReminderActionsDisplay.hide();
		if ( $ideaCPTWithReminder.is( ':hidden' ) ) {
			var now = new Date();
			$( '#idea_cpt_reminder_aa' ).val( now.getFullYear() );
			$( '#idea_cpt_reminder_mm' ).val( ( '00' + ( now.getMonth() + 1 ) ).slice( -2 ) );
			$( '#idea_cpt_reminder_jj' ).val( now.getDate() );
			$( '#idea_cpt_reminder_hh' ).val( ( '00' + now.getHours() ).slice( -2 ) );
			$( '#idea_cpt_reminder_mn' ).val( ( '00' + now.getMinutes() ).slice( -2 ) );
			$ideaCPTWithReminder.slideDown( 'fast', function () {
				$ideaCPTWithReminder.find( 'select' ).focus();
			} );
		} else {
			ideaCPTReminderStored = true;
		}
	};

	/**
	 * Exit editing mode, hiding all interactive controls again.
	 */
	var exitReminderEditMode = function () {
		$ideaCPTReminderDateDisplay.show();
		$ideaCPTReminderDateFields.hide();
		$ideaCPTReminderContentDisplay.show();
		$ideaCPTReminderContentFields.hide();
		$ideaCPTReminderActionsEdit.hide();
		$ideaCPTReminderActionsDisplay.show();
		if ( ! ideaCPTReminderStored ) {
			$ideaCPTWithReminder.slideUp( 'fast' );
			$ideaCPTNoReminder.show();
		}
	};

	/**
	 * Make sure the reminder represents the current settings.
	 *
	 * @returns {boolean} True.
	 */
	var updateReminder = function () {

		// Update content.
		var reminderContent = $( '#idea_cpt_reminder_content' ).val();

		$ideaCPTReminderContentDisplay.html( reminderContent );

		// Update date.
		var aa = $( '#idea_cpt_reminder_aa' ).val();
		var mm = $( '#idea_cpt_reminder_mm' ).val();
		var jj = $( '#idea_cpt_reminder_jj' ).val();
		var hh = $( '#idea_cpt_reminder_hh' ).val();
		var mn = $( '#idea_cpt_reminder_mn' ).val();

		// The date format used is the one from the "Publish" metabox, available
		// through the global "postL10n" object.
		var reminderDate = postL10n.dateFormat
						.replace( '%1$s', $( 'option[value="' + mm + '"]', '#mm' ).attr( 'data-text' ) )
						.replace( '%2$s', parseInt( jj, 10 ) )
						.replace( '%3$s', aa )
						.replace( '%4$s', ( '00' + hh ).slice( -2 ) )
						.replace( '%5$s', ( '00' + mn ).slice( -2 ) );

		$ideaCPTReminderDateDisplay.html( reminderDate );
		return true;
	};

	// Reminder CPT Reminder add click.
	$( 'a.add-idea-cpt-reminder' ).click(
		function ( event ) {
			event.preventDefault();
			enterReminderEditMode();
		}
	);

	// Reminder CPT Reminder edit click.
	$( 'a.edit-idea-cpt-reminder' ).click(
		function ( event ) {
			event.preventDefault();
			enterReminderEditMode();
		}
	);

	// Save the Reminder CPT Reminder changes and hide the options.
	$( 'a.save-idea-cpt-reminder' ).click(
		function ( event ) {
			event.preventDefault();
			ideaCPTReminderStored = true;
			updateReminder();
			exitReminderEditMode();
		}
	);

	// Cancel Reminder editing.
	$( 'a.cancel-idea-cpt-reminder' ).click(
		function ( event ) {
			event.preventDefault();
			$( '#idea_cpt_reminder_content' ).val( $( '#hidden_idea_cpt_reminder_content' ).val() );
			$( '#idea_cpt_reminder_date' ).val( $( '#hidden_idea_cpt_reminder_date' ).val() );
			$( '#idea_cpt_reminder_mm' ).val( $( '#hidden_idea_cpt_reminder_mm' ).val() );
			$( '#idea_cpt_reminder_jj' ).val( $( '#hidden_idea_cpt_reminder_jj' ).val() );
			$( '#idea_cpt_reminder_aa' ).val( $( '#hidden_idea_cpt_reminder_aa' ).val() );
			$( '#idea_cpt_reminder_hh' ).val( $( '#hidden_idea_cpt_reminder_hh' ).val() );
			$( '#idea_cpt_reminder_mn' ).val( $( '#hidden_idea_cpt_reminder_mn' ).val() );
			updateReminder();
			exitReminderEditMode();
		}
	);
} );
