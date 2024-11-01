<?php
namespace WCB_Beautifier;

/**
 * Template mean: Style's Template. Not a html,css Template. Normally our setting will store to database named as template.
 * By this object/class, we will store our setting and normally will show to template page.
 * To this Template class, we have used also our other class. such: WCB_CSS_Generator and WCB_Form_Generator.
 * 
 * @method Array WCB_Templates::getList() All list of Template. By this method, we will return all template list as Array.
 * @method updateOptions WCB_Templates::updateOptions( Array $values, String $name) Only one data's array to add full template's Array, Not full data of Template's full array.Remember: it only for one one array of templates
 * @method nameGenerate WCB_Templates::nameGenerate(type $name) Generating name, if found, Otherwise it will generate current timestamp number.
 * @method updateFullOptions WCB_Templates::updateFullOptions(type $templatesOption) Total Template's Array, here will stay full templates Array. not any specific. here will stay All template array data
 * @method getOptions WCB_Templates::getOptions() Get full template's Array data from WordPress database
 * @method templateName WCB_Templates::templateName(int/string $timestampe_or_name) Generate Name for saved Template. It will generate based on getting String. if fond name,than will show based on name with name otherwise show based on timestamp
 * @method importTemplateBasedon64 WCB_Templates::importTemplateBasedon64(String $submitted_import_base_code) Importing data from base64 code to Array for WCB_Form_Generator::updateOptions(); and as #parameter-have to take based64 code as $submitted_import_base_code varuavke,
 * @method redirectPage WCB_Templates::redirectPage(String $page_slug = 'wc-beautifier', String $extra) To redirect to WC_Beautifier's main form. But if we want to add extra #hash code or extra $_GET code, we can use by $extra variable
 * @method pageURL WCB_Templates::pageURL( String $page_slug = 'wc-beautifier', String $extra ) Almost same like WCB_Templates::redirectPage(String $page_slug, String $extra) method. but by this method, we can go to any other page by second parameter. and by 1st parameter,we can handle targeted pages specific part
 * 
 * @author Saiful Islam <codersaiful@gmail.com>
 * @package WooCommerce_Beautifier
 * @since 1.0
 * @see Classes and Objects http://php.net/manual/en/language.oop5.php
 */
if( !class_exists( 'WCB_Templates' )){
    class WCB_Templates{
        public static $options_name = 'wcb_templates_array';

        public static function getList(){
            $list = self::getOptions();
            return is_array( $list ) ? array_keys( $list ) : false;
        }

        /**
         * Update template's one data as array
         * 
         * @param Array $values Only one data's array, Not full data of Template's full array.Remember: it only for one one array of templates
         * @param String $name Array's associative name, if not found any name, than automatically receive timestamp
         * @return boolean If successfully update to server, then return true, Otherwise false.
         */
        public static function updateOptions( $values = false , $name = false ) {
            $name = self::nameGenerate( $name );
            if( $values ){
                $options_name  = self::$options_name;
                $templatesOption = self::getOptions();
                $sanitize_name = sanitize_text_field( $name );
                $templatesOption[$sanitize_name] = $values; 
                update_option( sanitize_key( $options_name ), wp_unslash( $templatesOption ) ); 
                return true;
            }
            return;
        }

        /**
         * Generating name, if set any name, otherise normally it will return false. then name will be as timestamp
         * 
         * @param string $name Getting name, if found or fillup name input tag. otherwise it blank
         * @return string/boolean If found name, then String, otherwise return false;
         */
        public static function nameGenerate( $name = false ){
            if( $name && is_string( $name ) ){
                $name = preg_replace( '/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',"$1", $name );
                $name = str_replace( ' ', '_', $name ) . '_' . date( 'd_m_y_s' );//Nemoving Spacne if availabel
            }else{
                $name = (int) time();
            }
            return $name;
        }

        /**
         * Total Template's Array, here will stay full templates Array. not any specific. here will stay All template array data
         * 
         * @param Array $templatesOption Total Template's Array, Should be Array
         * @return boolean if found, return true, otherwise false or blank
         */
        public static function updateFullOptions( $templatesOption = false ){
            $options_name  = self::$options_name;
            update_option( sanitize_key( $options_name ), wp_unslash( $templatesOption ) ); 
            return true;
        }

        /**
         * Get full template's Array data from WordPress database
         * 
         * @return Array getting array for templates full array
         */
        public static function getOptions() {
            return get_option( self::$options_name );
        }

        /**
         * Generate Name for saved Template. It will generate based on getting String. if fond name,than will show based on name with name otherwise show based on timestamp
         * 
         * @param type $timestampe_or_name it can be name or timestamp
         * @return String Return a name based on gotten name or based on timestamp
         */
        public static function templateName( $timestampe_or_name = false ){
            $name = "WC_Beautifier_";
            if( is_int( $timestampe_or_name ) ){
                $name .= date( 'D_d_M_Y-h:i:s',$timestampe_or_name );
            }else{
                $name .= $timestampe_or_name;
            }
            return $name;
        }

        /**
         * Importing data from base64 code to Array for WCB_Templates::importTemplateBasedArray(); and as #parameter-have to take based64 code as $submitted_import_base_code,
         * Also this method will generate CSS code file by  WCB_CSS_Generator::createFile( $wcb_content, $wcb_css_file ) by WCB_Templates::importTemplateBasedArray()
         * And helpfull method to get rendered css code. used: WCB_CSS_Generator::render() by WCB_Templates::importTemplateBasedArray()
         * 
         * @param String $submitted_import_base_code based64 code as $submitted_import_base_code
         * @param String $extra if need extra such: &msg = Something
         * @param String $page_slug Default - 'wc_beautifier'
         * @return void Nothing Return, For success, Going to WooCommerce_Beautifier page, otherwise: generate error message
         */
        public static function importTemplateBasedon64( $submitted_import_base_code, $extra = false, $page_slug = 'wc-beautifier' ){
            $final_array = WCB_JsonBase64::b64ToArray( $submitted_import_base_code );
            self::importTemplateBasedArray( $final_array, $extra, $page_slug );
        }

        /**
         * Importing data from Array by WCB_Form_Generator::updateOptions(); And value Obviously should be an Array. Because we have to update that value to wp_options
         * Also this method will generate CSS code file by  WCB_CSS_Generator::createFile( $wcb_content, $wcb_css_file )
         * And helpful method to get rendered css code. used: WCB_CSS_Generator::render()
         * 
         * @param Array $final_array Should be Array and not null Because we have to update that value to wp_options
         * @param String $extra if need extra such: &msg = Something
         * @param String $page_slug Default - 'wc_beautifier'
         * @return void Nothing Return, For success, Going to WooCommerce_Beautifier page, otherwise: generate error message
         */
        public static function importTemplateBasedArray( $final_array, $extra = false, $page_slug = 'wc-beautifier' ){
            if( null !== $final_array && is_array( $final_array ) && WCB_Form_Generator::updateOptions($final_array) ){

                $wcb_css_file = WCB_BASE_DIR . '/assets/css/beautifier_generated.css';
                $wcb_content = WCB_CSS_Generator::render();
                if( WCB_CSS_Generator::createFile( $wcb_content, $wcb_css_file ) ){
                    self::redirectPage( $page_slug, $extra );
                }else{
                    echo '<p class="wcb_message wcb_error  notice is-dismissible">' . esc_html__( 'Something went wrong. Fail to create CSS file.', 'wc_beautifier' ) . '</p>';
                }
            }else{
                echo '<p class="wcb_message wcb_error  notice is-dismissible">' . esc_html__( 'Something went wrong. Your imported code is not valid.' , 'wc_beautifier' ) . '</p>';
            }
        }

        /**
         * To redirect to WooCommerce_Beautifier's main form. But if we want to add extra #hash code or extra $_GET code, we can use by $extra variable
         * 
         * @param String $page_slug (Default) wc_beautifier. To redirect to our any specific page, such as 'wc_beautifier'
         * @param String $extra to go WooCommerce_Beautifier's links any other tab by #hasing or if want to add extra $_GET, we can sue this $extra variable
         */
        public static function redirectPage( $page_slug = 'wc-beautifier', $extra = false ){
            $url = admin_url( 'admin.php?page=' . $page_slug ) . $extra;
            wp_redirect( $url );
            exit;
        }

        /**
         * Not for Redirect to any link. To generate link of any page. Normally main form link.
         * Almost same like WCB_Templates::redirectPage(String $page_slug, String $extra) method. but by this method, we can go to any other page by second parameter. and by 1st parameter,we can handle targeted pages specific part
         * 
         * @param type $page_slug although default page link is main form link 'wc-beautifier' but we can change it
         * @param type $extra we can handle targeted pages specific part for any page.
         * @return String Generate main form page's link as well as any other link can be generate by this method
         */
        public static function pageURL( $page_slug = 'wc-beautifier', $extra = false ){
            return admin_url( 'admin.php?page=' . $page_slug . $extra );
        }
    }
}