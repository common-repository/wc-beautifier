<?php

/**
 * Status of our WooCommerce_Beautifier Plugin.
 * Here we shows all status of plugin's data
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 */
if( ! function_exists( 'wcb_plugin_status' )){
    function wcb_plugin_status(){
        $plugin_name = WooCommerce_Beautifier::getName();
        $plugin_version = WooCommerce_Beautifier::getVersion();
        $plugin_data = WooCommerce_Beautifier::getPluginData();
        ksort($plugin_data); //Sorting in ascending order
    ?>
    <div class="wrap wcb_wrap wcb_wrap_status">
        <h1 class="wp-heading-inline"><?php esc_html_e( $plugin_name ); ?> <small><?php esc_html_e( $plugin_version ); ?></small></h1>
        <hr/>
        <h3 class="wcb_subtitle"><?php echo sprintf( esc_html__( 'Plugin Status of %s', 'wc_beautifier' ), "<strong>{$plugin_name}</strong>" ); ?></h3>

        <table id="wcb_statu_table" class="form-table wcb_template_table">
            <tr class="wcb_table_head">
                <th scope="rol"><?php esc_html_e( 'Name', 'wc_beautifier' ); ?></th>
                <th><?php esc_html_e( 'Value', 'wc_beautifier' ); ?></th>

            </tr>
            <?php
            if( $plugin_data && is_array( $plugin_data ) && count( $plugin_data ) > 0 ){
                foreach( $plugin_data as $name=>$value ){
                    if( !empty( $value ) ){
                ?>
                    <tr class="template_action_row wcb_status_row">
                        <th class="wcb_status_name" scope="rol"><?php esc_html_e( $name ); ?></th>
                        <th><?php echo $value; ?></th>
                    </tr>

                <?php 
                    }
                }
            }
            ?>
        </table>
        <div class="wcb_support_wrapper">
            <p class="wcb_support_line"><?php echo sprintf( esc_html__( 'For any Query, Contact with our %s Team. Or for any critical issue - mail me to my email: %s', 'wc_beautifier' ), '<a href="https://codeastrology.com/support" target="_blank">CodeAstrology Support</a>','<a href="mailto:codersaiful@gmail.com">codersaiful@gmail.com</a>' ); ?></p>
        </div>
    </div>
    <?php
    }
}