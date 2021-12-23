<?php
add_shortcode( 'story_code', 'jh_nyt_stories_shortcode' );
function jh_nyt_stories_shortcode() {
	$args     = [
		'post_type'      => 'nyt_top_stories',
		'posts_per_page' => 5,
		'order_by'       => 'date',
		'order'          => 'DESC',
		'meta_key'       => 'URL',
	];
	$query    = new WP_Query( $args );
	$articles = [];
	foreach ( $query->posts as $article ) {
		$url        = get_post_meta( $article->ID, 'URL' );
		$byline     = get_post_meta( $article->ID, 'byline' );
		$articles[] = [
			'link'   => $url[0],
			'title'  => $article->post_title,
			'byline' => $byline[0],
		];
	}

	_log( $articles );
	ob_start();?>
	<ul class="articles">
		<li class="article">
			<h4 class="article__title">
				<a href="<?php echo $articles[0]['link']; ?>" class="article__link">
				<?php echo $articles[0]['title']; ?>
				</a>
			</h4>
			<small class="article__byline">
			<?php echo $articles[0]['byline']; ?>
			</small>
		</li>
		<li class="article">
			<h4 class="article__title">
				<a href="<?php echo $articles[1]['link']; ?>" class="article__link">
				<?php echo $articles[1]['title']; ?>
				</a>
			</h4>
			<small class="article__byline">
			<?php echo $articles[1]['byline']; ?>
			</small>
		</li>
		<li class="article">
			<h4 class="article__title">
				<a href="<?php echo $articles[2]['link']; ?>" class="article__link">
				<?php echo $articles[2]['title']; ?>
				</a>
			</h4>
			<small class="article__byline">
			<?php echo $articles[2]['byline']; ?>
			</small>
		</li>
		<li class="article">
			<h4 class="article__title">
				<a href="<?php echo $articles[3]['link']; ?>" class="article__link">
				<?php echo $articles[3]['title']; ?>
				</a>
			</h4>
			<small class="article__byline">
			<?php echo $articles[3]['byline']; ?>
			</small>
		</li>
		<li class="article">
			<h4 class="article__title">
				<a href="<?php echo $articles[4]['link']; ?>" class="article__link">
				<?php echo $articles[4]['title']; ?>
				</a>
			</h4>
			<small class="article__byline">
			<?php echo $articles[4]['byline']; ?>
			</small>
		</li>
	</ul>
	<?php
	$content = ob_get_clean();
	return $content;
}
