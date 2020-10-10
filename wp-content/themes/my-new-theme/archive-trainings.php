<?php get_header(); ?>
    <div class="container">
		<?php if ( have_posts() ) : ?>
            <div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
	                            <?php the_post_thumbnail( 'post-thumbnail', array(
		                            'class' => 'bd-placeholder-img card-img-top',
	                            ) ); ?>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a type="button" href="<?php the_permalink(); ?>" target="_blank"
                                           class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-muted"><?php the_date(); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
    </div>
<?php get_sidebar( 'workout' );
get_footer(); ?>