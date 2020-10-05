<?php

/**
 * Included styles bootstrap
 */
function add_theme_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/deps/bootstrap/css/bootstrap.css', false, '4.5.2', 'all' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/deps/bootstrap/js/bootstrap.js', array( 'jquery' ), 3, true );

}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


/**
 * Created new test sidebar
 */
function my_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'workout',
			'name'          => __( 'Workout Sidebar' ),
			'description'   => __( 'Training news.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'my_register_sidebars' );

/**
 * created new test nav menu
 */
function my_register_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu'  => __( 'Extra Menu' )
		)
	);
}

add_action( 'init', 'my_register_menus' );

/**
 * Created post type by Training
 */
function my_register_post() {
	register_post_type( 'trainings',
		array(
			'labels'      => array(
				'name'          => __( 'Training' ),
				'singular_name' => __( 'Training' ),
			),
			'supports'    => array( 'title', 'editor', 'thumbnail', 'post-formats', 'excerpt' ),
			'public'      => true,
			'has_archive' => true
		)
	);
}

add_action( 'init', 'my_register_post' );