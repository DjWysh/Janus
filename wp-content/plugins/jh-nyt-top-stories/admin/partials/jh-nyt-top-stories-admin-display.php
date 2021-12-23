<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.janushenderson.com/
 * @since      1.0.0
 *
 * @package    Jh_Nyt_Top_Stories
 * @subpackage Jh_Nyt_Top_Stories/admin/partials
 */
require_once ABSPATH . 'wp-content/plugins/jh-nyt-top-stories/includes/jh-nyt-sync-function.php';
?>
	<!-- This file should primarily consist of HTML with a little bit of PHP  -->
	<div class="options">
		<h1 class="options__heading">Import New York Times Top Stories</h1>
		<form method="post">
			<input class="options__button" type="submit" name="btn-import" value="Import Now">
		</form>
	</div>
<?php
if ( isset( $_POST['btn-import'] ) ) {
	sync_function();
}
