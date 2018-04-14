<?php
/**
 * Setup Custom Template Tags
 *
 * @package understrap
 */

//SHORTEN EXCERPT
function d4tw_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'd4tw_excerpt_length', 999 );

//CUSTOMIZE POST EXCERPT
if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		return '';
	}
}
add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );
if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		return $post_excerpt . ' [...]<p><a class = "read-more-link" href="' . esc_url( get_permalink( get_the_ID() )) . '">Read Full Post</a></p>';
	}
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
