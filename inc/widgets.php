<?php
/**
 * Setting up widgets
 *
 * @package understrap
 */

// Deregister Sidebars
function d4tw_remove_sidebars () {
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'footerfull' );
	unregister_sidebar( 'left-sidebar' );

}

add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );

// Register Theme Sidebars
function d4tw_sidebars() {

    $args = array(
        'id'            => 'footer_1',
        'class'         => 'footer_1',
        'name'          => 'Footer 1',
        'description'   => 'This widget area will appear in the first position of the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'footer_2',
        'class'         => 'footer_2',
        'name'          => 'Footer 2',
        'description'   => 'This widget area will appear in the second position of the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'footer_3',
        'class'         => 'footer_3',
        'name'          => 'Footer 3',
        'description'   => 'This widget area will appear in the third position of the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    );
    register_sidebar( $args );

    $args = array(
        'id'            => 'footer_4',
        'class'         => 'footer_4',
        'name'          => 'Footer 4',
        'description'   => 'This widget area will appear in the fourth position of the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    );
    register_sidebar( $args );

}
add_action( 'widgets_init', 'd4tw_sidebars' );