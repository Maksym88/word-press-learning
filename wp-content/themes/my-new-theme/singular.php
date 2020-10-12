<?php get_header(); ?>
<div class="jumbotron">
    <div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <h1 class="display-3"><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                <a class="btn btn-lg btn-primary" href="<?php home_url(); ?>" role="button">Back Home</a>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>