<?php
/**
 * Creates NYT Top Stories CPT
 */

add_action( 'init', 'jh_nyt_posttype' );
function jh_nyt_posttype() {
	/**
	 * Post Type: NYT Top Stories
	 */
	$args = [
		'label'               => __( 'NYT Top Stories', 'jh-nyt-top-stories' ),
		'description'         => 'New York Times Top Stories',
		'public'              => true,
		'taxonomies'          => [ 'category', 'post_tag' ],
		'exclude_from_search' => false,
		'menu_icon'           => 'dashicons-pressthis',
	];
	register_post_type( 'nyt_top_stories', $args );
}
