<?php

/**
 * Template list. Mainly to same setting as menu. All setting will store at Template page.
 * To this page, we also show expoerted code, By default, it will stay hidden, by click on button. will show at bellow.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see WordPress AddMenu Function https://developer.wordpress.org/reference/functions/add_menu_page/
 */
if( ! function_exists( 'wcb_templates' )){
    function wcb_templates(){
    ?>
    <div class="wrap wcb_templates">
        <div class="wcb_templates_wrapper">
            <h1 class="wp-heading-inline"> <?php esc_html_e( 'Templates', 'wc_beautifier' ); ?></h1>
            <hr/>
            <?php echo  '<p class="wcb_template_undone_warning"><strong>' . esc_html__('Warning:','wc_beautifier'). '</strong><br>' .esc_html__('If you apply your chosen template Style/Design, your current design will be destroyed. Unable to undone.','wc_beautifier'). ' <span>' .esc_html__('So first save as template your current setting.','wc_beautifier') . '</span></p>'; ?>


    <?php    
        $templates = WCB_Beautifier\WCB_Templates::getOptions();

        if( isset( $_GET['delete'] ) && !empty( $_GET['delete'] ) ){
            $delet_id = sanitize_text_field( $_GET['delete'] );
            unset($templates[$delet_id]);
            WCB_Beautifier\WCB_Templates::updateFullOptions( $templates );
            if( is_numeric($delet_id) ){
                $delet_id = (int) $delet_id;
            }

            echo '<p class="wcb_message notice is-dismissible">' . sprintf( esc_html__( 'Successfully Deleted %s from WCB_Templates list', 'wc_beautifier' ), '<b>' . WCB_Beautifier\WCB_Templates::templateName( $delet_id ) . '</b>' ) . '</p>';
        }elseif( isset( $_GET['apply_template_id'] ) && !empty( $_GET['apply_template_id'] ) ){
            $apply_template_id = sanitize_text_field( $_GET['apply_template_id'] );
            if( is_numeric( $apply_template_id ) ){
                $apply_template_id = (int) $apply_template_id;
            }
            $final_array = $templates[$apply_template_id];
            WCB_Beautifier\WCB_Templates::importTemplateBasedArray( $final_array, '&response=template_import' );
        }

        //This Template page's link
        $wcb_templates_url = WCB_Beautifier\WCB_Templates::pageURL( 'wc-beautifier-templates' );

    ?>

                <table class="form-table wcb_template_table">
                <tr class="wcb_table_head">
                    <th scope="rol"><?php esc_html_e( 'Templates Name(Date/Time wise)', 'wc_beautifier' ); ?></th>
                    <th><?php esc_html_e( 'Actions (Apply / Delete)', 'wc_beautifier' ); ?></th>

                </tr>

                <?php 
                if( $templates && is_array( $templates ) && count( $templates ) > 0 ){
                    foreach( $templates as $key_template=>$template ){
                ?>
                <tr class="template_action_row">
                    <th data-target="json_<?php esc_attr_e( $key_template ); ?>" class="wcb_exapnd_base64_code" scope="row"><?php esc_html_e( WCB_Beautifier\WCB_Templates::templateName( $key_template ) ); ?></th>
                    <th class="wcb_template_actions_wrapper">
                        <a title="<?php esc_attr_e( 'Apply Template. Remember: current setting will replace with this template. and Unable to undone.', 'wc_beautifier' ); ?>" href="<?php echo esc_url( $wcb_templates_url . '&apply_template_id=' . $key_template ); ?>" class="button button-primary wcb_apply_template wc_beautifier_button">
                            <?php esc_html_e( 'Apply This Style', 'wc_beautifier' ); ?>
                        </a>
                        <a title="<?php esc_attr_e( 'Delete Template', 'wc_beautifier' ); ?>" href="<?php echo esc_url_raw( $wcb_templates_url . '&delete=' . $key_template); ?>" class="button button-cancel wcb_delete_template"><?php esc_html_e( 'Delete', 'wc_beautifier' ); ?></a>
                        <a data-target="json_<?php esc_attr_e( $key_template ); ?>" href="#" class="button button-cancel wcb_exapnd_base64_code"><?php esc_html_e( 'Expand Generated Code', 'wc_beautifier' ); ?> &#8628;</a>
                    </th>

                </tr>
                <tr id="json_<?php esc_attr_e( $key_template ); ?>" class="template_list_json_code">
                    <td colspan="2">
                        <p><?php echo sprintf( esc_html__( 'You can save this code to anywhere of %s Plugin. Just Copy and paste to Import page. Or you can also apply by [Apply This Style] button.','wc_beautifier' ),'<b>WooCommerce Beautifier</b>' ); ?></p>
                        <textarea cols="100" rows="10" class="wcb_export_code templates_textareay" readonly="readonly"><?php esc_html_e( WCB_Beautifier\WCB_JsonBase64::arrayTo64( $template ) ); ?></textarea>
                    </td>
                </tr>
                <?php
                    }
                }else{
                    echo  '<p class="wcb_message wcb_error  notice wcb_no_saved_template">'. esc_html__( 'There is no saved templated founded','wc_beautifier'). '</p>';
                }

                ?>

            </table>

        </div>
    </div>    
    <?php
    }
}