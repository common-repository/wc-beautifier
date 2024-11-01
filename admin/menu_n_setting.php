<?php

/**
 * Setting menu and other links on Plugin page
 * 
 * @param type $links
 * @return type Array Menu link Array
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Add menu link on Plugin Page https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
 */
if( ! function_exists( 'wcb_add_action_links' )){
    function wcb_add_action_links($links) {
        $wcb_links[] = '<a href="' . esc_url( admin_url( 'admin.php?page=wc-beautifier' ) ) . '" title=' . esc_attr__( 'WC_Beautifier Page', 'wc_beautifier') . '>' . esc_html__( 'WC Beautifier', 'wc_beautifier' ) . '</a>';
        $wcb_links[] = '<a href="https://codeastrology.com/support/" title="CodeAstrology ' . esc_attr__( 'Support', 'wc_beautifier') . '" target="_blank">' . esc_html__( 'Support', 'wc_beautifier' ) . '</a>';
        $wcb_links[] = '<a href="' . esc_url( admin_url( 'admin.php?page=wc-beautifier-status' ) ) . '" title="' . esc_attr__( 'Status', 'wc_beautifier') . '" >' . esc_html__( 'Status', 'wc_beautifier' ) . '</a>';
        return array_merge($wcb_links, $links);
    }
    add_filter('plugin_action_links_' . WCB_PLUGIN_BASE_FILE, 'wcb_add_action_links');
}

/**
 * Adding Menu in dashboard. Currently add WC_Beautifier, Import/Export and Template
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Admin Menu and Submenu https://codex.wordpress.org/Plugin_API/Action_Reference/admin_menu
 */
if( ! function_exists( 'wcb_admin_menu' )){
function wcb_admin_menu() {
    $icon_url = WCB_BASE_URL . '/assets/images/icon.png';
    add_menu_page( esc_html__( 'WC Beautifier', 'wc_beautifier' ), esc_html__( 'WC Beautifier', 'wc_beautifier' ), 'edit_theme_options', 'wc-beautifier', 'wcb_general_tab', esc_url( $icon_url ), 56 );
    add_submenu_page( 'wc-beautifier', esc_html__( 'Beautifier Import/Export', 'wc_beautifier' ), esc_html__( 'Import/Export', 'wc_beautifier' ), 'edit_theme_options', 'wc-beautifier-export-import', 'wcb_export_emport' );
    add_submenu_page( 'wc-beautifier', esc_html__( 'Templates list', 'wc_beautifier' ), esc_html__( 'Templates', 'wc_beautifier' ), 'edit_theme_options', 'wc-beautifier-templates', 'wcb_templates' );
    add_submenu_page( 'wc-beautifier', esc_html__( 'Plugin Status', 'wc_beautifier' ), esc_html__( 'Status', 'wc_beautifier' ), 'edit_theme_options', 'wc-beautifier-status', 'wcb_plugin_status' );
}
add_action( 'admin_menu', 'wcb_admin_menu' );
}