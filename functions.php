<?php
/**
 * Theme anatomy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Theme_Anatomy
 * @since 1.0.0
 */

/**
 * Register and Enqueue Styles.
 */
 function themeanatomy_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'themeanatomy-style', get_stylesheet_uri(), array(), $theme_version );
	
	// Add output of Customizer settings as inline style.
	// wp_add_inline_style( 'themeanatomy-style', themeanatomy_get_customizer_css( 'front-end' ) );

	
}

add_action( 'wp_enqueue_scripts', 'themeanatomy_register_styles' );



/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function themeanatomy_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'themeanatomy' ),
		'footer'   => __( 'Footer Menu', 'themeanatomy' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'themeanatomy_menus' );



/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themeanatomy_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'themeanatomy' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'themeanatomy' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'themeanatomy' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'themeanatomy' ),
			)
		)
	);

}

add_action( 'widgets_init', 'themeanatomy_sidebar_registration' );