<?php
/**
 * Customize the WordPress dashboard
 *
 * @package understrap
 */

/*
 * Setup the D4TW Dashboard Widget
 * @link https://codex.wordpress.org/Function_Reference/wp_add_dashboard_widget
 */

function d4tw_add_dashboard_widget() {
	add_meta_box('wp_dashboard_widget_1', 'Theme Details', 'd4tw_theme_info', 'dashboard', 'side', 'high');
  //wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'd4tw_theme_info');
}
add_action('wp_dashboard_setup', 'd4tw_add_dashboard_widget' );
 
function d4tw_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> Designs 4 The Web</li>
  <li><strong>Website:</strong> <a href='http://www.designs4theweb.com'>www.designs4theweb.com</a></li>
  <li><strong>Contact:</strong> <a href='mailto:mike@designs4theweb.com'>mike@designs4theweb.com</a></li>
  </ul>";
}

//Remove the tools menu option for editors
function d4tw_remove_menus(){
if ( current_user_can( 'editor' ) ) {
remove_menu_page( 'tools.php' );
	}
}
add_action( 'admin_menu', 'd4tw_remove_menus' );

//Remove widgets from dashboard
function d4tw_remove_dash_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'd4tw_remove_dash_meta' );

//Filter the WordPress branding in the dashboard footer
function d4tw_filter_admin_footer () {
    echo '<span id="dashFooter">Website developed by <a style = "color: #ff0000; text-decoration: none;" href="http://www.designs4theweb.com" target="_blank">Designs 4 The Web</a></span>';
}
add_filter('admin_footer_text', 'd4tw_filter_admin_footer');

//Add custom logo to wp-login
function d4tw_custom_logo_css () {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'd4tw_custom_logo_css');

//Change the wp-login logo url
function d4tw_login_url(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'd4tw_login_url');

//Replace the WordPress dashboard logo
function d4tw_admin_css() {
	wp_enqueue_style('dashboard-styles', get_stylesheet_directory_uri() . '/dashboard/dashboard.css');
}

add_action('admin_head', 'd4tw_admin_css');