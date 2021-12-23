<?php

function sync_function() {
	require_once ABSPATH . '/wp-load.php';
	require_once ABSPATH . '/wp-admin/includes/post.php';
	require_once ABSPATH . '/wp-admin/includes/taxonomy.php';
	$nyt_top = wp_remote_get( 'https://api.nytimes.com/svc/topstories/v2/home.json?api-key=Yr5PFscXnI57mQAXsCbdipa7kKWO7Hja' );
	$results = json_decode( $nyt_top['body'] );

	foreach ( $results->results as $item ) {
		if ( post_exists( $item->title, '', '', 'nyt_top_stories', 'publish' ) ) {
			continue;
		}

		wp_create_category( $item->section );
		$cat_id = get_cat_ID( $item->section );

		if ( category_exists( $item->section ) ) {
			$cat_id = get_cat_ID( $item->section );
		}

		$tags = [];
		foreach ( $item->des_facet as $tag ) {
			if ( ! empty( $tag ) ) {
				$tags[ $tag ] = $tag;
				wp_create_term( $tag, 'nyt_top_stories_tags' );
			}
		}

		if ( empty( $tags ) ) {
			wp_insert_post(
				[
					'post_title'    => $item->title,
					'post_excerpt'  => $item->abstract,
					'post_date_gmt' => $item->published_date,
					'meta_input'    => [
						'URL'    => $item->url,
						'byline' => $item->byline,
					],
					'post_category' => [ $cat_id ],
					'post_status'   => 'publish',
					'post_type'     => 'nyt_top_stories',
				]
			);
		}

		wp_insert_post(
			[
				'post_title'    => $item->title,
				'post_excerpt'  => $item->abstract,
				'post_date_gmt' => $item->published_date,
				'meta_input'    => [
					'URL'    => $item->url,
					'byline' => $item->byline,
				],
				'post_category' => [ $cat_id ],
				'tags_input'    => $tags,
				'post_status'   => 'publish',
				'post_type'     => 'nyt_top_stories',
			]
		);
	}
}
