<?php
namespace WCB_Beautifier;

/**
 * JSON and Base64 encode decode handle and management here
 * Array to base64 again base64 to Array conversion
 * Everything we handle it here
 * 
 * @method arrayTo64 WCB_JsonBase64::arrayTo64( Array $current_options ) Generate to base64 formate from current database options
 * @method currnetOptionTo64 WCB_JsonBase64::currnetOptionTo64() Using WCB_JsonBase64::arrayTo64( Array $current_options ) method we have convert to base64 from wp_opions(wcb_setting_value) with help by option name: WCB_Form_Generator::$options_name;
 * @method arrayToJson WCB_JsonBase64::arrayToJson( Array $arrays ) Any array convert to json object
 * @method jsoneToArray WCB_JsonBase64::jsoneToArray( String $json_code ) Any json code convert To array, obviously should be right json.
 * @method b64ToArray WCB_JsonBase64::b64ToArray( String $submitted_import_base_code ) Any base64 code to decode as json code to convert to Array
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Classes and Objects http://php.net/manual/en/language.oop5.php
 */
class WCB_JsonBase64{    
    
    /**
     * To convert any String/Array to convert, we will use this method
     * Generate to base64 formate from current database options
     * 
     * @param type $current_options getting current option from database of WordPress wp_options's table
     * @return String convert as base64 
     */
    public static function arrayTo64( $current_options ){
        $encoded_current_options = false;
        if( $current_options && is_array( $current_options ) && !empty( $current_options ) ){
            $json_options = self::arrayToJson( $current_options );
            $encoded_current_options = base64_encode( $json_options );
        }
        return $encoded_current_options;
    }
    
    /**
     * Using WCB_JsonBase64::arrayTo64( Array $current_options ) method we have convert to base64 from wp_opions(wcb_setting_value) with help by option name: WCB_Form_Generator::$options_name;
     * 
     * @return String Database's current options convert to base64 
     */
    public static function currnetOptionTo64(){
        $option_name = WCB_Form_Generator::$options_name;//wcb_setting_value
        $current_options = get_option( $option_name );
        return self::arrayTo64( $current_options );
    }
    
    /**
     * Any array convert to json object
     * 
     * @param type $arrays Obviously should be Array
     * @return Array array convert to json
     */
    public static function arrayToJson( $arrays ){
        return wp_json_encode( $arrays );
    }
    
    /**
     * Any json code convert To array, obviously should be right json.
     * 
     * @param type $json_code json code which is converte from any array
     * @return String return to json code
     */
    public static function jsoneToArray( $json_code ){
        return json_decode( $json_code, true );
    }
    
    /**
     * Any base64 code to decode as json code to convert to Array
     * 
     * @param type $submitted_import_base_code Genuine encoded base64 code
     * @return Array encoded base64 to convert to Array
     */
    public static function b64ToArray( $submitted_import_base_code ){
        $decode_submitted = base64_decode( $submitted_import_base_code );
        $final_array = json_decode( $decode_submitted,true );//array_column
        return wp_unslash( $final_array );
    }
}