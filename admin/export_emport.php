<?php

/**
 * Import Export page. To import and export plugin setting we will use this file.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Content Import https://codex.wordpress.org/Importing_Content
 */
if( ! function_exists( 'wcb_export_emport' )){
    function wcb_export_emport(){
        $encoded_current_options = WCB_Beautifier\WCB_JsonBase64::currnetOptionTo64();

        if( isset( $_POST['import_base_code'] ) && !empty( $_POST['import_base_code'] ) ){
            $submitted_import_base_code = sanitize_text_field( $_POST['import_base_code'] );
            WCB_Beautifier\WCB_Templates::importTemplateBasedon64( $submitted_import_base_code, '&response=setting_import' );
        }elseif( isset( $_POST['import_base_code'] ) && empty( $_POST['import_base_code'] ) ){
            echo '<p class="wcb_message wcb_error  notice is-dismissible">' . esc_html__( 'You have submitted empty data!' , 'wc_beautifier' ) . '</p>';
        }
?>
<div class="wrap wcb_export_import">
    <h1 class="wp-heading-inline"> <?php esc_html_e( 'Import/Export', 'wc_beautifier' ); ?></h1>
    <hr/>
    <h3 class="wcb_subtitle"><?php esc_html_e( 'Save your export code for backup. And If needed Import easily by Import textarea', 'wc_beautifier' ); ?></h3>
    
    
    <div class="wcb_export_import_wrapper wcb_import_wrapper">
        <h3 class="wcb_title"> <?php esc_html_e( 'Import','wc_beautifier');?></h3>
        <form class="import_form" action="" method="POST">
            <textarea name="import_base_code" class="wcb_export_code" cols="100" rows="10" placeholder="<?php esc_attr_e( 'Import your encripted exported code', 'wc_beautifier' ); ?>"></textarea>
            <div class="wcb_import_submit_btn_wrapper">
                <button class="button button-primary" type="submit" name="import_json"><?php esc_html_e( 'Import','wc_beautifier');?></button>
            </div>
        </form>
        
    </div>
    <div class="wcb_export_import_wrapper wcb_export_wrapper">
        <hr>
        <h3 class="wcb_title"><?php esc_html_e( 'Export Settings','wc_beautifier');?></h3>

        <p><?php
        if( !$encoded_current_options ){
            echo '<p class="wcb_message wcb_error  notice">' . esc_html__( 'Your Setting is empty.', 'wc_beautifier' ) . '</p>';
        }else{
            echo '<p class="wcb_message notice">' . esc_html__( 'Copy the following encripted code and paste to any text file and save to make backup your setting.', 'wc_beautifier' ) . '</p>';
        ?>
        </p>
        <textarea class="wcb_export_code" cols="100" rows="10" readonly="readonly"><?php esc_html_e(sanitize_textarea_field( $encoded_current_options ) );  ?></textarea>
        <?php }
        ?>
    </div>
</div>
<?php
    }
}