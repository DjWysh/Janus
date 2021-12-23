<?php
/**
 * Sync NYT Top Stories
 * @since 1.0.0
 * @package Jh_Nyt_Top_Stories
 */

if ( ! wp_next_scheduled( 'nyt_sync_stories' ) ) {
	wp_schedule_event( time(), 'hourly', 'nyt_sync_stories' );
}

add_action( 'nyt_sync_stories', 'nyt_sync' );

function nyt_sync() {
	sync_function();
}
