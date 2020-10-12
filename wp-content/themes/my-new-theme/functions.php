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

	register_taxonomy(
		'type_training',
		'trainings',
		array( 'label' => __('Type training') )
	);

}

add_action( 'init', 'my_register_post' );

/**
 * Added image post
 */
function added_image_post() {
	add_post_type_support( 'trainings', 'thumbnail' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'added_image_post' );

/**
 * @param $classes
 *
 * @return mixed
 */
function nav_menu_css_class( $classes ) {
	$classes[] = 'nav-item';

	return $classes;
}

add_filter( 'nav_menu_css_class', 'nav_menu_css_class', 10, 2 );

/**
 * @param $atts
 *
 * @return mixed
 */
function modify_menu_link( $atts ) {
	$atts['class'] = ! empty( $atts['class'] ) ? $atts['class'] . ' nav-link' : 'nav-link';

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'modify_menu_link' );

/**
 * Create custom meta box
 */
function create_custom_box() {
	$screens = [ 'page', 'training_cpt' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'training_box_id',
			'Your Level',
			'training_box_html',
			$screen
		);
	}
}

add_action( 'add_meta_boxes', 'create_custom_box' );

/**
 * @param $post
 */
function training_box_html( $post ) {
	$value = get_post_meta( $post->ID, '_training_meta_key', true );
	?>
    <label for="custom_field">Choose here your level</label>
    <select name="custom_field" id="custom_field" class="postbox">
        <option value="">Select something...</option>
        <option value="teenager" <?php selected( $value, 'teenager' ); ?>>Teenager</option>
        <option value="newbie" <?php selected( $value, 'newbie' ); ?>>Newbie</option>
        <option value="lover" <?php selected( $value, 'lover' ); ?>>Lover</option>
        <option value="experienced" <?php selected( $value, 'experienced' ); ?>>Experienced</option>
        <option value="professional" <?php selected( $value, 'professional' ); ?>>Professional</option>
    </select>
	<?php
}

/**
 * @param $post_id
 */
function training_save_data( $post_id ) {
	if ( array_key_exists( 'custom_field', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_training_meta_key',
			$_POST['custom_field']
		);
	}
}

add_action( 'save_post', 'training_save_data' );

/**
 * Create sport meta box
 */
function create_sport_box() {
	$screens = [ 'page', 'sport_cpt' ];
	foreach ( $screens as $screen ) {
		add_meta_box(
			'sport_box_id',
			'Your sport',
			'sport_box_html',
			$screen
		);
	}
}

add_action( 'add_meta_boxes', 'create_sport_box' );

/**
 * @param $post
 */
function sport_box_html( $post ) {
	$value = get_post_meta( $post->ID, '_sport_meta_key', true );
	?>
    <label for="custom_field">Choose here your sport</label>
    <p><input type="checkbox" name="option1" value="box" <?php selected( $value, 'box' ); ?>>Box<Br>
        <input type="checkbox" name="option2" value="wrestling" <?php selected( $value, 'wrestling' ); ?>>Wrestling<Br>
        <input type="checkbox" name="option3" value="taekwondo" <?php selected( $value, 'taekwondo' ); ?>>Taekwondo<Br>
        <input type="checkbox" name="option4" value="swimming" <?php selected( $value, 'swimming' ); ?>>Swimming<Br>
        <input type="checkbox" name="option5" value="football" <?php selected( $value, 'football' ); ?>>Football</p>
	<?php
}

/**
 * @param $post_id
 */
function sport_save_data( $post_id ) {
	if ( array_key_exists( 'sport_field', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_sport_meta_key',
			$_POST['sport_field']
		);
	}
}

add_action( 'save_post', 'sport_save_data' );?>