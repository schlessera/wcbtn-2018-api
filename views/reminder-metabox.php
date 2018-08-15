<?php
/**
 * WordCamp Brighton 2018 workshop plugin (wcbtn-2018-api).
 *
 * @package schlessera/wcbtn-2018-api
 * @licence MIT
 * @link    https://schlessera.github.io/wcbtn-2018
 */

namespace WordCampBrighton\API;

?>
<form class="idea-cpt-reminder-metabox">
	<?= $this->nonce_field ?>
	<?= $this->render_partial( 'views/reminder-metabox-fields' ) ?>
</form>
