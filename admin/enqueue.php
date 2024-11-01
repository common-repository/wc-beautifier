<?php
/**
 * All Enqueue file including here for Admin Section
 * There file only will add for Dashboard, not for front end.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see File and Script Enqueue https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
 */
if( !function_exists('wcb_enqueue_admin') ){
function wcb_enqueue_admin(){
    //Style/css file Inlude for Form
    wp_enqueue_style('beautifier-style', WCB_BASE_URL . '/assets/css/beautifier_style.css', array(), WooCommerce_Beautifier::getVersion(), 'all' );
    
    //All JS file will add Only when WooCommerce founded
    if( WooCommerce_Beautifier::checkWooCommerce() ){
        //Style/css file Inlude for Form
        wp_enqueue_style('select2', WCB_BASE_URL . '/assets/css/select2.min.css', array(), '1.8.2', 'all' );
    
        
        //Includeing Color Picker js and css at version 4.4
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style('wp-color-picker');

        //jQuery file including. jQuery is a already registerd to WordPress
        wp_enqueue_script('jquery');

        
        //Select To
        wp_enqueue_script('select2', WCB_BASE_URL . '/assets/js/select2.min.js', array( 'jquery' ), '1.8.2', true);
        //JS file Inlude for Form
        wp_enqueue_script('beautifier-script', WCB_BASE_URL . '/assets/js/beautifier_script.js', array( 'jquery','wp-i18n' ), WooCommerce_Beautifier::getVersion(), true);

        
        //Script Translation
        wp_set_script_translations( 'beautifier-script', 'wc_beautifier' );
    }
}
}
add_action('admin_enqueue_scripts','wcb_enqueue_admin',99);

/**
 * adding default wp_enqueue_media()
 * to set Background image to our plugin
 * 
 * @since 1.1
 */
function wcb_load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wcb_load_media_files' );

/**
 * Adding Admin body class
 * only for admin
 * 
 * @param array $class
 * @return Array
 * @since 1.1
 * @link https://developer.wordpress.org/reference/hooks/admin_body_class/ Details from wp developer
 */
if( ! function_exists( 'wcb_add_body_class' )){
    function wcb_add_body_class( ) {
            return 'wc_beautifier ';
    }
    add_filter('admin_body_class', 'wcb_add_body_class');
  }