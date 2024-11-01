<?php
namespace WCB_Beautifier;

/**
 * CSS Generator Object/class. This Object will generate required css style based on our setting.
 * There is no property to this Class, Only Method. main method. render method will generate minified CSS.
 * 
 * @method selectorArray WCB_CSS_Generator::selectorArray() Will return Array for CSS selector.
 * @method render WCB_CSS_Generator::render() Will Generate CSS code based on condition.
 * @method createFile WCB_CSS_Generator::createFile(String $contents, String $file_location) This method will rewrite css code and first make change permission to 7777 and then create css Code by WCB_CSS_Generator::render() method.
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Classes and Objects http://php.net/manual/en/language.oop5.php
 */
if( ! class_exists( 'WCB_Beautifier' )) {
    class WCB_CSS_Generator{

        /**
         * Getting Selector Array from current wp_options by WCB_Form_Generator::getOptions() as well as WCB_Form_Generator::getElements().
         * 
         * @return Array
         * @version 1.0
         */
        public static function selectorArray(){
            $saved_datas = WCB_Form_Generator::getOptions();
            $elements = WCB_Form_Generator::getElements();
            $selectors = false;
            if( $saved_datas && is_array( $saved_datas ) && count( $saved_datas ) > 0 ){
                foreach( $saved_datas as $key=>$data ){
                    if( isset( $elements[$key] ) && isset( $elements[$key]['selector'] )  && isset( $elements[$key]['type'] ) && isset( $elements[$key]['style'] ) ){
                        $selectors[$key]['selector'] = $elements[$key]['selector'];
                        $selectors[$key]['style'] = $elements[$key]['style'];
                        $selectors[$key]['value'] = $data;
                        $selectors[$key]['type'] = $elements[$key]['type'];
                    }
                }

            }
            return wp_unslash( $selectors );
        }

        /**
         * Rendering CSS code based on available selector. Parent method is WCB_CSS_Generator::selectorArray()
         * Even if not found any data in WCB_CSS_Generator::selectorArray() Array, than it will just render one line CSS comment.
         * And every Render, we will set Plugin's version number in CSS file as comment.
         * 
         * @return String
         */
        public static function render(){
            $selectors = self::selectorArray();
            $version = \WooCommerce_Beautifier::getVersion();
            $css = "/*WC Beautifier Generated CSS | Version: " . esc_html( $version ) . " - https://codecanyon.net/user/codeastrology */\n";
            if( $selectors && is_array( $selectors ) && count( $selectors ) > 0 ){
                foreach( $selectors as $selector ){
                    $value = $selector['value'];
                    $type = $selector['type'];

                    if( !empty( $value ) ){
                        $property = $selector['style'];
                        $css .= $selector['selector'] . '{';
                        $css .= $type !== 'image' ? "{$property}: {$value} !important;" : "{$property}: url({$value}) !important;";
                        $css .= "}\n";

                    }
                }
            }
            return $css;
        }

        /**
         * Main method of WCB_CSS_Generator object. Because this method will finally create CSS file based on all over condition and logic
         * 
         * @param String $contents Rendered CSS code, which will be generate from WCB_CSS_Generator::render() of this object.
         * @param String $file_location beautifier_generated.css file location directory
         * @return boolean for success, it will return true, otherwise false
         */
        public static function createFile( $contents = false, $file_location = false){
            if( $contents && $file_location && is_file( $file_location ) ){
                $url = wp_nonce_url('admin.php?page=wc-beautifier','wc_beautifier');

                $creds = request_filesystem_credentials( 
                        'None',
                        "",         // type
                        false,      // error
                        false,      // context
                        null,       // extra_fields
                        false      // allow_relaxed_file_ownership
               );
               if ( false === $creds ) {
                       return; 
               }

               if ( ! WP_Filesystem( $creds ) ) {
                        request_filesystem_credentials($url, '', true, false, null);
                        return;
                }

                $mode = 0777;
                global $wp_filesystem;
                $wp_filesystem->chmod( $file_location, $mode );
                return $wp_filesystem->put_contents($file_location, $contents, $mode);
            }
            return;
        }
    }
}