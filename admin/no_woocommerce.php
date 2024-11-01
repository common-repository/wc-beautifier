<?php

/**
 * This function only will execute, if WooCommerce not activated or not found.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Admin Menu for not WooCommerce https://codex.wordpress.org/Plugin_API/Action_Reference/admin_menu
 */
if( ! function_exists( 'wcb_admin_menu_no_woocommerce' )){
    function wcb_admin_menu_no_woocommerce() {
        $icon_url = WCB_BASE_URL . '/assets/images/icon.png';
        add_menu_page( esc_html( 'WC Beautifier - ' ) . esc_html__( 'WooCommerce Not Found', 'wc_beautifier' ), esc_html( 'WC Beautifier' ), 'edit_theme_options', 'wc-beautifier', 'wcb_display_warning_no_woocommerce', esc_url( $icon_url ), 56);
    }
    add_action('admin_menu', 'wcb_admin_menu_no_woocommerce');
}
/**
 * Warning displaying, when WooCommmerce plugin not found of not activated.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see WooCommerce Plugin Link https://wordpress.org/plugins/woocommerce/
 */
if( ! function_exists( 'wcb_admin_menu_no_woocommerce' )){
    function wcb_display_warning_no_woocommerce(){
        echo '<div class="wrap">';
        echo '<div class="wcb_no_woocommerce"><p><strong>' . sprintf( esc_html__( 'WC Beautifier requires WooCommerce to be installed and active. You can download %s here.', 'wc_beautifier' ), '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
        echo '</div>';
    }
}