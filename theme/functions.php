<?php
//register nav menu
// add_action( 'after_setup_theme', 'theme_register_nav_menu' );
// function theme_register_nav_menu() {
// 	register_nav_menu( 'header', 'Header Menu' );
// }

add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	) );
});

// Default size of thumbnails
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 240, 240 );
}

// Posr type support
if ( function_exists('add_post_type_support') ) {
	add_post_type_support('page', array('custom-fields', 'excerpt', 'page-attributes'));
}

// Register socio menu
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Socio menu',
		'id'            => "socio",
		'description'   => 'In header',
		'class'         => 'nav socio',
		'before_widget' => '<li>',
		'after_widget'  => '</li>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
?>
