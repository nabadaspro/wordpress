<?php
// WP_Query arguments
$args = array(
	'post_type'              => $arrtibutes['post_type'],
	'posts_per_page'         => $arrtibutes['posts'],
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something ?>
		<h2><?php the_title(); ?></h2>
		<p><?php the_category(); ?></p>
		<figure><?php the_post_thumbnail(); ?></figure>
 
        <?php the_content(); ?>
		<?php posts_nav_link(); ?>
 

	<?php } 

	next_posts_link();
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();