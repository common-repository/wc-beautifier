<?php

/**
 * File include using WordPress default enqueue
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Enqueue Documentation https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 */
if( !function_exists('wcb_enqueue_front') ){
    function wcb_enqueue_front(){
        //Style/css file Inlude for FrontEnd
        wp_enqueue_style( 'beautifier-generated', WCB_BASE_URL . '/assets/css/beautifier_generated.css', array(), WooCommerce_Beautifier::getVersion(), 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'wcb_enqueue_front', 99 );
};

