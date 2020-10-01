<?php
get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		the_content();
		the_title( '<h2>', '</h2>' );
	endwhile;
endif;
get_sidebar( 'workout' );
get_footer();