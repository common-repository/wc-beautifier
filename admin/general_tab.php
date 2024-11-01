<?php

/**
 * WooCommerce_Beautifier Menu tab's content.
 * General or main tab. All setting will manage from here.
 * Here available: Basic, Minicart, Shop, Category, Tag, Signgle Product page etc
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see WordPress AddMenu Function https://developer.wordpress.org/reference/functions/add_menu_page/
 */
if( !function_exists( 'wcb_general_tab' )){
function wcb_general_tab(){
    ?>

<div class="wrap wcb_wrap">
    <h1 class="wp-heading-inline"> <?php echo esc_html( WooCommerce_Beautifier::getName() . ' &raquo; ' ) . esc_html__( 'Design Panel', 'wc_beautifier' ); ?></h1>
    <hr/>
    <h3 class="wcb_subtitle"><?php echo esc_html__( 'Beautify your WooCommerce default element design and style. Such as Add_to_cart, Order button, product title, price text etc.', 'wc_beautifier' ); ?></h3>
    
    <?php
    if( WCB_Beautifier\WCB_Form_Generator::submit() ){
        echo '<p class="wcb_message notice is-dismissible">'. esc_html__( 'Submitted Successfully.','wc_beautifier' ).'</p>';
        $wcb_css_file = WCB_BASE_DIR . '/assets/css/beautifier_generated.css';
        $wcb_content = WCB_Beautifier\WCB_CSS_Generator::render();
        if( WCB_Beautifier\WCB_CSS_Generator::createFile( $wcb_content, $wcb_css_file ) ){
            echo '<p class="wcb_message notice is-dismissible">'. esc_html__( 'CSS file Generated Successfully.','wc_beautifier' ).'</p>';
        }else{
            echo '<p class="wcb_message wcb_error  notice is-dismissible">'. esc_html__( 'Something went wrong. Fail to create CSS file.','wc_beautifier' ).'</p>';
        }
        
    }elseif(isset( $_GET['save'] ) && $_GET['save'] == 'template' ){
        $name = isset( $_GET['name'] ) && !empty( $_GET['name'] ) ? sanitize_text_field( $_GET['name'] ) : time();
        $name = WCB_Beautifier\WCB_Templates::nameGenerate( $name );
        $templatesArray = WCB_Beautifier\WCB_Form_Generator::getOptions();
        if( WCB_Beautifier\WCB_Templates::updateOptions( $templatesArray , $name ) ){
            echo '<p class="wcb_message notice is-dismissible">' . sprintf( esc_html__( 'Template Saved Successfully. Please check %s on WCB_Templates list', 'wc_beautifier' ), '<b>' . WCB_Beautifier\WCB_Templates::templateName( $name ) . '</b>' ) . '</p>';
        }else{
            echo '<p class="wcb_message wcb_error  notice is-dismissible">'. esc_html__( 'Sorry, unable to save as template. Beacuse: there is no saved setting.','wc_beautifier' ).'</p>';
        }
        
    }elseif( isset( $_GET['response'] ) && !empty( $_GET['response'] ) ){
        $response = $_GET['response'];
        $msg = false;
        if( $response == 'template_import' ){
            $msg = esc_html__( 'Template Imported Successfully', 'wc_beautifier' );
        }elseif( $response == 'setting_import' ){
            $msg = esc_html__( 'Settings Imported Successfully', 'wc_beautifier' );
        }
        echo '<p class="wcb_message notice is-dismissible">'. esc_html( $msg ) .'</p>';
    }
    ?>
    <nav class="nav-tab-wrapper">
        <?php
            $tabs = WCB_Beautifier\WCB_Form_Generator::getTabElements();
            if( is_array( $tabs ) && count( $tabs ) > 0 ){
                $active_nav = 'nav-tab-active';
                foreach( $tabs as $tab_key=>$tab_value ){
                    echo "<a href='#" . esc_attr( $tab_key) . "' data-tab='#" . esc_attr( $tab_key) . "' class='wcb_nav_tab wcb_nav_for_" . esc_attr( $tab_key) . " nav-tab " . esc_attr( $active_nav) . "'>" . esc_html__( $tab_value, 'wc_beautifier' ) . "</a>";
                    $active_nav = false;
                }
            }
        ?>        
    </nav>
    
    <?php 
    WCB_Beautifier\WCB_Form_Generator::$action = WCB_Beautifier\WCB_Templates::pageURL();
    WCB_Beautifier\WCB_Form_Generator::$submit = esc_html__( "Save Change", 'wc_beautifier' );
    WCB_Beautifier\WCB_Form_Generator::$reset = esc_html__( "Reset this tab", 'wc_beautifier' );
    WCB_Beautifier\WCB_Form_Generator::$reset_all = esc_html__( "Reset all tab", 'wc_beautifier' );
    WCB_Beautifier\WCB_Form_Generator::render();
    ?>
    <hr/>
    <div class="template_savezone template_savezone_wrapper">
        <h3 class="wcb_subtitle"><?php echo esc_html__( 'Save as Template', 'wc_beautifier' ); ?></h3>
        <input id='wcb_template_name_id' type="text" minlength="3" maxlength="30" placeholder="<?php esc_attr_e( '(Optional) insert a name & click ENTER', 'wc_beautifier' );?>">
        <a data-target="<?php echo esc_attr( WCB_Beautifier\WCB_Form_Generator::$class ); ?>" class="button button-controls wcb_template_save_button" href="<?php echo esc_url( WCB_Beautifier\WCB_Templates::pageURL() . '&save=template' ); ?>"><?php echo esc_html__( 'Current Setting - Save as template','wc_beautifier' );?> </a>
        
        <p> <?php echo esc_html__( 'Before Save as Template, Confirm your data is saved, Because new changed will not save as template.','wc_beautifier' );?></p>
    </div>
</div>

    <?php
}
}