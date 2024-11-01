<?php

/**
 * This file will load at Admin panel as well as frontEnd file
 * We have set admin's file 'is_admin()'
 * We have already set is_admin() condition in root plugin page
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see PHP Require Once http://php.net/manual/en/function.require-once.php
 */


$wcb_admin_dir = WCB_BASE_DIR . '/admin/';
$wcb_frameworks_dir = WCB_BASE_DIR . '/frameworks/';
$wcb_handle_dir = WCB_BASE_DIR . '/handle/';
if( is_admin() ){
    if( WooCommerce_Beautifier::checkWooCommerce() ){
      require_once $wcb_admin_dir . 'menu_n_setting.php';  
    }else{
        require_once $wcb_admin_dir . 'no_woocommerce.php';
    }
    
    require_once $wcb_admin_dir . 'enqueue.php';

    require_once $wcb_frameworks_dir . 'form_generator.php'; //Includeing FormGeneraotor Object
    require_once $wcb_frameworks_dir . 'css_generator.php'; //Includeing CSSGenerator Object
    require_once $wcb_frameworks_dir . 'template_manage.php'; //Includeing CSSGenerator Object
    require_once $wcb_frameworks_dir . 'jsonBase64.php'; //Includeing CSSGenerator Object


    //Menus File included here
    require_once $wcb_admin_dir . 'general_tab.php';
    require_once $wcb_admin_dir . 'export_emport.php';
    require_once $wcb_admin_dir . 'plugin_status.php';
    require_once $wcb_admin_dir . 'templates.php';
}

//Front End Enqueue file included here
$wcb_includes_dir = WCB_BASE_DIR . '/includes/';
require_once $wcb_includes_dir . 'enqueue.php';