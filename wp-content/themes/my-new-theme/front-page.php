<?php get_header(); ?>
<div style="background-color: #e9ecef">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3"><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="container">
	        <?php the_post_thumbnail(); ?>
            <div class="row">
                <div class="col">
					<?php the_content(); ?>
                    <a type="button" href="<?php echo get_post_type_archive_link('trainings') ?>" target="_blank"
                       class="btn btn-lg btn-primary">All Workouts</a>
                </div>
            </div>
        </div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
</div>