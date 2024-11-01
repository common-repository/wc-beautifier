<?php
/**
 * Plugin Name: WooCommerce Beautifier (free)
 * Plugin URI: https://codecanyon.net/item/woocommerce-beautifier-a-beauty-parlour-of-woocommerce/23386133
 * Description: WooCommerce Beautifier plugin gives you a plenty of options to customize the design of your WooCommerce shop. With this plugin you will be able to change/customize your site Design/Style/Color/Font-Size/Padding etc of your Shop for all page content, Minicart content, Cart page content, Checkout page content, Category and Tag page content. Such as product title, price,add to cart button,sale badge,page title,placeorder button, select option button etc. You can change color, font size,font style,font-family,padding,background color etc.
 * Author: CodeAstrology
 * Author URI: https://codecanyon.net/user/codeastrology
 * Tags: beatify WooCommerce, beautiful shop, beautify shop, change style, custom style and design, customize design, customize style, design wc, designing, shop design, style wc, style WooCommerce, wc beautifier, WooCommerce, WooCommerce styling
 * 
 * Version: 1.0
 * Requires at least:    4.0.0
 * Tested up to:         5.5
 * WC requires at least: 3.0.0
 * WC tested up to: 	 3.6.2
 * 
 * Text Domain: wc_beautifier
 * Domain Path: /languages/
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Writing a Plugin https://codex.wordpress.org/Writing_a_Plugin
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Defining constant
 */
if( ! class_exists( 'WCB_Beautifier' )) {
    define( 'WCB_PLUGIN_BASE_FILE', plugin_basename( __FILE__ ) );
    define( "WCB_BASE_URL", WP_PLUGIN_URL . '/'. plugin_basename( dirname( __FILE__ ) ) );
    define( "WCB_DIR_BASE", dirname( __FILE__ ) );
    define( "WCB_BASE_DIR", str_replace( '\\', '/', WCB_DIR_BASE ) );
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); //Confirm include plugin file
if( ! class_exists( 'WCB_Beautifier' )) {
    WooCommerce_Beautifier::getInstance(); //Call to Instance
    //Include Handle File for Admin as well as Defeault
    include WCB_BASE_DIR . '/handle/require.php';
}


/**
 * WooCommerce Beautifier Plugin's Main class, All Plugin will handle from here
 * Already Instance declared
 * 
 * @method getInstance WooCommerce_Beautifier::getInstance() Already Instance declared
 * @method install WooCommerce_Beautifier::install() Plugin install function. When plugin will install, Default CSS file will generate,if u have existing setting.
 * @method uninstall WooCommerce_Beautifier::uninstall() Nothing for now for uninstall
 * @method getPluginData WooCommerce_Beautifier::getPluginData() Getting plugin's all data. Such: name, version, author, url , tag , description etc.
 * @method getVersion WooCommerce_Beautifier::getVersion() Getting WooCommerce_Beautifier plugin's version
 * @method getName WooCommerce_Beautifier::getName() Getting Plugin Name, we can use, if any where need
 * @method checkWooCommerce WooCommerce_Beautifier::checkWooCommerce() This method very important. it will check that WooCommerce plugin install/activated or not. If not activated. This method will generate an Error Message and showing a message that Woocommerce Plugin is not installed.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Plugin Basic Start https://developer.wordpress.org/plugins/plugin-basics/
 */

class WooCommerce_Beautifier{

    /**
    * Core singleton class
    * @var self - pattern realization
    */
    private static $_instance;

    /**
     * Getting start instance of WooCommerce_Beautifier package
     * 
     * @return type Object
     */
    public static function getInstance(){
        if ( ! ( self::$_instance instanceof self ) ) {
                self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Staring function 
     * Activation Hook
     */
    public function install(){
        ob_start();
        //Creating CSS file based on old Setting as well as new setting
        $wcb_css_file = WCB_BASE_DIR . '/assets/css/beautifier_generated.css';
        $wcb_content = WCB_Beautifier\WCB_CSS_Generator::render();
        WCB_Beautifier\WCB_CSS_Generator::createFile( $wcb_content, $wcb_css_file );
    }


    /**
    * Plugin Uninsall Activation Hook 
    * Static Method
    * 
    * @since 1.0.0
    */
    public function uninstall() {
       //Nothing for now
    }

    /**
    * Getting full Plugin data. We have used __FILE__ for the main plugin file.
    * 
    * @since V 1.5
    * @return Array Returnning Array of full Plugin's data for This Woo Product Table plugin
    */
    public static function getPluginData(){
       return get_plugin_data( __FILE__ );
    }

    /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
    public static function getVersion() {
       $data = self::getPluginData();
       return $data['Version'];
    }

    /**
    * Getting Version by this Function/Method
    * 
    * @return type static String
    */
    public static function getName() {
       $data = self::getPluginData();
       return $data['Name'];
    }

    public static function checkWooCommerce(){
        if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
            return true;
        }
        return;
    }
}


/**
* Plugin Install and Uninstall
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see register activation hook https://codex.wordpress.org/Function_Reference/register_activation_hook
*/
register_activation_hook(__FILE__, array( 'WooCommerce_Beautifier','install' ) );
register_deactivation_hook( __FILE__, array( 'WooCommerce_Beautifier','uninstall' ) );
?>